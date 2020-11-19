<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>
<script src="assets/js/sweetalert2-all.js"></script>
<div class="card mb-4">
    <div class="card-body">
        <div class="col mb-2 d-flex align-items-center">
            <div class="col-4 d-flex">
                <select onchange="collectData(this)" id="kucing" class="form-control">
                    <option value="def">--Pilih kucing--</option>
                    <?php foreach ($kucing as $k) : ?>
                    <option value="<?= $k['kucing_id']; ?>"><?= "[C-" . $k['kucing_id'] . "] " . $k['kucing_jenis']; ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
            <button onclick="tambah()" class="p-2 px-3 ml-2 btn btn-sm btn-primary">Tambah <i
                    class="fa fa-plus"></i></button>
        </div>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <th>No</th>
                <th>Kode</th>
                <th>Ciri-ciri</th>
                <th>Aksi</th>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
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
    text: "ciri sudah pernah ditambahkan",
})
<?php endif ?>

function tambah() {
    let view = `
    <form class="col-12" action="<?= route_to('hub_save'); ?>" method="post">
            <?php csrf_field(); ?>
            <div class="col-12 d-flex justify-content-between flex-column">
                <div class="form-group col-12 d-flex flex-column align-items-start">
                    <label for="namaf">Jenis Kucing</label>
                    <select name="hub_kucing" required class=" m-2 form-control" id="namaf">
                  <?php foreach ($kucing as $k) : ?> 
                    <option value="<?= $k['kucing_id']; ?>"><?= "[C-" . $k['kucing_id'] . "] " . $k['kucing_jenis']; ?>
                    </option>
                  <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group col-12 d-flex flex-column align-items-start">
                    <label for="namaf">Ciri-ciri</label>
                    <select name="hub_ciri" required class=" m-2 form-control" id="namaf">
                  <?php foreach ($ciri as $k) : ?> 
                    <option value="<?= $k['ciri_id']; ?>"><?= "[K-" . $k['ciri_id'] . "] " . $k['ciri_ciri']; ?>
                    </option>
                  <?php endforeach ?>
                    </select>
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
    fetch('/hub/get/' + id)
        .then(res => res.json())
        .then(res => {
            console.log(res)
            let view = `
            <form class="col-12" action="/hub/edit/` + id + `" method="post">
            <?php csrf_field(); ?>
            <div class="col-12 d-flex justify-content-between flex-column">
                <div class="form-group col-12 d-flex flex-column align-items-start">
                    <label for="namaf">Jenis Kucing</label>
                    <select name="hub_kucing" required class=" m-2 form-control" id="namaf">
                    <option value="${res.hub_kucing}">[C-${res.hub_kucing}] ${res.kucing_jenis}</option>
                  <?php foreach ($kucing as $k) : ?> 
                    <option value="<?= $k['kucing_id']; ?>"><?= "[C-" . $k['kucing_id'] . "] " . $k['kucing_jenis']; ?>
                    </option>
                  <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group col-12 d-flex flex-column align-items-start">
                    <label for="namaf">Ciri-ciri</label>
                    <select name="hub_ciri" required class=" m-2 form-control" id="namaf">
                    <option value="${res.hub_ciri}">[K-${res.hub_ciri}] ${res.ciri_ciri}</option>
                  <?php foreach ($ciri as $k) : ?> 
                    <option value="<?= $k['ciri_id']; ?>"><?= "[K-" . $k['ciri_id'] . "] " . $k['ciri_ciri']; ?>
                    </option>
                  <?php endforeach ?>
                    </select>
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
            fetch('/hub/hapus/' + id)
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

function collectData(sel) {
    tbody = document.getElementById('tbody')
    if (sel.value == 'def') {
        tbody.innerHTML = ""
    } else {
        fetch("/hub/cat/" + sel.value)
            .then(res => res.json())
            .then(res => {
                if (res == false) {
                    tbody.innerHTML = ""
                } else {
                    console.log(res)
                    c = 0
                    tbody.innerHTML = ""
                    res.forEach((v, k) => {
                        c++
                        row = document.createElement("tr")
                        no = document.createElement("td");
                        kode = document.createElement("td");
                        ciri = document.createElement("td");
                        aksi = document.createElement("td");
                        no.innerHTML = c
                        kode.innerHTML = "K-" + v.hub_ciri
                        ciri.innerHTML = v.ciri_nama
                        aksi.innerHTML = `
                        <button class="btn btn-sm btn-outline-success" onclick="edit(${v.hub_id})"><i
                                class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="hapus(${v.hub_id})"><i
                                class="fa fa-trash-alt"></i></button>
                        `
                        row.appendChild(no)
                        row.appendChild(kode)
                        row.appendChild(ciri)
                        row.appendChild(aksi)
                        tbody.appendChild(row)


                    });
                }
            })
    }
}
</script>
<?= $this->endSection() ?>