<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>

        <!-- <div class="d-flex flex-row-reverse mb-3">
            <div>
                <button type="submit" class="btn btn-success btn-block neu-brutalism">
                    <i class="fas fa-fw fa-upload mr-1"></i>Ajukan Beasiswa
                </button>
            </div>
        </div> -->

        <div class="card card-primary neu-brutalism">

            <div class="card-header d-flex">
                <h4>Status Kelengkapan Berkas</h4>
                <div class="ml-auto mt-2">

                    <?php if ($status_kelengkapan_berkas) : ?>
                        <span class='badge badge-success neu-brutalism mr-2'>Sudah Lengkap</span>
                    <?php else : ?>
                        <span class='badge badge-warning neu-brutalism mr-2'>Belum Lengkap</span>
                    <?php endif; ?>

                    <?php if ($pengajuan != null) : ?>
                        <?= $state_pengajuan; ?>
                    <?php elseif ($status_kelengkapan_berkas) : ?>
                        <a onclick="ajukan()" class="btn btn-success neu-brutalism">Ajukan <i class="fas fa-fw fa-upload ml-1"></i></a>
                    <?php else : ?>
                        <a data-toggle="collapse" href="#collapseBerkas" role="button" aria-expanded="false" aria-controls="collapseBerkas" class="btn btn-primary neu-brutalism" tabindex="4">
                            Detail <i class="fas fa-fw fa-arrow-down ml-1"></i>
                        </a>
                    <?php endif; ?>


                </div>
            </div>

            <div class="collapse" id="collapseBerkas">
                <div class="card card-body">
                    <table class="table table-responsive table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-dark">Formulir</th>
                                <th scope="col" class="text-dark">Sudah Lengkap?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_berkas as $lb) : ?>
                                <tr>
                                    <td><?= $lb['nama_berkas'] ?></td>
                                    <td class="text-center">
                                        <?= $lb['status'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card card-primary neu-brutalism">
            <div class="card-header d-flex">
                <div class="">
                    <h4>Biodata <?= $user['nama']; ?></h4>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url('/dashboard/user_biodata_ubah'); ?>" class="btn btn-warning btn-block neu-brutalism" tabindex="4">
                        <i class="fas fa-fw fa-edit mr-1"></i>Perbarui Biodata
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-sm">Gambar</div>
                            <div class="col-sm-12">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail img-preview neu-brutalism">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" class="form-control neu-brutalism-border" value="<?= $user['nama']; ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['tempat_lahir'] ? $biodata['tempat_lahir'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['tanggal_lahir'] ? $biodata['tanggal_lahir'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control neu-brutalism-border" style="height: 72px !important;" disabled><?= $biodata['alamat'] ? $biodata['alamat'] : "" ?></textarea>
                            <!-- <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['alamat'] ? $biodata['alamat'] : "" ?>"> -->
                        </div>

                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['no_telepon'] ? $biodata['no_telepon'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['jenis_kelamin'] ? $biodata['jenis_kelamin'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['id_jurusan'] ? $jurusan_user['jurusan'] : $biodata['id_jurusan'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['semester'] ? $biodata['semester'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Kelas Program</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['id_kelas_program'] ? $kelas_program_user['kelas_program'] : $biodata['id_kelas_program'] ?>">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary neu-brutalism">
            <div class="card-header d-flex">
                <div class="">
                    <h4>Data Prestasi</h4>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url('/dashboard/user_prestasi_ubah'); ?>" class="btn btn-warning btn-block neu-brutalism" tabindex="4">
                        <i class="fas fa-fw fa-edit mr-1"></i>Perbarui Data Prestasi
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-sm">Sertifikat</div>
                            <div class="col-sm-12">
                                <img src="<?= base_url('assets/img/sertifikat/') . $prestasi['scan_sertifikat']; ?>" class="img-thumbnail img-preview neu-brutalism w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">

                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $prestasi['nama_kegiatan'] ? $prestasi['nama_kegiatan'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Jenis Kegiatan</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $prestasi['jenis_kegiatan'] ? $prestasi['jenis_kegiatan'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Tingkat</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $prestasi['tingkat'] ? $prestasi['tingkat'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $prestasi['tahun'] ? $prestasi['tahun'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Pencapaian</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $prestasi['pencapaian'] ? $prestasi['pencapaian'] : "" ?>">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary neu-brutalism">
            <div class="card-header d-flex">
                <div class="">
                    <h4>Data Keluarga</h4>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url('/dashboard/user_keluarga_ubah'); ?>" class="btn btn-warning btn-block neu-brutalism" tabindex="4">
                        <i class="fas fa-fw fa-edit mr-1"></i>Perbarui Data Keluarga
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-sm">Foto Bersama Keluarga</div>
                            <div class="col-sm-12">
                                <img src="<?= base_url('assets/img/foto_bersama_keluarga/') . $keluarga['foto_bersama_keluarga']; ?>" class="img-thumbnail img-preview neu-brutalism w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">

                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['nama_ayah'] ? $keluarga['nama_ayah'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Status Ayah</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_hidup_ayah'] ? $keluarga['status_hidup_ayah'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Status Hubungan Ayah</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_hubungan_ayah'] ? $keluarga['status_hubungan_ayah'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Pendidikan Ayah</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_pendidikan_ayah'] ? $keluarga['status_pendidikan_ayah'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Detail Ayah</label>
                            <textarea name="detail_ayah" class="form-control neu-brutalism-border" style="height: 72px !important;" disabled><?= $keluarga['detail_ayah'] ? $keluarga['detail_ayah'] : "" ?></textarea>
                            <!-- <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['detail_ayah'] ? $keluarga['detail_ayah'] : "" ?>"> -->
                        </div>

                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['nama_ibu'] ? $keluarga['nama_ibu'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Status Ibu</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_hidup_ibu'] ? $keluarga['status_hidup_ibu'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Pendidikan Ibu</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_pendidikan_ibu'] ? $keluarga['status_pendidikan_ibu'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan Ibu</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_pekerjaan_ibu'] ? $keluarga['status_pekerjaan_ibu'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>Detail Ibu</label>
                            <textarea name="detail_ibu" class="form-control neu-brutalism-border" style="height: 72px !important;" disabled><?= $keluarga['detail_ibu'] ? $keluarga['detail_ibu'] : "" ?></textarea>
                            <!-- <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['detail_ibu'] ? $keluarga['detail_ibu'] : "" ?>"> -->
                        </div>

                        <div class="form-group">
                            <label>Jumlah Tanggungan</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['jumlah_tanggungan'] ? $keluarga['jumlah_tanggungan'] : "" ?>">
                        </div>

                        <div class="form-group">
                            <label>No Telepon Orang Tua</label>
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['no_telepon_orang_tua'] ? $keluarga['no_telepon_orang_tua'] : "" ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-dark neu-brutalism">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Ayah</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['nama_ayah'] ? $keluarga['nama_ayah'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Status Ayah</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_ayah'] ? $keluarga['status_ayah'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Status Hubungan Ayah</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_hubungan_ayah'] ? $keluarga['status_hubungan_ayah'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Pendidikan Ayah</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['pendidikan_ayah'] ? $keluarga['pendidikan_ayah'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan Ayah</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['pekerjaan_ayah'] ? $keluarga['pekerjaan_ayah'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Detail Ayah</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['detail_ayah'] ? $keluarga['detail_ayah'] : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-dark neu-brutalism">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Ibu</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['nama_ibu'] ? $keluarga['nama_ibu'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Status Ibu</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['status_ibu'] ? $keluarga['status_ibu'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Pendidikan Ibu</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['pendidikan_ibu'] ? $keluarga['pendidikan_ibu'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan Ibu</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['pekerjaan_ibu'] ? $keluarga['pekerjaan_ibu'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>Detail Ibu</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['detail_ibu'] ? $keluarga['detail_ibu'] : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-dark neu-brutalism">
                            <div class="card-header d-flex" style="border-bottom-color: #000;">
                                <h4 class="text-dark">Informasi Jumlah Tanggungan Orang Tua</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jumlah Tanggungan</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['jumlah_tanggungan'] ? $keluarga['jumlah_tanggungan'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label>No Telepon Orang Tua</label>
                                    <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $keluarga['no_telepon_orang_tua'] ? $keluarga['no_telepon_orang_tua'] : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

    </section>
</div>

<script>
    const ajukan = () => {
        const baseUrl = `<?= base_url() ?>`
        Swal.fire({
            icon: 'warning',
            html: `Apakah anda yakin ingin mengajukan beasiswa?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Ya`,
            cancelButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}/dashboard/ajukan_beasiswa`
            }
        })
    }
</script>