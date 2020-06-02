
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="text-center">Edit kelas <?= $kelas['kelas']; ?></h3>
          <?= $this->session->flashdata('pesan'); ?>
       <form action="<?= base_url('admin/edit_kelas/') . $kelas['id']; ?>" method="post">
       <div class="row justify-content-center">
            <div class="col-lg-6">
                <p>Nama Kelas</p>
                <?= form_error('kelas','<small class="text-danger">','</small>') ?>
                <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas['kelas']; ?>">
            </div>
            <div class="col-lg-6">
                <p>Wali Kelas</p>
                <?= form_error('wali','<small class="text-danger">','</small>') ?>
                <input type="text" class="form-control" id="wali" name="wali" value="<?= $kelas['walikelas']; ?>">
            </div>
       </div>

       <div class="row justify-content-end mt-3">
            <a href="<?= base_url('admin/kelas'); ?>" class="btn btn-dark btn-rounded mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
       </div>
       </form>
        </div>
       