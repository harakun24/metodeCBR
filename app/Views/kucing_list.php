<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>
<style>
.img-show {
    width: 50px;
    transition: cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.5s;
}

.img-show:hover {
    width: 200px
}
</style>
<script src="assets/js/sweetalert2-all.js"></script>
<div class="card">
    <div class="card-body">
        <button onclick="tambah()" style="padding-top:10px;padding-bottom:10px;"
            class="px-4 btn mb-2 btn-sm btn-primary">Tambah <i class="fa fa-plus"></i></button>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <th>Kode</th>
                <th>Jenis</th>
                <th>Foto</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php foreach ($kucing as $k) : ?>
                <tr>
                    <td>C-<?= $k['kucing_id']; ?></td>
                    <td><?= $k['kucing_jenis']; ?></td>
                    <td><img class="img-show" src="assets/img/<?= $k['kucing_foto']; ?>" alt=""></td>
                    <td>
                        <button class="btn btn-sm btn-outline-success" onclick="edit(<?= $k['kucing_id']; ?>)"><i
                                class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="hapus(<?= $k['kucing_id']; ?>)"><i
                                class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?= $pager->links('table', 'user_pager'); ?>
            </div>
        </div>
    </div>
</div>
<script>
<?php if (session()->getFlashData('insert')) : ?>
Swal.fire({
    icon: 'success',
    title: 'Berhasil menambah',
    showConfirmButton: false,
    timer: 950
})
<?php elseif (session()->getFlashData('update')) : ?>
Swal.fire({
    icon: 'success',
    title: 'Berhasil diubah',
    showConfirmButton: false,
    timer: 950
})
<?php elseif (session()->getFlashData('finsert')) : ?>
Swal.fire({
    icon: 'error',
    title: 'Gagal menambah data',
    showConfirmButton: true,
    text: "Jenis sudah pernah ditambahkan",
})
<?php endif ?>

function tambah() {
    let view = `
    <form class="col-12" action="<?= route_to('kucing_save'); ?>" method="post">
            <?php csrf_field(); ?>
            <div class="col-12 d-flex justify-content-between">
                <div class="form-group col-12 d-flex flex-column align-items-start">
                    <label for="nama">Jenis</label>
                    <input type="text" name="kucing_jenis" required class=" m-2 form-control" id="nama">
                </div>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <div class="form-group col-12 d-flex flex-column align-items-start">
                    <label for="namaf">Foto</label>
                    <input type="text" name="kucing_foto" required class=" m-2 form-control" id="namaf">
                </div>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <div class="form-group col-12 d-flex flex-column align-items-start">
                    <label for="namad">Deskripsi</label>
                    <textarea type="text" name="kucing_deskripsi" class=" m-2 form-control" id="namad"></textarea>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="my-2 btn btn-primary">Simpan</button>
            </div>
        </form>
        `;
    Swal.fire({
        title: 'Tambah data',
        showConfirmButton: false,
        html: view,

    })
}

function edit(id) {
    fetch('/kucing/get/' + id)
        .then(res => res.json())
        .then(res => {
            let view = `
        <form class="col-12" action="/kucing/edit/` + id + `" method="post">
        <?php csrf_field(); ?>
        <div class="col-12 d-flex justify-content-between">
            <div class="form-group col-12 d-flex flex-column align-items-start">
                <label for="nama">Jenis</label>
                <input type="text" name="kucing_jenis" value="${res.kucing_jenis}" required class=" m-2 form-control" id="nama">
                <input type="hidden" name="kucing_id" value="` + id + `" required class=" m-2 form-control" id="nama">
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <div class="form-group col-12 d-flex flex-column align-items-start">
                <label for="namaf">Foto</label>
                <input type="text" value="${res.kucing_foto}" name="kucing_foto" required class=" m-2 form-control" id="namaf">
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <div class="form-group col-12 d-flex flex-column align-items-start">
                <label for="namad">Deskripsi</label>
                <textarea type="text" name="kucing_deskripsi" class=" m-2 form-control" id="namad">${res.kucing_deskripsi}</textarea>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="my-2 btn btn-primary">Simpan</button>
        </div>
    </form>

    `;
            Swal.fire({
                title: 'Edit data',
                showConfirmButton: false,
                html: view,

            })
        })

}

function hapus(id) {


    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang dipilih akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, lanjut'
    }).then((result) => {
        if (result.value) {
            fetch('/kucing/hapus/' + id)
                .then(res => res.json())
                .then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil dihapus',
                        showConfirmButton: false,
                        timer: 950
                    }).then(() => {
                        document.location.reload();
                    })
                })
        }
    })
}
</script>
<?= $this->endSection() ?>