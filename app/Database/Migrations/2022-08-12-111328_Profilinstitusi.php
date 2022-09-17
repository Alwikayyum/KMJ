<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profilinstitusi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_profil_institusi' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'profil_institusi' => [
				'type'       => 'TEXT',
			],
		]);
		$this->forge->addKey('id_profil_institusi', true);
		$this->forge->createTable('tabel_profil_institusi');
	}

	public function down()
	{
		$this->forge->dropTable('tabel_profil_institusi');
	}
}
