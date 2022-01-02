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
                    <h1 class="h3 mb-0 text-gray-800">Grafik Progres Proyek</h1>
                </div>


                <!-- Tabel -->
                <?php if (session()->get('role_id') == 1) { ?>
                    <?php foreach ($namaproyek as $p) : ?>
                        <?php if ($p['namaproyek'] == $proyek) : ?>
                            <div class="py-3">
                                <div class="card shadow mb-4">
                                    <div class="card text-center">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Progres Proyek <?= $p['namaproyek']; ?></h6>
                                        </div>
                                        <?php if (session()->getFlashdata('pesan')) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= session()->getFlashdata('pesan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                    $namaproyek2 = $p['namaproyek'];
                                    $db      = \Config\Database::connect();
                                    $builder = $db->table('timeline');
                                    $builder->select("(SELECT MIN(timeline.tglmulai) FROM timeline WHERE timeline.namaproyek='$namaproyek2') AS tglawal", FALSE);
                                    $query = $builder->get(1);
                                    $tglawal = $query->getResultArray();
                                    $tgl1 = $tglawal[0]['tglawal'];
                                    ?>
                                    <?php
                                    $builder = $db->table('timeline');
                                    $builder->select("(SELECT MAX(timeline.tglselesai) FROM timeline WHERE timeline.namaproyek='$namaproyek2') AS tglakhir", FALSE);
                                    $query2 = $builder->get(1);
                                    $tglakhir = $query2->getResultArray();
                                    $tgl2 = $tglakhir[0]['tglakhir'];
                                    ?>
                                    <?php
                                    $tgl11 = new DateTime($tgl1);
                                    $tgl22 = new DateTime($tgl2);
                                    $jmlhari = $tgl22->diff($tgl11)->days + 1;
                                    $mg = $jmlhari / 7;
                                    $jmlmg = ceil($mg);
                                    $tambah = 6;
                                    $tambah2 = 7;
                                    ?>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" rowspan="2" width="100" scope="col" class="text-center">No. Item Mata Pembayaran</th>
                                                        <th class="text-center" rowspan="2" scope="col" width="100">Uraian Pekerjaan</th>
                                                        <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                            <?php
                                                            if ($x > 1) {
                                                                $tglawalmg = date('d-M-Y', strtotime("+$tambah2 days", strtotime($tgl1)));
                                                                $tambah2 = $tambah2 += 7;
                                                            }
                                                            $tglakhirmg = date('d-M-Y', strtotime("+$tambah days", strtotime($tgl1)));
                                                            $tambah = $tambah += 7;
                                                            ?>
                                                            <th scope="col" class="text-center" width="80">
                                                                <?php if ($x == 1) { ?>
                                                                    <?php echo date('d/M/Y', strtotime($tgl1)); ?> - <?php echo date('d/M/Y', strtotime($tglakhirmg)); ?>
                                                                <?php } ?>
                                                                <?php if ($x > 1 && $x != $jmlmg) { ?>
                                                                    <?php echo date('d/M/Y', strtotime($tglawalmg)); ?> - <?php echo date('d/M/Y', strtotime($tglakhirmg)); ?>
                                                                <?php } ?>
                                                                <?php if ($x == $jmlmg) { ?>
                                                                    <?php echo date('d/M/Y', strtotime($tglawalmg)); ?> - <?php echo date('d/M/Y', strtotime($tgl2)); ?>
                                                                <?php } ?>
                                                            </th>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                            <th scope="col" class="text-center">mg <?= $x; ?></th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($kategori as $data1) : ?>
                                                        <?php if ($p['namaproyek'] == $data1['namaproyek']) { ?>
                                                            <tr>
                                                                <th class="text-center" scope="row"><?= $data1['ktgnoitem']; ?></td>
                                                                <th class="align-middle"><?= $data1['ktguraian']; ?></td>
                                                                <th colspan="<?= $jmlmg; ?>"></th>
                                                            </tr>
                                                            <?php foreach ($timeline2 as $data2) : ?>
                                                                <?php if ($data1['ktgnoitem'] == $data2['ktgnoitem']) { ?>
                                                                    <!-- Mengambil Data tgl mulai Pekerjaan setiap No Item (Perencanaan) -->
                                                                    <?php
                                                                    $uraian = $data2['uraian'];
                                                                    $db      = \Config\Database::connect();
                                                                    $builder = $db->table('timeline');
                                                                    $builder->select("(SELECT (timeline.tglmulai) FROM timeline WHERE timeline.uraian='$uraian' AND timeline.namaproyek='$namaproyek2') AS tglmulaipek", FALSE);
                                                                    $query = $builder->get();
                                                                    $d = $query->getResultArray();
                                                                    $tglmulaipek = $d[0]['tglmulaipek'];
                                                                    ?>

                                                                    <!-- Mengambil Data tgl selesai Pekerjaan setiap No Item (Perencanaan) -->
                                                                    <?php
                                                                    $builder->select("(SELECT (timeline.tglselesai) FROM timeline WHERE timeline.uraian='$uraian' AND timeline.namaproyek='$namaproyek2') AS tglselesaipek", FALSE);
                                                                    $query2 = $builder->get();
                                                                    $dd = $query2->getResultArray();
                                                                    $tglselesaipek = $dd[0]['tglselesaipek'];
                                                                    ?>
                                                                    <!-- Waktu pengerjaan dalam minggu (Perencanaan) -->
                                                                    <?php
                                                                    $tgl01 = new DateTime($tglmulaipek);
                                                                    $tgl02 = new DateTime($tglselesaipek);
                                                                    $jmlharipek = $tgl02->diff($tgl01)->days + 1;
                                                                    $mgpek = $jmlharipek / 7;
                                                                    $jmlmgpek = ceil($mgpek);
                                                                    ?>
                                                                    <!-- Nilai bobot pekerjaan per minggu (Perencanaan) -->
                                                                    <?php
                                                                    $ktgnoitem = $data1['ktgnoitem'];
                                                                    $db      = \Config\Database::connect();
                                                                    $builder = $db->table('timeline');
                                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.namaproyek='$namaproyek2') AS totalharga", FALSE);
                                                                    $query1 = $builder->get();
                                                                    $dd = $query1->getResultArray();
                                                                    $ddvalue = $dd[0]['totalharga'];
                                                                    $bobot = ($data2['jmlharga'] / $ddvalue) * 100;
                                                                    $bobotmgvalue = $bobot / $jmlmgpek;
                                                                    $bobotmg = number_format($bobotmgvalue, 2);
                                                                    $hari = 1;
                                                                    ?>

                                                                    <tr>
                                                                        <td rowspan="2" class="text-center" scope="row"><?= $data2['noitem']; ?></td>
                                                                        <td rowspan="2" class="align-middle"><?= $data2['uraian']; ?></td>
                                                                        <?php
                                                                        // cek minggu tglmulaipek (Perencanaan)
                                                                        $tglmulaipek2 = new DateTime($tglmulaipek);
                                                                        $jmlharipek = $tglmulaipek2->diff($tgl11)->days + 1;
                                                                        $mg2 = $jmlharipek / 7;
                                                                        $jmlmg2 = ceil($mg2);
                                                                        // cek minggu tglselesaipek (Perencanaan)
                                                                        $tglselesaipek3 = new DateTime($tglselesaipek);
                                                                        $jmlharipek2 = $tglselesaipek3->diff($tgl11)->days + 1;
                                                                        $mg3 = $jmlharipek2 / 7;
                                                                        $jmlmg3 = ceil($mg3);
                                                                        ?>
                                                                        <?php $jmlmg4 = $jmlmg2 ?>
                                                                        <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                                            <?php if ($x == $jmlmg2 || $x == $jmlmg3 || $x == $jmlmg4) { ?>
                                                                                <td class="table-danger"><?= $bobotmg; ?></td>
                                                                            <?php } else { ?>
                                                                                <td></td>
                                                                            <?php } ?>
                                                                            <?php if ($jmlmg4 + 1 < $jmlmg3) {
                                                                                $jmlmg4 = $jmlmg4 + 1;
                                                                            } ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php foreach ($progres as $datapro) : ?>
                                                                            <?php if ($data2['noitem'] == $datapro['noitem']) { ?>
                                                                                <!-- Mengambil data mulai tanggal progres -->
                                                                                <?php
                                                                                $builders = $db->table('progres');
                                                                                $builders->select("(SELECT (progres.tglmulai) FROM progres WHERE progres.keterangan='$uraian' AND progres.namaproyek='$namaproyek2') AS tglmulaipro", FALSE);
                                                                                $querys = $builders->get();
                                                                                $svalue = $querys->getResultArray();
                                                                                $tglmulaipro = $svalue[0]['tglmulaipro'];
                                                                                ?>
                                                                                <!-- Mengambil data selesai tanggal progres -->
                                                                                <?php
                                                                                $builders->select("(SELECT (progres.tglselesai) FROM progres WHERE progres.keterangan='$uraian' AND progres.namaproyek='$namaproyek2') AS tglselesaipro", FALSE);
                                                                                $querys2 = $builders->get();
                                                                                $svalue2 = $querys2->getResultArray();
                                                                                $tglselesaipro = $svalue2[0]['tglselesaipro'];
                                                                                ?>
                                                                                <?php
                                                                                // cek minggu tglmulaipek (Perencanaan)
                                                                                $tglmulaipro2 = new DateTime($tglmulaipro);
                                                                                $jmlharipro = $tglmulaipro2->diff($tgl11)->days + 1;
                                                                                $mgpro = $jmlharipro / 7;
                                                                                $jmlmgpro = ceil($mgpro);
                                                                                // cek minggu tglselesaipek (Perencanaan)
                                                                                $tglselesaipro2 = new DateTime($tglselesaipro);
                                                                                $jmlharipro2 = $tglselesaipro2->diff($tgl11)->days + 1;
                                                                                $mgpro2 = $jmlharipro2 / 7;
                                                                                $jmlmgpro2 = ceil($mgpro2);
                                                                                ?>
                                                                                <?php
                                                                                $tglpro01 = new DateTime($tglmulaipro);
                                                                                $tglpro02 = new DateTime($tglselesaipro);
                                                                                $jmlharipro01 = $tglpro02->diff($tglpro01)->days + 1;
                                                                                $mgpro01 = $jmlharipro01 / 7;
                                                                                $jmlmgpro01 = ceil($mgpro01);
                                                                                $bobotmgprovalue = $bobot / $jmlmgpro01;
                                                                                $bobotmgpro = number_format($bobotmgprovalue, 2);
                                                                                ?>
                                                                                <?php $jmlmgpro3 = $jmlmgpro ?>
                                                                                <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                                                    <?php if ($x == $jmlmgpro || $x == $jmlmgpro2 || $x == $jmlmgpro3) { ?>
                                                                                        <td class="table-success"><?= $bobotmgpro; ?></td>
                                                                                    <?php } else { ?>
                                                                                        <td></td>
                                                                                    <?php } ?>
                                                                                    <?php if ($jmlmgpro3 + 1 < $jmlmgpro2) {
                                                                                        $jmlmgpro3 = $jmlmgpro3 + 1;
                                                                                    } ?>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        <?php endforeach; ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <?php foreach ($namaproyek as $p) : ?>
                        <?php if (session()->get('proyek') == $p['namaproyek']) : ?>
                            <div class="py-3">
                                <div class="card shadow mb-4">
                                    <div class="card text-center">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Progres Proyek <?= $p['namaproyek']; ?></h6>
                                        </div>
                                        <?php if (session()->getFlashdata('pesan')) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= session()->getFlashdata('pesan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                    $namaproyek2 = $p['namaproyek'];
                                    $db      = \Config\Database::connect();
                                    $builder = $db->table('timeline');
                                    $builder->select("(SELECT MIN(timeline.tglmulai) FROM timeline WHERE timeline.namaproyek='$namaproyek2') AS tglawal", FALSE);
                                    $query = $builder->get(1);
                                    $tglawal = $query->getResultArray();
                                    $tgl1 = $tglawal[0]['tglawal'];
                                    ?>
                                    <?php
                                    $builder = $db->table('timeline');
                                    $builder->select("(SELECT MAX(timeline.tglselesai) FROM timeline WHERE timeline.namaproyek='$namaproyek2') AS tglakhir", FALSE);
                                    $query2 = $builder->get(1);
                                    $tglakhir = $query2->getResultArray();
                                    $tgl2 = $tglakhir[0]['tglakhir'];
                                    ?>
                                    <?php
                                    $tgl11 = new DateTime($tgl1);
                                    $tgl22 = new DateTime($tgl2);
                                    $jmlhari = $tgl22->diff($tgl11)->days + 1;
                                    $mg = $jmlhari / 7;
                                    $jmlmg = ceil($mg);
                                    $tambah = 6;
                                    $tambah2 = 7;
                                    ?>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" rowspan="2" width="100" scope="col" class="text-center">No. Item Mata Pembayaran</th>
                                                        <th class="text-center" rowspan="2" scope="col" width="100">Uraian Pekerjaan</th>
                                                        <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                            <?php
                                                            if ($x > 1) {
                                                                $tglawalmg = date('d-M-Y', strtotime("+$tambah2 days", strtotime($tgl1)));
                                                                $tambah2 = $tambah2 += 7;
                                                            }
                                                            $tglakhirmg = date('d-M-Y', strtotime("+$tambah days", strtotime($tgl1)));
                                                            $tambah = $tambah += 7;
                                                            ?>
                                                            <th scope="col" class="text-center" width="80">
                                                                <?php if ($x == 1) { ?>
                                                                    <?php echo date('d/M/Y', strtotime($tgl1)); ?> - <?php echo date('d/M/Y', strtotime($tglakhirmg)); ?>
                                                                <?php } ?>
                                                                <?php if ($x > 1 && $x != $jmlmg) { ?>
                                                                    <?php echo date('d/M/Y', strtotime($tglawalmg)); ?> - <?php echo date('d/M/Y', strtotime($tglakhirmg)); ?>
                                                                <?php } ?>
                                                                <?php if ($x == $jmlmg) { ?>
                                                                    <?php echo date('d/M/Y', strtotime($tglawalmg)); ?> - <?php echo date('d/M/Y', strtotime($tgl2)); ?>
                                                                <?php } ?>
                                                            </th>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                            <th scope="col" class="text-center">mg <?= $x; ?></th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($kategori as $data1) : ?>
                                                        <?php if ($p['namaproyek'] == $data1['namaproyek']) { ?>
                                                            <tr>
                                                                <th class="text-center" scope="row"><?= $data1['ktgnoitem']; ?></td>
                                                                <th class="align-middle"><?= $data1['ktguraian']; ?></td>
                                                                <th colspan="<?= $jmlmg; ?>"></th>
                                                            </tr>
                                                            <?php foreach ($timeline2 as $data2) : ?>
                                                                <?php if ($data1['ktgnoitem'] == $data2['ktgnoitem']) { ?>
                                                                    <!-- Mengambil Data tgl mulai Pekerjaan setiap No Item (Perencanaan) -->
                                                                    <?php
                                                                    $uraian = $data2['uraian'];
                                                                    $db      = \Config\Database::connect();
                                                                    $builder = $db->table('timeline');
                                                                    $builder->select("(SELECT (timeline.tglmulai) FROM timeline WHERE timeline.uraian='$uraian' AND timeline.namaproyek='$namaproyek2') AS tglmulaipek", FALSE);
                                                                    $query = $builder->get();
                                                                    $d = $query->getResultArray();
                                                                    $tglmulaipek = $d[0]['tglmulaipek'];
                                                                    ?>

                                                                    <!-- Mengambil Data tgl selesai Pekerjaan setiap No Item (Perencanaan) -->
                                                                    <?php
                                                                    $builder->select("(SELECT (timeline.tglselesai) FROM timeline WHERE timeline.uraian='$uraian' AND timeline.namaproyek='$namaproyek2') AS tglselesaipek", FALSE);
                                                                    $query2 = $builder->get();
                                                                    $dd = $query2->getResultArray();
                                                                    $tglselesaipek = $dd[0]['tglselesaipek'];
                                                                    ?>
                                                                    <!-- Waktu pengerjaan dalam minggu (Perencanaan) -->
                                                                    <?php
                                                                    $tgl01 = new DateTime($tglmulaipek);
                                                                    $tgl02 = new DateTime($tglselesaipek);
                                                                    $jmlharipek = $tgl02->diff($tgl01)->days + 1;
                                                                    $mgpek = $jmlharipek / 7;
                                                                    $jmlmgpek = ceil($mgpek);
                                                                    ?>
                                                                    <!-- Nilai bobot pekerjaan per minggu (Perencanaan) -->
                                                                    <?php
                                                                    $ktgnoitem = $data1['ktgnoitem'];
                                                                    $db      = \Config\Database::connect();
                                                                    $builder = $db->table('timeline');
                                                                    $builder->select("(SELECT SUM(timeline.jmlharga) FROM timeline WHERE timeline.namaproyek='$namaproyek2') AS totalharga", FALSE);
                                                                    $query1 = $builder->get();
                                                                    $dd = $query1->getResultArray();
                                                                    $ddvalue = $dd[0]['totalharga'];
                                                                    $bobot = ($data2['jmlharga'] / $ddvalue) * 100;
                                                                    $bobotmgvalue = $bobot / $jmlmgpek;
                                                                    $bobotmg = number_format($bobotmgvalue, 2);
                                                                    $hari = 1;
                                                                    ?>

                                                                    <tr>
                                                                        <td rowspan="2" class="text-center" scope="row"><?= $data2['noitem']; ?></td>
                                                                        <td rowspan="2" class="align-middle"><?= $data2['uraian']; ?></td>
                                                                        <?php
                                                                        // cek minggu tglmulaipek (Perencanaan)
                                                                        $tglmulaipek2 = new DateTime($tglmulaipek);
                                                                        $jmlharipek = $tglmulaipek2->diff($tgl11)->days + 1;
                                                                        $mg2 = $jmlharipek / 7;
                                                                        $jmlmg2 = ceil($mg2);
                                                                        // cek minggu tglselesaipek (Perencanaan)
                                                                        $tglselesaipek3 = new DateTime($tglselesaipek);
                                                                        $jmlharipek2 = $tglselesaipek3->diff($tgl11)->days + 1;
                                                                        $mg3 = $jmlharipek2 / 7;
                                                                        $jmlmg3 = ceil($mg3);
                                                                        ?>
                                                                        <?php $jmlmg4 = $jmlmg2 ?>
                                                                        <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                                            <?php if ($x == $jmlmg2 || $x == $jmlmg3 || $x == $jmlmg4) { ?>
                                                                                <td class="table-danger"><?= $bobotmg; ?></td>
                                                                            <?php } else { ?>
                                                                                <td></td>
                                                                            <?php } ?>
                                                                            <?php if ($jmlmg4 + 1 < $jmlmg3) {
                                                                                $jmlmg4 = $jmlmg4 + 1;
                                                                            } ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php foreach ($progres as $datapro) : ?>
                                                                            <?php if ($data2['noitem'] == $datapro['noitem']) { ?>
                                                                                <!-- Mengambil data mulai tanggal progres -->
                                                                                <?php
                                                                                $builders = $db->table('progres');
                                                                                $builders->select("(SELECT (progres.tglmulai) FROM progres WHERE progres.keterangan='$uraian' AND progres.namaproyek='$namaproyek2') AS tglmulaipro", FALSE);
                                                                                $querys = $builders->get();
                                                                                $svalue = $querys->getResultArray();
                                                                                $tglmulaipro = $svalue[0]['tglmulaipro'];
                                                                                ?>
                                                                                <!-- Mengambil data selesai tanggal progres -->
                                                                                <?php
                                                                                $builders->select("(SELECT (progres.tglselesai) FROM progres WHERE progres.keterangan='$uraian' AND progres.namaproyek='$namaproyek2') AS tglselesaipro", FALSE);
                                                                                $querys2 = $builders->get();
                                                                                $svalue2 = $querys2->getResultArray();
                                                                                $tglselesaipro = $svalue2[0]['tglselesaipro'];
                                                                                ?>
                                                                                <?php
                                                                                // cek minggu tglmulaipek (Perencanaan)
                                                                                $tglmulaipro2 = new DateTime($tglmulaipro);
                                                                                $jmlharipro = $tglmulaipro2->diff($tgl11)->days + 1;
                                                                                $mgpro = $jmlharipro / 7;
                                                                                $jmlmgpro = ceil($mgpro);
                                                                                // cek minggu tglselesaipek (Perencanaan)
                                                                                $tglselesaipro2 = new DateTime($tglselesaipro);
                                                                                $jmlharipro2 = $tglselesaipro2->diff($tgl11)->days + 1;
                                                                                $mgpro2 = $jmlharipro2 / 7;
                                                                                $jmlmgpro2 = ceil($mgpro2);
                                                                                ?>
                                                                                <?php
                                                                                $tglpro01 = new DateTime($tglmulaipro);
                                                                                $tglpro02 = new DateTime($tglselesaipro);
                                                                                $jmlharipro01 = $tglpro02->diff($tglpro01)->days + 1;
                                                                                $mgpro01 = $jmlharipro01 / 7;
                                                                                $jmlmgpro01 = ceil($mgpro01);
                                                                                $bobotmgprovalue = $bobot / $jmlmgpro01;
                                                                                $bobotmgpro = number_format($bobotmgprovalue, 2);
                                                                                ?>
                                                                                <?php $jmlmgpro3 = $jmlmgpro ?>
                                                                                <?php for ($x = 1; $x <= $jmlmg; $x++) { ?>
                                                                                    <?php if ($x == $jmlmgpro || $x == $jmlmgpro2 || $x == $jmlmgpro3) { ?>
                                                                                        <td class="table-success"><?= $bobotmgpro; ?></td>
                                                                                    <?php } else { ?>
                                                                                        <td></td>
                                                                                    <?php } ?>
                                                                                    <?php if ($jmlmgpro3 + 1 < $jmlmgpro2) {
                                                                                        $jmlmgpro3 = $jmlmgpro3 + 1;
                                                                                    } ?>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        <?php endforeach; ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php } ?>
                <form action="/progres/index" method="post">
                    <input type="hidden" name="cari_proyek" value="<?= $proyek; ?>">
                    <button type="submit" class="btn btn-warning">Kembali</button>
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