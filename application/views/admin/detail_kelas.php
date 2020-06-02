<div class="main-panel">
    <div class="content-wrapper">
    <?php
    $id = $kelas['id'];
        $jml = $this->db->get_where('tbl_siswa',['id_kelas' => $id])->num_rows();
    ?>
        <h3 class="text-center">Kelas <?= $kelas['kelas']; ?></h3> 
            <small class="text-muted">Wali Kelas : <?= $kelas['walikelas']; ?></small><br>
            <small class="text-muted">Jumlah Siswa :  <?= $jml; ?></small><br>
            <div class="row justify-content-end">
            <button class="btn btn-info btn-rounded" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"> Tambah Siswa </i></button>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
<?php if(empty($siswa)) : ?>
<p class="text-danger text-center">Tidak ada data</p>
<?php endif; ?>

<?php if(!empty($siswa)) : ?>
        <div class="row mt-3">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Nis</th>
                            <th>Nama Lengkap</th>
                            <th>Sudah Memilih</th>
                            <th>Yang Dipilih</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach($siswa as $s): ?>
                        <tr>
                            <td><?= $s['nis']; ?></td>
                            <td><?= $s['nama']; ?></td>
                            <td><?= $s['memilih']; ?></td>
                            <td><?= $s['dipilih']; ?></td>
                            <td>
                            <li class="nav-item dropdown d-flex mr-4 ">
                                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="icon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <a class="dropdown-item preview-item" href="<?= base_url('admin/edit_siswa/') . $s['nis']; ?>">               
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a class="dropdown-item preview-item"  href="<?= base_url('admin/hapus_siswa/') . $s['nis']; ?>" onclick="return confirm('Apakah anda yakin?');">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                                </div>
                            </li>
                            </td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php endif; ?>
    </div>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content border-success">
      <form method="post" action="<?= base_url('admin/tambah_siswa'); ?>">
        <div class="modal-header bg-success text-light">
          <h4 class="modal-title">Tambah Siswa</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" name="id_kls" value="<?= $kelas['id']; ?>">
          <p>Nis</p>
          <input type="text" name="nis" id="nis" autocomplete="off" class="form-control">
          <p>Nama Siswa</p>
          <input type="text" name="siswa" id="siswa" autocomplete="off" class="form-control">
        </div>
        <div class="modal-footer bg-success text-light">
          <button data-dismiss="modal" class="btn btn-dark btn-rounded" type="button">Cancel</button>
          <button class="btn btn-info btn-rounded" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>