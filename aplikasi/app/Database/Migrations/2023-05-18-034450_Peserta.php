<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peserta extends Migration
{
    public function up()
    {
        //membuat tabel peserta ppdb
        $this->forge->addField([
            'id_peserta' => [
                'type'              => 'int',
                'constraint'        => 6,
                'auto_increment'    => true,
                'unsigned'          => true,
            ],
            'nisn' => [
                'type'              => 'varchar',
                'constraint'        => 10,
            ],
            'nama_lengkap' => [
                'type'              => 'varchar',
                'constraint'        => 50,
            ],
            'jenis_kelamin' => [
                'type'              => 'varchar',
                'constraint'        => 1,
            ],
            'tempat_lahir' => [
                'type'              => 'varchar',
                'constraint'        => 25,
            ],
            'tanggal_lahir' => [
                'type'              => 'date',
            ],
            'no_hp' => [
                'type'              => 'varchar',
                'constraint'        => 15,
            ],
            'alamat' => [
                'type'              => 'varchar',
                'constraint'        => 150,
            ],
            'asal_sekolah' => [
                'type'              => 'varchar',
                'constraint'        => 50,
            ],
            'berat_badan' => [
                'type'              => 'varchar',
                'constraint'        => 5,
            ],
            'tinggi_badan' => [
                'type'              => 'varchar',
                'constraint'        => 5,
            ],
            'desa' => [
                'type'             => 'varchar',
                'constraint'       => 25,
            ],
            'pilihan_pertama' => [
                'type'              => 'varchar',
                'constraint'        => 50,
            ],
            'pilihan_kedua' => [
                'type'              => 'varchar',
                'constraint'        => 50,
            ],
            'diterima' => [
                'type'              => 'varchar',
                'constraint'        => 50,
                'null'              => true,
            ],
            'foto' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'ktp_ibu' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'ktp_bpk' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'kk' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'akta_kelahiran' => [
                'type'              => 'varchar',
                'constraint'        => 100
            ],
            'ijazah' => [
                'type'              => 'varchar',
                'constraint'        => 100
            ],
            'raport' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'status' => [
                'type'              => 'int',
                'constraint'         => 2, //1 = proses; 2 = seleksi-berkas; 3 = diterima; 4 = ditolak;
            ],
            'created_at' => [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
			'updated_at' => [
				'type'				=> 'DATETIME',
				'null' 				=> true,
			],
        ]);

        $this->forge->addKey('id_peserta', true);
        $this->forge->createTable('tb_peserta');
    }

    public function down()
    {
        //untuk menghapus tabel pserta
        $this->forge->dropTable('tb_peserta');
    }
}
