<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <a href="<?= base_url(); ?>" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-arrow-left"></i> Kembali</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Nama</th>
                        <th scope="col" class="text-dark">Email</th>
                        <th scope="col" class="text-dark">Role</th>
                        <th scope="col" class="text-dark">Gambar</th>
                        <th scope="col" class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $user['nama'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td><img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-fluid img-thumbnail" style="width: 100px;"></td>
                            <td>
                                <a href="#" onclick="ubah(<?= $user['id'] ?>)" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism hapus" data-id="<?= $user['id'] ?>" data-url="<?= base_url('admin/user_data_hapus') ?>" data-user="<?= $user['nama'] ?>"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRoleUserUbah" tabindex="-1" role="dialog" aria-labelledby="modalRoleUserUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title modal-ubah text-dark" id="newModalRoleUserUbah">Ubah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/user_data_ubah') ?>" method="POST">
                <input type="hidden" class="form-control" id="id" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" readonly>
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select name="role_id" id="role_id_ubah" class="form-control">
                            <option id="pilih_role" value=""></option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning neu-brutalism" id="submit"><i class="fas fa-edit"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url() ?>`

    const ubah = (id) => {
        $.get(`${baseUrl}admin/get_user_data_role/${id}`, (data) => {
            const userRole = $.parseJSON(data)
            console.log(userRole);

            $('.modal-ubah').text('Ubah User Data')
            $('#id').val(userRole.id);
            $('#nama').val(userRole.nama);
            $('#email').val(userRole.email);
            $('#pilih_role').val(userRole.role_id);
            $('#pilih_role').text(userRole.role);

            const roleIdUbah = document.querySelector('#role_id_ubah');

            // Menghapus opsi sebelum menambahkan yang baru
            const options = Array.from(roleIdUbah.options);
            options.forEach((option) => {
                if (option.id !== 'pilih_role') {
                    roleIdUbah.removeChild(option);
                }
            });

            userRole.roles.map((role) => {
                if (userRole.role !== role.role) {
                    const opt = document.createElement('option')
                    opt.value = role.id
                    opt.innerHTML = role.role
                    roleIdUbah.appendChild(opt)
                }
            })

            $('#modalRoleUserUbah').modal('show');
        })
    }

    const hapusUser = document.querySelectorAll('.hapus')
    hapusUser.forEach((hu) => {
        hu.addEventListener('click', () => {
            const dataId = hu.dataset.id
            const dataUrl = hu.dataset.url
            const dataUser = hu.dataset.user
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus user <b>${dataUser}</b>?`,
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#5cb85c',
                confirmButtonText: `Ya`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `${dataUrl}/${dataId}`
                }
            })
        })
    })
</script>