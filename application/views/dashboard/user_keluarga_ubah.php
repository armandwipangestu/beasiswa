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
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-6 p-0 p-md-3">
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
                                        <?= form_error('status_hidup_ayah', '<small class="text-danger">', '</small>') ?>
                                        <select name="status_hidup_ayah" id="status_hidup_ayah" class="form-control neu-brutalism-border">
                                            <?php if ($keluarga['status_hidup_ayah']) : ?>
                                                <option value="<?= $keluarga['id_status_hidup_ayah'] ?>"><?= $keluarga['status_hidup_ayah'] ?></option>
                                                <?php foreach ($status_hidup as $sh) : ?>
                                                    <?php if ($keluarga['status_hidup_ayah'] != $sh['status_hidup']) : ?>
                                                        <option value="<?= $sh['id'] ?>"><?= $sh['status_hidup']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Status Ayah</option>
                                                <?php foreach ($status_hidup as $sh) : ?>
                                                    <option value="<?= $sh['id'] ?>"><?= $sh['status_hidup']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Hubungan Ayah</label>
                                        <?= form_error('status_hubungan_ayah', '<small class="text-danger">', '</small>') ?>
                                        <select name="status_hubungan_ayah" id="status_hubungan_ayah" class="form-control neu-brutalism-border">
                                            <?php if ($keluarga['status_hubungan_ayah']) : ?>
                                                <option value="<?= $keluarga['id_status_hubungan_ayah'] ?>"><?= $keluarga['status_hubungan_ayah'] ?></option>
                                                <?php foreach ($status_hubungan as $sh) : ?>
                                                    <?php if ($keluarga['status_hubungan_ayah'] != $sh['status_hubungan']) : ?>
                                                        <option value="<?= $sh['id'] ?>"><?= $sh['status_hubungan']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Status Hubungan Ayah</option>
                                                <?php foreach ($status_hubungan as $sh) : ?>
                                                    <option value="<?= $sh['id'] ?>"><?= $sh['status_hubungan']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pendidikan Ayah</label>
                                        <?= form_error('status_pendidikan_ayah', '<small class="text-danger">', '</small>') ?>
                                        <select name="status_pendidikan_ayah" id="status_pendidikan_ayah" class="form-control neu-brutalism-border">
                                            <?php if ($keluarga['status_pendidikan_ayah']) : ?>
                                                <option value="<?= $keluarga['id_status_pendidikan_ayah'] ?>"><?= $keluarga['status_pendidikan_ayah'] ?></option>
                                                <?php foreach ($status_pendidikan as $sp) : ?>
                                                    <?php if ($keluarga['status_pendidikan_ayah'] != $sp['status_pendidikan']) : ?>
                                                        <option value="<?= $sp['id'] ?>"><?= $sp['status_pendidikan']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pendidikan Ayah</option>
                                                <?php foreach ($status_pendidikan as $sp) : ?>
                                                    <option value="<?= $sp['id'] ?>"><?= $sp['status_pendidikan']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pekerjaan Ayah</label>
                                        <?= form_error('status_pekerjaan_ayah', '<small class="text-danger">', '</small>') ?>
                                        <select name="status_pekerjaan_ayah" id="status_pekerjaan_ayah" class="form-control neu-brutalism-border">
                                            <?php if ($keluarga['status_pekerjaan_ayah']) : ?>
                                                <option value="<?= $keluarga['id_status_pekerjaan_ayah'] ?>"><?= $keluarga['status_pekerjaan_ayah'] ?></option>
                                                <?php foreach ($status_pekerjaan as $sp) : ?>
                                                    <?php if ($keluarga['status_pekerjaan_ayah'] != $sp['status_pekerjaan']) : ?>
                                                        <option value="<?= $sp['id'] ?>"><?= $sp['status_pekerjaan']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pekerjaan Ayah</option>
                                                <?php foreach ($status_pekerjaan as $sp) : ?>
                                                    <option value="<?= $sp['id'] ?>"><?= $sp['status_pekerjaan']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Detail Ayah</label>
                                        <?= form_error('detail_ayah', '<small class="text-danger">', '</small>') ?>
                                        <textarea name="detail_ayah" class="form-control neu-brutalism-border" style="height: 72px !important;"><?= $keluarga['detail_ayah'] ? $keluarga['detail_ayah'] : "" ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6 p-0 p-md-3">
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
                                        <?= form_error('status_hidup_ibu', '<small class="text-danger">', '</small>') ?>

                                        <select name="status_hidup_ibu" id="status_hidup_ibu" class="form-control neu-brutalism-border">
                                            <?php if ($keluarga['status_hidup_ibu']) : ?>
                                                <option value="<?= $keluarga['id_status_hidup_ibu'] ?>"><?= $keluarga['status_hidup_ibu'] ?></option>
                                                <?php foreach ($status_hidup as $sh) : ?>
                                                    <?php if ($keluarga['status_hidup_ibu'] != $sh['status_hidup'] && $sh['status_hidup'] != "Bercerai") : ?>
                                                        <option value="<?= $sh['id'] ?>"><?= $sh['status_hidup']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Status Ibu</option>
                                                <?php foreach ($status_hidup as $sh) : ?>
                                                    <?php if ($sh['status_hidup'] != "Bercerai") : ?>
                                                        <option value="<?= $sh['id'] ?>"><?= $sh['status_hidup']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pendidikan Ibu</label>
                                        <?= form_error('status_pendidikan_ibu', '<small class="text-danger">', '</small>') ?>

                                        <select name="status_pendidikan_ibu" id="status_pendidikan_ibu" class="form-control neu-brutalism-border">
                                            <?php if ($keluarga['status_pendidikan_ibu']) : ?>
                                                <option value="<?= $keluarga['id_status_pendidikan_ibu'] ?>"><?= $keluarga['status_pendidikan_ibu'] ?></option>
                                                <?php foreach ($status_pendidikan as $sp) : ?>
                                                    <?php if ($keluarga['status_pendidikan_ibu'] != $sp['status_pendidikan']) : ?>
                                                        <option value="<?= $sp['id'] ?>"><?= $sp['status_pendidikan']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pendidikan Ibu</option>
                                                <?php foreach ($status_pendidikan as $sp) : ?>
                                                    <option value="<?= $sp['id'] ?>"><?= $sp['status_pendidikan']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pekerjaan Ibu</label>
                                        <?= form_error('status_pekerjaan_ibu', '<small class="text-danger">', '</small>') ?>

                                        <select name="status_pekerjaan_ibu" id="status_pekerjaan_ibu" class="form-control neu-brutalism-border">
                                            <?php if ($keluarga['status_pekerjaan_ibu']) : ?>
                                                <option value="<?= $keluarga['id_status_pekerjaan_ibu'] ?>"><?= $keluarga['status_pekerjaan_ibu'] ?></option>
                                                <?php foreach ($status_pekerjaan as $sp) : ?>
                                                    <?php if ($keluarga['status_pekerjaan_ibu'] != $sp['status_pekerjaan']) : ?>
                                                        <option value="<?= $sp['id'] ?>"><?= $sp['status_pekerjaan']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">Pilih Pekerjaan Ibu</option>
                                                <?php foreach ($status_pekerjaan as $sp) : ?>
                                                    <option value="<?= $sp['id'] ?>"><?= $sp['status_pekerjaan']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Detail Ibu</label>
                                        <?= form_error('detail_ibu', '<small class="text-danger">', '</small>') ?>
                                        <textarea name="detail_ibu" class="form-control neu-brutalism-border" style="height: 72px !important;"><?= $keluarga['detail_ibu'] ? $keluarga['detail_ibu'] : "" ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-0 p-md-3">
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
                        <div class="col-md-6 p-0 p-md-3">
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