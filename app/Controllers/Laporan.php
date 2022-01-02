<?php

namespace App\Controllers;

use App\Models\DatumModel;

class Laporan extends BaseController
{
    protected $datumModel;
    public function __construct()
    {
        $this->datumModel = new DatumModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Laporan Tahunan',
            'datum' => $this->datumModel->getDatum()
        ];
        return view('pages/laporan/index', $data);
    }
    public function index2()
    {
        $data = [
            'title' => 'Laporan Proyek',
            'datum' => $this->datumModel->getDatum()
        ];
        return view('pages/laporan/index2', $data);
    }

    //--------------------------------------------------------------------

}
