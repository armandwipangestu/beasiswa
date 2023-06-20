<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

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
                <div class="ml-auto p-2">
                    <a href="<?= base_url('/dashboard/user_biodata_ubah'); ?>" class="btn btn-warning btn-lg btn-block neu-brutalism" tabindex="4">
                        <i class="fas fa-fw fa-edit mr-1"></i>Perbarui
                    </a>
                </div>
            </div>

            <?= $this->session->flashdata('message') ?>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-sm-4">Gambar</div>
                            <div class="col-sm-11">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail img-preview">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" class="form-control" value="<?= $user['nama']; ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Kelas Program</label>
                            <input type="text" class="form-control" disabled>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>