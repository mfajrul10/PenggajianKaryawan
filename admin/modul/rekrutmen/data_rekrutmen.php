<div class="container">
  <div class="card shadow mb-4">
    <h5 class="card-header text-center">Data Rekrutmen</h5>
    <div class="card-body">
      <a href="?page=rekrutmen&act=add" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Rekrutmen</a></button>
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Rekrutmen</th>
              <th>Bagian</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>

          <?php
          $no = 1;
          // $data = mysqli_query($koneksi,"SELECT * FROM tb_karyawan");
          $data = mysqli_query($koneksi, "SELECT * FROM tb_rekrutmen INNER JOIN tb_bagian ON tb_rekrutmen.id_bagian = tb_bagian.id_bagian");
          while ($d = mysqli_fetch_array($data)) {
          ?>
            <tbody>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tanggal']; ?></td>
                <td><?php echo $d['nama_bagian']; ?></td>
                <td>
                  <a href="?page=rekrutmen&act=aktif&id_rekrutmen=<?= $d['id_rekrutmen']; ?>" class="btn btn-primary text-white text-right">Aktif</a>
                  <a href="?page=rekrutmen&act=nonaktif&id_rekrutmen=<?= $d['id_rekrutmen']; ?>" class="btn btn-danger text-white text-right">Non Aktif</a>

                  <?php if ($d['aktif'] == 'Y') : {
                      echo '<span" class="badge badge-pill badge-primary">Aktif</span>';
                    }
                  else :
                    echo '<span" class="badge badge-pill badge-danger">Non Aktif</span>';
                  ?>
                  <?php endif ?>
                </td>
                <!--   DETAIL PELAMAR -->
                <td>
                  <a href='?page=rekrutmen&act=detail&id_rekrutmen=<?= $d['id_rekrutmen']; ?>' class="btn btn-success text-white text-right"><i class="fas fa-user-alt fa-1x text-white"></i></a>
                  <a href='?page=rekrutmen&act=del&id_rekrutmen=<?= $d['id_rekrutmen']; ?>' class="btn btn-danger text-white text-right"><i class="fas fa-trash-alt fa-1x text-white"></i></a>
                </td>


              </tr>

            <?php
          }
            ?>
            </tr>
      </div>
      </tbody>
      </table>
    </div>
  </div>
</div>