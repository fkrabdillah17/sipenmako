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
                    <h1 class="h3 mb-0 text-gray-800">Data Keuangan</h1>
                </div>
                <p class="mb-4"><a href="/" type="button" class="btn btn-primary">Tambah Data</a></p>

                <!-- Tabel -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Keuangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">Tgl</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Kredit</th>
                                        <th scope="col">Saldo</th>
                                        <th scope="col">Nota</th>
                                        <th width="130" scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <th class="text-center" scope="row">1</td>
                                        <td class="align-middle">11/11/2020</td>
                                        <td class="align-middle">Dana Proyek</td>
                                        <td class="align-middle">1.000.000.000</td>
                                        <td class="align-middle">-</td>
                                        <td class="align-middle">1.000.000.000</td>
                                        <td class="align-middle">Nota.jpg</td>
                                        <td class="align-middle">
                                            <a href="/editakun" type="button" class="btn btn-outline-warning">Ubah</a>
                                            <a href="/hapusakun" type="button" class="btn btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>

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