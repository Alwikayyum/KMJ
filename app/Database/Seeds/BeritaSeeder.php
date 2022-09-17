<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BeritaSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'judul' => 'Imunisasi Dan Campak',
			'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, quod voluptas recusandae tenetur similique incidunt eum non at dolore magni voluptatum rerum deleniti error doloribus earum fugiat, minima ad quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia fugit blanditiis ab ratione asperiores expedita beatae sint, magnam iusto rem, sit, facere nihil dolor eos illo hic enim dolores repudiandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam ad suscipit numquam ratione ex unde alias non, atque quidem officiis eos earum consectetur fuga facilis a labore excepturi culpa sint!',
			'penulis' => 'Tetti Wahyuni, A.Md.Keb',
			'sampul' => '',
			'created_at' => Time::now(),
		];
		$this->db->table('tabel_berita')->insert($data);
	}
}
