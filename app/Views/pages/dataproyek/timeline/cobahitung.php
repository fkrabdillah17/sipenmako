<div class="container">
    <h1>Daftar Nilai Pengembangan Web Dasar</h1>
    <table id="nilai">
        <tr>
            <th>No</th>
            <th>Nama Murid</th>
            <th>Nama Pelajaran</th>
            <th>Nilai</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($timeline as $data) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>Anto</td>
                <td>HTML & CSS</td>
                <td><?= $data['jmlharga']; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
    <p id="hasil"></p>

</div>
<script>
    var table = document.getElementById("nilai"),
        sumHsl = 0;
    for (var t = 1; t < table.rows.length; t++) {
        sumHsl = sumHsl + parseInt(table.rows[t].cells[3].innerHTML);
    }
    document.getElementById("hasil").innerHTML = "Sum Value = " + sumHsl;
</script>

<style>
    .container {
        width: 600px;
        margin: auto;
        text-align: center;
    }

    table {
        margin: auto;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
    }

    span {
        font-weight: bold;
        margin-left: 170px;
    }
</style>