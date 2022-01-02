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
                    <h1 class="h3 mb-0 text-gray-800">Detail Data Kecelakaan Kerja</h1>
                </div>

                <!-- Card Detail -->

                <div class="card text-white bg-secondary mb-3" style="max-width: 800px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/img/<?= $datakecelakaan['foto']; ?>" class="card-img mt-4 ml-2" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $datakecelakaan['insiden']; ?></h5>
                                <p class="card-text"><b>Waktu : </b><?= $datakecelakaan['tgl']; ?></p>
                                <p class="card-text"><b>Penyebab : </b><?= $datakecelakaan['penyebab']; ?></p>
                                <p class="card-text"><b>Keterangan : </b><?= $datakecelakaan['keterangan']; ?></p>
                                <p class="card-text"><b>Kronologi : </b><?= $datakecelakaan['kronologi']; ?></p>
                            </div>
                        </div>
                        <a href="/kecelakaan" type="button" class="btn btn-primary float-left mb-2 ml-2">Kembali</a>
                    </div>
                </div>

                <!-- <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kecelakaan Kerja</h6>
                        </div>
                        <div class="card-body">
                            <form action="/kecelakaan/simpan" method="post">
                                <div class="form-group row">
                                    <label for="insiden" class="col-sm-4 col-form-label">Insiden</label>
                                    <div class="col-sm-8 ">
                                        <input type="text" class="form-control" id="insiden" name="insiden" value="<?= $datakecelakaan['insiden']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $datakecelakaan['tgl']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="peyebab" class="col-sm-4 col-form-label">Peyebab</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="penyebab" name="penyebab" value="<?= $datakecelakaan['penyebab']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $datakecelakaan['keterangan']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="foto" name="foto" value="<?= $datakecelakaan['foto']; ?>">
                                    </div>
                                </div>
                                <a href="/kecelakaan" type="button" class="btn btn-warning float-left">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div> -->


                <!-- /.container-fluid -->
            </div>

            <!-- End of Main Content -->
        </div>

        <!-- End of Content Wrapper -->
        <?= $this->include('layout/footer'); ?>

    </div>
    <!-- End of Page Wrapper -->

    <?= $this->endSection(); ?>