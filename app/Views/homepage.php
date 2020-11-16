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
    <div class="col-12 d-flex justify-content-center mt-4">
        <div class="col-6 bg-dark p-4">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="2500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="col-12 d-flex justify-content-around">
                            <img src="assets/img/jap.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/manx.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/ragdoll.jpeg" class="d-block col-3" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-12 d-flex justify-content-around">
                            <img src="assets/img/angora.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/korat.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/russian.jpeg" class="d-block col-3" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-12 d-flex justify-content-around">
                            <img src="assets/img/abyssinian.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/charteus.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/domestik.jpeg" class="d-block col-3" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-12 d-flex justify-content-around">
                            <img src="assets/img/coon.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/persia.jpeg" class="d-block col-3" alt="...">
                            <img src="assets/img/manx.jpeg" class="d-block col-3" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <a href="#" class="btn btn-lg mt-4 btn-outline-primary">mulai pengujian <i class="fa fa-external-link-alt"
                style="font-size: 80%;"></i></a>
    </div>
</div>
<?= $this->endSection() ?>