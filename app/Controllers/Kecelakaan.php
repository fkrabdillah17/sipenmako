<?php

namespace App\Controllers;

use App\Models\KecelakaanModel;
use App\Models\DatumModel;

class Kecelakaan extends BaseController
{
    protected $kecelakaanModel;
    protected $datumModel;
    public function __construct()
    {
        $this->kecelakaanModel = new KecelakaanModel();
        $this->datumModel = new DatumModel();
    }

    public function index()
    {
        $cari_proyek = $this->request->getVar('cari_proyek');
        $data = [
            'title' => 'Kecelakaan Kerja',
            'datakecelakaan' => $this->kecelakaanModel->getDatakecelakaan(),
            'namaproyek' => $this->datumModel->getDatum(),
            'cari_proyek' => $cari_proyek
        ];
        return view('pages/kecelakaankerja/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Kecelakaan Kerja',
            'validation' => \Config\Services::validation(),
            'namaproyek' => $this->datumModel->getDatum()
        ];

        return view('pages/kecelakaankerja/tambah', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Ubah Data Kecelakaan Kerja',
            'datakecelakaan' => $this->kecelakaanModel->getDatakecelakaan($id)
        ];

        if (empty($data['datakecelakaan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak Ada');
        }

        return view('pages/kecelakaankerja/detail', $data);
    }

    public function hapus($id)
    {
        //Cari foto berdasarkan id
        $foto = $this->kecelakaanModel->find($id);
        //Hapus File
        unlink('img/' . $foto['foto']);

        $this->kecelakaanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        return redirect()->to('/kecelakaan');
    }

    public function simpan()
    {
        //Validasi Input
        if (!$this->validate([
            'namaproyek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib pilih proyek'
                ]
            ],
            'insiden' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'tgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'penyebab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'kronologi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Wajib menyertakan foto',
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Pilih file foto jpg/jpeg/png',
                    'mime_in' => 'Pilih file foto jpg/jpeg/png'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/kecelakaan/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/kecelakaan/tambah')->withInput();
        }

        // if (!$this->validate([
        //     'insiden' => [
        //         'rules' => 'required|is_unique[kecelakaankerja.insiden]',
        //         'errors' => [
        //             'required' => 'Kolom {field} Harus diisi',
        //             'is_unique' => '{field} sudah ada'
        //         ]
        //     ]
        // ])) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/kecelakaan/tambah')->withInput()->with('validation', $validation);
        // }

        //Ambil Foto
        $fileFoto = $this->request->getFile('foto');
        //Pindahkan File ke Folder img di public
        $fileFoto->move('img');
        //Ambil nama file
        $namaFoto = $fileFoto->getName();

        $this->kecelakaanModel->save([
            'namaproyek' => $this->request->getVar('namaproyek'),
            'insiden' => $this->request->getVar('insiden'),
            'tgl' => $this->request->getVar('tgl'),
            'penyebab' => $this->request->getVar('penyebab'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kronologi' => $this->request->getVar('kronologi'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Tambah');

        return redirect()->to('/kecelakaan');

        // dd($this->request->getVar()); 
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Form Ubah Data Kecelakaan Kerja',
            'validation' => \Config\Services::validation(),
            'datakecelakaan' => $this->kecelakaanModel->getDatakecelakaan($id)

        ];

        return view('pages/kecelakaankerja/ubah', $data);
    }

    public function perbarui($id)
    {

        //Validasi Input
        if (!$this->validate([
            'insiden' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Pilih file foto jpg/jpeg/png',
                    'mime_in' => 'Pilih file foto jpg/jpeg/png'
                ]
            ]
        ])) {
            return redirect()->to('/kecelakaan/ubah/' . $this->request->getVar('id'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        //Cek Foto
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            //Nama Foto
            $namaFoto = $fileFoto->getName();
            //Pindahkan FIle
            $fileFoto->move('img', $namaFoto);
            //Hapus file lama
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $this->kecelakaanModel->save([
            'id' => $id,
            'insiden' => $this->request->getVar('insiden'),
            'tgl' => $this->request->getVar('tgl'),
            'penyebab' => $this->request->getVar('penyebab'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kronologi' => $this->request->getVar('kronologi'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Ubah');

        return redirect()->to('/kecelakaan');
    }
}
