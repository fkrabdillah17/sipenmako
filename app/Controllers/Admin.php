<?php

namespace App\Controllers;

use App\Models\KecelakaanModel;
use App\Models\ProgresModel;
use App\Models\TimelineModel;
use App\Models\KategoriModel;
use App\Models\DatumModel;
use CodeIgniter\Database\Query;

class Admin extends BaseController
{
    protected $kecelakaanModel;
    protected $progresModel;
    protected $timelineModel;
    protected $kategoriModel;
    protected $datumModel;
    public function __construct()
    {
        $this->kecelakaanModel = new KecelakaanModel();
        $this->progresModel = new ProgresModel();
        $this->timelineModel = new TimelineModel();
        $this->kategoriModel = new KategoriModel();
        $this->datumModel = new DatumModel();
    }

    public function cetak()
    {
        $data = [
            'title' => 'Cetak Data',
            'laporan' => $this->request->getVar('laporan'),
            'tahun_laporan' => $this->request->getVar('tahun_laporan'),
            'kecelakaan' => $this->kecelakaanModel->getLaporankecelakaan(),
            'progres' => $this->progresModel->getDataprogres(),
            'timeline' => $this->timelineModel->getTimeline(),
            'timeline2' => $this->timelineModel->getTimeline(),
            'kategori' => $this->kategoriModel->getKategori(),
            'proyek' => $this->datumModel->getDatum()
        ];
        return view('pages/laporan/cetak', $data);
    }
    public function cetak2()
    {
        $dataproyek = $this->datumModel->getDatum2($this->request->getVar('laporan'));
        $tahun = date('Y', strtotime($dataproyek['tglmulai']));
        $pemilik = $dataproyek['namapemilik'];
        $data = [
            'dataproyek' => $dataproyek,
            'title' => 'Cetak Data',
            'tahun' => $tahun,
            'pemilik' => $pemilik,
            'laporan' => $this->request->getVar('laporan'),
            'kecelakaan' => $this->kecelakaanModel->getLaporankecelakaan(),
            'progres' => $this->progresModel->getDataprogres(),
            'timeline' => $this->timelineModel->getTimeline(),
            'timeline2' => $this->timelineModel->getTimeline(),
            'kategori' => $this->kategoriModel->getKategori(),
            'proyek' => $this->datumModel->getDatum()
        ];
        return view('pages/laporan/cetak2', $data);
    }

    //--------------------------------------------------------------------

}
