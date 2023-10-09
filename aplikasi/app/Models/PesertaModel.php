<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'tb_peserta';
	protected $primaryKey = 'id_peserta';
	protected $useTimestamps = true;
	protected $allowedFields = ['nisn', 'nama_lengkap', 'jenis_kelamin', 'no_hp', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'berat_badan', 'tinggi_badan', 'desa', 'asal_sekolah', 'pilihan_pertama', 'pilihan_kedua', 'diterima', 'foto', 'ktp_ibu', 'ktp_bpk', 'kk', 'akta_kelahiran', 'ijazah', 'raport', 'status'];

    public function getPeserta()
    {
        
    }

    public function getByjurusan()
    {
        return $this->selectCount('nisn')->select('pilihan_pertama')
        ->groupBy('pilihan_pertama')->findAll();
    }
}
