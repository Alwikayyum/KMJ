<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FotoSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'judul' => 'Gambar 1',
			'imggaleri' => '',
		];
		$this->db->table('tabel_foto')->insert($data);
	}
}
