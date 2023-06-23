<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <?= form_error('status_pendidikan', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

        <a href="#" data-toggle="modal" data-target="#modalStatusPendidikanBaru" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-plus"></i> Tambah Status Pendidikan Baru</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Status Pendidikan</th>
                        <th scope="col" class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($status_pendidikan as $sh) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $sh['status_pendidikan']; ?></td>
                            <td>
                                <a href="#" onclick="ubah(<?= $sh['id'] ?>)" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism hapus" data-id="<?= $sh['id'] ?>" data-url="<?= base_url('status/hapus_status_pendidikan') ?>" data-pendidikan="<?= $sh['status_pendidikan'] ?>"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modalStatusPendidikanBaru" tabindex="-1" role="dialog" aria-labelledby="modalStatusPendidikanBaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="newModalStatusPendidikanBaru">Tambah Status Pendidikan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('status/Pendidikan') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_pendidikan" class="form-label">Nama Status Pendidikan</label>
                        <input type="text" class="form-control" id="status_pendidikan" name="status_pendidikan">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary neu-brutalism" id="submit"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalStatusPendidikanUbah" tabindex="-1" role="dialog" aria-labelledby="modalStatusPendidikanUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title modal-ubah text-dark" id="newModalStatusPendidikanUbah"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('status/ubah_status_pendidikan') ?>" method="POST">
                <input type="hidden" class="form-control" id="idUbah" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_pendidikan_ubah" class="form-label">Nama Status Pendidikan</label>
                        <input type="text" class="form-control" id="status_pendidikan_ubah" name="status_pendidikan">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning neu-brutalism" id="submit"><i class="fas fa-edit"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const baseUrl = `<?= base_url() ?>`

    const ubah = (id) => {
        $.get(`${baseUrl}status/get_status_pendidikan/${id}`, (data) => {
            const status_pendidikan = $.parseJSON(data)
            // console.log(status_pendidikan)

            $('.modal-ubah').text('Ubah Status Pendidikan')
            $('#idUbah').val(status_pendidikan.id);
            $('#status_pendidikan_ubah').val(status_pendidikan.status_pendidikan);
            $('#modalStatusPendidikanUbah').modal('show');
        })
    }

    const hapusMenu = document.querySelectorAll('.hapus')
    hapusMenu.forEach((hm) => {
        hm.addEventListener('click', () => {
            const dataId = hm.dataset.id
            const dataUrl = hm.dataset.url
            const dataPendidikan = hm.dataset.pendidikan
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus <b>${dataPendidikan}</b>?`,
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#5cb85c',
                confirmButtonText: `Ya`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `${dataUrl}/${dataId}`
                }
            })
        })
    })
</script>