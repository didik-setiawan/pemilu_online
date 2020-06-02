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
            <li class="nav-item">
                <a class="btn btn-info" href="<?= base_url('menu/logout'); ?>">Logout</a>
            </li>
        </ul>
        </div>

    </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-3">
            <h3 class="text-center"><b>Terima Kasih Telah Memilih</b></h3>
            <p class="text-center">Hak suara anda sangat berarti bagi kami</p>
        </div>
    </div>
</div>