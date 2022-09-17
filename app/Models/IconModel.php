<?php

namespace App\Models;

use CodeIgniter\Model;

class IconModel extends Model
{
	protected $table                = 'tabel_icon';
	protected $primaryKey           = 'id_icon';
	protected $returnType           = 'object';
	protected $allowedFields        = ['icon'];

	public function getAll()
	{
		return $this->orderBy('id_icon', 'DESC')->findAll();
	}
}
