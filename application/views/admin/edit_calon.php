
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="text-center">Edit Calon</h3> 
          <?= form_open_multipart('admin/edit_calon/' . $calon['no_urut']); ?>
          <div class="row justify-content-center">
            <div class="col-lg-6 mt-3">
                <p>No Urut</p>
                <?= form_error('no','<small class="text-danger">', '</small>'); ?>
                <input type="text" class="form-control" id="no" name="no" value="<?= $calon['no_urut']; ?>">
            </div>
            <div class="col-lg-6 mt-3">
                <p>Nama</p>
                <?= form_error('nama','<small class="text-danger">', '</small>'); ?>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $calon['nama']; ?>">
            </div>
            <div class="col-lg-6 mt-3">
            <p>Foto</p>
                <input type="file" name="img" id="img" class="form-control">
            </div>
            <div class="col-lg-6 mt-3">
            <p>Foto</p>
                <img src="<?= base_url('asset/img/') . $calon['img']; ?>" alt="gambar" class="img-thumbnail">
            </div>
          </div> 
          <div class="row justify-content-end mt-3">
            <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
            <a href="<?= base_url('admin/calon'); ?>" class="btn btn-dark btn-rounded ml-2">Kembali</a>
          </div>
</form>
        </div>
       