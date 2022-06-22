<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="<?= base_url('assets/assets/images/logo/logo.png') ?>" height="150" class='mb-4'>
                        <h3>Sign Up</h3>
                        <p>Please fill the form to register.</p>
                    </div>
                    <form action="<?= base_url('auth/registration') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="fullname">NISN</label>
                                    <input type="number" id="nisn" class="form-control" value="<?= set_value('nisn') ?>" name="nisn">
                                    <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" id="fullname" class="form-control" value="<?= set_value('fullname') ?>" name="fullname">
                                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis kelamin</label>
                                    <select class="form-select" aria-label="jenis_kelamin" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>">
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="1">Laki - laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-select" aria-label="jurusan" name="jurusan" id="jurusan" value="<?= set_value('jurusan') ?>">
                                        <option selected disabled>Jurusann</option>
                                        <option value="1">IPS</option>
                                        <option value="2">IPA</option>
                                    </select>
                                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat lahir</label>
                                    <input type="text" id="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir') ?>" name="tempat_lahir">
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal lahir</label>
                                    <input type="date" id="tgl_lahir" class="form-control" value="<?= set_value('tgl_lahir') ?>" name="tgl_lahir">
                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="no_hp">Nomor HP</label>
                                    <input type="text" id="no_hp" class="form-control" value="<?= set_value('no_hp') ?>" name="no_hp">
                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" value="<?= set_value('email') ?>" name="email">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input type="password" id="password1" class="form-control" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password2">Ulangi Password</label>
                                    <input type="password" id="password2" class="form-control" name="password2">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">No hp ortu</label>
                                    <input type="text" class="form-control" name="no_hp_ortu" id="no_hp_ortu" required>
                                    <?= form_error('no_hp_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" aria-label="With textarea"></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </diV>

                        <a href="<?= base_url('auth') ?>">Have an account? Login</a>
                        <div class="clearfix">
                            <button class="btn btn-primary float-end" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>