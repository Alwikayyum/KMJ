<?php

namespace App\Models;

use CodeIgniter\Model;

class SambutanModel extends Model
{
	protected $table                = 'tabel_sambutan';
	protected $primaryKey           = 'id_sambutan';
	protected $returnType           = 'object';
	protected $allowedFields        = ['sambutan', 'nama', 'jabatan', 'foto'];

	public function getWhereFirst($where)
	{
		return $this->where($where)->first();
	}
}
