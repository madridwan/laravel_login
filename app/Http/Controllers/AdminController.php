<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		if (request()->user()->hasRole('admin')) {
			$users = DB::table('users')->get();
			return view('admin.index', ['users' => $users]);
		} else {
			return redirect('/');
		}
	}

	public function tambah()
	{
		// memanggil view tambah
		return view('admin.tambah');
	}

	// method untuk insert data ke table user
	public function store(Request $request)
	{
		// insert data ke table user
		$user = DB::table('users')->insert([
			// 'id' => Str::uuid('uuid', 10),
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => Hash::make($request['password']),
		]);

		// alihkan halaman ke halaman admin
		return redirect('/admin');
	}

	// method untuk edit data user
	public function edit($id)
	{
		// mengambil data user berdasarkan id yang dipilih
		$users = DB::table('users')->where('id', $id)->get();
		// passing data user yang didapat ke view edit.blade.php
		return view('admin.edit', ['users' => $users]);
	}

	// update data users
	public function update(Request $request)
	{
		// update data users
		DB::table('users')->where('id', $request->id)->update([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => Hash::make($request['password']),
		]);
		// alihkan halaman ke halaman admin
		return redirect('/admin');
	}

	// method untuk hapus data users
	public function hapus($id)
	{
		// menghapus data user berdasarkan id yang dipilih
		DB::table('users')->where('id', $id)->delete();

		// alihkan halaman ke halaman users
		return redirect('/admin');
	}
}
