<?php

use Illuminate\Database\Seeder;
use App\mahasiswa;
use App\wali;
use App\dosen;
use App\hobi;

class seederrelasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('dosens')->delete();
        DB::table('hobis')->delete();
		DB::table('mahasiswa_hobi')->delete();

		# Isi tabel hobi
		
       $dosen = dosen::create(array(
			'nama' => 'Yulianto',
			'nipd' => '1234567890'));

		$this->command->info('Data dosen telah diisi!');

		# Kemudian tambahkan nilai id_dosen ditiap record mahasiswa 

		/* Kita akan membuat 3 orang mahasiswa sebagai sampel
		 * Disinilah alasan kenapa saya membuat model terlebih dahulu
		 * Karena saya memanfaatkan model untuk mengcreate record
		 */

		# Mahasiswa Pertama bernama Noviyanto Rachmadi. Dengan NIM 1015015072.
		$novay = mahasiswa::create(array(
			'nama' => 'Noviyanto Rachmadi',
			'nim'  => '1015015072',
			'id_dosen' => $dosen->id));

		# Mahasiswa Kedua bernama Djaffar. Dengan NIM 1015015088.
		$dije = mahasiswa::create(array(
			'nama' => 'Djaffar',
			'nim'  => '1015015088',
			'id_dosen' => $dosen->id));

		# Mahasiswa Ketiga bernama Puji Rahayu. Dengan NIM 1015015078.
		$ayu = mahasiswa::create(array(
			'nama' => 'Puji Rahayu',
			'nim'  => '1015015078',
			'id_dosen' => $dosen->id));

		# Informasi ketika mahasiswa telah diisi.

        $this->command->info('Mahasiswa telah diisi!');


        wali::create(array(
			'nama'  => 'Ukos',
			'id_mahasiswa' =>$novay->id));

		wali::create(array(
			'nama'  => 'Ujang',
			'id_mahasiswa' => $dije->id));	

		wali::create(array(
			'nama'  => 'Koswara',
			'id_mahasiswa' => $ayu->id ));	

		$this->command->info('Data mahasiswa dan wali telah diisi!');

		$mandi_hujan = hobi::create(array('hobi' => 'Mandi Hujan'));
		$baca_buku = hobi::create(array('hobi' => 'Baca Buku'));

		# Hubungkan Mahasiswa dengan Hobinya masing-masing
		$novay->hobi()->attach($mandi_hujan->id);
		$novay->hobi()->attach($baca_buku->id);
		$dije->hobi()->attach($mandi_hujan->id);
		$ayu->hobi()->attach($baca_buku->id);

		# Tampilkan pesan ini bila berhasil diisi
		$this->command->info('Mahasiswa beserta Hobi telah diisi!');

    }
}
