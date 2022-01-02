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
                    <h1 class="h3 mb-0 text-gray-800">Ubah Data Umum Proyek</h1>
                </div>

                <!-- Form Pengisian -->

                <!-- <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Umum Proyek</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Nama Proyek</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Nama Pemilik Proyek</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Lokasi Proyek</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Ruas Jalan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Sumber Dana</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">No. Kontrak</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="">
                                    </div>
                                </div>
                                <a href="/data_umum" type="button" class="btn btn-warning float-left">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div> -->

                <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Umum Proyek</h6>
                        </div>
                        <div class="card-body">
                            <form action="/datum/perbarui/<?= $datum['id']; ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $datum['id']; ?>">
                                <div class="form-group row">
                                    <label for="namapemilik" class="col-sm-4 col-form-label">Nama Pemilik Proyek</label>
                                    <div class="col-sm-8 ">
                                        <input type="text" class="form-control <?= ($validation->hasError('namapemilik')) ? 'is-invalid' : ''; ?>" id="namapemilik" name="namapemilik" autofocus value="<?= (old('namapemilik')) ? old('namapemilik') : $datum['namapemilik'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('namapemilik'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaproyek" class="col-sm-4 col-form-label">Nama Proyek</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namaproyek" name="namaproyek" value="<?= (old('namaproyek')) ? old('namaproyek') : $datum['namaproyek'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lokasiproyek" class="col-sm-4 col-form-label">Lokasi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="lokasiproyek" name="lokasiproyek" value="<?= (old('lokasiproyek')) ? old('lokasiproyek') : $datum['lokasiproyek'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ruasjalan" class="col-sm-4 col-form-label">Ruas Jalan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ruasjalan" name="ruasjalan" value="<?= (old('ruasjalan')) ? old('ruasjalan') : $datum['ruasjalan'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sumberdana" class="col-sm-4 col-form-label">Sumber Dana</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="sumberdana" name="sumberdana" value="<?= (old('sumberdana')) ? old('sumberdana') : $datum['sumberdana'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nokontrak" class="col-sm-4 col-form-label">No. Kontrak</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nokontrak" name="nokontrak" value="<?= (old('nokontrak')) ? old('nokontrak') : $datum['nokontrak'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglmulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="tglmulai" name="tglmulai" value="<?= (old('tglmulai')) ? old('tglmulai') : $datum['tglmulai'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglselesai" class="col-sm-4 col-form-label">Tanggal selesai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="tglselesai" name="tglselesai" value="<?= (old('tglselesai')) ? old('tglselesai') : $datum['tglselesai'] ?>">
                                    </div>
                                </div>

                                <a href="/datum" type="button" class="btn btn-warning float-left">Kembali</a>
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