<?php

namespace App\Models;

use CodeIgniter\Model;

class kategoriModel extends Model
{
    protected $table      = 'kategori';
    // protected $useTimestamps = true;
    protected $allowedFields = ['ktgnoitem', 'ktguraian', 'namaproyek'];

    public function getKategori($ktgnoitem = false)
    {
        if ($ktgnoitem == false) {
            return $this->groupBy('Ktgnoitem', 'asc')->findAll();
        }

        return $this->where(['ktgnoitem' => $ktgnoitem])->first();
    }
    public function getKategori2($ktguraian = false)
    {
        if ($ktguraian == false) {
            return $this->findAll();
        }

        return $this->where(['ktguraian' => $ktguraian])->first();
    }
    public function getKategori3($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
