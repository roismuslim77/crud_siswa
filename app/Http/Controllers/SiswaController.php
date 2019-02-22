<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	if($request->has('cari'))
    	{
    		$data_siswa = \App\Siswa::where('nama','LIKE','%'.$request->cari.'%')->get();
    	} else{
    		$data_siswa = \App\Siswa::all();
    	}
    	return view('siswa.index',['data'=> $data_siswa]);
    }
    public function create(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required|min:1',
    		'agama' => 'required',
    		'alamat' => 'required',
    	]);
    	\App\Siswa::create($request->all());
    	return redirect('/siswa')->with('success','Data berhasil diinput');
    }
    public function edit($id)
    {
    	$siswa = \App\Siswa::find($id);
    	return view('siswa/edit', ['siswa'=>$siswa]);
    }
    public function update(Request $req, $id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->update($req->all());
    	return redirect('/siswa')->with('success','Data berhasil diupdate');
    }
    public function delete($id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->delete();
    	return redirect('/siswa')->with('success','Data berhasil dihapus');
    }
}
