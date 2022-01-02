<?php

namespace App\Models;

use CodeIgniter\Model;

class CobaModel extends Model
{
    protected $table      = 'timeline';
    // protected $useTimestamps = true;
    protected $allowedFields = ['ktgnoitem', 'noitem', 'uraian', 'harga', 'kuantitas', 'satuan', 'jmlharga', 'bobot', 'tglmulai', 'tglselesai'];

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
            return $this->findAll();
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

    public function getJmlharga()
    {
        return $this->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.ktgnoitem='') AS amount_paid", FALSE);
    }

    public function getTglmulai()
    {
        return $this->selectMin('tglmulai')->get()->getResult();
    }
    public function getTglselesai()
    {
        return $this->selectMax('tglselesai')->get()->getResult();
    }

    public function getHitunghari()
    {
        $tglawal = date($this->selectMin('tglmulai')->get()->getResult());
        $tglakhir = date($this->selectMax('tglselesai')->get()->getResult());
    }

    public function dateToWeek($qDate)
    {
        $dt = strtotime($qDate);
        $day  = date('j', $dt);
        $month = date('m', $dt);
        $year = date('Y', $dt);
        $totalDays = date('t', $dt);
        $weekCnt = 1;
        $retWeek = 0;
        for ($i = 1; $i <= $totalDays; $i++) {
            $curDay = date("N", mktime(0, 0, 0, $month, $i, $year));
            if ($curDay == 7) {
                if ($i == $day) {
                    $retWeek = $weekCnt + 1;
                }
                $weekCnt++;
            } else {
                if ($i == $day) {
                    $retWeek = $weekCnt;
                }
            }
        }
        return $retWeek;
    }
}
