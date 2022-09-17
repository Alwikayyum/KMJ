<?php

namespace App\Models;

use CodeIgniter\Model;

class NavigasiModel extends Model
{
	protected $table                = 'tabel_navigasi';
	protected $primaryKey           = 'id_navigasi';
	protected $returnType           = 'object';
	protected $allowedFields        = ['navigasi', 'heading', 'url', 'icon', 'dropdown', 'urutan', 'aktif'];

	public function getAll()
	{
		return $this->orderBy('id_navigasi', 'DESC')->findAll();
	}
}
