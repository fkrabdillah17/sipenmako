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
                    <h1 class="h3 mb-0 text-gray-800">Tambah Data Timeline</h1>
                </div>

                <!-- Form Pengisian -->
                <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Timeline Proyek</h6>
                        </div>
                        <div class="card-body">
                            <form action="/timeline/simpan" method="post">
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
                                    <label for="ktg" class="col-sm-4 col-form-label">Kategori Uraian Pekerjaan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= ($validation->hasError('ktg')) ? 'is-invalid' : ''; ?>" id="ktg" name="ktg" autofocus>
                                            <option value="<?= old('ktg'); ?>"><?= (old('ktg')) ? old('ktg') : '--Pilih--' ?></option>
                                            <?php if (session()->get('role_id') == 2) { ?>
                                                <?php foreach ($kategori as $ktg) : ?>
                                                    <?php if (session()->get('proyek') == $ktg['namaproyek']) { ?>
                                                        <option value="<?= $ktg['ktgnoitem']; ?>"><?= $ktg['ktgnoitem']; ?> | <?= $ktg['ktguraian']; ?> - <?= $ktg['namaproyek']; ?></option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            <?php } else { ?>
                                                <?php foreach ($kategori as $ktg) : ?>
                                                    <option value="<?= $ktg['ktgnoitem']; ?>"><?= $ktg['ktgnoitem']; ?> | <?= $ktg['ktguraian']; ?> - <?= $ktg['namaproyek']; ?></option>
                                                <?php endforeach; ?>

                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('ktg'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="noitem" class="col-sm-4 col-form-label">No. Item Mata Pembayaran</label>
                                    <div class="col-sm-8 ">
                                        <input type="text" class="form-control <?= ($validation->hasError('noitem')) ? 'is-invalid' : ''; ?>" id="noitem" name="noitem" value="<?= old('noitem'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('noitem'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uraian" class="col-sm-4 col-form-label">Uraian Pekerjaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('uraian')) ? 'is-invalid' : ''; ?>" id="uraian" name="uraian" value="<?= old('uraian'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('uraian'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Harga Satuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>" onkeyup="sum()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('harga'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kuantitas" class="col-sm-4 col-form-label">Kuantitas</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control <?= ($validation->hasError('kuantitas')) ? 'is-invalid' : ''; ?>" id="kuantitas" name="kuantitas" value="<?= old('kuantitas'); ?>" onkeyup="sum()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kuantitas'); ?>
                                        </div>
                                    </div>
                                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-3">
                                        <select class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>" id="satuan" name="satuan">
                                            <option value="<?= old('satuan'); ?>"><?= (old('satuan')) ? old('satuan') : '--Pilih--' ?></option>
                                            <option value="Cm">Cm</option>
                                            <option value="Cm2">Cm²</option>
                                            <option value="Cm3">Cm³</option>
                                            <option value="M">M</option>
                                            <option value="M2">M²</option>
                                            <option value="M3">M³</option>
                                            <option value="ls">ls</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Ton">Ton</option>
                                            <option value="Liter">Liter</option>
                                            <option value="bh">bh</option>
                                            <option value="Unit">Unit</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('satuan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jmlharga" class="col-sm-4 col-form-label">Jumlah Harga</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('jmlharga')) ? 'is-invalid' : ''; ?>" id="jmlharga" name="jmlharga" value="<?= old('jmlharga'); ?>" readonly>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jmlharga'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglmulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tglmulai')) ? 'is-invalid' : ''; ?>" id="tglmulai" name="tglmulai" value="<?= old('tglmulai'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tglmulai'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglselesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tglselesai')) ? 'is-invalid' : ''; ?>" id="tglselesai" name="tglselesai" value="<?= old('tglselesai'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tglselesai'); ?>
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
    <script src="/js/hitung.js"></script>

    <?= $this->endSection(); ?>