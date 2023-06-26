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
                <?= form_open_multipart('dashboard/user_prestasi_ubah'); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 p-0 p-md-3">

                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <?= form_error('nama_kegiatan', '<small class="text-danger">', '</small>') ?>
                                <input type="text" name="nama_kegiatan" class="form-control neu-brutalism-border" value="<?= $prestasi['nama_kegiatan'] ? $prestasi['nama_kegiatan'] : "" ?>">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                                <?= form_error('jenis_kegiatan', '<small class="text-danger">', '</small>') ?>
                                <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control neu-brutalism-border">
                                    <?php $jenis_kegiatan = [
                                        "Individual",
                                        "Kelompok/Tim"
                                    ] ?>
                                    <?php if ($prestasi['jenis_kegiatan']) : ?>
                                        <option value="<?= ucfirst($prestasi['jenis_kegiatan']) ?>"><?= ucfirst($prestasi['jenis_kegiatan']) ?></option>
                                        <?php if (ucfirst($prestasi['jenis_kegiatan']) == "Individual") : ?>
                                            <?php foreach ($jenis_kegiatan as $jk) : ?>
                                                <?php if (ucfirst($prestasi['jenis_kegiatan']) != $jk) : ?>
                                                    <option value="<?= $jk ?>"><?= $jk; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php elseif (ucfirst($prestasi['jenis_kegiatan']) == "Kelompok/Tim") : ?>
                                            <?php foreach ($jenis_kegiatan as $jk) : ?>
                                                <?php if (ucfirst($prestasi['jenis_kegiatan']) != $jk) : ?>
                                                    <option value="<?= $jk ?>"><?= $jk; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <option value="">Pilih Jenis Kegiatan</option>
                                        <?php foreach ($jenis_kegiatan as $jk) : ?>
                                            <option value="<?= $jk ?>"><?= $jk; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tingkat" class="form-label">Tingkat</label>
                                <?= form_error('tingkat', '<small class="text-danger">', '</small>') ?>
                                <select name="tingkat" id="tingkat" class="form-control neu-brutalism-border">
                                    <?php $tingkat = [
                                        "Kabupaten/Kota",
                                        "Provinsi",
                                        "Nasional",
                                        "Internasional"
                                    ] ?>
                                    <?php if ($prestasi['tingkat']) : ?>
                                        <option value="<?= ucfirst($prestasi['tingkat']) ?>"><?= ucfirst($prestasi['tingkat']) ?></option>
                                        <?php foreach ($tingkat as $tk) : ?>
                                            <?php if (ucfirst($prestasi['tingkat']) != $tk) : ?>
                                                <option value="<?= $tk ?>"><?= $tk; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <option value="">Pilih Tingkat</option>
                                        <?php foreach ($tingkat as $tk) : ?>
                                            <option value="<?= $tk ?>"><?= $tk; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <?= form_error('tahun', '<small class="text-danger">', '</small>') ?>
                                <input type="number" name="tahun" class="form-control neu-brutalism-border number" value="<?= $prestasi['tahun'] ? $prestasi['tahun'] : "" ?>">
                            </div>

                            <div class="form-group">
                                <label for="pencapaian" class="form-label">Pencapaian</label>
                                <?= form_error('pencapaian', '<small class="text-danger">', '</small>') ?>
                                <select name="pencapaian" id="pencapaian" class="form-control neu-brutalism-border">
                                    <?php $pencapaian = [
                                        "Juara 1",
                                        "Juara 2",
                                        "Juara 3",
                                        "Finalis",
                                        "Honorable Mention"
                                    ] ?>
                                    <?php if ($prestasi['pencapaian']) : ?>
                                        <option value="<?= ucfirst($prestasi['pencapaian']) ?>"><?= ucfirst($prestasi['pencapaian']) ?></option>
                                        <?php foreach ($pencapaian as $p) : ?>
                                            <?php if (ucfirst($prestasi['pencapaian']) != $p) : ?>
                                                <option value="<?= $p ?>"><?= $p; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <option value="">Pilih Pencapaian</option>
                                        <?php foreach ($pencapaian as $p) : ?>
                                            <option value="<?= $p ?>"><?= $p; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-5 p-0 p-md-3">
                            <div class="form-group row">
                                <div class="col-sm-4">Sertifikat</div>
                                <div class="col-sm-11">
                                    <img src="<?= base_url('assets/img/sertifikat/') . $prestasi['scan_sertifikat']; ?>" class="img-thumbnail img-preview neu-brutalism w-100">
                                    <div class="custom-file w-full mt-3">
                                        <input type="file" class="custom-file-input gambar-preview" id="image" name="image" onchange="previewImage()">
                                        <label for="image" class="custom-file-label">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block neu-brutalism">
                            Perbarui Data Prestasi
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>