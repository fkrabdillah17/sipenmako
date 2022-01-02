<?php

namespace App\Controllers;

use App\Models\CobaModel;
use App\Models\KategoriModel;

class Coba extends BaseController
{
    protected $cobaModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->cobaModel = new CobaModel();
        $this->kategoriModel = new KategoriModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Timeline Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->cobaModel->getTimeline(),
            'timeline2' => $this->cobaModel->getTimeline()
        ];
        return view('pages/dataproyek/timeline/cobaindex', $data);
    }

    public function grafik()
    {
        $data = [
            'title' => 'Grafik Timeline Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->cobaModel->getTimeline(),
            'timeline2' => $this->cobaModel->getTimeline(),
            'tglmulai' => $this->cobaModel->getTglmulai()
        ];
        return view('pages/dataproyek/timeline/cobagrafik', $data);
    }
    public function grafik2()
    {
        $data = [
            'title' => 'Grafik Timeline Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->cobaModel->getTimeline(),
            'timeline2' => $this->cobaModel->getTimeline(),
            'tglmulai' => $this->cobaModel->getTglmulai(),
            'tglselesai' => $this->cobaModel->getTglselesai(),
            // 'jmlhari' => $this->cobaModel->getHitunghari()
        ];
        return view('pages/dataproyek/timeline/cobagrafik2', $data);
    }

    public function hitung()
    {
        $data = [
            'title' => 'Timeline Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->cobaModel->getTimeline(),
            'timeline2' => $this->cobaModel->getTimeline()
        ];
        return view('pages/dataproyek/timeline/cobahitung', $data);
    }

    public function tglmulai()
    {
    }

    //--------------------------------------------------------------------

}
