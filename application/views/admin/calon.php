
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="text-center">Calon</h3>
          <?= $this->session->flashdata('pesan'); ?>
          <div class="row justify-content-end mb-2">
            <button class="btn btn-info btn-rounded" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"> Tambah Calon</i></button>
          </div> 
          <div class="row justify-content-center">
          <?php foreach ($calon as $c):?>
            <div class="col-lg-6">
                <div class="card border-info mt-3">
                    <div class="card-header bg-info text-light">
                        <h4 class="text-center"><?= $c['no_urut']; ?></h4>
                    </div>
                    <div class="card-body">
                        <img src="<?= base_url('asset/img/') . $c['img']; ?>" alt="gambar" class="img-thumbnail">
                        <h4 class="text-center mt-2"><?= $c['nama']; ?></h4>
                        <div class="row justify-content-end">
                      <a href="<?= base_url('admin/hapus_calon/') . $c['no_urut']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin');"><i class="fa fa-pencil"> Hapus</i></a>
                      <a href="<?= base_url('admin/edit_calon/') . $c['no_urut']; ?>" class="badge badge-info ml-1"><i class="fa fa-pencil"> Edit</i></a>
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
      <?= form_open_multipart('admin/calon'); ?>
        <div class="modal-header bg-success text-light">
          <h4 class="modal-title">Tambah Calon</h4>
        </div>
        <div class="modal-body">
          <p>No Urut</p>
          <input type="text" name="no" id="no" autocomplete="off" class="form-control">
          <p>Nama Calon</p>
          <input type="text" name="nama" id="nama" autocomplete="off" class="form-control">
          <p>Foto</p>
          <input type="file" name="img" id="img" class="form-control">
        </div>
        <div class="modal-footer bg-success text-light">
          <button data-dismiss="modal" class="btn btn-dark btn-rounded" type="button">Cancel</button>
          <button class="btn btn-info btn-rounded" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>