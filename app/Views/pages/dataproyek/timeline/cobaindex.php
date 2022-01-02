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
                <div class="row">
                    <div class="pl-3">
                        <a href="/timeline/kategori" type="button" class="btn btn-primary">Tambah Kategori</a>
                    </div>
                    <div class="pl-3">
                        <a href="/timeline/tambah" type="button" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>



                <!-- Tabel -->
                <div class="py-3">
                    <div class="card shadow mb-4">
                        <div class="card text-center">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Timeline Proyek</h6>
                            </div>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
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
                                            <th rowspan="2" width="170" scope="col">Aksi</th>
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
                                            <?php $total = 0; ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?= $data1['ktgnoitem']; ?></td>
                                                <th class="align-middle"><?= $data1['ktguraian']; ?></td>
                                                <th colspan="7"></th>
                                                <td class="align-middle">
                                                    <a href="/timeline/kategori/ubah/<?= $data1['ktgnoitem']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                                                    <form action="/timeline/hapus-kategori/<?= $data1['id']; ?>" method="post" class="d-inline">
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
                                                    $db      = \Config\Database::connect();
                                                    $builder = $db->table('timeline');
                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.ktgnoitem='$ktgnoitem') AS amount_paid", FALSE);
                                                    $query = $builder->get();
                                                    $d = $query->getResultArray();
                                                    ?>
                                                    <?php
                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline) AS amount_paid", FALSE);
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
                                                        <td class="align-middle"><?= $data2['satuan']; ?></td>
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
                                                        <td class="align-middle">
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


                                        <?php endforeach; ?>
                                        <tr>
                                            <th colspan="5">Total</th>
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
                                                    echo ($jmltotal);
                                                }
                                                if ($jmltotal > 100) {
                                                    echo ($jmltotal);
                                                } else {
                                                    echo number_format($jmltotal, 2);
                                                }
                                                ?>
                                            </th>
                                            <th colspan="3"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="card-footer">
                                <a href="/cobatimeline/cobagrafik" type="button" class="btn btn-primary">Lihat Grafik</a>
                            </div>
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