<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sambutan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_sambutan' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'sambutan' => [
				'type'       => 'TEXT',
			],
			'nama' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'jabatan' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'foto' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id_sambutan', true);
		$this->forge->createTable('tabel_sambutan');
	}

	public function down()
	{
		$this->forge->dropTable('tabel_sambutan');
	}
}
