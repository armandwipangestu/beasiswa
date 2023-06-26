<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <?= form_error('status_hidup', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

        <a href="#" data-toggle="modal" data-target="#modalStatusHidupBaru" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-plus"></i> Tambah Status Hidup Baru</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Status Hidup</th>
                        <th scope="col" class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($status_hidup as $sh) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $sh['status_hidup']; ?></td>
                            <td>
                                <a href="#" onclick="ubah(<?= $sh['id'] ?>)" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism hapus" data-id="<?= $sh['id'] ?>" data-url="<?= base_url('status/hapus_status_hidup') ?>" data-hidup="<?= $sh['status_hidup'] ?>"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="modalStatusHidupBaru" tabindex="-1" role="dialog" aria-labelledby="modalStatusHidupBaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="newModalStatusHidupBaru">Tambah Status Hidup Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('status/hidup') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_hidup" class="form-label">Nama Status Hidup</label>
                        <input type="text" class="form-control" id="status_hidup" name="status_hidup">
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
<div class="modal fade" id="modalStatusHidupUbah" tabindex="-1" role="dialog" aria-labelledby="modalStatusHidupUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title modal-ubah text-dark" id="newModalStatusHidupUbah"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('status/ubah_status_hidup') ?>" method="POST">
                <input type="hidden" class="form-control" id="idUbah" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_hidup_ubah" class="form-label">Nama Status Hidup</label>
                        <input type="text" class="form-control" id="status_hidup_ubah" name="status_hidup">
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
        $.get(`${baseUrl}status/get_status_hidup/${id}`, (data) => {
            const status_hidup = $.parseJSON(data)
            // console.log(status_hidup)

            $('.modal-ubah').text('Ubah Status Hidup')
            $('#idUbah').val(status_hidup.id);
            $('#status_hidup_ubah').val(status_hidup.status_hidup);
            $('#modalStatusHidupUbah').modal('show');
        })
    }

    const hapusMenu = document.querySelectorAll('.hapus')
    hapusMenu.forEach((hm) => {
        hm.addEventListener('click', () => {
            const dataId = hm.dataset.id
            const dataUrl = hm.dataset.url
            const dataHidup = hm.dataset.hidup
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus <b>${dataHidup}</b>?`,
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