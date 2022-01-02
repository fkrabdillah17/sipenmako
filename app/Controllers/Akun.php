<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\DatumModel;

class Akun extends BaseController
{
    protected $akunModel;
    protected $datumModel;
    public function __construct()
    {
        $this->akunModel = new AkunModel();
        $this->datumModel = new DatumModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Akun',
            'akun' => $this->akunModel->getAkun()
        ];
        return view('pages/akun/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Akun',
            'validation' => \Config\Services::validation(),
            'proyek' => $this->datumModel->getDatum()
        ];
        return view('pages/akun/tambah', $data);
    }
    public function simpan()
    {
        //Validasi Input
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi',
                    'min_length' => 'Kata sandi minimal 8 karakter'
                ]
            ],
            'confpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Kolom Harus diisi',
                    'matches' => 'Kata sandi tidak sama'
                ]
            ],
            'role_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'proyek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/akun/tambah')->withInput();
        }

        $this->akunModel->save([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role_id' => $this->request->getVar('role_id'),
            'proyek' => $this->request->getVar('proyek')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Tambah');

        return redirect()->to('/akun');
    }

    //--------------------------------------------------------------------

}
