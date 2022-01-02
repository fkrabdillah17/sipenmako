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
                    <h1 class="h3 mb-0 text-gray-800">Data Absen</h1>
                </div>

                <!-- Form Pemilihan Data -->
                <form action="" method="">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>
                                    <label>Pilih Bulan</label>
                                    <div class="form-group">
                                        <select name='bulan' id='bulan' class='form-control'>
                                            <option value='01'>Januari</option>
                                            <option value='02'>Februari</option>
                                            <option value='03'>Maret</option>
                                            <option value='04'>April</option>
                                            <option value='05'>Mei</option>
                                            <option value='06'>Juni</option>
                                            <option value='07'>Juli</option>
                                            <option value='08'>Agustus</option>
                                            <option value='09'>September</option>
                                            <option value='10'>Oktober</option>
                                            <option value='11' selected>November</option>
                                            <option value='12'>Desember</option>
                                        </select> </div>
                                </th>
                                <th>
                                    <label>Tahun</label>
                                    <div class="form-group">
                                        <select name="tahun" id="tahun" class="form-control">

                                            <option value='2014'> 2014 </option>
                                            <option value='2015'> 2015 </option>
                                            <option value='2016'> 2016 </option>
                                            <option value='2017'> 2017 </option>
                                            <option value='2018'> 2018 </option>
                                            <option value='2019'> 2019 </option>
                                            <option value='2020' selected> 2020 </option>
                                        </select>
                                    </div>
                                </th>
                                <th>
                                    <label>Nama Pegawai</label>
                                    <div class="form-group">
                                        <input id="demo5" type="text" class="col-md-12 form-control" placeholder="Ketikkan Nama Anda" autocomplete="off" name="nama" value="" />
                                        <input type="hidden" id="id_emp" name="emp_id" value="" />
                                    </div>
                                </th>
                                <th>
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i>&nbsp;Tampil</button>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <!-- Tabel -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;" width="50" scope="col">#</th>
                            <th style="text-align: center;" scope="col">Tanggal</th>
                            <th style="text-align: center;" width="300" scope="col">Nama</th>
                            <th style="text-align: center;" scope="col">Jam Masuk</th>
                            <th style="text-align: center;" scope="col">Jam Keluar</th>
                            <th style="text-align: center;" scope="col">Keterangan</th>
                            <th style="text-align: center;" width="100" scope="col">Surat Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align: center;" scope="row">1</th>
                            <td style="text-align: center;">18/11/2020</td>
                            <td>Hilmi</td>
                            <td style="text-align: center;">08:19</td>
                            <td style="text-align: center;">16:34</td>
                            <td style="text-align: center;">Hadir</td>
                            <td style="text-align: center;">-</td>
                        </tr>

                    </tbody>
                </table>

                <!-- /.container-fluid -->
            </div>

            <!-- End of Main Content -->
        </div>

        <!-- End of Content Wrapper -->
        <?= $this->include('layout/footer'); ?>

    </div>
    <!-- End of Page Wrapper -->

    <?= $this->endSection(); ?>