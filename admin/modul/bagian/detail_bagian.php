<?php
$id = $_GET['id_bagian'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_bagian WHERE id_bagian='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <div class="container">
        <div class="card shadow mb-4">
            <h5 class="card-header text-center">Bagian <?php echo $d['nama_bagian'];  ?></h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th width="30%">Kode Karyawan</th>
                                <th width="50%">Nama Karyawan</th>
                            </tr>
                        </thead>
                </div>

                <?php
                $no = 1;
                // $data = mysqli_query($koneksi,"SELECT * FROM tb_karyawan");
                $data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_bagian='$id'");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['kode_karyawan']; ?></td>
                            <td><?php echo $d['nama_karyawan']; ?></td>
                        </tr>
                <?php
                }
            }
                ?>
                </tr>
            </div>
            </tbody>
            </table>
        </div>