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
                    <h1 class="h3 mb-0 text-gray-800">Data Umum Proyek</h1>
                </div>
                <p class="mb-4"><a href="/datum/tambah" type="button" class="btn btn-primary">Tambah Data</a></p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Umum Proyek</h6>
                    </div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="100" scope="col" class="text-center">No</th>
                                        <th scope="col">Nama Proyek</th>
                                        <th width="200" scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($datum as $data) : ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $i++; ?></td>
                                            <td><?= $data['namaproyek']; ?></td>
                                            <td>
                                                <a href="/datum/<?= $data['id']; ?>" class="btn btn-outline-success">Detail</a>
                                                <a href="/datum/ubah/<?= $data['id']; ?>" class="btn btn-outline-warning">Ubah</a>

                                                <form action="/datum/<?= $data['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ?');">Hapus</button>
                                                </form>
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