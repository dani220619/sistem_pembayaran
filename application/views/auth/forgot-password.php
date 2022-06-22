<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <?= $this->session->flashdata('message');  ?>
                    <div class="text-center mb-3">
                        <img src="<?= base_url('assets/assets/images/logo/logo.png') ?>" height="150" class='mb-4'>
                        <h3>Forgot Password</h3>
                    </div>
                    <form action="<?= base_url('auth/forgotpassword') ?>" method="POST">
                        <div class="form-group position-relative has-icon-left">
                            <label for="email">Email</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" id="email" value="<?= set_value('email') ?>" name="email">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
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