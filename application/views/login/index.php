
    <div class="container">
        <di class="row justify-content-center mx-auto mt-5">
            <div class="col-lg-6 mt-5">
            <form action="<?= base_url('login/index'); ?>" method="post">
                <div class="card border-dark shadow mt-3">
                    <div class="card-header bg-dark text-light text-center">Login Page</div>
                <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_error('nis','</small class="text-danger">','</small>') ?>
                    <input type="text" name="nis" id="nis" placeholder="NIS" class="form-control">
                <?= form_error('nama','</small class="text-danger">','</small>') ?>
                    <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control mt-3">
                    <div class="row justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                </div>
</form>
            </div>
        </div>
    </div>
