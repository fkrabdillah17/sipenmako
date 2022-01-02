<?php

namespace App\Models;

use CodeIgniter\Model;

class TimelineModel extends Model
{
    protected $table      = 'timeline';
    // protected $useTimestamps = true;
    protected $allowedFields = ['ktgnoitem', 'noitem', 'uraian', 'harga', 'kuantitas', 'satuan', 'jmlharga', 'bobot', 'tglmulai', 'tglselesai', 'namaproyek'];

    public function getTimeline($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getTimeline2($ktgnoitem = false)
    {
        if ($ktgnoitem == false) {
            return $this->groupBy('noitem', 'asc')->findAll();
        }

        return $this->where(['ktgnoitem' => $ktgnoitem])->findAll();
    }

    public function getUraian($noitem = false)
    {
        if ($noitem == false) {
            return $this->findAll();
        }

        return $this->where(['noitem' => $noitem])->First('uraian');
    }
}
