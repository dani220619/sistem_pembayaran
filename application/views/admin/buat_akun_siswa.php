<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <?= $this->session->flashdata('message');  ?>
            <div class="card shadow">
                <a href="<?= base_url('admin/form_registrasi') ?>" class="btn btn-primary col-lg-2 my-3">Tambah Siswa</a>
                <div class="table-responsive p-3">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tahun Masuk</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($siswa as $s) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $s['nisn'] ?></td>
                                    <td><?= $s['nama'] ?></td>
                                    <td><?= $s['rombel'] ?></td>
                                    <td>
                                        <?php if ($s['jenis_kelamin'] == 2) : ?>
                                            <span>Laki - laki</span>
                                        <?php else : ?>
                                            <span>Perempuan</span>
                                        <?php endif; ?>

                                    </td>
                                    <td><?= $s['tahun_masuk'] ?></td>
                                    <td><?= $s['alamat'] ?></td>
                                    <td>
                                        <a href="#" class="btn badge rounded-pill bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal1<?= $s['id']; ?>">Edit</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1<?= $s['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/edit_siswa1') ?>" method="POST">
                                                            <div class="mb-3">
                                                                <label for="nisn" class="form-label">NISN</label>
                                                                <input type="number" class="form-control" id="nisn" name="nisn" value="<?= $s['nisn'] ?>" required>
                                                                <input type="text" id="id" class="form-control" value="<?= $s['id'] ?>" name="id" hidden>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $s['nama'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="<?= $s['email'] ?> " required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                                                    <option selected disabled value="">Pilih Jenis Kelamin</option>
                                                                    <option value="1">Laki - Laki</option>
                                                                    <option value="2">Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $s['tempat_lahir'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $s['tgl_lahir'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="no_hp" class="form-label">Nomor HP</label>
                                                                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $s['no_hp'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="no_hp_ortu" class="form-label">Nomor HP Orang Tua</label>
                                                                <input type="number" class="form-control" id="no_hp_ortu" name="no_hp_ortu" value="<?= $s['no_hp_ortu'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jueusan" class="form-label">Jurusan</label>
                                                                <select class="form-select" name="rombel" id="rombel" required>
                                                                    <option value="" selected disabled>Pilih Jurusan</option>
                                                                    <option value="1">IPS</option>
                                                                    <option value="2">IPA</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                                                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" value="<?= $s['tahun_masuk'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Status</label>
                                                                <select class="form-select" name="status" id="status" required>
                                                                    <option value="" selected disabled>Pilih Status</option>
                                                                    <option value="0">Aktif</option>
                                                                    <option value="1">Tidak Aktif</option>
                                                                </select>
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
                                        <a class="btn badge bg-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('admin/delete_siswa1/' . $s['id']) ?>">Hapus</a>
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