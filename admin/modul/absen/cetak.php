<?PHP error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'sim2');
?>
<?php
session_start();

if (@$_SESSION['admin']) {
?>
    <?php
    if (@$_SESSION['admin']) {
        $sesi = @$_SESSION['admin'];
    }
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin = '$sesi'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_array($sql);

    ?>
    <!DOCTYPE html>
    <html>

    <body>

        <center>

            <h2>Laporan Absensi Karyawan</h2>

        </center>
        <table border="1" style="width: 100%">
            <tr>
                <th>No</th>
                <th>Kode Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
            <?php
            $no = 1;
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['kode_karyawan']; ?></td>
                    <td><?= $data['nama_karyawan']; ?></td>
                </tr>
            <?php
            }
            ?>
        <?php
    }
        ?>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td align="right" colspan="6" rowspan="" headers="">
                    <p><?= date(" d F Y") ?></p>
                    <p> Pimpinan </p>
                    <br> <br>
                    <p><?= $data['nama_admin']; ?><br>
                        ---------------------------------- </p>
                </td>
            </tr>
        </table>

        <script>
            window.print();
        </script>

    </body>

    </html>