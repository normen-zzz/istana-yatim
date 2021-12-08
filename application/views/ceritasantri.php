  <!-- Cerita -->
  <section id="cerita" style="margin-top: 60px;">
      <div class="container py-5">
          <div class="row">
              <div class="col text-center">
                  <p class="text-secondary">Cerita santri</p>
                  <h2>Mereka <span class="judul">Butuh</span> Bantuanmu</h2>
              </div>
          </div>
          <div class="row pembungkus-card pt-5">
              <?php foreach ($ceritasantri as $data) { ?>
                  <div class="col-lg-4 my-2">
                      <div class="card card-cerita">
                          <img src="<?= base_url('assets/images/ceritasantri/' . $data->img_ceritasantri) ?>" class="card-img-top" alt="..." />
                          <div class="card-body">
                              <p class="card-text text-secondary"><?= $data->tgl_ceritasantri ?></p>
                              <h5 class="card-title"><?= $data->judul_ceritasantri ?></h5>
                              <p class="card-text text-secondary">
                                  <?= substr($data->isi_ceritasantri, 0, 90) ?>
                              </p>
                              <div class="d-grid gap-2">
                                  <a href="<?= site_url('ceritasantri/view/' . $data->slug_ceritasantri); ?>" class="btn btn-kiri">Baca Cerita</a>
                              </div>
                          </div>
                      </div>
                  </div>
              <? } ?>
          </div>
      </div>
  </section>
  <!-- Cerita End -->