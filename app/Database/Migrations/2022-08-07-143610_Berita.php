<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_berita' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'isi' => [
				'type'       => 'TEXT',
			],
			'sampul' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'penulis' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_berita', true);
		$this->forge->createTable('tabel_berita');
	}

	public function down()
	{
		$this->forge->dropTable('tabel_berita');
	}
}
