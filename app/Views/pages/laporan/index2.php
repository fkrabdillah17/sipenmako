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
                    <h1 class="h3 mb-0 text-gray-800">Laporan Proyek</h1>
                </div>

                <!-- Main Content -->
                <form action="admin/cetak2" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputState">Laporan</label>
                            <select id="laporan" name="laporan" class="form-control" required>
                                <option selected>- Pilih -</option>
                                <?php foreach ($datum as $d) : ?>
                                    <option value="<?= $d['namaproyek']; ?>"><?= $d['namaproyek']; ?></option>
                                <?php endforeach ?>
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