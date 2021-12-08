<section id="artikel-isi">
    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <h1><span class="judul"> <?= $ceritasantri_item->judul_ceritasantri ?> </span></h1>
                <p><?= $ceritasantri_item->tgl_ceritasantri ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img class="artikel-img" src="<?= base_url('assets/images/ceritasantri/' . $ceritasantri_item->img_ceritasantri) ?>" alt="" />
            </div>
        </div>
        <div class="row pt-5 justify-content-center">
            <div class="col-1">
                <a href="#"><img class="w-50" src="<?= base_url() ?>assets/img/artikel/Facebook.jpg" alt="" /></a>
                <a href="#"><img class="w-50" src="<?= base_url() ?>assets/img/artikel/Instagram.jpg" alt="" /></a>
                <a href="#"><img class="w-50" src="<?= base_url() ?>assets/img/artikel/Twitter.jpg" alt="" /></a>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <?= $ceritasantri_item->isi_ceritasantri ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="cerita">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h3>Cerita baru lainnya</h3>
                    <p class="text-secondary">Asrama istana yatim adalah asrama bagi adik-adik yang kurang beruntung, khususnya anak yatim.</p>
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
</section>