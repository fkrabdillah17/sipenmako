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
                    <h1 class="h3 mb-0 text-gray-800">Laporan Tahunan</h1>
                </div>

                <!-- Main Content -->
                <form action="admin/cetak" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputState">Laporan</label>
                            <select id="laporan" name="laporan" class="form-control" required>
                                <option selected>- Pilih -</option>
                                <option value="Timeline">Data Timeline Proyek</option>
                                <option value="Progres">Data Progres Proyek</option>
                                <option value="Kecelakaan Kerja">Data Kecelakaan Proyek</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputState">Tahun</label>
                            <select id="tahun_laporan" name="tahun_laporan" class="form-control" required>
                                <option selected>- Pilih -</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputState"></label>
                            <div class="pt-2">
                                <button class="btn btn-primary">Cetak Data</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- /.container-fluid -->
            </div>

            <!-- End of Main Content -->
        </div>

        <!-- End of Content Wrapper -->
        <?= $this->include('layout/footer'); ?>

    </div>
    <!-- End of Page Wrapper -->

    <?= $this->endSection(); ?>