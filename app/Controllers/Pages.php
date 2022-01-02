<?php

namespace App\Controllers;

use App\Models\DatumModel;

class Pages extends BaseController
{
    protected $datumModel;
    public function __construct()
    {
        $this->datumModel = new DatumModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'datum' => $this->datumModel->getDatum()
        ];
        return view('pages/index', $data);
    }

    //--------------------------------------------------------------------

}
