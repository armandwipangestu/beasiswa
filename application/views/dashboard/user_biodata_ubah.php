<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <a href="<?= base_url('dashboard'); ?>" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="card card-primary neu-brutalism">

            <div class="card-body">
                <form action="<?= base_url('dashboard/user_biodata_ubah'); ?>" method="POST">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nama Mahasiswa</label>
                            <input type="text" class="form-control neu-brutalism-border" value="<?= $user['nama']; ?>" name="nama_mahasiswa" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
                            <input type="text" class="form-control neu-brutalism-border" name="tempat_lahir" value="<?= $biodata['tempat_lahir'] ? $biodata['tempat_lahir'] : "" ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 col-md">
                            <label class=" col-form-label">Tanggal Lahir</label>
                            <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="col-sm-10 col-md-12">
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control neu-brutalism-border" data-date-format="yyyy/mm/dd" name="tanggal_lahir" value="<?= $biodata['tanggal_lahir'] ? $biodata['tanggal_lahir'] : "" ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Alamat</label>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                            <textarea name="alamat" class="form-control neu-brutalism-border" style="height: 72px !important;"><?= $biodata['alamat'] ? $biodata['alamat'] : "" ?></textarea>
                            <!-- <input type="text" class="form-control neu-brutalism-border" name="alamat" value="<?= $biodata['alamat'] ? $biodata['alamat'] : "" ?>"> -->
                        </div>

                        <div class="form-group col-md-6">
                            <label>No Telepon</label>
                            <?= form_error('no_telepon', '<small class="text-danger">', '</small>') ?>
                            <input type="number" class="form-control neu-brutalism-border number" name="no_telepon" value="<?= $biodata['no_telepon'] ? $biodata['no_telepon'] : "" ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control neu-brutalism-border">
                                <?php $jenis_kelamin = [
                                    "Laki-laki",
                                    "Perempuan"
                                ] ?>
                                <?php if ($biodata['jenis_kelamin']) : ?>
                                    <option value="<?= ucfirst($biodata['jenis_kelamin']) ?>"><?= ucfirst($biodata['jenis_kelamin']); ?></option>
                                    <?php if (ucfirst($biodata['jenis_kelamin']) == "Laki-laki") : ?>
                                        <?php foreach ($jenis_kelamin as $jk) : ?>
                                            <?php if (ucfirst($biodata['jenis_kelamin']) != $jk) : ?>
                                                <option value="<?= $jk ?>"><?= $jk; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php elseif (ucfirst($biodata['jenis_kelamin']) == "Perempuan") : ?>
                                        <?php foreach ($jenis_kelamin as $jk) : ?>
                                            <?php if (ucfirst($biodata['jenis_kelamin']) != $jk) : ?>
                                                <option value="<?= $jk ?>"><?= $jk; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <?php foreach ($jenis_kelamin as $jk) : ?>
                                        <option value="<?= $jk ?>"><?= $jk; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_jurusan" class="form-label">Jurusan</label>
                            <?= form_error('id_jurusan', '<small class="text-danger">', '</small>') ?>
                            <select name="id_jurusan" id="id_jurusan" class="form-control neu-brutalism-border">
                                <?php if ($biodata['id_jurusan']) : ?>
                                    <option value="<?= $jurusan_user['id'] ?>"><?= $jurusan_user['jurusan']; ?></option>
                                    <?php foreach ($jurusan as $j) : ?>
                                        <?php if ($jurusan_user['jurusan'] != $j['jurusan']) : ?>
                                            <option value="<?= $j['id'] ?>"><?= $j['jurusan']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="">Pilih Jurusan</option>
                                    <?php foreach ($jurusan as $j) : ?>
                                        <option value="<?= $j['id'] ?>"><?= $j['jurusan']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="id_kelas_program" class="form-label">Kelas Program</label>
                            <?= form_error('id_kelas_program', '<small class="text-danger">', '</small>') ?>
                            <select name="id_kelas_program" id="id_kelas_program" class="form-control neu-brutalism-border">
                                <?php if ($biodata['id_kelas_program']) : ?>
                                    <option value="<?= $kelas_program_user['id'] ?>"><?= $kelas_program_user['kelas_program']; ?></option>
                                    <?php foreach ($kelas_program as $kp) : ?>
                                        <?php if ($kelas_program_user['kelas_program'] != $kp['kelas_program']) : ?>
                                            <option value="<?= $kp['id'] ?>"><?= $kp['kelas_program']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="">Pilih Kelas Program</option>
                                    <?php foreach ($kelas_program as $kp) : ?>
                                        <option value="<?= $kp['id'] ?>"><?= $kp['kelas_program']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Semester</label>
                            <?= form_error('semester', '<small class="text-danger">', '</small>') ?>
                            <input type="text" class="form-control neu-brutalism-border" name="semester" value="<?= $biodata['semester'] ? $biodata['semester'] : "" ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block neu-brutalism">
                            Perbarui Biodata
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>