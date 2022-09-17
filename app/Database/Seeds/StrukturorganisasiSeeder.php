<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StrukturorganisasiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'judul' => 'Struktur Organisasi 2022',
			'gambar' => '',
		];
		$this->db->table('tabel_struktur_organisasi')->insert($data);
	}
}
