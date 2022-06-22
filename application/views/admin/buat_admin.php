<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Buat Admin</h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <?= $this->session->flashdata('message');  ?>
            <div class="card shadow">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Admin
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/buat_admin') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="fullname">Nama Lengkap</label>
                                                    <input type="text" id="fullname" class="form-control" value="<?= set_value('fullname') ?>" name="fullname" required>
                                                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nisn">Username</label>
                                                    <input type="text" id="nisn" class="form-control" value="<?= set_value('nisn') ?>" name="nisn" required>
                                                    <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password1">Password</label>
                                                    <input type="password" id="password" class="form-control" name="password" required>
                                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </diV>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin as $ad) : ?>
                                <tr>
                                    <td class="text-bold-500"><?= $ad['nama'] ?></td>
                                    <td><?= $ad['nisn'] ?></td>
                                    <td>
                                        <a class="btn badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal1<?= $ad['id']; ?>"><i data-feather="edit" width="20" class="mb-1"></i>Edit</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1<?= $ad['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Admin</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/edit_admin') ?>" method="POST">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $ad['nama']; ?>" required>
                                                                <input type="text" class="form-control" id="id" name="id" value="<?= $ad['id']; ?>" hidden>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nisn" class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $ad['nisn']; ?>" aria-describedby="emailHelp" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn badge bg-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('admin/delete_admin/' . $ad['id']) ?>"><i data-feather="trash-2" width="20" class="mb-1"></i>Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</div>