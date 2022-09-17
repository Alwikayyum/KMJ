<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VideoSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'judul' => 'Video 1',
			'video' => '',
		];
		$this->db->table('tabel_video')->insert($data);
	}
}
