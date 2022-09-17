<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_profil' => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
			],
			'username' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'nama_user' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'telpon' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'aktif' => [
				'type'       => 'VARCHAR',
				'constraint' => '5',
			],
			'foto' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_user', true);
		$this->forge->addForeignKey('id_profil', 'tabel_profil', 'id_profil');
		$this->forge->createTable('tabel_user');
	}

	public function down()
	{
		$this->forge->dropForeignKey('tabel_user', 'tabel_user_id_profil_foreign');
		$this->forge->dropTable('tabel_user');
	}
}
