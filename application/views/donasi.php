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
                <p class="text-secondary">Berikut hasil donasi yang kami terima pada bulan oktober 2021 :</p>
            </div>
        </div>
        <?php foreach ($donasi as $data) { ?>
            <div class="row">
                <div class="col-md-2">
                    <p><?= $data->judul_pengeluaran; ?></p>
                </div>
                <div class="col-md">
                    <p>Rp. 20.000.000</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <p>Jumlah pengeluaran:</p>
                </div>
                <div class="col-md">
                    <p>Rp. 9.000.000</p>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-kiri px-5 py-2">Download report</button>
            </div>
        </div>
    </div>
</section>