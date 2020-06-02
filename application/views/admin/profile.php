
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h3 class="text-center">Profile</h3>
        <?= $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-lg-12">
                <div class="card mb-3 shadow border-dark">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="<?= base_url('asset/img/') . $user['img']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama'] ?></h5>
                            <p class="card-text"><?= $user['username']; ?></p>
                            <p class="card-text"><small class="text-muted">Administrator</small></p>
                        </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mr-4 mb-3">
                            <a href="<?= base_url('admin/index'); ?>" class="btn btn-primary btn-rounded mr-2">Kembali ke Dashboard</a>
                                <a href="<?= base_url('admin/settings'); ?>" class="btn btn-info btn-rounded">Settings</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
       