<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Foto extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_foto' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'imggaleri' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id_foto', true);
		$this->forge->createTable('tabel_foto');
	}
	public function down()
	{
		$this->forge->dropTable('tabel_foto');
	}
}
