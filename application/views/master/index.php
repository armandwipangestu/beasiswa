<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <?= form_error('role', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

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
                    <?php foreach ($pengajuan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $p['nama'] ?></td>
                            <td><span class="badge badge-warning neu-brutalism"><?= $p['status_pengajuan'] ?></span></td>
                            <td>
                                          <a href="#" onClick="lihat(<?= $p['id'] ?>')" class="btn btn-primary neu-brutalism">
                            <i class="fas fa-fw fa-search mr-1"></i></a></td>
                            
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>
</section>
</div>
