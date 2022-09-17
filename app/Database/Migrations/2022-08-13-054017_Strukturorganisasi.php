<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Strukturorganisasi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_struktur_organisasi' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'gambar' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id_struktur_organisasi', true);
		$this->forge->createTable('tabel_struktur_organisasi');
	}

	public function down()
	{
		$this->forge->dropTable('tabel_struktur_organisasi');
	}
}
