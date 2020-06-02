
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <h3 class="text-center">Edit Siswa</h3>
            <form action="<?= base_url('admin/edit_siswa/') . $siswa['nis']; ?>" method="post">
            <div class="row justify-content-center">
            <div class="col-lg-6">
                <p>NIS</p>
                <?= form_error('nis','<small class="text-danger">','</small>'); ?>
                <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>">
            </div>
            <div class="col-lg-6">
                <p>Nama Siswa</p>
                <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>">
            </div>
          </div>
          <div class="row justify-content-end mt-3">
            <button type="submit" class="btn btn-info btn-rounded">Simpan</button>
          </div>
          </form>
        </div>
        
       