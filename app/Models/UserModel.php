<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'tabel_user';
	protected $primaryKey           = 'id_user';
	protected $returnType           = 'object';
	protected $useTimestamps 		= true;
	protected $allowedFields        = ['id_profil', 'username', 'password', 'nama_user', 'telpon', 'aktif', 'foto'];

	public function getAll()
	{
		return $this->join('tabel_profil', 'tabel_profil.id_profil = tabel_user.id_profil')->orderBy('id_user', 'DESC')->findAll();
	}

	public function getWhereAll($where)
	{
		return $this->join('tabel_profil', 'tabel_profil.id_profil = tabel_user.id_profil')->where($where)->orderBy('id_user', 'DESC')->findAll();
	}

	public function getWhereFirst($where)
	{
		return $this->join('tabel_profil', 'tabel_profil.id_profil = tabel_user.id_profil')->where($where)->first();
	}
}
