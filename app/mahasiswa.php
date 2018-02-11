<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\dosen;
class mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = array('nama', 'nim','id_dosen');

    public function wali()
    {
    	return $this->hasOne('App\wali','id_mahasiswa');
    }

    public function dosen()
    {
    	return $this->belongsTo('App\dosen','id_dosen');
    }

    public function hobi() {
		return $this->belongsToMany('App\hobi', 'mahasiswa_hobi', 'id_mahasiswa', 'id_hobi');
	}

}
