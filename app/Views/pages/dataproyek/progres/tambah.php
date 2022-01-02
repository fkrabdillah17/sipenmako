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
                    <h1 class="h3 mb-0 text-gray-800">Tambah Data Progres Proyek</h1>
                </div>

                <!-- Form Pengisian -->
                <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Progres Kerja</h6>
                        </div>
                        <div class="card-body">
                            <form action="/progres/simpan" method="post" enctype="multipart/form-data">
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
                                    <input type="hidden" id="namaproyek" name="namaproyek" value="<?= session()->get('proyek'); ?>">
                                <?php } ?>
                                <div class="form-group row">
                                    <label for="noitem" class="col-sm-4 col-form-label">No. Item Mata Pembayaran</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= ($validation->hasError('noitem')) ? 'is-invalid' : ''; ?>" id="noitem" name="noitem" autofocus>
                                            <option value="<?= old('noitem'); ?>"><?= (old('noitem')) ? old('noitem') : '--Pilih--' ?></option>
                                            <?php if (session()->get('role_id') == 1) { ?>
                                                <?php foreach ($timeline as $data) : ?>
                                                    <option value="<?= $data['noitem']; ?>"><?= $data['noitem']; ?> / <?= $data['uraian']; ?></option>
                                                <?php endforeach; ?>
                                            <?php } else { ?>
                                                <?php foreach ($timeline as $data) : ?>
                                                    <?php if (session()->get('proyek') == $data['namaproyek']) { ?>
                                                        <option value="<?= $data['noitem']; ?>"><?= $data['noitem']; ?> / <?= $data['uraian']; ?></option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('noitem'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglmulai" class="col-sm-4 col-form-label">Tanggal mulai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tglmulai')) ? 'is-invalid' : ''; ?>" id="tglmulai" name="tglmulai" value="<?= old('tglmulai'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tglmulai'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl" class="col-sm-4 col-form-label">Tanggal selesai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tglselesai')) ? 'is-invalid' : ''; ?>" id="tglselesai" name="tglselesai" value="<?= old('tglselesai'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tglselesai'); ?>
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
                                <a href="/progres" type="button" class="btn btn-warning float-left">Kembali</a>
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