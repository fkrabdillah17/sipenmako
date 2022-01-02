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
                            <form action="/kecelakaan/simpan" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <?php if (session()->get('role_id') == 1) { ?>
                                    <div class="form-group row">
                                        <label for="namaproyek" class="col-sm-4 col-form-label">Proyek</label>
                                        <div class="col-sm-8">
                                            <select class="form-control <?= ($validation->hasError('namaproyek')) ? 'is-invalid' : ''; ?>" id="namaproyek" name="namaproyek" autofocus>
                                                <option value="<?= old('namaproyek'); ?>"><?= (old('namaproyek')) ? old('namaproyek') : '--Pilih--' ?></option>
                                                <?php foreach ($namaproyek as $p) : ?>
                                                    <option value="<?= $p['namaproyek']; ?>"><?= $p['namaproyek']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('namaproyek'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <input type="hidden" name="namaproyek" id="namaproyek" value="<?= session()->get('proyek'); ?>">
                                <?php } ?>
                                <div class="form-group row">
                                    <label for="insiden" class="col-sm-4 col-form-label">Insiden</label>
                                    <div class="col-sm-8 ">
                                        <input type="text" class="form-control <?= ($validation->hasError('insiden')) ? 'is-invalid' : ''; ?>" id="insiden" name="insiden" autofocus value="<?= old('insiden'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('insiden'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl')) ? 'is-invalid' : ''; ?>" id="tgl" name="tgl" value="<?= old('tgl'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="peyebab" class="col-sm-4 col-form-label">Peyebab</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('penyebab')) ? 'is-invalid' : ''; ?>" id="penyebab" name="penyebab" value="<?= old('penyebab'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('penyebab'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" value="<?= old('keterangan'); ?> ">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('keterangan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kronologi" class="col-sm-4 col-form-label">Kronologi</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control <?= ($validation->hasError('kronologi')) ? 'is-invalid' : ''; ?>" id="kronologi" name="kronologi" value="<?= old('kronologi'); ?>"><?= old('kronologi'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kronologi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="namaFilefoto()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto'); ?>
                                            </div>
                                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                                        </div>
                                    </div>
                                </div>
                                <a href="/kecelakaan" type="button" class="btn btn-warning float-left">Kembali</a>
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