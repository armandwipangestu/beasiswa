<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <?php if ($hasil['status'] == "Diterima") : ?>
                        <img src="<?= base_url('assets/img/hasil_review/diterima.png') ?>" alt="" class="img-fluid">
                        <h4>Status: <?= $hasil['status'] ?></h4>
                        <span>Alasan: <?= $hasil['alasan'] ?></span>
                    <?php else : ?>
                        <img src="<?= base_url('assets/img/hasil_review/ditolak.png') ?>" alt="" class="img-fluid"><br />
                        <h4>Status: <?= $hasil['status'] ?></h4>
                        <span>Alasan: <?= $hasil['alasan'] ?></span>
                    <?php endif; ?>
                    <br>
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-primary mt-2">Kembali</a>
                </div>
            </div>
        </div>

    </section>
</div>