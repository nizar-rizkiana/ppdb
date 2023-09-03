<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        //membuat tabel admin
        $this->forge->addField([
            'id_admin' => [
                'type'              => 'INT',
                'constraint'        => 100,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'nama_admin' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => 200,
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

        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('tb_admin');
    }

    public function down()
    {
        //untuk menghapus tabel admin
        $this->forge->dropTable('tb_admin');
    }
}
