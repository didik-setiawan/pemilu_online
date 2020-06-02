
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="text-center">Progres</h3>
          <div class="row justify-content-center">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>No Urut</th>
                            <th>Nama Calon</th>
                            <th>Foto</th>
                            <th>Jumlah Suara</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach($calon as $c): ?>
                        <tr>
                            <td><?= $c['no_urut']; ?></td>
                            <td><?= $c['nama']; ?></td>
                            <td><img src="<?= base_url('asset/img/') . $c['img'] ?>" alt="gambar"></td>
                            <td><?= $c['jml_suara']; ?></td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
       