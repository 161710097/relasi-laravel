<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mahasiswa;

class dosen extends Model
{
	# Tentukan nama tabel terkait
	protected $table = 'dosens';

	# MASS ASSIGNMENT
	# Untuk membatasi attribut yang boleh di isi (Untuk keamanan)
	protected $fillable = array('nama', 'nipd');



    public function mahasiswa()
    {
    	return $this->hasMany('App\mahasiswa','id_dosen');
    }
}
