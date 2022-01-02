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
                    <h1 class="h3 mb-0 text-gray-800">Tambah Data Kategori</h1>
                </div>

                <!-- Form Pengisian -->
                <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kategori Timeline Proyek</h6>
                        </div>
                        <div class="card-body">
                            <form action="/timeline/ksimpan" method="post">
                                <?php if (session()->get('role_id') == 1) { ?>
                                    <div class="form-group row">
                                        <label for="proyek" class="col-sm-4 col-form-label">Proyek</label>
                                        <div class="col-sm-8">
                                            <select class="form-control <?= ($validation->hasError('p')) ? 'is-invalid' : ''; ?>" id="proyek" name="proyek" autofocus>
                                                <option value="<?= old('proyek'); ?>"><?= (old('proyek')) ? old('proyek') : '--Pilih--' ?></option>
                                                <?php foreach ($proyek as $p) : ?>
                                                    <option value="<?= $p['namaproyek']; ?>"><?= $p['namaproyek']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('proyek'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <input type="hidden" name="proyek" id="proyek" value="<?= session()->get('proyek'); ?>">
                                <?php } ?>
                                <div class="form-group row">
                                    <label for="ktgnoitem" class="col-sm-4 col-form-label">Kategori No. Item Mata Pembayaran</label>
                                    <div class="col-sm-8 ">
                                        <input type="text" class="form-control <?= ($validation->hasError('ktgnoitem')) ? 'is-invalid' : ''; ?>" id="ktgnoitem" name="ktgnoitem" value="<?= old('ktgnoitem'); ?>" autofocus>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('ktgnoitem'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ktguraian" class="col-sm-4 col-form-label">Kategori Uraian Pekerjaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('ktguraian')) ? 'is-invalid' : ''; ?>" id="ktguraian" name="ktguraian" value="<?= old('ktguraian'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('ktguraian'); ?>
                                        </div>
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