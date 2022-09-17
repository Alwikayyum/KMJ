<?php

namespace App\Models;

use CodeIgniter\Model;

class VisimisiModel extends Model
{
	protected $table                = 'tabel_visimisi';
	protected $primaryKey           = 'id_visimisi';
	protected $returnType           = 'object';
	protected $allowedFields        = ['visi', 'misi'];

	public function getAll()
	{
		return $this->findAll();
	}

	public function getWhereFirst($where)
	{
		return $this->where($where)->first();
	}
}
