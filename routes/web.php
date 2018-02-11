<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\mahasiswa;
use App\wali;
use App\dosen;
use App\hobi;

Route::get('/', function () {
    return view('welcome');
});

# URL localhost:8000/relasi-1/
	Route::get('/relasi', function() {

		# Temukan mahasiswa dengan NIM 1015015072
		$mahasiswa = mahasiswa::where('nim', '=', '1015015072')->first();

		# Tampilkan nama wali mahasiswa
		return $mahasiswa->wali->nama;

	});

	# URL localhost:8000/relasi-2/
	Route::get('/relasi-2', function() {

		# Temukan mahasiswa dengan NIM 1015015072
		$mahasiswa = mahasiswa::where('nim', '=', '1015015072')->first();

		# Tampilkan nama dosen pembimbing
		return $mahasiswa->dosen->nama;

	});


	Route::get('relasi-3', function() {

		# Temukan dosen dengan yang bernama Yulianto
		$dosen = dosen::where('nama', '=', 'Yulianto')->first();

		# Tampilkan seluruh data mahasiswa didikannya
		foreach ($dosen->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nim . '</strong></li>';
	});

	# URL localhost:8000/relasi-4/
	Route::get('relasi-4', function() {

		# Bila kita ingin melihat hobi saya
		$novay = mahasiswa::where('nama', '=', 'Noviyanto Rachmadi')->first();

		# Tampilkan seluruh hobi si novay
		foreach ($novay->hobi as $temp) 
			echo '<li>' . $temp->hobi . '</li>';
	});

	Route::get('relasi-5', function() {

		# Temukan hobi Mandi Hujan
		$mandi_hujan = hobi::where('hobi', '=', 'Mandi Hujan')->first();

		# Tampilkan semua mahasiswa yang punya hobi mandi hujan
		foreach ($mandi_hujan->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nim . '</strong></li>';

	});

	Route::get('eloquent',function(){
		$mahasiswa = mahasiswa::with('wali','dosen','hobi')->get();

		return View::make('eloquent', compact('mahasiswa'));
	});


