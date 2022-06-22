<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <?= $this->session->flashdata('message');  ?>
                    <div class="text-center mb-3">
                        <img src="<?= base_url('assets/assets/images/logo/logo.png') ?>" height="150" class='mb-4'>
                        <h3>Sign In</h3>
                        <p>Nama Instansi</p>
                    </div>
                    <form action="<?= base_url('auth/index') ?>" method="POST">
                        <div class="form-group position-relative has-icon-left">
                            <label for="nisn">NISN</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="nisn" value="<?= set_value('nisn') ?>" name="nisn">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                            <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                <a href="<?= base_url('auth/forgotpassword'); ?>" class='float-end'>
                                    <small>Forgot password?</small>
                                </a>
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>