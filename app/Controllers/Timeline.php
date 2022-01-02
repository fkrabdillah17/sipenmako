<?php

namespace App\Controllers;

use App\Models\TimelineModel;
use App\Models\KategoriModel;
use App\Models\DatumModel;

class Timeline extends BaseController
{
    protected $timelineModel;
    protected $kategoriModel;
    protected $datumModel;
    public function __construct()
    {
        $this->timelineModel = new TimelineModel();
        $this->kategoriModel = new KategoriModel();
        $this->datumModel = new DatumModel();
    }
    public function index()
    {
        $cari_proyek = $this->request->getVar('cari_proyek');
        $data = [
            'title' => 'Timeline Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->timelineModel->getTimeline(),
            'timeline2' => $this->timelineModel->getTimeline(),
            'proyek' => $this->datumModel->getDatum(),
            'cari_proyek' => $cari_proyek
        ];
        if ($cari_proyek != '') {
            return view('pages/dataproyek/timeline/index2', $data);
        } else {
            return view('pages/dataproyek/timeline/index', $data);
        }
    }

    public function kategori()
    {
        $data = [
            'title' => 'Kategori Timeline',
            'validation' => \Config\Services::validation(),
            'proyek' => $this->datumModel->getDatum()
        ];
        return view('pages/dataproyek/timeline/kategori', $data);
    }

