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
                    <h1 class="h3 mb-0 text-gray-800">Tambah Akun</h1>
                </div>

                <!-- Form Pengisian -->
                <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
                        </div>
                        <div class="card-body">
                            <form action="/akun/simpan" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-4 col-form-label">Nama Pengguna</label>
                                    <div class="col-sm-8 ">
                                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= old('username'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Kata Sandi</label>
                                    <div class="col-sm-8 ">
                                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" autofocus value="<?= old('password'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confpassword" class="col-sm-4 col-form-label">Konfirmasi Kata Sandi</label>
                                    <div class="col-sm-8 ">
                                        <input type="password" class="form-control <?= ($validation->hasError('confpassword')) ? 'is-invalid' : ''; ?>" id="confpassword" name="confpassword" autofocus value="<?= old('confpassword'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('confpassword'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role_id" class="col-sm-4 col-form-label">Role ID</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= ($validation->hasError('role_id')) ? 'is-invalid' : ''; ?>" id="role_id" name="role_id" autofocus>
                                            <option value="<?= (old('role_id')) ? old('role_id') : $timeline['role_id'] ?>"><?= $akun['role_id']; ?></option>
                                            <option value="1">Administrator</option>
                                            <option value="2">User</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('role_id'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="proyek" class="col-sm-4 col-form-label">Proyek</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= ($validation->hasError('proyek')) ? 'is-invalid' : ''; ?>" id="proyek" name="proyek" autofocus>
                                            <option value="<?= old('proyek'); ?>"><?= (old('proyek')) ? old('proyek') : '--Pilih--' ?></option>
                                            <?php foreach ($proyek as $p) : ?>
                                                <option value="<?= $p['proyek']; ?>"><?= $p['proyek']; ?></option>
                                            <?php endforeach; ?>
                                            <option value="Administrator">Administrator</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('proyek'); ?>
                                        </div>
                                    </div>
                                </div>

                                <a href="/akun" type="button" class="btn btn-warning float-left">Kembali</a>
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