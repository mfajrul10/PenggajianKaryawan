<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Form Input Gaji Karyawan</h3>
        </div>
        <div class="card-body">
            <form action="?page=gaji&act=hal" class="form-horizontal form-label-left" method="POST">
                <div class="form-group">
                    <div class="col-sm-12 col-sm-12 col-xs-12 ">
                        <div class="input-group col-md-6">
                            <input type="text" class="typeahead form-control" placeholder="Masukkan Kode Karyawan" required name="kode_karyawan" autofocus=”autofocus” autocomplete="off">
                            <span class="input-group-btn ml-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>