
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="text-center">
            Settings
          </h3>
          <?= $this->session->flashdata('pesan'); ?>
          <?= form_open_multipart('admin/settings'); ?>
          <div class="row justify-content-center">
            <div class="col-lg-6">
            <p>Nama</p>
            <?= form_error('nama','<small class="text-danger">','</small>') ?>
                <input type="text" name="nama" id="nama" placeholder="Nama" value="<?= $user['nama']; ?>" class="form-control">
            </div>
            <div class="col-lg-6">
            <p>Username</p>
            <input type="text" name="username" id="username" placeholder="Username" value="<?= $user['username']; ?>" class="form-control" readonly>
            </div>
            <div class="col-lg-6">
                <p>Image</p>
                <img src="<?= base_url('asset/img/') . $user['img']; ?>" alt="gambar" class="img-thumbnail">
            </div>
            <div class="col-lg-6">
                <p>Upload Foto Baru</p>
                <input type="file" name="img" id="img" class="form-control">
            </div>
          </div>
          <div class="row justify-content-end">
            <button type="button" class="btn btn-success btn-rounded mr-2" data-toggle="modal" data-target="#exampleModal">Ubah Password</button>
                <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
            </div>
            </form>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<form action="<?= base_url('admin/change_pass'); ?>" method="post">
      <div class="modal-body">
        <input type="password" name="pl" id="pl" placeholder="Password Lama" class="form-control">
        <input type="password" name="pb" id="pb" placeholder="Password Baru" class="form-control mt-2">
        <input type="password" name="kpb" id="kpb" placeholder="Konfirmasi Password Baru" class="form-control mt-2">
      </div>
      <div class="modal-footer bg-dark text-light">
        <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-rounded">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
       