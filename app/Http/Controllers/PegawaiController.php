<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pegawais = Pegawai::latest()->paginate(5);
         
        return view('pegawais.index',compact('pegawais'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {

        return view('pegawais.create');
    }
  
    public function store(Request $request)
    { 

        Pegawai::create($request->all());
         
        return redirect()->route('pegawais.index')
                        ->with('success','Pegawai created successfully.');
    }
  
    public function edit(Pegawai $pegawai)
    {

        return view('pegawais.edit',compact('pegawai'));
    }
  
    public function update(Request $request, Pegawai $pegawai)
    {
         
        $pegawai->update($request->all());
         
        return redirect()->route('pegawais.index')
                        ->with('success','Pegawai updated successfully');
    }
  
    public function destroy(Pegawai $pegawai)
    {

        $pegawai->delete();
  
        return redirect()->route('pegawais.index')
                        ->with('success','pegawai deleted successfully');
    }
}
