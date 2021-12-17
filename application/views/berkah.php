<!-- Berkah -->
<section id="berkah">
          <div class="container py-5">
              <div class="row">
                  <div class="col text-center">
                      <p class="text-secondary">Berkah</p>
                      <h2>Artikel <span class="judul">Istana Yatim</span></h2>
                  </div>
              </div>
              <div class="row pembungkus-card pt-5">
                  <?php foreach ($berkah as $data) { ?>
                      <div class="col-lg-4 my-2">
                          <div class="card card-cerita">
                              <img src="<?= base_url('assets/images/berkah/' . $data->img_berkah) ?>" class="card-img-top" alt="..." />
                              <div class="card-body">
                                  <p class="card-text text-secondary"><?= $data->tgl_berkah ?></p>
                                  <h5 class="card-title"><?= substr($data->judul_berkah, 0,20) ?></h5>
                                  <p class="card-text text-secondary">
                                      <?= substr($data->isi_berkah, 0, 90) ?>
                                  </p>
                                  <div class="d-grid gap-2">
                                      <a href="<?= site_url('berkah/view/' . $data->slug_berkah); ?>" class="btn btn-kanan">Baca Cerita</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php } ?>
              </div>
          </div>
          
      </section>
      <!-- Berkah End -->
