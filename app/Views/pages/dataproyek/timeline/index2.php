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
                    <h1 class="h3 mb-0 text-gray-800">Timeline Proyek</h1>
                </div>
                <div class="form-row">
                    <div class="form-group p-3">
                        <a href="/timeline/kategori" type="button" class="btn btn-primary">Tambah Kategori</a>
                        <a href="/timeline/tambah" type="button" class="btn btn-primary ">Tambah Data</a>
                    </div>
                    <?php if (session()->get('role_id') == 1) { ?>
                        <form action="/timeline/index" method="post">
                            <div class="input-group p-3">
                                <select class="custom-select" id="cari_proyek" aria-label="Example select with button addon" name="cari_proyek">
                                    <option value="<?= old('namaproyek'); ?>"><?= (old('namaproyek')) ? old('namaproyek') : '--Pilih Proyek--' ?></option>
                                    <?php foreach ($proyek as $p) : ?>
                                        <option value="<?= $p['namaproyek']; ?>"><?= $p['namaproyek']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Tampil</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>


                <?php if (session()->get('role_id') == 1) { ?>
                    <?php $i = 0 ?>
                    <?php foreach ($proyek as $p) : ?>
                        <?php if ($p['namaproyek'] == $cari_proyek) : ?>
                            <?php
                            $filter_ktg = $p['namaproyek'];
                            $db      = \Config\Database::connect();
                            $jml_data = $db->query("SELECT * FROM kategori WHERE namaproyek = '$filter_ktg' ");
                            $jumlah_data = $jml_data->resultID->num_rows;
                            ?>
                            <!-- Tabel -->
                            <div class="py-3">
                                <div class="card shadow mb-4">
                                    <div class="card text-center">
                                        <div class="card-header py-3">
                                            <h5 class="m-0 font-weight-bold text-primary">Timeline Proyek <?= $p['namaproyek']; ?></h5>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" id="timeline" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" width="100" scope="col" class="text-center">No. Item Mata Pembayaran</th>
                                                        <th rowspan="2" scope="col">Uraian Pekerjaan</th>
                                                        <th rowspan="2" scope="col">Harga Satuan</th>
                                                        <th colspan="4" scope="col" class="text-center">Detail</th>
                                                        <th rowspan="2" scope="col">Tanggal Mulai</th>
                                                        <th rowspan="2" scope="col">Tanggal Selesai</th>
                                                        <th rowspan="2" width="170" scope="col" class="Aksi">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kuantitas</th>
                                                        <th>Stn</th>
                                                        <th>Jmlh. Harga</th>
                                                        <th>Bobot Pek.(%)</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $jmltotal = 0;
                                                    ?>
                                                    <?php foreach ($kategori as $data1) : ?>

                                                        <?php if ($p['namaproyek'] == $data1['namaproyek']) { ?>
                                                            <?php $i++ ?>
                                                            <?php $total = 0; ?>
                                                            <tr>
                                                                <th class="text-center" scope="row"><?= $data1['ktgnoitem']; ?></td>
                                                                <th class="align-middle"><?= $data1['ktguraian']; ?></td>
                                                                <th colspan="7"></th>
                                                                <td class="Aksi">
                                                                    <a href="/timeline/kategori/ubah/<?= $data1['ktgnoitem']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                                    <form action="/timeline/hapus-kategori/<?= $data1['ktgnoitem']; ?>" method="post" class="d-inline">
                                                                        <?= csrf_field(); ?>
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus semua data ?');">Hapus</button>
                                                                    </form>
                                                                </td>
                                                            </tr>


                                                            <?php foreach ($timeline2 as $data2) : ?>
                                                                <?php if ($data1['ktgnoitem'] == $data2['ktgnoitem']) { ?>
                                                                    <?php
                                                                    $ktgnoitem = $data1['ktgnoitem'];
                                                                    $proyek = $p['namaproyek'];
                                                                    $db      = \Config\Database::connect();
                                                                    $builder = $db->table('timeline');
                                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.ktgnoitem='$ktgnoitem' AND timeline.namaproyek='$proyek') AS amount_paid", FALSE);
                                                                    $query = $builder->get();
                                                                    $d = $query->getResultArray();
                                                                    ?>
                                                                    <?php
                                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.namaproyek='$proyek') AS amount_paid", FALSE);
                                                                    $query1 = $builder->get();
                                                                    $dd = $query1->getResultArray();
                                                                    ?>
                                                                    <?php
                                                                    // $total = 0;
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" scope="row"><?= $data2['noitem']; ?></td>
                                                                        <td class="align-middle"><?= $data2['uraian']; ?></td>
                                                                        <td class="align-middle"><?= number_format($data2['harga'], 2, ",", "."); ?></td>
                                                                        <td class="align-middle"><?= $data2['kuantitas']; ?></td>
                                                                        <?php
                                                                        if ($data2['satuan'] == 'Cm2') {
                                                                            $satuan = 'Cm²';
                                                                        } else if ($data2['satuan'] == 'Cm3') {
                                                                            $satuan = 'Cm³';
                                                                        } else if ($data2['satuan'] == 'M2') {
                                                                            $satuan = 'M²';
                                                                        } else if ($data2['satuan'] == 'M3') {
                                                                            $satuan = 'M³';
                                                                        } else {
                                                                            $satuan = $data2['satuan'];
                                                                        }
                                                                        ?>
                                                                        <td class="align-middle"><?= $satuan; ?></td>
                                                                        <td class="align-middle" onkeyup="sum()"><?= number_format($data2['jmlharga'], 2, ",", "."); ?></td>
                                                                        <td class="align-middle"><?php
                                                                                                    $jumlah = ($data2['jmlharga'] / $dd[0]['amount_paid']) * 100;
                                                                                                    $jumlah_format = number_format($jumlah, 2);
                                                                                                    echo $jumlah_format;
                                                                                                    $total = $total += $jumlah_format;
                                                                                                    // echo $total;
                                                                                                    $jmltotal = $jmltotal += $jumlah_format;
                                                                                                    ?></td>
                                                                        <td class="align-middle"><?= $data2['tglmulai']; ?></td>
                                                                        <td class="align-middle"><?= $data2['tglselesai']; ?></td>
                                                                        <td class="Aksi">
                                                                            <a href="/timeline/ubah/<?= $data2['id']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                                            <form action="/timeline/hapus/<?= $data2['id']; ?>" method="post" class="d-inline">
                                                                                <?= csrf_field(); ?>
                                                                                <input type="hidden" name="_method" value="DELETE">
                                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ?');">Hapus</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                            <?php
                                                            $ktgnoitem = $data1['ktgnoitem'];
                                                            $proyek = $p['namaproyek'];
                                                            $db = \Config\Database::connect();
                                                            $akun = $db->query("SELECT * FROM timeline WHERE ktgnoitem='$ktgnoitem' AND namaproyek='$proyek'");
                                                            $jumlah = $akun->resultID->num_rows;
                                                            // echo $jumlah;
                                                            ?>
                                                            <?php if ($jumlah !== 0) { ?>
                                                                <tr>
                                                                    <th></th>

                                                                    <th>Jumlah Harga Pekerjaan <?= $data1['ktgnoitem']; ?></th>
                                                                    <th colspan="3"></th>
                                                                    <th>
                                                                        <?php
                                                                        // printf('$d');
                                                                        // print_r($d);
                                                                        echo number_format($d[0]['amount_paid'], 2, ",", ".");
                                                                        ?>
                                                                    </th>
                                                                    <th><?php
                                                                        echo $total;
                                                                        ?>
                                                                    </th>
                                                                    <th colspan="3"></th>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php if ($i == $jumlah_data) { ?>
                                                                <tr>
                                                                    <th colspan="5">Total </th>
                                                                    <th>
                                                                        <?php
                                                                        // printf('$d');
                                                                        // print_r($d);
                                                                        echo number_format($dd[0]['amount_paid'], 2, ",", ".");
                                                                        ?>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($jmltotal < 100) {
                                                                            echo number_format(ceil(($jmltotal)), 2);
                                                                        } else if ($jmltotal > 100) {
                                                                            echo number_format(floor(($jmltotal)), 2);
                                                                        } else {
                                                                            echo number_format($jmltotal, 2);
                                                                        }
                                                                        ?>
                                                                    </th>
                                                                    <th colspan="3"></th>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php $i = 0  ?>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <?php $i = 0 ?>
                    <?php foreach ($proyek as $p) : ?>
                        <?php if (session()->get('proyek') == $p['namaproyek']) { ?>
                            <?php
                            $filter_ktg = $p['namaproyek'];
                            $db      = \Config\Database::connect();
                            $jml_data = $db->query("SELECT * FROM kategori WHERE namaproyek = '$filter_ktg' ");
                            $jumlah_data = $jml_data->resultID->num_rows;
                            ?>
                            <!-- Tabel -->
                            <div class="py-3">
                                <div class="card shadow mb-4">
                                    <div class="card text-center">
                                        <div class="card-header py-3">
                                            <h5 class="m-0 font-weight-bold text-primary">Timeline Proyek <?= $p['namaproyek']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" id="timeline" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" width="100" scope="col" class="text-center">No. Item Mata Pembayaran</th>
                                                        <th rowspan="2" scope="col">Uraian Pekerjaan</th>
                                                        <th rowspan="2" scope="col">Harga Satuan</th>
                                                        <th colspan="4" scope="col" class="text-center">Detail</th>
                                                        <th rowspan="2" scope="col">Tanggal Mulai</th>
                                                        <th rowspan="2" scope="col">Tanggal Selesai</th>
                                                        <th rowspan="2" width="170" scope="col" class="Aksi">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kuantitas</th>
                                                        <th>Stn</th>
                                                        <th>Jmlh. Harga</th>
                                                        <th>Bobot Pek.(%)</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $jmltotal = 0;
                                                    ?>
                                                    <?php foreach ($kategori as $data1) : ?>

                                                        <?php if ($p['namaproyek'] == $data1['namaproyek']) { ?>
                                                            <?php $i++ ?>
                                                            <?php $total = 0; ?>
                                                            <tr>
                                                                <th class="text-center" scope="row"><?= $data1['ktgnoitem']; ?></td>
                                                                <th class="align-middle"><?= $data1['ktguraian']; ?></td>
                                                                <th colspan="7"></th>
                                                                <td class="Aksi">
                                                                    <a href="/timeline/kategori/ubah/<?= $data1['ktgnoitem']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                                    <form action="/timeline/hapus-kategori/<?= $data1['ktgnoitem']; ?>" method="post" class="d-inline">
                                                                        <?= csrf_field(); ?>
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ?');">Hapus</button>
                                                                    </form>
                                                                </td>
                                                            </tr>


                                                            <?php foreach ($timeline2 as $data2) : ?>
                                                                <?php if ($data1['ktgnoitem'] == $data2['ktgnoitem']) { ?>
                                                                    <?php
                                                                    $ktgnoitem = $data1['ktgnoitem'];
                                                                    $proyek = $p['namaproyek'];
                                                                    $db      = \Config\Database::connect();
                                                                    $builder = $db->table('timeline');
                                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.ktgnoitem='$ktgnoitem' AND timeline.namaproyek='$proyek') AS amount_paid", FALSE);
                                                                    $query = $builder->get();
                                                                    $d = $query->getResultArray();
                                                                    ?>
                                                                    <?php
                                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.namaproyek='$proyek') AS amount_paid", FALSE);
                                                                    $query1 = $builder->get();
                                                                    $dd = $query1->getResultArray();
                                                                    ?>
                                                                    <?php
                                                                    // $total = 0;
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" scope="row"><?= $data2['noitem']; ?></td>
                                                                        <td class="align-middle"><?= $data2['uraian']; ?></td>
                                                                        <td class="align-middle"><?= number_format($data2['harga'], 2, ",", "."); ?></td>
                                                                        <td class="align-middle"><?= $data2['kuantitas']; ?></td>
                                                                        <?php
                                                                        if ($data2['satuan'] == 'Cm2') {
                                                                            $satuan = 'Cm²';
                                                                        } else if ($data2['satuan'] == 'Cm3') {
                                                                            $satuan = 'Cm³';
                                                                        } else if ($data2['satuan'] == 'M2') {
                                                                            $satuan = 'M²';
                                                                        } else if ($data2['satuan'] == 'M3') {
                                                                            $satuan = 'M³';
                                                                        } else {
                                                                            $satuan = $data2['satuan'];
                                                                        }
                                                                        ?>
                                                                        <td class="align-middle"><?= $satuan; ?></td>
                                                                        <td class="align-middle" onkeyup="sum()"><?= number_format($data2['jmlharga'], 2, ",", "."); ?></td>
                                                                        <td class="align-middle"><?php
                                                                                                    $jumlah = ($data2['jmlharga'] / $dd[0]['amount_paid']) * 100;
                                                                                                    $jumlah_format = number_format($jumlah, 2);
                                                                                                    echo $jumlah_format;
                                                                                                    $total = $total += $jumlah_format;
                                                                                                    // echo $total;
                                                                                                    $jmltotal = $jmltotal += $jumlah_format;
                                                                                                    ?></td>
                                                                        <td class="align-middle"><?= $data2['tglmulai']; ?></td>
                                                                        <td class="align-middle"><?= $data2['tglselesai']; ?></td>
                                                                        <td class="Aksi">
                                                                            <a href="/timeline/ubah/<?= $data2['id']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                                            <form action="/timeline/hapus/<?= $data2['id']; ?>" method="post" class="d-inline">
                                                                                <?= csrf_field(); ?>
                                                                                <input type="hidden" name="_method" value="DELETE">
                                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ?');">Hapus</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                            <?php
                                                            $ktgnoitem = $data1['ktgnoitem'];
                                                            $proyek = $p['namaproyek'];
                                                            $db = \Config\Database::connect();
                                                            $akun = $db->query("SELECT * FROM timeline WHERE ktgnoitem='$ktgnoitem' AND namaproyek='$proyek'");
                                                            $jumlah = $akun->resultID->num_rows;
                                                            // echo $jumlah;
                                                            ?>
                                                            <?php if ($jumlah !== 0) { ?>
                                                                <tr>
                                                                    <th></th>

                                                                    <th>Jumlah Harga Pekerjaan <?= $data1['ktgnoitem']; ?></th>
                                                                    <th colspan="3"></th>
                                                                    <th>
                                                                        <?php
                                                                        // printf('$d');
                                                                        // print_r($d);
                                                                        echo number_format($d[0]['amount_paid'], 2, ",", ".");
                                                                        ?>
                                                                    </th>
                                                                    <th><?php
                                                                        echo $total;
                                                                        ?>
                                                                    </th>
                                                                    <th colspan="3"></th>
                                                                </tr>
                                                            <?php  } ?>
                                                            <?php if ($i == $jumlah_data) { ?>
                                                                <tr>
                                                                    <th colspan="5">Total </th>
                                                                    <th>
                                                                        <?php
                                                                        // printf('$d');
                                                                        // print_r($d);
                                                                        echo number_format($dd[0]['amount_paid'], 2, ",", ".");
                                                                        ?>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($jmltotal < 100) {
                                                                            echo number_format(ceil(($jmltotal)), 2);
                                                                        } else if ($jmltotal > 100) {
                                                                            echo number_format(floor(($jmltotal)), 2);
                                                                        } else {
                                                                            echo number_format($jmltotal, 2);
                                                                        }
                                                                        ?>
                                                                    </th>
                                                                    <th colspan="3"></th>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php $i = 0  ?>
                        <?php } ?>
                    <?php endforeach; ?>

                <?php } ?>
                <div class="card text-center">
                    <div class="card-footer">
                        <a href="/timeline/grafik/<?= $cari_proyek; ?>" type="button" class="btn btn-primary">Lihat Grafik</a>
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