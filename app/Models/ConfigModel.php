<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
	protected $table                = 'tabel_config';
	protected $primaryKey           = 'id_config';
	protected $returnType           = 'object';
	protected $allowedFields        = ['brand', 'copyright', 'login_title', 'sidebar', 'navbar', 'brandlogo', 'brandcolor', 'keywords', 'description', 'author', 'logo', 'background'];

	public function getWhereFirst($where)
	{
		return $this->where($where)->first();
	}
}
