<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $tabel = 'artikel';
    // protected $primaryKey = 'id_artikel';
    // protected $returnType = 'object';
    protected $useTimestamps = true;

    public function getData()
    {
        $query = $this->db->query("SELECT * FROM artikel ORDER BY id DESC");

        return $query->getResultArray();
    }

    public function getArtikel($slug = false)
    {
        if ($slug == false) {
            return $this->getData();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getWhere($where)
    {
        return $this->where($where)->first();
    }
}
