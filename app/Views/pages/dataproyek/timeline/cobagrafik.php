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
                    <h1 class="h3 mb-0 text-gray-800">Grafik Timeline</h1>
                </div>


                <!-- Tabel -->
                <div class="py-3">
                    <div class="card shadow mb-4">
                        <div class="card text-center">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Timeline Proyek</h6>
                            </div>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="100" scope="col" class="text-center">No. Item Mata Pembayaran</th>
                                            <th rowspan="2" scope="col">Uraian Pekerjaan</th>
                                            <?php
                                            $bulan = 1;
                                            ?>
                                            <?php for ($x = 0; $x <= $bulan; $x++) { ?>
                                                <th colspan="4" scope="col" class="text-center">Bulan</th>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <?php for ($x = 0; $x <= $bulan; $x++) { ?>
                                                <th>mg 1</th>
                                                <th>mg 2</th>
                                                <th>mg 3</th>
                                                <th>mg 4</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($kategori as $data1) : ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?= $data1['ktgnoitem']; ?></td>
                                                <th class="align-middle"><?= $data1['ktguraian']; ?></td>
                                                <th colspan="7"></th>
                                            </tr>
                                            <?php foreach ($timeline2 as $data2) : ?>
                                                <?php if ($data1['ktgnoitem'] == $data2['ktgnoitem']) { ?>
                                                    <tr>
                                                        <td class="text-center" scope="row"><?= $data2['noitem']; ?></td>
                                                        <td class="align-middle"><?= $data2['uraian']; ?></td>
                                                        <td class="align-middle"><?= date('d-M-Y', strtotime($data2['tglmulai'])) ?></td>
                                                        <td class="align-middle"><?= $data2['tglselesai']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php endforeach; ?>


                                        <?php endforeach; ?>
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
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