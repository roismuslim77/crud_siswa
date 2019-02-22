@extends('layouts.master')
@section('content')
		<form action="/siswa/{{$siswa->id}}/update" method="POST">
			  <h2 style="margin-top: 1%">Edit Siswa</h2>
			   {{csrf_field()}}
			  <div class="form-group">
			    <label for="inputName">Nama</label>
			    <input name="nama" type="text" class="form-control" id="name" 
			    placeholder="Nama Lengkap" value="{{$siswa->nama}}">
			  </div>
			  <div class="form-group">
			  	<label for="inputJK">Masukan Jenis Kelamin</label>
			    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
			    	<option value="L" @if($siswa->jenis_kelamin=="L") selected @endif >Laki - Laki</option>
			    	<option value="P" @if($siswa->jenis_kelamin=="P") selected @endif >Perempuan</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Agama</label>
			    <input type="text" name="agama" class="form-control" id="agama" 
			    placeholder="Agama" value="{{$siswa->agama}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Alamat</label>
			    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="123 Main St">{{$siswa->alamat}}</textarea>
			  </div>
	        <button type="submit" class="btn btn-warning">Update Data</button>
		</form>
@endsection