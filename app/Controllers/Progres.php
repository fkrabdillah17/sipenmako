<?php

namespace App\Controllers;

use App\Models\ProgresModel;
use App\Models\TimelineModel;
use App\Models\KategoriModel;
use App\Models\DatumModel;

class Progres extends BaseController
{
    protected $progresModel;
    protected $timelineModel;
    protected $kategoriModel;
    protected $datumModel;
    public function __construct()
    {
        $this->progresModel = new ProgresModel();
        $this->timelineModel = new TimelineModel();
        $this->kategoriModel = new KategoriModel();
        $this->datumModel = new DatumModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Progres Proyek',
            'progres' => $this->progresModel->getDataprogres(),
            'namaproyek' => $this->datumModel->getDatum(),
            'proyek' => $this->request->getVar('cari_proyek')
        ];
        return view('pages/dataproyek/progres/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Progres Proyek',
            'validation' => \Config\Services::validation(),
            'timeline' => $this->timelineModel->getTimeline2(),
            'namaproyek' => $this->datumModel->getDatum()
        ];
        return view('pages/dataproyek/progres/tambah', $data);
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
            'tglmulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'noitem' => [
                'rules' => 'required|is_unique[progres.noitem]',
                'errors' => [
                    'required' => 'Pilih progres item',
                    'is_unique' => 'Progres Sudah ada'
                ]
            ],
            'tglselesai' => [
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
            return redirect()->to('/progres/tambah')->withInput();
        }
        // Isi data keterangan
        $noitem = $this->request->getVar('noitem');
        $ket = $this->timelineModel->getUraian($noitem);
        // dd($ket['uraian']);

        //Ambil Foto
        $fileFoto = $this->request->getFile('foto');
        //Pindahkan File ke Folder img di public
        $fileFoto->move('img');
        //Ambil nama file
        $namaFoto = $fileFoto->getName();

        // dd($this->request->getVar());

        $this->progresModel->save([
            'namaproyek' => $this->request->getVar('namaproyek'),
            'tglmulai' => $this->request->getVar('tglmulai'),
            'noitem' => $this->request->getVar('noitem'),
            'keterangan' => $ket['uraian'],
            'tglselesai' => $this->request->getVar('tglselesai'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Tambah');

        return redirect()->to('/progres');
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Form Ubah Data Kecelakaan Kerja',
            'validation' => \Config\Services::validation(),
            'progres' => $this->progresModel->getDataprogres($id),
            'timeline' => $this->timelineModel->getTimeline2()

        ];

        return view('pages/dataproyek/progres/ubah', $data);
    }

    public function perbarui($id)
    {
        $noitemLama = $this->progresModel->getDataprogres($this->request->getVar('id'));
        if ($noitemLama['noitem'] == $this->request->getVar('noitem')) {
            $rulesitem = 'required';
        } else {
            $rulesitem = 'required|is_uniqiue[progres.noitem]';
        }
        //Validasi Input
        if (!$this->validate([
            'tglmulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} Harus diisi'
                ]
            ],
            'noitem' => [
                'rules' => $rulesitem,
                'errors' => [
                    'required' => 'Pilih progres item'
                ]
            ],
            'tglselesai' => [
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
            return redirect()->to('/progres/ubah/' . $this->request->getVar('id'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        // Isi data keterangan
        $noitem = $this->request->getVar('noitem');
        $ket = $this->timelineModel->getUraian($noitem);

        // dd($ket);

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

        $this->progresModel->save([
            'id' => $id,
            'tglmulai' => $this->request->getVar('tglmulai'),
            'noitem' => $this->request->getVar('noitem'),
            'keterangan' => $ket['uraian'],
            'tglselesai' => $this->request->getVar('tglselesai'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Ubah');

        return redirect()->to('/progres');
    }

    public function hapus($id)
    {
        //Cari foto berdasarkan id
        $foto = $this->progresModel->find($id);
        // dd($foto);
        //Hapus File
        unlink('img/' . $foto['foto']);

        $this->progresModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        return redirect()->to('/progres');
    }

    public function grafik($proyek)
    {
        $data = [
            'title' => 'Grafik Progres Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->timelineModel->getTimeline(),
            'timeline2' => $this->timelineModel->getTimeline(),
            'progres' => $this->progresModel->getDataprogres(),
            'namaproyek' => $this->datumModel->getDatum(),
            'proyek' => $proyek
        ];
        return view('pages/dataproyek/progres/grafik', $data);
    }

    //--------------------------------------------------------------------

}
