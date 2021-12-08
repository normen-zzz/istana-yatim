  <!-- Cerita -->
  <section id="cerita" style="margin-top: 60px;">
      <div class="container py-5">
          <div class="row">
              <div class="col text-center">
                  <p class="text-secondary">Event Istana Yatim</p>
                  <h2>Ikuti event menarik yang ada di <span class="judul">Istana Yatim</span></h2>
              </div>
          </div>
          <div class="row pembungkus-card pt-5">
              <?php foreach ($event as $data) { ?>
                  <div class="col-lg-4 my-2">
                      <div class="card card-cerita">
                          <img src="<?= base_url('assets/images/acara/' . $data->img_acara) ?>" class="card-img-top" alt="..." />
                          <div class="card-body">
                              <p class="card-text text-secondary"><?= $data->tgl_acara ?></p>
                              <h5 class="card-title"><?= $data->nama_acara ?></h5>
                              <p class="card-text text-secondary">
                                  <?= $data->tema_acara ?>
                              </p>
                              <div class="d-grid gap-2">
                                  <a href="#" class="btn btn-kiri">Ikuti Event</a>
                              </div>
                          </div>
                      </div>
                  </div>
              <? } ?>
          </div>
      </div>
  </section>
  <!-- Cerita End -->