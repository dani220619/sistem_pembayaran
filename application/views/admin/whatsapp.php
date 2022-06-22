<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <?= $this->session->flashdata('message');  ?>
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="card-title pl-1">Kirim pesan whatsapp</h1>
                </div>
                <div class="container">
                    <form action="<?= base_url('admin/whatsapp') ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <h4>Isi Pesan : </h4>
                            <textarea name="pesan" id="pesan" cols="80" rows="10" class="form-cotrol"></textarea>
                            <div>
                                <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</div>