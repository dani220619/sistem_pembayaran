<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewAdmin">Tambah Jenis Pembayaran</a>
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Jenis Pembayaran</th>
                            <th>Besar Tagihan</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jen_pembayaran as $t) :
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $t->id_jen_pembayaran ?></td>
                                <td><?php echo $t->jenis_pembayaran ?></td>
                                <td><b>Rp. <?php echo number_format($t->besar_tagihan) ?></b></td>
                                <td><?= date('d F Y', $t->date_created)  ?></td>

                                <td>
                                    <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatejenpem<?= $t->id_jen_pembayaran ?>"></a>
                                    <a href="#" class='fas fa-trash' style='font-size:15px;color:red' data-toggle="modal" data-target="#deletejenpem<?= $t->id_jen_pembayaran ?>"></a>
                                </td>
                            </tr>
                            <!--update donatur-->
                            <div class="modal fade" id="updatejenpem<?= $t->id_jen_pembayaran ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Update Jenis Pembayaran </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <form class="user" method="post" action="<?= base_url('jenis_pembayaran/update'); ?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="id">Id</label><br>
                                                    <input type="hidden" name="id" value="<?php echo $t->id_jen_pembayaran ?>">
                                                    <input type="text" class="form-control form-control-user" id="id" name="id" value="<?php echo $t->id_jen_pembayaran ?>" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_pembayaran">Jenis Pembayaran</label><br>
                                                    <input type="text" class="form-control form-control-user" id="jenis_pembayaran" name="jenis_pembayaran" value="<?php echo $t->jenis_pembayaran ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="besar_tagihan">Besar Tagihan</label><br>
                                                    <input type="text" class="form-control form-control-user" id="rupiah" name="besar_tagihan" value="<?php echo $t->besar_tagihan ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--delete donatur-->
                            <div class="modal fade" id="deletejenpem<?= $t->id_jen_pembayaran ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Jenis Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus Jenis Pembayaran Dengan Nama <?= $t->jenis_pembayaran ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('jenis_pembayaran/delete_jenis_pembayaran?id=') ?><?= $t->id_jen_pembayaran ?>" class="btn btn-primary">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $no;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="addNewAdmin" tabindex="-1" role="dialog" aria-labelledby="addNewAdminLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewAdminLabel">Tambah Jenis Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-5">
                <form class="user" method="post" action="<?= base_url('jenis_pembayaran/tambah_aksi'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="id_jen_pembayaran" name="id_jen_pembayaran" placeholder="Masukan id_jen_pembayaran" value="<?= set_value('id_jen_pembayaran'); ?>" hidden>
                        <?= form_error('id_jen_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jenis_pembayaran" name="jenis_pembayaran" placeholder="Masukan Jenis Pembayaran" value="<?= set_value('jenis_pembayaran'); ?>">
                        <?= form_error('jenis_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <span id="format2"></span>
                        <label>Besar Tagihan</label>
                        <input type="text" class="form-control form-control-user" id="saldo" name="besar_tagihan" placeholder="Masukan besar tagihan" value="<?= set_value('besar_tagihan'); ?>" onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);">
                        <?= form_error('besar_tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function formatCurrency(saldo) {
        saldo - "0";
        sign = (saldo == (saldo = Math.abs(saldo)));
        saldo = Math.floor(saldo * 100 + 0.50000000001);
        cents = saldo % 100;
        saldo = Math.floor(saldo / 100).toString();
        if (cents < 10) {
            cents = "0" + cents;
            for (var i = 0; i < Math.floor((saldo.length - (1 + i)) / 3); i++)
                saldo = saldo.substring(0, saldo.length - (4 * i + 3)) + '.' +
                saldo.substring(saldo.length - (4 * i + 3));
            return (((sign) ? '' : '-') + 'Rp.' + saldo + ',' + cents);

        }
    }
</script>