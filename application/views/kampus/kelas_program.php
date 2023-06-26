<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <?= form_error('kelas_program', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

        <a href="#" data-toggle="modal" data-target="#modalKelasProgramBaru" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-plus"></i> Tambah Kelas Program Baru</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Kelas Program</th>
                        <th scope="col" class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($kelas_program as $kp) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $kp['kelas_program']; ?></td>
                            <td>
                                <a href="#" onclick="ubah(<?= $kp['id'] ?>)" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism hapus" data-id="<?= $kp['id'] ?>" data-url="<?= base_url('kampus/hapus_kelas_program') ?>" data-kelas="<?= $kp['kelas_program'] ?>"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="modalKelasProgramBaru" tabindex="-1" role="dialog" aria-labelledby="modalKelasProgramBaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="newModalKelasProgramBaru">Tambah Kelas Program Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kampus/kelas_program') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="kelas_program" class="form-label">Nama Kelas Program</label>
                        <input type="text" class="form-control" id="kelas_program" name="kelas_program">
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
<div class="modal fade" id="modalKelasProgramUbah" tabindex="-1" role="dialog" aria-labelledby="modalKelasProgramUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title modal-ubah text-dark" id="newmodalKelasProgramUbah"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kampus/ubah_kelas_program') ?>" method="POST">
                <input type="hidden" class="form-control" id="idUbah" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="kelasProgramUbah" class="form-label">Nama Kelas Program</label>
                        <input type="text" class="form-control" id="kelasProgramUbah" name="kelas_program">
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
        $.get(`${baseUrl}kampus/get_kelas_program/${id}`, (data) => {
            const kelas_program = $.parseJSON(data)
            // console.log(jurusan)

            $('.modal-ubah').text('Ubah Kelas Program')
            $('#idUbah').val(kelas_program.id);
            $('#kelasProgramUbah').val(kelas_program.kelas_program);
            $('#modalKelasProgramUbah').modal('show');
        })
    }

    const hapusMenu = document.querySelectorAll('.hapus')
    hapusMenu.forEach((hm) => {
        hm.addEventListener('click', () => {
            const dataId = hm.dataset.id
            const dataUrl = hm.dataset.url
            const dataKelasProgram = hm.dataset.kelas
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus <b>${dataKelasProgram}</b>?`,
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