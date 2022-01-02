<!-- Menampilkan semua tanggal diantara dua tanggal -->
<?php while (strtotime($tglmulaipek) <= strtotime($tglselesaipek)) { ?>
    <td><?= date("d-m-Y", strtotime($tglmulaipek)); ?></td>
    <?php
    $tglmulaipek = date("d-m-Y", strtotime("+$hari day", strtotime($tglmulaipek)));
    ?>
<?php } ?>