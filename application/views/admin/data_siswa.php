<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <?= $this->session->flashdata('message');  ?>
            <div class="card shadow">
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_siswa as $ds) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $ds['nisn'] ?></td>
                                    <td><?= $ds['nama'] ?></td>
                                    <td><?= $ds['alamat'] ?></td>
                                    <td><?= $ds['no_hp'] ?></td>
                                    <td>
                                        <a class="btn badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal1<?= $ds['id']; ?>"><i data-feather="edit" width="20" class="mb-1"></i>Edit</a>


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1<?= $ds['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/edit_siswa') ?>" method="POST">
                                                            <div class="mb-3">
                                                                <label for="nisn" class="form-label">NISN</label>
                                                                <input type="nisn" class="form-control" id="nisn" value="<?= $ds['nisn']; ?>" aria-describedby="nisn" name="nisn">
                                                                <input type="id" class="form-control" id="id" aria-describedby="id" name="id" hidden>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nisn" class="form-label">id</label>
                                                                <input type="id" class="form-control" id="id" value="<?= $ds['id'] ?>" aria-describedby="id" name="id" hidden>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama" value="<?= $ds['nama']; ?>" name="nama">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <textarea type="text" class="form-control" id="alamat" name="alamat"><?= $ds['alamat']; ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="no_hp" class="form-label">No HP</label>
                                                                <input type="text" class="form-control" name="no_hp" value="<?= $ds['no_hp']; ?>" id="no_hp">
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

                                        <a class="btn badge bg-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('admin/delete_siswa/' . $ds['id']) ?>"><i data-feather="trash-2" width="20" class="mb-1"></i>Hapus</a>
                                    </td>

                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</div>