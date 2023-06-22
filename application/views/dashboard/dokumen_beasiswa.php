<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>

        <div class="d-flex flex-row-reverse mb-3">
            <div>
                <button type="submit" class="btn btn-success btn-block neu-brutalism">
                    <i class="fas fa-fw fa-upload mr-1"></i>Ajukan Beasiswa
                </button>
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
                            <div class="col-sm-4">Gambar</div>
                            <div class="col-sm-11">
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
                            <input type="text" class="form-control neu-brutalism-border" disabled value="<?= $biodata['alamat'] ? $biodata['alamat'] : "" ?>">
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
                    <h4>Prestasi</h4>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url('/dashboard/user_prestasi_ubah'); ?>" class="btn btn-warning btn-block neu-brutalism" tabindex="4">
                        <i class="fas fa-fw fa-edit mr-1"></i>Perbarui Prestasi
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-sm-4">Sertifikat</div>
                            <div class="col-sm-11">
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

    </section>
</div>