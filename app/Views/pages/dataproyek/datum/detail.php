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

                <!-- Data Umum -->
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="text-align: center;" class="card-title">
                                Data Umum Proyek
                            </h5>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th width="200" scope="col"></th>
                                        <th width="10" scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="col">Pemilik Proyek</td>
                                        <td>:</td>
                                        <td><?= $datum['namapemilik']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Nama Proyek</td>
                                        <td>:</td>
                                        <td><?= $datum['namaproyek']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Lokasi Proyek</td>
                                        <td>:</td>
                                        <td><?= $datum['lokasiproyek']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Ruas Jalan</td>
                                        <td>:</td>
                                        <td><?= $datum['ruasjalan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Sumber Dana</td>
                                        <td>:</td>
                                        <td><?= $datum['sumberdana']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">No. Kontrak</td>
                                        <td>:</td>
                                        <td><?= $datum['nokontrak']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Tanggal Mulai</td>
                                        <td>:</td>
                                        <td><?= $datum['tglmulai']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Tanggal Selesai</td>
                                        <td>:</td>
                                        <td><?= $datum['tglselesai']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/datum" type="button" class="btn btn-warning float-left">Kembali</a>
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