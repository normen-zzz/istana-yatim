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
        <?php foreach ($pengeluarandonasi as $data) { ?>
            <div class="row">
                <div class="col-md-2">
                    <p>Tanggal Pengeluaran</p>
                </div>
                <div class="col-md">
                    <p><?= $data->tanggal_pengeluaran ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Judul Pengeluaran</p>
                </div>
                <div class="col-md">
                    <p><?= $data->judul_pengeluaran ?></p>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-2">
                    <p>Jumlah pengeluaran:</p>
                </div>
                <div class="col-md">
                    <p><?= $data->jumlah_pengeluaran ?></p>
                </div>
            </div>
            <hr>

        <?php } ?>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-kiri px-5 py-2 mt-4">Donasi</button>
            </div>
        </div>
    </div>
</section>