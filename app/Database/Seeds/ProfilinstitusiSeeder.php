<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfilinstitusiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'profil_institusi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eos repellendus voluptates unde. Corporis, labore!
			Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, quod voluptas recusandae tenetur similique incidunt eum non at dolore magni voluptatum rerum deleniti error doloribus earum fugiat, minima ad quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia fugit blanditiis ab ratione asperiores expedita beatae sint, magnam iusto rem, sit, facere nihil dolor eos illo hic enim dolores repudiandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam ad suscipit numquam ratione ex unde alias non, atque quidem officiis eos earum consectetur fuga facilis a labore excepturi culpa sint!
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, quisquam.',
		];
		$this->db->table('tabel_profil_institusi')->insert($data);
	}
}
