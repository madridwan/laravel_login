@extends('layouts.app')
@section('title', 'Laravel - SI Perpustakaan')
@section('content')
<div class="container">
	<div class="jumbotron">
		@if(session('msg'))
		<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
			{{session('msg')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<h1 class="display-6">Data User</h1>
		<hr class="my-4">
		<a href="admin/tambah" class="btn btn-primary mb-1">
			Tambah User</a>
		<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nama</th>
				<th scope="col">Email</th>
				<th scope="col">Password</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $ang)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $ang->name }}</td>
				<td>{{ $ang->email }}</td>
				<td>{{ $ang->password }}</td>
				<td>
					<a href="admin/edit/{{ $ang->id }}">Edit</a>
					|
					<a href="admin/hapus/{{ $ang->id }}">Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
		</table>
	</div>
</div>
@endsection