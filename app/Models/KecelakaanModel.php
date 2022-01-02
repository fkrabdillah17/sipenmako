<?php

namespace App\Models;

use CodeIgniter\Model;

class KecelakaanModel extends Model
{
    protected $table      = 'kecelakaankerja';
    protected $useTimestamps = true;
    protected $allowedFields = ['insiden', 'tgl', 'penyebab', 'keterangan', 'kronologi', 'foto', 'namaproyek'];

    public function getDatakecelakaan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getLaporankecelakaan($id = false)
    {
        if ($id == false) {
            return $this->orderBy('namaproyek', 'asc')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
