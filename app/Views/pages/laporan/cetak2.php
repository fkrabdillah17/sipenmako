<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div id="content">
    <div class="container-fluid">

        <h4 style="text-align:center" class="m-0 font-weight-bold">Laporan Proyek <?= $laporan; ?></h4>
        <h4 style="text-align:center" class="m-0 font-weight-bold"><?= $pemilik; ?></h4>
        <h4 style="text-align:center" class="m-0 font-weight-bold">Tahun <?= $tahun; ?></h4>

        <div class="card-body">
            <div class="table">
                <div class="row ml-md-5" style="text-align: left;">
                    <div class="col">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th width="200" scope="col"></th>
                                    <th width="10" scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">Pemilik Proyek</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['namapemilik']; ?></td>
                                </tr>
                                <tr>
                                    <td scope="col">Nama Proyek</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['namaproyek']; ?></td>
                                </tr>
                                <tr>
                                    <td scope="col">Lokasi Proyek</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['lokasiproyek']; ?></td>
                                </tr>
                                <tr>
                                    <td scope="col">Ruas Jalan</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['ruasjalan']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th width="200" scope="col"></th>
                                    <th width="10" scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">Sumber Dana</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['sumberdana']; ?></td>
                                </tr>
                                <tr>
                                    <td scope="col">No. Kontrak</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['nokontrak']; ?></td>
                                </tr>
                                <tr>
                                    <td scope="col">Tanggal Mulai</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['tglmulai']; ?></td>
                                </tr>
                                <tr>
                                    <td scope="col">Tanggal Selesai</td>
                                    <td>:</td>
                                    <td><?= $dataproyek['tglselesai']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>

                <?php $i = 0 ?>
                <?php foreach ($proyek as $p) : ?>
                    <?php if ($p['namaproyek'] == $laporan) { ?>
                        <?php
                        $filter_ktg = $p['namaproyek'];
                        $db      = \Config\Database::connect();
                        $jml_data = $db->query("SELECT * FROM kategori WHERE namaproyek = '$filter_ktg' ");
                        $jumlah_data = $jml_data->resultID->num_rows;
                        ?>
                        <!-- Tabel -->
                        <div class="py-3">
                            <h4 style="text-align:center" class="m-0 font-weight-bold">Data Timeline Proyek</h4>

                            <table class="table table-bordered" width="100%" id="timeline" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2" width="100" scope="col" class="text-center">No. Item Mata Pembayaran</th>
                                        <th rowspan="2" scope="col">Uraian Pekerjaan</th>
                                        <th rowspan="2" scope="col">Harga Satuan</th>
                                        <th colspan="4" scope="col" class="text-center">Detail</th>
                                        <th rowspan="2" scope="col">Tanggal Mulai</th>
                                        <th rowspan="2" scope="col">Tanggal Selesai</th>
                                    </tr>
                                    <tr>
                                        <th>Kuantitas</th>
                                        <th>Stn</th>
                                        <th>Jmlh. Harga</th>
                                        <th>Bobot Pek.(%)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $jmltotal = 0; ?>

                                    <?php foreach ($kategori as $data1) : ?>

                                        <?php if ($p['namaproyek'] == $data1['namaproyek']) { ?>
                                            <?php $i++ ?>
                                            <?php $total = 0; ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?= $data1['ktgnoitem']; ?></td>
                                                <th class="align-middle"><?= $data1['ktguraian']; ?></td>
                                                <th colspan="7"></th>
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
                        <?php $i = 0  ?>
                    <?php } ?>
                <?php endforeach; ?>

                </table>
                <br>
                <h4 style="text-align:center" class="m-0 font-weight-bold">Data Progres Proyek</h4>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="100" scope="col">No. Item Mata Pembayaran</th>
                            <th scope="col">Keterangan</th>
                            <th width="80" scope="col">Tgl mulai</th>
                            <th width="80" scope="col">Tgl selesai</th>
                            <th width="80" scope="col">Foto</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($progres as $data2) : ?>
                            <?php if ($data2['namaproyek'] == $laporan) { ?>
                                <tr>
                                    <td><?= $data2['noitem']; ?></td>
                                    <td><?= $data2['keterangan']; ?></td>
                                    <td><?= $data2['tglmulai']; ?></td>
                                    <td><?= $data2['tglselesai']; ?></td>
                                    <td><img src="/img/<?= $data2['foto']; ?>" class="foto" alt=""></td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br>
                <h4 style="text-align:center" class="m-0 font-weight-bold">Data Kecelakaan Kerja</h4>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Tgl</th>
                            <th scope="col">Insiden</th>
                            <th scope="col">Penyebab</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Kronologi</th>
                            <th scope="col">Foto</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $judul = 'judul' ?>
                        <?php foreach ($kecelakaan as $data) : ?>

                            <?php if ($data['namaproyek'] == $laporan) { ?>
                                <?php if ($data['namaproyek'] !== $judul) { ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?= date('d M Y', strtotime($data['tgl'])); ?></td>
                                        <td><?= $data['insiden']; ?></td>
                                        <td><?= $data['penyebab']; ?></td>
                                        <td><?= $data['keterangan']; ?></td>
                                        <td><?= $data['kronologi']; ?></td>
                                        <td><img src="/img/<?= $data['foto']; ?>" class="foto" alt=""></td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?= date('d M Y', strtotime($data['tgl'])); ?></td>
                                        <td><?= $data['insiden']; ?></td>
                                        <td><?= $data['penyebab']; ?></td>
                                        <td><?= $data['keterangan']; ?></td>
                                        <td><?= $data['kronologi']; ?></td>
                                        <td><img src="/img/<?= $data['foto']; ?>" class="foto" alt=""></td>
                                    </tr>
                                <?php } ?>
                                <?php $judul = $data['namaproyek'] ?>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                <div class="pt-5 mt-5">
                    <p style="text-align: right;" class="mr-4">..................... , ......................</p>
                    <p style="text-align: right;" class="mr-5 pr-3">Mengetahui</p>
                    <p style="text-align: right;" class="mr-3 mt-5 pt-5 ">( ........................................... )</p>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    window.print();
</script>
<?= $this->endSection(); ?>