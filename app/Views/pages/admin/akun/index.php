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
                    <h1 class="h3 mb-0 text-gray-800">Akun</h1>
                </div>
                <p class="mb-4"><a href="/" type="button" class="btn btn-primary">Tambah Akun</a></p>

                <!-- Tabel -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Role</th>
                                        <th width="170" scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <th class="text-center" scope="row">1</td>
                                        <td class="align-middle">1072537123</td>
                                        <td class="align-middle">Lotus</td>
                                        <td class="align-middle">Admin</td>
                                        <td class="align-middle">
                                            <a href="/editakun" type="button" class="btn btn-outline-warning">Ubah</a>
                                            <a href="/hapusakun" type="button" class="btn btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
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