<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
	protected $table                = 'tabel_video';
	protected $primaryKey           = 'id_video';
	protected $returnType           = 'object';
	protected $allowedFields        = ['judul', 'video'];

	public function getAll()
	{
		return $this->orderBy('id_video', 'DESC')->findAll();
	}
}
