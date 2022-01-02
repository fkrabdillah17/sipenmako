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
                    <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
                </div>

                <!-- Content Row -->

                <?php if (session()->get('role_id') == 1) { ?>
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna</div>
                                            <?php
                                            $db = \Config\Database::connect();
                                            $akun = $db->query("SELECT * FROM akun WHERE role_id != '1'");
                                            $jumlah = $akun->resultID->num_rows;
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Proyek</div>
                                            <?php
                                            $proposaly = $db->query("SELECT * FROM datum");
                                            $jumlahy = $proposaly->resultID->num_rows;
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahy; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hard-hat fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kecelakaan Kerja</div>
                                            <?php
                                            $kecelakaan = $db->query("SELECT * FROM kecelakaankerja");
                                            $jumlahk = $kecelakaan->resultID->num_rows;
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahk; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php } else { ?>
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
                                            <?php foreach ($datum as $datum) : ?>
                                                <?php if (session()->get('proyek') == $datum['namaproyek']) { ?>
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
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <!-- /.container-fluid -->
            </div>

            <!-- End of Main Content -->
            <?php if (session()->get('role_id') == 2) { ?>
                <?= $this->include('layout/footer'); ?>
            <?php } ?>
        </div>
        <?php if (session()->get('role_id') == 1) { ?>
            <?= $this->include('layout/footer'); ?>
        <?php } ?>

        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?= $this->endSection(); ?>