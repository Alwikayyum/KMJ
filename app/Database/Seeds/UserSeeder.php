<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'username' => 'superadmin',
			'id_profil' => 1,
			'password' => password_hash('superadmin', PASSWORD_BCRYPT),
			'nama_user' => 'Raksasa Kecil',
			'telpon' => '082108210821',
			'aktif' => 'Yes',
			'foto' => 'noprofil.png',
			'created_at' => Time::now(),
		];
		$this->db->table('tabel_user')->insert($data);
	}
}
