<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_layanan' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'layanan' => [
				'type'       => 'TEXT',
			],
			'icon' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id_layanan', true);
		$this->forge->createTable('tabel_layanan');
	}

	public function down()
	{
		$this->forge->dropTable('tabel_layanan');
	}
}
