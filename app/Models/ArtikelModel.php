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
        $query = $this->db->query("SELECT * FROM artikel");

        return $query->getResultArray();
    }
}