    public function ksimpan()
    {
        //Validasi Input
        if (!$this->validate([
            'ktgnoitem' => [
                'rules' => 'required|is_unique[kategori.ktgnoitem]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'Kategori sudah ada'
                ]
            ],
            'ktguraian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'proyek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/timeline/kategori')->withInput();
        }

        $this->kategoriModel->save([
            'ktgnoitem' => $this->request->getVar('ktgnoitem'),
            'ktguraian' => $this->request->getVar('ktguraian'),
            'namaproyek' => $this->request->getVar('proyek')
        ]);
        // dd($this->request->getVar());

        session()->setFlashdata('pesan', 'Kategori berhasil di Tambah');

        return redirect()->to('/timeline');
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Timeline',
            'kategori' => $this->kategoriModel->getKategori(),
            'validation' => \Config\Services::validation(),
            'namaproyek' => $this->datumModel->getDatum()
        ];
        return view('pages/dataproyek/timeline/tambah', $data);
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
            'ktg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib pilih kategori'
                ]
            ],
            'noitem' => [
                'rules' => 'required|is_unique[timeline.noitem]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'No item sudah ada'
                ]
            ],
            'uraian' => [
                'rules' => 'required|is_unique[timeline.uraian]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'Uraian sudah ada'
                ]
            ],
            'harga' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'decimal' => 'Hanya berisi angka'
                ]
            ],
            'kuantitas' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'decimal' => 'Hanya berisi angka'
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'jmlharga' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'decimal' => 'Hanya berisi angka'
                ]
            ],
            'tglmulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'tglselesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/timeline/tambah')->withInput();
        }

        $this->timelineModel->save([
            'namaproyek' => $this->request->getVar('namaproyek'),
            'ktgnoitem' => $this->request->getVar('ktg'),
            'noitem' => $this->request->getVar('noitem'),
            'uraian' => $this->request->getVar('uraian'),
            'harga' => $this->request->getVar('harga'),
            'kuantitas' => $this->request->getVar('kuantitas'),
            'satuan' => $this->request->getVar('satuan'),
            'jmlharga' => $this->request->getVar('jmlharga'),
            'tglmulai' => $this->request->getVar('tglmulai'),
            'tglselesai' => $this->request->getVar('tglselesai')
        ]);
        // dd($this->request->getVar());

        session()->setFlashdata('pesan', 'Data berhasil di Tambah');

        return redirect()->to('/timeline');
    }

    public function kubah($ktgnoitem)
    {
        $data = [
            'title' => 'Form Ubah Kategori Timeline',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriModel->getKategori($ktgnoitem)

        ];

        return view('pages/dataproyek/timeline/ubahktg', $data);
    }

    public function kperbarui($ktgnoitem)
    {
        $id = $this->request->getVar('id');
        // Cek ktg nomor lama
        if ($ktgnoitem == $this->request->getVar('ktgnoitem')) {
            $rules2 = 'required';
        } else {
            $rules2 = 'required|is_unique[kategori.ktgnoitem]';
        }

        // Cek ktg uraian lama
        $ktguraianlama = $this->kategoriModel->getKategori3($this->request->getVar('id'));
        if ($ktguraianlama['ktguraian'] == $this->request->getVar('ktguraian')) {
            $rules3 = 'required';
        } else {
            $rules3 = 'required|is_unique[kategori.ktguraian]';
        }
        //Validasi Edit
        if (!$this->validate([
            'ktgnoitem' => [
                'rules' => $rules2,
                'errors' => [
                    'required' => 'Isi Kolom {field}',
                    'is_unique' => 'Kategori sudah ada'
                ]
            ],
            'ktguraian' => [
                'rules' => $rules3,
                'errors' => [
                    'required' => 'Isi Kolom {field}',
                    'is_unique' => 'Kategori sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/timeline/kategori/ubah/' . $ktgnoitem)->withInput();
        }
        $this->kategoriModel->save([
            'id' => $id,
            'ktgnoitem' => $this->request->getVar('ktgnoitem'),
            'ktguraian' => $this->request->getVar('ktguraian')
        ]);

        // $idtl = $this->timelineModel->getTimeline2($this->request->getVar('ktgnoitemLama'));
        // dd($idtl);
        $ktgbaru = $this->request->getVar('ktgnoitem');
        $this->timelineModel->whereIn('ktgnoitem', [$this->request->getVar('ktgnoitemLama')])
            ->set(['ktgnoitem' => $ktgbaru])
            ->update();

        session()->setFlashdata('pesan', 'Kategori berhasil di Ubah');

        return redirect()->to('/timeline');
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Form Ubah Data Timeline',
            'validation' => \Config\Services::validation(),
            'timeline' => $this->timelineModel->getTimeline($id),
            'kategori' => $this->kategoriModel->getKategori()
        ];

        return view('pages/dataproyek/timeline/ubah', $data);
    }

    public function perbarui($id)
    {
        // Cek no item lama
        $noitemLama = $this->timelineModel->getTimeline($this->request->getVar('id'));
        if ($noitemLama['noitem'] == $this->request->getVar('noitem')) {
            $rules2 = 'required';
        } else {
            $rules2 = 'required|is_unique[timeline.noitem]';
        }

        // Cek uraian lama
        $uraianLama = $this->timelineModel->getTimeline($this->request->getVar('id'));
        if ($uraianLama['uraian'] == $this->request->getVar('uraian')) {
            $rules3 = 'required';
        } else {
            $rules3 = 'required|is_unique[timeline.uraian]';
        }

        //Validasi Input
        if (!$this->validate([
            'ktg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib pilih kategori'
                ]
            ],
            'noitem' => [
                'rules' => $rules2,
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'No item sudah ada'
                ]
            ],
            'uraian' => [
                'rules' => $rules3,
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'Uraian sudah ada'
                ]
            ],
            'harga' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'decimal' => 'Hanya berisi angka'
                ]
            ],
            'kuantitas' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'decimal' => 'Hanya berisi angka'
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'jmlharga' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'decimal' => 'Hanya berisi angka'
                ]
            ],
            'tglmulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'tglselesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/timeline/ubah/' . $this->request->getVar('id'))->withInput();
        }

        $this->timelineModel->save([
            'id' => $id,
            'ktgnoitem' => $this->request->getVar('ktg'),
            'noitem' => $this->request->getVar('noitem'),
            'uraian' => $this->request->getVar('uraian'),
            'harga' => $this->request->getVar('harga'),
            'kuantitas' => $this->request->getVar('kuantitas'),
            'satuan' => $this->request->getVar('satuan'),
            'jmlharga' => $this->request->getVar('jmlharga'),
            'bobot' => $this->request->getVar('bobot'),
            'tglmulai' => $this->request->getVar('tglmulai'),
            'tglselesai' => $this->request->getVar('tglselesai')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Ubah');

        return redirect()->to('/timeline');
    }

    public function hapus($id)
    {
        $this->timelineModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        return redirect()->to('/timeline');
    }

    public function khapus($ktgnoitem)
    {
        $this->kategoriModel->whereIn('ktgnoitem', [$ktgnoitem])
            ->delete();
        $this->timelineModel->whereIn('ktgnoitem', [$ktgnoitem])
            ->delete();
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        return redirect()->to('/timeline');
    }

    public function lempar($id)
    {
        if (empty($data['timeline'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak Ada');
        }
    }

    public function grafik()
    {
        $data = [
            'title' => 'Grafik Timeline Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->timelineModel->getTimeline(),
            'timeline2' => $this->timelineModel->getTimeline(),
            'namaproyek' => $this->datumModel->getDatum()
        ];
        return view('pages/dataproyek/timeline/grafik', $data);
    }

    public function grafik2($cari_proyek)
    {
        $data = [
            'title' => 'Grafik Timeline Proyek',
            'kategori' => $this->kategoriModel->getKategori(),
            'timeline' => $this->timelineModel->getTimeline(),
            'timeline2' => $this->timelineModel->getTimeline(),
            'namaproyek' => $this->datumModel->getDatum(),
            'cari_proyek' => $cari_proyek
        ];
        return view('pages/dataproyek/timeline/grafik2', $data);
    }
    //--------------------------------------------------------------------

}
