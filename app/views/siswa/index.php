<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Siswa
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/siswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data Siswa..." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h3 class="mt-3">Daftar Siswa</h3>
            <ul class="list-group">
                <?php if (!empty($data['ssw'])) : ?>
                    <?php foreach ($data['ssw'] as $ssw) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $ssw['nama']; ?>
                            <div>
                                <a href="<?= BASEURL; ?>/siswa/detail/<?= $ssw['id']; ?>" class="badge text-bg-primary me-2">detail</a>
                                <a href="<?= BASEURL; ?>/siswa/ubah/<?= $ssw['id']; ?>" class="badge text-bg-warning me-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $ssw['id'] ?>">ubah</a>
                                <a href="" class="badge text-bg-danger" onclick="hapus(<?= $ssw['id'] ?>)">hapus</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Tidak ada data siswa</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/siswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">nisn</label>
                        <input type="number" class="form-control" id="nisn" name="nisn">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">jurusan</label>
                        <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
                            <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat lunak</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Pemasaran">Pemasaran</option>
                            <option value="Design Komunikasi Visual">Design Komunikasi Visual</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function hapus(id) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the desired URL after confirmation
                (window.location.href = "<?= BASEURL; ?>/siswa/hapus/" + id) // Ganti dengan URL tujuan Anda
            }
        });
    }
</script>