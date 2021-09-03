<?php
$id = $_GET['id_rekrutmen'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_rekrutmen WHERE id_rekrutmen='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

  <div class="container">
    <div class="card shadow mb-4">
      <h5 class="card-header text-center">Data Rekrutmen</h5>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Pelamar</th>
                <th>Nama Pelamar</th>
                <th>Detail</th>
              </tr>
            </thead>
            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tb_pelamar WHERE id_rekrutmen='$id'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
              <tbody>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d['kode_pelamar']; ?></td>
                  <td><?= $d['nama_pelamar']; ?></td>
                  <td>
                    <a href='?page=rekrutmen&act=pelamar&id_pelamar=<?= $d['id_pelamar']; ?>' class="btn btn-success text-white text-right"><i class="fas fa-address-card text-white"></i></a>
                  </td>

                </tr>

              <?php
            }
              ?>
            <?php
          }
            ?>
            </tr>
            </tr>
        </div>
        </tbody>
        </table>
      </div>
    </div>
  </div>