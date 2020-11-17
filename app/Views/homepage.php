<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>
<div class="pb-4">

    <h1>Sistem Pakar dengan Metode CBR</h1>
    <p>
        Case Based Reasoning (CBR) merupakan suatu metode untuk menyelesaikan masalah dengan berpatokan pada
        kasus sebelumnya.Konsep dari metode case based reasoning ditemukan dari ide untuk menggunakan pengalaman
        – pengalaman yang terdokumentasi untuk menyelesaikan masalah yang baru. Permasalahan baru dapat
        diselesaikan dengan memanfaatkan kembali dan
        mungkin malakukan penyesuaian terhadap permasalahan yang memiliki kesamaan yang telah diselesaikan
        sebelumnya.
    </p>

    <div class="col-12 d-flex justify-content-center">
        <a href="#" class="btn btn-lg mt-4 btn-outline-primary">mulai pengujian <i class="fa fa-external-link-alt"
                style="font-size: 80%;"></i></a>
    </div>
</div>
<?= $this->endSection() ?>