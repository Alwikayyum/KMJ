<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Video extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_video' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'video' => [
				'type'       => 'VARCHAR',
				'constraint' => '225',
			],
		]);
		$this->forge->addKey('id_video', true);
		$this->forge->createTable('tabel_video');
	}

	public function down()
	{
		$this->forge->dropTable('tabel_video');
	}
}
