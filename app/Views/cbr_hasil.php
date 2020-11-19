<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>
<div class="mb-4 pb-4">
    <?php if ($fhasil > 0) : ?>
    <button onclick="sh()" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-chart-bar"></i>
        perhitungan</button>
    <div id="proses">

        <?php foreach ($tmp as $t) : ?>
        <div class="card m-2">
            <div class="card-body">

                <?= $t['kucing']; ?> <br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                = <?php foreach ($t['data'] as $d) : ?>
                ( 1 x <?= $d['bobot']; ?>) +
                <?php endforeach ?>0 / <?= $t['all']; ?>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                = <?= $t['total'] . " / " . $t['all']; ?>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                = <?= $t['hasil']; ?> <span class="text-danger">(<?= $t['hasil'] * 100; ?>%)</span>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <h1>Hasil: </h1>
    <?php foreach ($arrhasil as $ar) : ?>
    <?php if ($ar['hasil'] == $fhasil) : ?>
    <div class="col-12 m-2 d-flex flex-wrap justify-content-between">
        <span class="col-12"><?= $ar['kucing']; ?> : <b><?= $fhasil; ?></b></span>
        <div class="col-1">
            <img src="/assets/img/<?= $ar['foto']; ?>" class="col-12" alt="">
        </div>
        <div class="col-8">
            <?= $ar['deskripsi']; ?>
        </div>
    </div>
    <!-- <p><?= $ar['foto']; ?></p> -->
    <?php endif ?>
    <?php endforeach ?>

    <?php else : ?>
    Tidak ada data yang cocok <br>
    <a href="<?= route_to('cbr_form'); ?>" class="btn btn-outline-success btn-sm mt-2">kembali</a>
    <?php endif ?>
</div>
<script>
let d = document.getElementById("proses")
d.style.display = "none";
let state = false;

function sh() {
    if (state) {
        state = false;
        d.style.display = "none";
    } else {
        state = true;
        d.style.display = "initial";
    }
}
</script>
<?= $this->endSection() ?>