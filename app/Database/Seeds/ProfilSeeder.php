<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfilSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'profil' => 'Superadmin',
		];
		$this->db->table('tabel_profil')->insert($data);
	}
}
