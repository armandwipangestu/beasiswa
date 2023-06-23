<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <?= form_error('status_hubungan', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

        <a href="#" data-toggle="modal" data-target="#modalStatusHubunganBaru" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-plus"></i> Tambah Status Hubungan Baru</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Status Hubungan</th>
                        <th scope="col" class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($status_hubungan as $sh) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $sh['status_hubungan']; ?></td>
                            <td>
                                <a href="#" onclick="ubah(<?= $sh['id'] ?>)" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism hapus" data-id="<?= $sh['id'] ?>" data-url="<?= base_url('status/hapus_status_hubungan') ?>" data-hubungan="<?= $sh['status_hubungan'] ?>"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="modalStatusHubunganBaru" tabindex="-1" role="dialog" aria-labelledby="modalStatusHubunganBaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="newModalStatusHubunganBaru">Tambah Status Hubungan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('status/hubungan') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_hubungan" class="form-label">Nama Status Hubungan</label>
                        <input type="text" class="form-control" id="status_hubungan" name="status_hubungan">
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
<div class="modal fade" id="modalStatusHubunganUbah" tabindex="-1" role="dialog" aria-labelledby="modalStatusHubunganUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title modal-ubah text-dark" id="newModalStatusHubunganUbah"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('status/ubah_status_hubungan') ?>" method="POST">
                <input type="hidden" class="form-control" id="idUbah" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_hubungan_ubah" class="form-label">Nama Status Hubungan</label>
                        <input type="text" class="form-control" id="status_hubungan_ubah" name="status_hubungan">
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
        $.get(`${baseUrl}status/get_status_hubungan/${id}`, (data) => {
            const status_hubungan = $.parseJSON(data)
            // console.log(status_hubungan)

            $('.modal-ubah').text('Ubah Status Hidup')
            $('#idUbah').val(status_hubungan.id);
            $('#status_hubungan_ubah').val(status_hubungan.status_hubungan);
            $('#modalStatusHubunganUbah').modal('show');
        })
    }

    const hapusMenu = document.querySelectorAll('.hapus')
    hapusMenu.forEach((hm) => {
        hm.addEventListener('click', () => {
            const dataId = hm.dataset.id
            const dataUrl = hm.dataset.url
            const dataHubungan = hm.dataset.hubungan
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus <b>${dataHubungan}</b>?`,
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