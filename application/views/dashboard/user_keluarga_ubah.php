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
                <?= form_open_multipart('dashboard/user_keluarga_ubah'); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-dark neu-brutalism">
                                <div class="card-header d-flex" style="border-bottom-color: #000;">
                                    <h4 class="text-dark">Informasi Ayah</h4>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <?= form_error('nama_ayah', '<small class="text-danger">', '</small>') ?>
                                        <input type="text" name="nama_ayah" class="form-control neu-brutalism-border" value="<?= $keluarga['nama_ayah'] ? $keluarga['nama_ayah'] : "" ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Status Ayah</label>
                                        <?= form_error('status_ayah', '<small class="text-danger">', '</small>') ?>

                                        <select name="status_ayah" id="status_ayah" class="form-control neu-brutalism-border">
                                            <?php $status_ayah = [
                                                "Masih Hidup",
                                                "Wafat",
                                                "Bercerai",
                                            ] ?>
                                            <?php if ($keluarga['status_ayah']) : ?>
                                                <option value="<?= ucfirst($keluarga['status_ayah']) ?>"><?= ucfirst($keluarga['status_ayah']) ?></option>
                                                <?php foreach ($status_ayah as $sa) : ?>
                                                    <?php if (ucfirst($keluarga['status_ayah']) != $sa) : ?>
                                                        <option value="<?= $sa ?>"><?= $sa; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Status Ayah</option>
                                                <?php foreach ($status_ayah as $sa) : ?>
                                                    <option value="<?= $sa ?>"><?= $sa; ?></option>

                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Hubungan Ayah</label>
                                        <?= form_error('status_hubungan_ayah', '<small class="text-danger">', '</small>') ?>
                                        <select name="status_hubungan_ayah" id="status_hubungan_ayah" class="form-control neu-brutalism-border">
                                            <?php $status_hubungan_ayah = [
                                                "Ayah Kandung",
                                                "Ayah Tiri",
                                                "Wali",
                                            ] ?>
                                            <?php if ($keluarga['status_hubungan_ayah']) : ?>
                                                <option value="<?= ucfirst($keluarga['status_hubungan_ayah']) ?>"><?= ucfirst($keluarga['status_hubungan_ayah']) ?></option>
                                                <?php foreach ($status_hubungan_ayah as $sha) : ?>
                                                    <?php if (ucfirst($keluarga['status_hubungan_ayah']) != $sha) : ?>
                                                        <option value="<?= $sha ?>"><?= $sha; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Status Hubungan Ayah</option>
                                                <?php foreach ($status_hubungan_ayah as $sha) : ?>
                                                    <option value="<?= $sha ?>"><?= $sha; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pendidikan Ayah</label>
                                        <?= form_error('pendidikan_ayah', '<small class="text-danger">', '</small>') ?>
                                        <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control neu-brutalism-border">
                                            <?php $pendidikan_ayah = [
                                                "Tidak Sekolah",
                                                "SD/ MI / Sederajat",
                                                "SMP / MTs / Sederajat",
                                                "SMA / MA / Sederajat",
                                                "D1 / Sederajat",
                                                "D2 / Sederajat",
                                                "D3 / Sederajat",
                                                "D4 / S1 / Sederajat",
                                                "S2 / Sp1 / Sederajat",
                                                "S3 / Sp2 / Sederajat",
                                            ] ?>
                                            <?php if ($keluarga['pendidikan_ayah']) : ?>
                                                <option value="<?= ucfirst($keluarga['pendidikan_ayah']) ?>"><?= ucfirst($keluarga['pendidikan_ayah']) ?></option>
                                                <?php foreach ($pendidikan_ayah as $pa) : ?>
                                                    <?php if (ucfirst($keluarga['pendidikan_ayah']) != $pa) : ?>
                                                        <option value="<?= $pa ?>"><?= $pa; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pendidikan Ayah</option>
                                                <?php foreach ($pendidikan_ayah as $pa) : ?>
                                                    <option value="<?= $pa ?>"><?= $pa; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pekerjaan Ayah</label>
                                        <?= form_error('pekerjaan_ayah', '<small class="text-danger">', '</small>') ?>
                                        <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control neu-brutalism-border">
                                            <?php $pekerjaan_ayah = [
                                                "PNS",
                                                "Pegawai Swasta",
                                                "Wirausaha",
                                                "TNI / Polri",
                                                "Petani",
                                                "Nelayan",
                                                "Tidak Bekerja",
                                            ] ?>
                                            <?php if ($keluarga['pekerjaan_ayah']) : ?>
                                                <option value="<?= ucfirst($keluarga['pekerjaan_ayah']) ?>"><?= ucfirst($keluarga['pekerjaan_ayah']) ?></option>
                                                <?php foreach ($pekerjaan_ayah as $pa) : ?>
                                                    <?php if (ucfirst($keluarga['pekerjaan_ayah']) != $pa) : ?>
                                                        <option value="<?= $pa ?>"><?= $pa; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pekerjaan Ayah</option>
                                                <?php foreach ($pekerjaan_ayah as $pa) : ?>
                                                    <option value="<?= $pa ?>"><?= $pa; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Detail Ayah</label>
                                        <?= form_error('detail_ayah', '<small class="text-danger">', '</small>') ?>
                                        <input type="text" name="detail_ayah" class="form-control neu-brutalism-border" value="<?= $keluarga['detail_ayah'] ? $keluarga['detail_ayah'] : "" ?>">
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
                                        <?= form_error('nama_ibu', '<small class="text-danger">', '</small>') ?>
                                        <input type="text" name="nama_ibu" class="form-control neu-brutalism-border" value="<?= $keluarga['nama_ibu'] ? $keluarga['nama_ibu'] : "" ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Status Ibu</label>
                                        <?= form_error('status_ibu', '<small class="text-danger">', '</small>') ?>

                                        <select name="status_ibu" id="status_ibu" class="form-control neu-brutalism-border">
                                            <?php $status_ibu = [
                                                "Masih Hidup",
                                                "Wafat",
                                            ] ?>
                                            <?php if ($keluarga['status_ibu']) : ?>
                                                <option value="<?= ucfirst($keluarga['status_ibu']) ?>"><?= ucfirst($keluarga['status_ibu']) ?></option>
                                                <?php foreach ($status_ibu as $si) : ?>
                                                    <?php if (ucfirst($keluarga['status_ibu']) != $si) : ?>
                                                        <option value="<?= $si ?>"><?= $si; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Status Ibu</option>
                                                <?php foreach ($status_ibu as $si) : ?>
                                                    <option value="<?= $si ?>"><?= $si; ?></option>

                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pendidikan Ibu</label>
                                        <?= form_error('pendidikan_ibu', '<small class="text-danger">', '</small>') ?>

                                        <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control neu-brutalism-border">
                                            <?php $pendidikan_ibu = [
                                                "Tidak Sekolah",
                                                "SD/ MI / Sederajat",
                                                "SMP / MTs / Sederajat",
                                                "SMA / MA / Sederajat",
                                                "D1 / Sederajat",
                                                "D2 / Sederajat",
                                                "D3 / Sederajat",
                                                "D4 / S1 / Sederajat",
                                                "S2 / Sp1 / Sederajat",
                                                "S3 / Sp2 / Sederajat",
                                            ] ?>
                                            <?php if ($keluarga['pendidikan_ibu']) : ?>
                                                <option value="<?= ucfirst($keluarga['pendidikan_ibu']) ?>"><?= ucfirst($keluarga['pendidikan_ibu']) ?></option>
                                                <?php foreach ($pendidikan_ibu as $pi) : ?>
                                                    <?php if (ucfirst($keluarga['pendidikan_ibu']) != $pi) : ?>
                                                        <option value="<?= $pi ?>"><?= $pi; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pendidikan Ibu</option>
                                                <?php foreach ($pendidikan_ibu as $pi) : ?>
                                                    <option value="<?= $pi ?>"><?= $pi; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pekerjaan Ibu</label>
                                        <?= form_error('pekerjaan_ibu', '<small class="text-danger">', '</small>') ?>

                                        <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control neu-brutalism-border">
                                            <?php $pekerjaan_ibu = [
                                                "PNS",
                                                "Pegawai Swasta",
                                                "Wirausaha",
                                                "TNI / Polri",
                                                "Petani",
                                                "Nelayan",
                                                "Tidak Bekerja",
                                            ] ?>
                                            <?php if ($keluarga['pekerjaan_ibu']) : ?>
                                                <option value="<?= ucfirst($keluarga['pekerjaan_ibu']) ?>"><?= ucfirst($keluarga['pekerjaan_ibu']) ?></option>
                                                <?php foreach ($pekerjaan_ibu as $pi) : ?>
                                                    <?php if (ucfirst($keluarga['pekerjaan_ibu']) != $pi) : ?>
                                                        <option value="<?= $pi ?>"><?= $pi; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pekerjaan Ibu</option>
                                                <?php foreach ($pekerjaan_ibu as $pi) : ?>
                                                    <option value="<?= $pi ?>"><?= $pi; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Detail Ibu</label>
                                        <?= form_error('detail_ibu', '<small class="text-danger">', '</small>') ?>
                                        <input type="text" name="detail_ibu" class="form-control neu-brutalism-border" value="<?= $keluarga['detail_ibu'] ? $keluarga['detail_ibu'] : "" ?>">
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
                                        <?= form_error('jumlah_tanggungan', '<small class="text-danger">', '</small>') ?>
                                        <input type="text" name="jumlah_tanggungan" class="form-control neu-brutalism-border" value="<?= $keluarga['jumlah_tanggungan'] ? $keluarga['jumlah_tanggungan'] : "" ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>No Telepon Orang Tua</label>
                                        <?= form_error('no_telepon_orang_tua', '<small class="text-danger">', '</small>') ?>
                                        <input type="text" name="no_telepon_orang_tua" class="form-control neu-brutalism-border" value="<?= $keluarga['no_telepon_orang_tua'] ? $keluarga['no_telepon_orang_tua'] : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-dark neu-brutalism">
                                <div class="card-header d-flex" style="border-bottom-color: #000;">
                                    <h4 class="text-dark">Data Keluarga</h4>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm">Foto Bersama Keluarga</div>
                                        <div class="col-sm-12">
                                            <img src="<?= base_url('assets/img/foto_bersama_keluarga/') . $keluarga['foto_bersama_keluarga']; ?>" class="img-thumbnail img-preview neu-brutalism w-100">
                                            <div class="custom-file w-full mt-3">
                                                <input type="file" class="custom-file-input gambar-preview" id="image" name="image" onchange="previewImage()">
                                                <label for="image" class="custom-file-label">Pilih File</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block neu-brutalism">
                            Perbarui Data Keluarga
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>