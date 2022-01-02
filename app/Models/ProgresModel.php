<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgresModel extends Model
{
    protected $table      = 'progres';
    protected $allowedFields = ['noitem', 'tglmulai', 'tglselesai', 'keterangan',  'foto', 'namaproyek'];

    public function getDataprogres($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
