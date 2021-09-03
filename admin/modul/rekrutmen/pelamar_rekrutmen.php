<?php
$id = $_GET['id_pelamar'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_pelamar WHERE id_pelamar='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <div class="container mt-3">
        <div class="card">
            <h5 class="card-header text-center">Profil Pelamar</h5>
            <div class=" card-body">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td><?= $d['nama_pelamar'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kode pelamar</th>
                                        <td><?= $d['kode_pelamar'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td><?= $d['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tempat Lahir</th>
                                        <td><?= $d['tempat_lahir'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td><?= $d['tgl_lahir'] ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            <?php
                                            if ($d['status_pelamar'] == "tetap") {
                                                echo "Pelamar Tetap";
                                            } else {
                                                echo "Pelamar Kontrak";
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
                                <img src="/../../../assets/img/pelamar/<?= $d['foto'] ?>" class="img-fluid" style="width:300px;height:350px;" alt="">
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