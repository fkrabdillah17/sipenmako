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
                    <h1 class="h3 mb-0 text-gray-800">Tambah Data Kecelakaan Kerja</h1>
                </div>

                <!-- Form Pengisian -->
                <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kecelakaan Kerja</h6>
                        </div>
                        <div class="card-body">
                            <form action="/tambah/simpan" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="insiden" class="col-sm-4 col-form-label">Insiden</label>
                                    <div class="col-sm-8 ">
                                        <input type="text" class="form-control" id="insiden" name="insiden" value="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="peyebab" class="col-sm-4 col-form-label">Peyebab</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="penyebab" name="penyebab" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control-file" id="foto">
                                    </div>
                                </div>
                                <a href="/timeline" type="button" class="btn btn-warning float-left">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </form>
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