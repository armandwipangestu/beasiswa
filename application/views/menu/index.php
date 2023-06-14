<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>

        <a href="#" data-toggle="modal" onclick="edit('add')" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-plus"></i> Tambah Menu Baru</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $m['menu'] ?></td>
                            <td>
                                <a href="#" onclick="edit('<?= $m['id'] ?>')" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism" onclick="hapus('<?= $m['id'] ?>')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>
</section>
</div>

<!-- Modal -->
<div class="modal fade" id="menuManagementModal" tabindex="-1" role="dialog" aria-labelledby="menuManagementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuManagementModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/tambah') ?>" method="POST">
                <input type="hidden" class="form-control" id="id" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary neu-brutalism" id="submit"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url() ?>`

    const edit = (id) => {
        if (id == "add") {
            $('.modal-title').text('Tambah Menu Baru')
            $('#menu').val('');
            $('#submit').text('Tambahkan');
            $('#menuManagementModal').modal('show');
        } else {
            $.get(`${baseUrl}menu/get_menu/${id}`, (data) => {
                const menu = $.parseJSON(data)

                $('.modal-title').text('Ubah Menu')
                $('#id').val(menu.id);
                $('#menu').val(menu.menu);
                $('#submit').text('Ubah');
                $('#menuManagementModal').modal('show');
            })
        }
    }

    const hapus = (id) => {
        Swal.fire({
            title: "Apakah anda yakin ingin menhapus menu ini?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancleButtonText: "Batal",
            confirmButtonText: "Ya",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: `${baseUrl}/menu/hapus_menu/${id}`,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        var obj = response;
                        Swal.fire("Berhasil!", obj.message, "success");
                        window.location.href = `${baseUrl}/menu`;
                    },
                    error: function() {
                        Swal.fire(
                            "Peringatan!",
                            "Mohon maaf sistem sedang dalam perbaikan, silakan hubungi admin terkait masalah ini",
                            "error"
                        );
                    },
                });
            }
        })
    }
</script>