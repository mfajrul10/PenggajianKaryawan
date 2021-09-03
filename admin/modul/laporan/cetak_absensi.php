<?php
include '../../../config/koneksi.php';
$dt1 = $_POST["tgl_1"];
$dt2 = $_POST["tgl_2"];
?>
<style>
    body {
        font-family: 'Times New Roman', Times, serif, Geneva, Tahoma, sans-serif;
    }

    h3 {
        font-family: 'Times New Roman', Times, serif, Geneva, Tahoma, sans-serif;
    }
</style>
<center>
    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM tb_aplikasi");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <img src="../../../assets/img/app/<?= $d['foto'] ?>" class="img-thumbnail" style="height: 100px;width: 100px;">
    <?php } ?>
    <br>
    <h3><b>Laporan Absensi Karyawan</b></h3>
    <p><b><?= $d['nama_instansi']; ?></p></b>
    <hr style="font-weight:bold; font-size: 12px;">
</center>

<body>
    <p>Laporan Absensi Karyawan, Periode
        <?php $a = $dt1;
        echo date("d-M-Y", strtotime($a)) ?>
        s/d
        <?php $b = $dt2;
        echo date("d-M-Y", strtotime($b)) ?>
    </p>
    <table width="100%" border="1" style="border-collapse: collapse;" cellpadding="3">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Status Absensi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($_POST["btnCetak"])) {
                $sql_tampil = "SELECT * FROM tb_karyawan INNER JOIN tb_absenkaryawan ON tb_karyawan.id_karyawan = tb_absenkaryawan.id_karyawan WHERE tgl_absensi BETWEEN '$dt1' AND '$dt2' order by tgl_absensi asc";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no = 1;
            while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
            ?>
                <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= date('d-m-Y', strtotime(($data['tgl_absensi']))); ?></td>
                    <td><?= $data['kode_karyawan'] ?> </td>
                    <td><?= $data['nama_karyawan'] ?> </td>
                    <td>
                        <?php
                        if ($data['status_absensi'] == 'hadir') {
                            echo "Hadir";
                        } elseif ($data['status_absensi'] == 'sakit') {
                            echo "Sakit";
                        } elseif ($data['status_absensi'] == 'izin') {
                            echo "Izin";
                        } else {
                            echo "Tidak Hadir";
                        }
                        ?>
                    </td>

                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>


<script>
    window.print();
</script>