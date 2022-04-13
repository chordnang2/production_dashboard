<h1>Data Siswa</h1>
<hr>
<a href="<?php echo base_url("Isi_bd_dispatch/export"); ?>">Export ke Excel</a><br><br>
<table border="1" cellpadding="8">
    <tr>
        <th>TANGGAL</th>
        <th>SHIFT</th>
        <th>NOMER UNIT</th>
        <th>PROBLEM</th>
        <th>AKTIFITAS</th>
        <th>PREPARATION</th>
        <th>START</th>
        <th>OUT</th>
        <th>OPERASI</th>
        <th>HM</th>
        <th>KM</th>
        <th>LOCATION</th>
    </tr>
    <?php
    if (!empty($siswa)) { // Jika data pada database tidak sama dengan empty (alias ada datanya)
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa dari controller
            echo "<tr>"; ?>
            <td><?php echo $pengguna->tanggal; ?></td>
            <td><?php echo $pengguna->shift; ?></td>
            <td><?php echo $pengguna->no_unit; ?></td>
            <td><?php echo $pengguna->problem; ?></td>
            <td><?php echo $pengguna->aktivity; ?></td>
            <td><?php echo $pengguna->preparation; ?></td>
            <td><?php echo $pengguna->start; ?></td>
            <td><?php echo $pengguna->time_out; ?></td>
            <td><?php echo $pengguna->operasi; ?></td>
            <td><?php echo $pengguna->hm; ?></td>
            <td><?php echo $pengguna->km; ?></td>
            <td><?php echo $pengguna->location; ?></td>

    <?php echo "</tr>";
        }
    } else { // Jika data tidak ada
        echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
    }
    ?>
</table>