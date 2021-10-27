  <section class="py-5" id="tentang">
      <div class="container py-5">
          <div class="row">
              <div class="col text-center mt-4 mb-4">
                  <h1>Tentang <span class="judul">Istana Yatim</span></h1>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <img src="<?= base_url('assets/images/tentang/') . $tentang->img_tentang ?>" alt="" />
              </div>
              <div class="col pt-5">
                  <p>
                      <?= $tentang->text_tentang ?>
                  </p>
              </div>
          </div>
      </div>
  </section>