<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilinstitusiModel extends Model
{
	protected $table                = 'tabel_profil_institusi';
	protected $primaryKey           = 'id_profil_institusi';
	protected $returnType           = 'object';
	protected $allowedFields        = ['profil_institusi'];

	public function getWhereFirst($where)
	{
		return $this->where($where)->first();
	}
}
