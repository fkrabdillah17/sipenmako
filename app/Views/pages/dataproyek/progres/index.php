<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Page Wrapper -->
<div id="wrapper">

    <?= $this->include('layout/sidebar'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?= $this->include('layout/topbar'); ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Progress Proyek</h1>
                </div>

                <div class="form-row">
                    <div class="form-group p-3">
                        <a href="/progres/tambah" type="button" class="btn btn-primary ">Tambah Data</a>
                    </div>
                    <?php if (session()->get('role_id') == 1) { ?>
                        <form action="/progres/index" method="post">
                            <div class="input-group p-3">
                                <select class="custom-select" id="cari_proyek" aria-label="Example select with button addon" name="cari_proyek">
                                    <option value="<?= old('namaproyek'); ?>"><?= (old('namaproyek')) ? old('namaproyek') : '--Pilih Proyek--' ?></option>
                                    <?php foreach ($namaproyek as $p) : ?>
                                        <option value="<?= $p['namaproyek']; ?>"><?= $p['namaproyek']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Tampil</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>

                <!-- Tabel -->
                <?php if (session()->get('role_id') == 1) { ?>
                    <?php foreach ($namaproyek as $p) : ?>
                        <?php if ($p['namaproyek'] == $proyek) : ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Progress Proyek <?= $p['namaproyek']; ?></h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="100" scope="col">No. Item Mata Pembayaran</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th width="80" scope="col">Tgl mulai</th>
                                                    <th width="80" scope="col">Tgl selesai</th>
                                                    <th width="80" scope="col" class="Foto">Foto</th>
                                                    <th width="170" scope="col" class="Aksi">Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($progres as $data) : ?>
                                                    <?php if ($p['namaproyek'] == $data['namaproyek']) { ?>
                                                        <tr>
                                                            <td><?= $data['noitem']; ?></td>
                                                            <td><?= $data['keterangan']; ?></td>
                                                            <td><?= $data['tglmulai']; ?></td>
                                                            <td><?= $data['tglselesai']; ?></td>
                                                            <td class="Foto"><a href="/img/<?= $data['foto']; ?>" target="_blank" rel="nofollow"><?= $data['foto']; ?></a></td>
                                                            <td class="Aksi">
                                                                <a href="/progres/ubah/<?= $data['id']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                                <form action="/progres/<?= $data['id']; ?>" method="post" class="d-inline">
                                                                    <?= csrf_field(); ?>
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ?');">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="card text-center">
                                <div class="card-footer">
                                    <a href="/progres/grafik/<?= $proyek; ?>" type="button" class="btn btn-primary">Lihat Grafik</a>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Progress Proyek <?= session()->get('proyek'); ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="100" scope="col">No. Item Mata Pembayaran</th>
                                            <th scope="col">Keterangan</th>
                                            <th width="80" scope="col">Tgl mulai</th>
                                            <th width="80" scope="col">Tgl selesai</th>
                                            <th width="80" scope="col" class="Foto">Foto</th>
                                            <th width="170" scope="col" class="Aksi">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($progres as $data) : ?>
                                            <?php if (session()->get('proyek') == $data['namaproyek']) { ?>
                                                <tr>
                                                    <td><?= $data['noitem']; ?></td>
                                                    <td><?= $data['keterangan']; ?></td>
                                                    <td><?= $data['tglmulai']; ?></td>
                                                    <td><?= $data['tglselesai']; ?></td>
                                                    <td class="Foto"><a href="/img/<?= $data['foto']; ?>" target="_blank" rel="nofollow"><?= $data['foto']; ?></a></td>
                                                    <td class="Aksi">
                                                        <a href="/progres/ubah/<?= $data['id']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                        <form action="/progres/<?= $data['id']; ?>" method="post" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ?');">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card text-center">
                        <div class="card-footer">
                            <a href="/progres/grafik/<?= session()->get('proyek'); ?>" type="button" class="btn btn-primary">Lihat Grafik</a>
                        </div>
                    </div>
                <?php } ?>

                <!-- /.container-fluid -->
            </div>

            <!-- End of Main Content -->
        </div>

        <!-- End of Content Wrapper -->
        <?= $this->include('layout/footer'); ?>

    </div>
    <!-- End of Page Wrapper -->

    <?= $this->endSection(); ?>