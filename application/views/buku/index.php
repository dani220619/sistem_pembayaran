<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Buku</h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <?= $this->session->flashdata('message');  ?>
            <div class="col-lg">
                <!-- Hoverable rows start -->
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="card-title">Tabel Buku</h4>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Buku</a>
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
                                                <th>ID</th>
                                                <th>Nama Buku</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($buku as $r) : ?>
                                                <tr>
                                                    <td class="text-bold-500"><?= $i ?></td>
                                                    <td><?= $r->id ?></td>
                                                    <td><?= $r->nama_buku ?></td>
                                                    <td class="text-bold-500">

                                                        <a class="btn badge bg-success"><i data-feather="edit" width="20" class="mb-1" data-bs-toggle="modal" data-bs-target="#updatebuku<?php echo $r->id ?>"></i>Edit</a>
                                                        <a class=" btn badge bg-danger"><i data-feather="trash-2" width="20" class="mb-1" data-bs-toggle="modal" data-bs-target="#hapus_buku<?php echo $r->id ?>"></i>Hapus</a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="updatebuku<?php echo $r->id ?>" tabindex="-1" role="dialog" aria-labelledby="updatebukulabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updatebukulabel">
                                                                    Edit Buku</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="user" method="post" action="<?= base_url('buku/update_buku'); ?>" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label for="id">Id Kas</label><br>
                                                                        <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                                                        <input type="text" class="form-control form-control-user" id="id" name="id" value="<?php echo $r->id ?>" readonly="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_buku">Nama Buku</label><br>
                                                                        <input type="text" class="form-control form-control-user" id="nama_buku" name="nama_buku" value="<?php echo $r->nama_buku ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Close</span>
                                                                        </button>
                                                                        <button type="submit" name="tambah" class="btn btn-primary ml-1">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Edit</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--delete donatur-->
                                                <div class="modal fade" id="hapus_buku<?php echo $r->id ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Buku</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Anda yakin ingin menghapus <?= $r->nama_buku ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <a href="<?= base_url('buku/delet_buku?id=') ?><?= $r->id ?>" class="btn btn-primary">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('buku/tambah_buku') ?>" method="POST">
                    <div class="form-group">
                        <!-- <label for="role">Id</label> -->
                        <input type="hidden" class="form-control required" id="id" name="id" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Buku</label>
                        <input type="text" class="form-control required" id="nama_buku" name="nama_buku" required>
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