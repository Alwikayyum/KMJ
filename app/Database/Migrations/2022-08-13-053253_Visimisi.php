<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Visimisi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_visimisi' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'visi' => [
				'type'       => 'TEXT',
			],
			'misi' => [
				'type'       => 'TEXT',
			],
		]);
		$this->forge->addKey('id_visimisi', true);
		$this->forge->createTable('tabel_visimisi');
	}

	public function down()
	{
		$this->forge->dropTable('tabel_visimisi');
	}
}
