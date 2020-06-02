<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
    <a href="#" class="navbar-brand">Pemilu Online</a>
    <div class="row justify-content-end">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link"><?= $user['nama']; ?></a>
            </li>
        </ul>
        </div>

    </div>
    </div>
</nav>

<div class="container">
<h3 class="text-center"><b>Calon Presiden</b></h3>
    <h5 class="text-center">Masa Jabatan 1945-2021</h5>
    <p class="text-center">Silahkan pilih salah satu dari calon presiden berikut</p>
    <div class="row justify-content-center">
<?php foreach($calon as $c): ?>
        <div class="col-lg-6 mt-3 mb-3">
            <div class="card border-dark shadow">
                <div class="card-header bg-dark text-light text-center"><?= $c['no_urut']; ?></div>
                <div class="card-body">
                    <img src="<?= base_url('asset/img/') . $c['img']; ?>" alt="gambar" class="img-thumbnail">
                    <div class="row justify-content-center bg-dark text-light mt-3">
                        <p><?= $c['nama']; ?></p>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?= base_url('menu/pilih/') . $c['no_urut']; ?>" class="btn btn-primary mt-2">Pilih</a>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>
    </div>
</div>
