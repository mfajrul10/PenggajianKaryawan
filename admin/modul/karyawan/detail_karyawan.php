<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header text-center">
                Data Karyawan
            </div>
            <div class=" card-body">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td><?= $d['nama_karyawan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kode Karyawan</th>
                                        <td><?= $d['kode_karyawan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bagian</th>
                                        <td><?php $bagian = mysqli_query($koneksi, "SELECT * FROM tb_bagian INNER JOIN tb_karyawan ON tb_bagian.id_bagian = tb_karyawan.id_bagian WHERE id_karyawan='$id'");
                                            while ($b = mysqli_fetch_array($bagian)) {
                                                echo $b['nama_bagian']
                                            ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            <?php
                                            if ($d['status_karyawan'] == "tetap") {
                                                echo "Karyawan Tetap";
                                            } else {
                                                echo "Karyawan Kontrak";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card col-4">
                        <div class="container">
                            <?php
                            if ($d['foto'] == '') {
                            ?>
                                <img src="assets/img/guru/user.png" class="img-fluid" style="width:300px;height:300px;" alt="">
                            <?php
                            } else {
                            ?>
                                <img src="../assets/img/karyawan/<?= $d['foto'] ?>" class="img-fluid" style="width:300px;height:350px;" alt="">
                            <?php
                            }
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>