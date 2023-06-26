<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <a href="<?= base_url(); ?>" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Nama Mahasiswa</th>
                        <th scope="col" class="text-dark">Status</th>
                        <th scope="col" class="text-dark">Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($nama_pengajuan as $np) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $np['nama'] ?></td>
                            <td><span class="badge badge-warning neu-brutalism"><?= $np['status_pengajuan'] ?></span></td>
                            <td>
                                <a href="#" onclick="lihat('<?= $np['id'] ?>')" class="btn btn-primary neu-brutalism">
                                    <i class="fas fa-fw fa-search mr-1"></i>
                                    Lihat
                                </a>
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
<div class="modal fade" id="modalDetailDokumen" tabindex="-1" role="dialog" aria-labelledby="modalDetailDokumenLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="newModalDetailDokumen"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role') ?>" method="POST">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 p-2 p-md-3">
                            <div class="card bg-warning neu-brutalism">
                                <div class="card-header d-flex" style="border-bottom-color: #000;">
                                    <h4 class="text-dark">Informasi Biodata</h4>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control neu-brutalism-border nama" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control neu-brutalism-border tempat_lahir" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control neu-brutalism-border tanggal_lahir" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control neu-brutalism-border alamat" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="text" class="form-control neu-brutalism-border no_telepon" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control neu-brutalism-border jenis_kelamin" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <input type="text" class="form-control neu-brutalism-border jurusan" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="text" class="form-control neu-brutalism-border semester" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas Program</label>
                                        <input type="text" class="form-control neu-brutalism-border kelas_program" value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6 p-0 p-md-3">
                            <div class="card bg-success neu-brutalism">
                                <div class="card-header d-flex" style="border-bottom-color: #000;">
                                    <h4 class="text-dark">Informasi Prestasi</h4>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kegiatan</label>
                                        <input type="text" class="form-control neu-brutalism-border nama_kegiatan" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kegiatan</label>
                                        <input type="text" class="form-control neu-brutalism-border jenis_kegiatan" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Tingkat</label>
                                        <input type="text" class="form-control neu-brutalism-border tingkat" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="text" class="form-control neu-brutalism-border tahun" value="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Pencapaian</label>
                                        <input type="text" class="form-control neu-brutalism-border pencapaian" value="" disabled>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm">Scan Sertifikat</div>
                                        <div class="col-sm-12">
                                            <img src="" class="img-thumbnail img-preview neu-brutalism w-100 scan_sertifikat">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary neu-brutalism" id="submit"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url() ?>`

    const lihat = (id) => {
        $.get(`${baseUrl}master/get_dokumen/${id}`, (data) => {
            const dokumen = $.parseJSON(data)
            console.log(dokumen)

            // Biodata
            $('.modal-title').text(`Dokumen Pengajuan '${dokumen.nama}'`)
            $('.nama').val(dokumen.nama)
            $('.tempat_lahir').val(dokumen.tempat_lahir)
            $('.tanggal_lahir').val(dokumen.tanggal_lahir)
            $('.alamat').val(dokumen.alamat)
            $('.no_telepon').val(dokumen.no_telepon)
            $('.jenis_kelamin').val(dokumen.jenis_kelamin)
            $('.jurusan').val(dokumen.jurusan)
            $('.semester').val(dokumen.semester)
            $('.kelas_program').val(dokumen.kelas_program)

            // Prestasi
            $('.nama_kegiatan').val(dokumen.nama_kegiatan)
            $('.jenis_kegiatan').val(dokumen.jenis_kegiatan)
            $('.tingkat').val(dokumen.tingkat)
            $('.tahun').val(dokumen.tahun)
            $('.pencapaian').val(dokumen.pencapaian)
            $('.scan_sertifikat').attr("src", `${baseUrl}assets/img/sertifikat/${dokumen.scan_sertifikat}`)

            $('#modalDetailDokumen').modal('show');
        })
    }
</script>