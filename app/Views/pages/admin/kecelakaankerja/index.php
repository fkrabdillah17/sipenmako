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
                <p class="mb-4"><a href="/tambah/tkecelakaan" type="button" class="btn btn-primary">Tambah Data</a></p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Kecelakaan Kerja</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Tgl</th>
                                        <th scope="col">Insiden</th>
                                        <th scope="col">Penyebab</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Foto</th>
                                        <th width="170" scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($datakecelakaan as $data) : ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $data['tgl']; ?></td>
                                            <td><?= $data['insiden']; ?></td>
                                            <td><?= $data['penyebab']; ?></td>
                                            <td><?= $data['keterangan']; ?></td>
                                            <td><img src="/img/<?= $data['foto']; ?>" class="foto" alt=""></td>
                                            <td>
                                                <a href="/kecelakaan-kerja/<?= $data['id']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                <a href="/hapusakun" type="button" class="btn btn-outline-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- /.container-fluid -->
            </div>

            <!-- End of Main Content -->
        </div>

        <!-- End of Content Wrapper -->
        <?= $this->include('layout/footer'); ?>

    </div>
    <!-- End of Page Wrapper -->

    <?= $this->endSection(); ?>