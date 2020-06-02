
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h3 class="text-center">Daftar Kelas</h3>
        <div class="row justify-content-end">
            <button class="btn btn-info btn-rounded" data-toggle="modal" data-target="#myModal">Tambah Kelas <i class="fa fa-plus"></i></button>
        </div>
<?= $this->session->flashdata('pesan'); ?>
          <div class="row">
          <?php foreach($kelas as $k): ?>
            <div class="col-lg-3 mt-3">
                <div class="card border-primary shadow">
                    <div class="card-header bg-primary">
                        <h5 class="text-center text-light">Kelas <?= $k['kelas'] ?></h5>
                    </div>
                    <div class="card-body">
                        <p>Wali kelas : <?=  $k['walikelas']; ?></p>
                        <div class="row justify-content-end">
                            <a href="<?= base_url('admin/edit_kelas/') . $k['id']; ?>"><i class="fa fa-pencil mr-3"></i></a>
                           <a href="<?= base_url('admin/hapus_kelas/') . $k['id']; ?>" onclick="return confirm('Apakah anda yakin');"><i class="fa fa-trash mr-3"></i></a>
                           <a href="<?= base_url('admin/detail_kelas/') . $k['id']; ?>"><i class="icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
          <?php endforeach; ?>
          </div>
        </div>


        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content border-success">
      <form method="post" action="<?= base_url('admin/tambah_kelas'); ?>">
        <div class="modal-header bg-success text-light">
          <h4 class="modal-title">Tambah Kelas</h4>
        </div>
        <div class="modal-body">
          <p>Nama Kelas</p>
          <input type="text" name="kelas" id="kelas" autocomplete="off" class="form-control">
          <p>Nama wali kelas</p>
          <input type="text" name="wali" id="wali" autocomplete="off" class="form-control">
        </div>
        <div class="modal-footer bg-success text-light">
          <button data-dismiss="modal" class="btn btn-dark btn-rounded" type="button">Cancel</button>
          <button class="btn btn-info btn-rounded" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>