@extends('layouts.master')
@section('content')
		@if(session('success'))
		<div class="alert alert-success" role="alert">
		  {{session('success')}}
		</div>
		@endif
		<div class="row">
			<div class="col-6" style="margin-top: 1%"><h2>Data Siswa</h2></div>
			<div class="col-6" style="margin-top: 1%">
				<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
				  Tambah Siswa
				</button></div>
			<table class="table table-striped">
			<thead>
			<tr>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Agama </th>
				<th>Alamat</th>
				<th>Aksi </th>
			</tr>
			</thead>
			<tbody>
			@foreach($data as $siswa)
			<tr>
				<td>{{$siswa->nama}}</td>
				<td>{{$siswa->jenis_kelamin}}</td>
				<td>{{$siswa->agama}}</td>
				<td>{{$siswa->alamat}}</td>
				<td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
					&nbsp; <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin dihapus ?')">Hapus</a></td>
			</tr>
			@endforeach
			</tbody>
			</table>
		</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/siswa/create" method="POST">
			   {{csrf_field()}}
			  <div class="form-group{{$errors->has('nama') ? ' has-error ': ''}}">
			    <label for="inputName">Nama</label>
			    <input name="nama" type="text" class="form-control" id="name" 
			    placeholder="Nama Lengkap">
			    @if($errors->has('nama'))
			    	<span class="help-block" style="color: red">{{$errors->first('nama')}}</span>
			    @endif
			  </div>
			  <div class="form-group">
			  	<label for="inputJK">Masukan Jenis Kelamin</label>
			    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
			    	<option value="L">Laki - Laki</option>
			    	<option value="P">Perempuan</option>
			    </select>
			  </div>
			  <div class="form-group{{$errors->has('agama') ? ' has-error ': ''}}">
			    <label for="exampleInputPassword1">Agama</label>
			    <input type="text" name="agama" class="form-control" id="agama" 
			    placeholder="Agama">
			    @if($errors->has('agama'))
			    	<span style="color: red" class="help-block">{{$errors->first('agama')}}</span>
			    @endif
			  </div>
			  <div class="form-group{{$errors->has('alamat') ? ' has-error ': ''}}">
			    <label for="exampleFormControlTextarea1">Alamat</label>
			    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="123 Main St"></textarea>
			    @if($errors->has('alamat'))
			    	<span class="help-block" style="color: red">{{$errors->first('alamat')}}</span>
			    @endif
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save Data</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

@endsection