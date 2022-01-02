<?php

namespace App\Controllers;

use App\Models\DatumModel;

class Datum extends BaseController
{
    protected $datumModel;
    public function __construct()
    {
        $this->datumModel = new DatumModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Umum',
            'datum' => $this->datumModel->getDatum()
        ];
        return view('pages/dataproyek/datum/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Umum',
            'validation' => \Config\Services::validation()

        ];

        return view('pages/dataproyek/datum/tambah', $data);
    }

    public function simpan()
    {

        //Validasi Input
        if (!$this->validate([
            'namaproyek' => [
                'rules' => 'required|is_unique[datum.namaproyek]',
                'errors' => [
                    'required' => 'Kolom  Harus diisi',
                    'is_unique' => 'Proyek Sudah Ada'
                ]
            ],
        ])) {
            return redirect()->to('/datum/tambah')->withInput();
        }

        $this->datumModel->save([
            'namapemilik' => $this->request->getVar('namapemilik'),
            'namaproyek' => $this->request->getVar('namaproyek'),
            'lokasiproyek' => $this->request->getVar('lokasiproyek'),
            'ruasjalan' => $this->request->getVar('ruasjalan'),
            'sumberdana' => $this->request->getVar('sumberdana'),
            'nokontrak' => $this->request->getVar('nokontrak'),
            'tglmulai' => $this->request->getVar('tglmulai'),
            'tglselesai' => $this->request->getVar('tglselesai')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Tambah');

        return redirect()->to('/datum');
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Ubah Data Kecelakaan Kerja',
            'datum' => $this->datumModel->getDatum($id)
        ];

        if (empty($data['datum'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak Ada');
        }

        return view('pages/dataproyek/datum/detail', $data);
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Form Ubah Data Umum',
            'validation' => \Config\Services::validation(),
            'datum' => $this->datumModel->getDatum($id)

        ];

        return view('pages/dataproyek/datum/ubah', $data);
    }

    public function perbarui($id)
    {

        //Validasi Input
        if (!$this->validate([
            'namaproyek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/datum/ubah/' . $this->request->getVar('id'))->withInput();
        }

        $this->datumModel->save([
            'id' => $id,
            'namapemilik' => $this->request->getVar('namapemilik'),
            'namaproyek' => $this->request->getVar('namaproyek'),
            'lokasiproyek' => $this->request->getVar('lokasiproyek'),
            'ruasjalan' => $this->request->getVar('ruasjalan'),
            'sumberdana' => $this->request->getVar('sumberdana'),
            'nokontrak' => $this->request->getVar('nokontrak'),
            'tglmulai' => $this->request->getVar('tglmulai'),
            'tglselesai' => $this->request->getVar('tglselesai')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Ubah');

        return redirect()->to('/datum');
    }

    public function hapus($id)
    {
        $this->datumModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        return redirect()->to('/datum');
    }

    //--------------------------------------------------------------------

}
