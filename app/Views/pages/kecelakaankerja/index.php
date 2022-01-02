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
                    <h1 class="h3 mb-0 text-gray-800">Data Kecelakaan Kerja</h1>
                </div>

                <div class="form-row">
                    <div class="form-group p-3">
                        <a href="/kecelakaan/tambah" type="button" class="btn btn-primary ">Tambah Data</a>
                    </div>
                    <?php if (session()->get('role_id') == 1) { ?>
                        <form action="/kecelakaan/index" method="post">
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

                <!-- DataTales Example -->
                <?php if (session()->get('role_id') == 1) { ?>
                    <?php foreach ($namaproyek as $p) : ?>
                        <?php if ($p['namaproyek'] == $cari_proyek) : ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kecelakaan Kerja <?= $p['namaproyek']; ?></h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Tgl</th>
                                                    <th scope="col">Insiden</th>
                                                    <th scope="col">Penyebab</th>
                                                    <th scope="col">Foto</th>
                                                    <th width="200" scope="col" class="Aksi">Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($datakecelakaan as $data) : ?>
                                                    <?php if ($p['namaproyek'] == $data['namaproyek']) { ?>
                                                        <tr>
                                                            <th class="text-center" scope="row"><?= $data['tgl']; ?></td>
                                                            <td><?= $data['insiden']; ?></td>
                                                            <td><?= $data['penyebab']; ?></td>
                                                            <td><img src="/img/<?= $data['foto']; ?>" class="foto" alt=""></td>
                                                            <td class="Aksi">
                                                                <a href="/kecelakaan/<?= $data['id']; ?>" class="btn btn-outline-success">Detail</a>
                                                                <a href="/kecelakaan/ubah/<?= $data['id']; ?>" class="btn btn-outline-warning">Ubah</a>

                                                                <form action="/kecelakaan/<?= $data['id']; ?>" method="post" class="d-inline">
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
                        <?php endif ?>
                    <?php endforeach; ?>

                <?php } else { ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kecelakaan Kerja <?= session()->get('proyek'); ?></h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Tgl</th>
                                            <th scope="col">Insiden</th>
                                            <th scope="col">Penyebab</th>
                                            <th scope="col">Foto</th>
                                            <th width="200" scope="col" class="Aksi">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($datakecelakaan as $data) : ?>
                                            <?php if (session()->get('proyek') == $data['namaproyek']) { ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $data['tgl']; ?></td>
                                                    <td><?= $data['insiden']; ?></td>
                                                    <td><?= $data['penyebab']; ?></td>
                                                    <td><img src="/img/<?= $data['foto']; ?>" class="foto" alt=""></td>
                                                    <td class="Aksi">
                                                        <a href="/kecelakaan/<?= $data['id']; ?>" class="btn btn-outline-success">Detail</a>
                                                        <a href="/kecelakaan/ubah/<?= $data['id']; ?>" class="btn btn-outline-warning">Ubah</a>

                                                        <form action="/kecelakaan/<?= $data['id']; ?>" method="post" class="d-inline">
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