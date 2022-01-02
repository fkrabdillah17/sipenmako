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
                    <h1 class="h3 mb-0 text-gray-800">Data Material</h1>
                </div>

                <!-- Form Pemilihan -->
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">ID Material</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-auto">
                            <div class="col-md-2">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-success mb-2">Tampil</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Tabel -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Besi 5 mm</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="25" scope="col" class="text-center">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nomor Kendaraan</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Keluar</th>
                                        <th scope="col">Jumlah</th>
                                        <th width="170" scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <th class="text-center" scope="row">1</td>
                                        <td class="align-middle-center">18/11/2020</td>
                                        <td class="align-middle">B 3345 ED</td>
                                        <td class="align-middle">150</td>
                                        <td class="align-middle">-</td>
                                        <td class="align-middle">150</td>
                                        <td class="align-middle">
                                            <a href="/editakun" type="button" class="btn btn-outline-warning">Ubah</a>
                                            <a href="/hapusakun" type="button" class="btn btn-outline-danger">Hapus</a>

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