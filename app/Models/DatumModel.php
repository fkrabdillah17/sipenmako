<?php

namespace App\Models;

use CodeIgniter\Model;

class DatumModel extends Model
{
    protected $table      = 'datum';
    protected $useTimestamps = true;
    protected $allowedFields = ['namaproyek', 'namapemilik', 'lokasiproyek', 'ruasjalan', 'sumberdana', 'nokontrak', 'tglmulai', 'tglselesai'];

    public function getDatum($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function getDatum2($namaproyek = false)
    {
        if ($namaproyek == false) {
            return $this->findAll();
        }

        return $this->where(['namaproyek' => $namaproyek])->first();
    }
}
