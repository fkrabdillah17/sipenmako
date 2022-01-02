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
                    <h1 class="h3 mb-0 text-gray-800">Absen Pegawai</h1>
                </div>

                <!-- Form Absen Card -->
                <div class="row">
                    <!-- Card1 -->
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Form Absen</h5>

                                <div class="row">
                                    <div class="col" id="absensi" role="dialog">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                            </div>
                                            <!-- /.box-header -->
                                            <form action="" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>ID Pegawai</label>
                                                        <div class="input-group date">
                                                            <input type="text" name="nip" class="form-control pull-right" id="nip" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <div class="input-group date">
                                                            <input type="text" name="tanggal" class="form-control pull-right" id="tanggal" required>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="status" value="1" class="status" checked="">
                                                                Masuk
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="status" value="2" class="status">
                                                                Keluar
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="box-footer">
                                                    <div class="btn-group">
                                                        <button class="btn btn-success" id="tambahData"><i class="fa fa-pencil"></i> Submit</button>
                                                    </div>
                                                    <div>
                                                        <label></label>
                                                    </div>
                                                </div>

                                            </form>
                                            <!-- /.box-body -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card2 -->
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Form Izin</h5>

                                <div class="row">
                                    <div class="col" id="absensi" role="dialog">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                            </div>
                                            <!-- /.box-header -->
                                            <form action="" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>ID Pegawai</label>
                                                        <div class="input-group date">
                                                            <input type="text" name="nip" class="form-control pull-right" id="nip" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <div class="input-group date">
                                                            <input type="text" name="tanggal" class="form-control pull-right" id="tanggal" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Surat Keterangan</label>
                                                        <input type="file" class="form-control-file" id="suratizin" required>
                                                    </div>

                                                </div>
                                                <!-- /.box-body -->

                                                <div class="box-footer">
                                                    <div class="btn-group">
                                                        <button class="btn btn-success" id="tambahData"><i class="fa fa-pencil"></i> Submit</button>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Form Pemilihan Data -->
                    <!-- <form>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">ID Pegawai</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-3">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                            <div class="col-auto">
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-success mb-2">Tampil</button>
                                </div>
                            </div>
                        </div>
                    </form> -->
                    <!-- Tabel Absen -->




                    <!-- /.container-fluid -->
                </div>

                <!-- End of Main Content -->
            </div>

            <!-- End of Content Wrapper -->
            <?= $this->include('layout/footer'); ?>

        </div>
        <!-- End of Page Wrapper -->

        <?= $this->endSection(); ?>