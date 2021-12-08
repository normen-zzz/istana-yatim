<?php

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<section class="py-5" id="status">
    <div class="container pb-5">
        <div class="row">
            <div class="col pt-5">
                <h1>Terimakasih <span class="judul">Orang-orang baik</span></h1>
                <p class="text-secondary">Berikut hasil donasi yang kami terima pada bulan <?= strftime('%B') ?> :</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>Jumlah Pengeluaran bulan ini (<?= strftime('%B') ?>)</p>
            </div>
            <div class="col-md">
                <p> <?= rupiah($donasiperbulan->total) ?></p>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <p>Pengeluaran Donasi Bulan Ini :</p>
            </div>
            <div class="col-md">
                <p><?= rupiah($pengeluarandonasiperbulan->total) ?></p>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <p>Saldo Donasi Terkini :</p>
            </div>
            <div class="col-md">
                <p> <?= rupiah($infodonasi['jumlah_update']) ?></p>
            </div>
        </div>

        <section id="cerita">
            <div class="container py-5">
                <div class="row">
                    <div class="col text-center">
                        <h4 class="text-prirmary">Pengeluaran bulan ini</h4>
                    </div>
                </div>
                <div class="row pembungkus-card pt-5">
                    <?php foreach ($pengeluarandonasi as $data) { ?>
                        <div class="col-lg-4 my-2">
                            <div class="card card-cerita">
                                <img src="<?= base_url('assets/images/pengeluarandonasi/') . $data['img_pengeluaran'] ?>" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <p class="card-text text-secondary"><?= $data['judul_pengeluaran'] ?></p>
                                    <h5 class="card-title"><?= strftime("%A %d %h %Y", strtotime($data['tanggal_pengeluaran'])) ?></h5>
                                    <!-- <p class="card-text text-secondary">
                                        <?= $data->tema_donasi ?>
                                    </p> -->
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-kiri">Donasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </section>
    </div>
</section>