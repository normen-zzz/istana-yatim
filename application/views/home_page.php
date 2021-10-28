      <!-- Hero -->
      <section id="hero">
          <div class="container py-5">
              <div class="row">
                  <div class="col hero-kiri py-5 my-auto">
                      <h1 class="display-1" style="font-weight: 500">Yayasan moslem the castilla</h1>
                      <p>Asrama istana yatim.</p>
                      <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-kiri me-3 px-5 py-2">Donasi</button>
                          <button type="button" class="btn btn-kanan px-5 py-2">Konfirmasi</button>
                      </div>
                  </div>
                  <div class="col-6 py-4">
                      <img class="border-bottom" src="<?= base_url('assets/frontend/') ?>img/landing page/hero/hero.png" alt="" />
                  </div>
              </div>
          </div>
      </section>
      <!-- Hero End -->

      <!-- Content -->
      <section id="content">
          <div class="container py-5">
              <div class="row">
                  <div class="col-md-7">
                      <p>Asrama istana yatim</p>
                      <h2>Salurkan bantuanmu demi <span class="judul">Masa depan anak anak kami.</span></h2>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">
                      <img class="py-5" src="<?= base_url('assets/frontend/') ?>img/landing page/content/bg.jpg" alt="" />
                  </div>
                  <div class="col my-auto">
                      <p>Asrama istana yatim adalah asrama bagi adik-adik yang kurang beruntung, khususnya anak yatim. Di Yayasan Moslem Keluarga Castilla, nantinya anak-anak ini akan dipandu demi menggapai masa depan yang lebih baik.</p>
                      <a class="text-dark" href="#">Baca selengkapnya..</a>
                      <h4 class="pt-5">Frequently Asked Question</h4>
                      <div class="dropdown bg-light my-2 d-grid gap-2">
                          <button class="dropdown-content p-2 dropdown-toggle text-start" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Donasi akan digunakan untuk apa?</button>
                          <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton1">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam hic fugiat assumenda distinctio, a blanditiis eius, neque ratione quas aliquam tempore facilis dignissimos modi saepe porro, illum esse facere ipsum.</p>
                          </ul>
                      </div>
                      <div class="dropdown bg-light my-2 d-grid gap-2">
                          <button class="dropdown-content p-2 dropdown-toggle text-start" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Donasi akan digunakan untuk apa?</button>
                          <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton1">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam hic fugiat assumenda distinctio, a blanditiis eius, neque ratione quas aliquam tempore facilis dignissimos modi saepe porro, illum esse facere ipsum.</p>
                          </ul>
                      </div>
                      <div class="dropdown bg-light my-2 d-grid gap-2">
                          <button class="dropdown-content p-2 dropdown-toggle text-start" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Donasi akan digunakan untuk apa?</button>
                          <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton1">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam hic fugiat assumenda distinctio, a blanditiis eius, neque ratione quas aliquam tempore facilis dignissimos modi saepe porro, illum esse facere ipsum.</p>
                          </ul>
                      </div>
                      <div class="dropdown bg-light my-2 d-grid gap-2">
                          <button class="dropdown-content p-2 dropdown-toggle text-start" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Donasi akan digunakan untuk apa?</button>
                          <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton1">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam hic fugiat assumenda distinctio, a blanditiis eius, neque ratione quas aliquam tempore facilis dignissimos modi saepe porro, illum esse facere ipsum.</p>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Content End -->

      <!-- Cerita -->
      <section id="cerita">
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
                                      <a href="#" class="btn btn-kanan">Baca Cerita</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <? } ?>
              </div>
              <div class="row">
                  <div class="col text-end">
                      <a href="#" class="judul">Lihat semua <i class="bi bi-arrow-right"></i></a>
                  </div>
              </div>
          </div>
      </section>
      <!-- Cerita End -->

      <!-- Content-2 -->
      <section id="content2">
          <div class="container py-5">
              <div class="row">
                  <div class="col-md-6">
                      <p>Saling membantu</p>
                      <h3>Bantu adik-adik yang <span class="judul"> kurang beruntung</span> untuk <span class="judul"> menuju masa depan.</span></h3>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 p-5 bg-cerita2">
                      <img class="p-4 cerita2" src="<?= base_url('assets/frontend/') ?>img/landing page/content/bg.jpg" alt="" />
                  </div>
                  <div class="col my-auto">
                      <div id="button-donasi">
                          <h2>27 anak butuhh pertolonganmu, orang-orang baik.</h2>
                          <p class="pb-3">
                              Asrama istana yatim adalah asrama bagi adik-adik yang kurang beruntung, khususnya anak yatim. Di Yayasan Moslem Keluarga Castilla, nantinya anak-anak ini akan dipandu demi menggapai masa depan yang lebih baik.
                          </p>
                          <a href="#" class="text-dark">Cek hasil donasi</a>
                      </div>
                      <div class="btn-group pt-5" role="group" aria-label="Basic example">
                          <button type="button" class=" btn btn-kiri me-3 px-5 py-2">Donasi</button>
                          <button type="button" class="btn btn-kanan px-5 py-2">Konfirmasi</button>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Content-2 End -->

      <!-- Cerita -->
      <section id="cerita-santri">
          <div class="container py-5">
              <div class="row">
                  <div class="col text-center">
                      <p class="text-secondary">Cerita santri</p>
                      <h2>Mereka <span class="judul">Butuh</span> Bantuanmu</h2>
                  </div>
              </div>
              <?php foreach($ceritasantri as $data) { ?> 
                <div class="row pembungkus-card pt-5">
                  <div class="col-lg-4 my-2">
                      <div class="card card-cerita">
                          <img src="<?= base_url('assets/frontend/') ?>img/landing page/cerita/Rectangle 41 (1).jpg" class="card-img-top" alt="..." />
                          <div class="card-body">
                              <p class="card-text text-secondary">19 Desember 2021</p>
                              <h5 class="card-title">Norman dan mimpinya</h5>
                              <p class="card-text text-secondary">
                                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium officia nisi, obcaecati quidem earum itaque, maxime error nihil ducimus accusamus sint molestias repellat veritatis hic atque nemo amet blanditiis
                                  inventore.
                              </p>
                              <div class="d-grid gap-2">
                                  <a href="#" class="btn btn-kanan">Baca Cerita</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php } ?>
              <div class="row pt-5">
                  <div class="col text-center">
                      <button type="button" class="btn btn-kiri px-5 py-2">Selengkapnya</button>
                  </div>
              </div>
          </div>
      </section>
      <!-- Cerita End -->

      <!-- Patner -->
      <section id="patner">
          <div class="container py-5">
              <div class="row">
                  <div class="col">
                      <p>Patner Kami</p>
                      <h2>Saling membantu.</h2>
                      <h2>Saling membahu.</h2>
                  </div>
              </div>
              <div class="row pembungkus-patner pt-5">
                  <div class="col-lg-3 my-auto">
                      <img src="<?= base_url('assets/frontend/') ?>img/landing page/patner/58480fd7cef1014c0b5e4943 1.jpg" alt="" />
                  </div>
                  <div class="col-lg-3 my-auto">
                      <img src="<?= base_url('assets/frontend/') ?>img/landing page/patner/image 3.jpg" alt="" />
                  </div>
                  <div class="col-lg-3 my-auto">
                      <img src="<?= base_url('assets/frontend/') ?>img/landing page/patner/image 4.jpg" alt="" />
                  </div>
                  <div class="col-lg-3 my-auto">
                      <img src="<?= base_url('assets/frontend/') ?>img/landing page/patner/image 5.jpg" alt="" />
                  </div>
              </div>
          </div>
      </section>
      <!-- Patner End -->

      <!-- Kontak -->
      <section class="pb-5" id="kontak">
          <div class="container py-5">
              <div class="row bg-kontak">
                  <div class="col text-white my-auto p-5">
                      <p>Call center</p>
                      <h3>(0351) 1117-555</h3>
                      <p>Email</p>
                      <h3>support@istanayatim.id</h3>
                  </div>
                  <div class="col p-0">
                      <img src="<?= base_url('assets/frontend/') ?>img/landing page/kontak/kate-hliznitsova-HAwJDL4X2q8-unsplash_adobespark 1.png" alt="" />
                  </div>
              </div>
          </div>
      </section>
      <!-- Kontak End -->