<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LayananSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'judul' => 'Imunisasi Dan Campak',
			'layanan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, quod voluptas recusandae tenetur similique incidunt eum non at dolore magni voluptatum rerum deleniti error doloribus earum fugiat, sint!',
			'icon' => 'fas fa-user-nurse',
		];
		$this->db->table('tabel_layanan')->insert($data);
	}
}
