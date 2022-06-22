<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Menu Management</h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <?= $this->session->flashdata('message');  ?>
            <div class="col-lg-8">
                <!-- Hoverable rows start -->
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="card-title">Tabel Menu</h4>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Menu</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>MENU</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($menu as $m) : ?>
                                                <tr>
                                                    <td class="text-bold-500"><?= $i ?></td>
                                                    <td><?= $m['menu'] ?></td>
                                                    <td class="text-bold-500">
                                                        <!-- Edit -->
                                                        <a class="btn badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal1<?= $m['id']; ?>"><i data-feather="edit" width="20" class="mb-1"></i>Edit</a>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal1<?= $m['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel1">Edit menu</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?= base_url('menu/edit_menu') ?>" method="POST">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu'] ?>">
                                                                                <input type="hidden" id="id" name="id" value="<?= $m['id'] ?>">
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
                                                        <!-- Hapus -->
                                                        <a class="btn badge bg-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('menu/delete_menu/' . $m['id']) ?>"><i data-feather="trash-2" width="20" class="mb-1"></i>Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hoverable rows end -->
            </div>
        </div>
    </section>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu') ?>" method="POST">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" class="form-control required" id="menu" name="menu" required>
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