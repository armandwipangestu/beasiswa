<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <?php if ($hasil['status'] == "diterima") : ?>
                        <img src="<?= base_url('assets/img/hasil_review/diterima.png') ?>" alt="" class="img-fluid">
                        <span><?= $hasil['alasan'] ?></span>
                    <?php else : ?>
                        <img src="<?= base_url('assets/img/hasil_review/ditolak.png') ?>" alt="" class="img-fluid"><br />
                        <span><?= $hasil['alasan'] ?></span>
                    <?php endif; ?>
                    <br>
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-primary mt-2">Kembali</a>
                </div>
            </div>
        </div>

    </section>
</div>