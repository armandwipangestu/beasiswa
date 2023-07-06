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
                        <th scope="col" class="text-dark">Tanggal Pengajuan</th>
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
                            <td><?= hari_indonesia($np['tanggal_pengajuan']) ?></td>
                            <?php if ($np['status_pengajuan'] == "Menunggu Pengecekan") : ?>
                                <td><span class="badge badge-danger neu-brutalism"><?= $np['status_pengajuan'] ?></span></td>
                            <?php elseif ($np['status_pengajuan'] == "Dalam Pengecekan") : ?>
                                <td><span class="badge badge-warning neu-brutalism"><?= $np['status_pengajuan'] ?></span></td>
                            <?php elseif ($np['status_pengajuan'] == "Dokumen Diterima") : ?>
                                <td><span class="badge badge-success neu-brutalism"><?= $np['status_pengajuan'] ?></span></td>
                            <?php endif; ?>
                            <td>
                                <a href="#" onclick="lihat('<?= $np['id'] ?>', '<?= $np['id_user'] ?>')" class="btn btn-primary neu-brutalism">
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
                <div class="flex flex-wrap">
                    <h5 class="modal-title text-dark dokumen_user" id="newModalDetailDokumen"></h5>
                    <h6 class="modal-title text-dark tanggal_pengajuan"></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="<?= base_url('admin/role') ?>" method="POST"> -->

            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-6 p-2 p-lg-3">
                        <div class="card bg-warning neu-brutalism h-100">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Biodata</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm">Foto Mahasiswa</div>
                                    <div class="col-sm-12">
                                        <img src="" class="img-thumbnail img-preview neu-brutalism image" style="width: 200px;">
                                    </div>
                                </div>

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
                                    <textarea type="text" class="form-control neu-brutalism-border alamat" style="height: 72px !important;" disabled></textarea>
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
                    <div class=" col-lg-6 p-2 p-lg-3">
                        <div class="card bg-success neu-brutalism h-100">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Prestasi</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm">Scan Sertifikat</div>
                                    <div class="col-sm-12">
                                        <img src="" class="img-thumbnail img-preview neu-brutalism w-100 scan_sertifikat">
                                    </div>
                                </div>

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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 p-2 p-lg-3">
                        <div class="card bg-danger neu-brutalism h-100">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Ayah</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control neu-brutalism-border nama_ayah" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Status Hidup</label>
                                    <input type="text" class="form-control neu-brutalism-border status_hidup_ayah" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Status Hubungan</label>
                                    <input type="text" class="form-control neu-brutalism-border status_hubungan_ayah" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Status Pendidikan</label>
                                    <input type="text" class="form-control neu-brutalism-border status_pendidikan_ayah" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Status Pekerjaan</label>
                                    <input type="text" class="form-control neu-brutalism-border status_pekerjaan_ayah" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Detail Ayah</label>
                                    <textarea type="text" class="form-control neu-brutalism-border detail_ayah" style="height: 72px !important;" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6 p-2 p-lg-3">
                        <div class="card bg-primary neu-brutalism h-100">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Ibu</h4>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control neu-brutalism-border nama_ibu" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Status Hidup</label>
                                    <input type="text" class="form-control neu-brutalism-border status_hidup_ibu" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Status Pendidikan</label>
                                    <input type="text" class="form-control neu-brutalism-border status_pendidikan_ibu" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Status Pekerjaan</label>
                                    <input type="text" class="form-control neu-brutalism-border status_pekerjaan_ibu" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Detail Ibu</label>
                                    <textarea type="text" class="form-control neu-brutalism-border detail_ibu" style="height: 72px !important;" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 p-2 p-lg-3">
                        <div class="card bg-success neu-brutalism h-100">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Jumlah Tanggungan Orang Tua</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jumlah Tanggungan</label>
                                    <input type="text" class="form-control neu-brutalism-border jumlah_tanggungan" value="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>No Telepon Orang Tua</label>
                                    <input type="text" class="form-control neu-brutalism-border no_telepon_orang_tua" value="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6 p-2 p-lg-3">
                        <div class="card bg-warning neu-brutalism h-100">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Data Keluarga</h4>
                            </div>

                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-sm">Foto Bersama Keluarga</div>
                                    <div class="col-sm-12">
                                        <img src="" class="img-thumbnail img-preview neu-brutalism w-100 foto_bersama_keluarga">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button onclick="tolak()" class="btn btn-danger neu-brutalism" id="tolak"><i class="fas fa-fw fa-times"></i> Tolak</button>
                <button onclick="terima()" class="btn btn-success neu-brutalism" id="terima"><i class="fas fa-fw fa-check"></i> Terima</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url() ?>`
    let id_pengajuan, id_user_pengaju

    const lihat = (id, id_user) => {
        id_pengajuan = id
        id_user_pengaju = id_user
        $.get(`${baseUrl}master/get_dokumen/${id_pengajuan}/${id_user_pengaju}`, (data) => {
            const dokumen = $.parseJSON(data)
            console.log(dokumen)

            // Biodata
            const timestamp = dokumen.tanggal_pengajuan
            const d = new Date(timestamp * 1000)

            $('.dokumen_user').text(`Dokumen Pengajuan '${dokumen.nama}'`)
            $('.tanggal_pengajuan').text(`Tanggal Pengajuan: ${d.toLocaleDateString("id")}`)
            $('.image').attr("src", `${baseUrl}assets/img/profile/${dokumen.image}`)
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
            $('.scan_sertifikat').attr("src", `${baseUrl}assets/img/sertifikat/${dokumen.scan_sertifikat}`)
            $('.nama_kegiatan').val(dokumen.nama_kegiatan)
            $('.jenis_kegiatan').val(dokumen.jenis_kegiatan)
            $('.tingkat').val(dokumen.tingkat)
            $('.tahun').val(dokumen.tahun)
            $('.pencapaian').val(dokumen.pencapaian)

            // Ayah
            $('.nama_ayah').val(dokumen.nama_ayah)
            $('.status_hidup_ayah').val(dokumen.status_hidup_ayah)
            $('.status_hubungan_ayah').val(dokumen.status_hubungan_ayah)
            $('.status_pendidikan_ayah').val(dokumen.status_pendidikan_ayah)
            $('.status_pekerjaan_ayah').val(dokumen.status_pekerjaan_ayah)
            $('.detail_ayah').val(dokumen.detail_ayah)

            // Ibu
            $('.nama_ibu').val(dokumen.nama_ibu)
            $('.status_hidup_ibu').val(dokumen.status_hidup_ibu)
            $('.status_pendidikan_ibu').val(dokumen.status_pendidikan_ibu)
            $('.status_pekerjaan_ibu').val(dokumen.status_pekerjaan_ibu)
            $('.detail_ibu').val(dokumen.detail_ibu)

            // Jumlah Tanggungan Orang Tua
            $('.jumlah_tanggungan').val(dokumen.jumlah_tanggungan)
            $('.no_telepon_orang_tua').val(dokumen.no_telepon_orang_tua)

            // Data Keluarga
            $('.foto_bersama_keluarga').attr("src", `${baseUrl}assets/img/foto_bersama_keluarga/${dokumen.foto_bersama_keluarga}`)

            $('#modalDetailDokumen').modal('show');
        })
    }

    const terima = () => {
        console.log(id_pengajuan, id_user_pengaju)
    }
</script>