<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Tahun Ajaran</h3>
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
                                        <h4 class="card-title">Tabel Tahun Ajaran</h4>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahthajaran">Tambah Tahun Ajaran</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID tahun</th>
                                                <th>Tahun ajaran</th>
                                                <th>Besar spp</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($tahun_ajaran as $t) :
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $t->id_tahun ?></td>
                                                    <td><?php echo $t->tahun_ajaran ?></td>
                                                    <td><b>Rp. <?= number_format($t->besar_spp) ?></b></td>
                                                    <td><?php echo $t->Status ?></td>
                                                    <td class="text-bold-500">

                                                        <a class="btn badge bg-success"><i data-feather="edit" width="20" class="mb-1" data-bs-toggle="modal" data-bs-target="#updatethajaran<?php echo $t->id_tahun ?>"></i>Edit</a>
                                                        <a class=" btn badge bg-danger"><i data-feather="trash-2" width="20" class="mb-1" data-bs-toggle="modal" data-bs-target="#deleteAjaran<?php echo $t->id_tahun ?>"></i>Hapus</a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="updatethajaran<?= $t->id_tahun ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addNewDonaturLabel">Update Tahun Ajaran </h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="p-5">
                                                                <form class="user" method="post" action="<?= base_url('admin/update_thajaran'); ?>" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id_tahun" value="<?php echo $t->id_tahun ?>">
                                                                        <label>Tahun Ajaran</label>
                                                                        <input type="text" class="form-control form-control-user" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $t->tahun_ajaran ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Besar Spp</label>
                                                                        <input type="text" class="form-control form-control-user" id="rupiah" name="besar_spp" value="<?php echo $t->besar_spp ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status :</label><br>
                                                                        &nbsp<input type="radio" name="Status" id="ON" class="with-gap" value="ON" <?php if ($t->Status == 'ON') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?> />
                                                                        <label for="ON" class="m-l-20">ON</label>
                                                                        <input type="radio" name="Status" id="OFF" class="with-gap" value="OFF" <?php if ($t->Status == 'OFF') {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?> />
                                                                        <label for="OFF" class="m-l-20">OFF</label>
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
                                                <div class="modal fade" id="deleteAjaran<?= $t->id_tahun ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Tahun Ajaran</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Anda yakin ingin menghapus Tahun Ajaran <?= $t->tahun_ajaran ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('admin/deleteAjaran?id_tahun=') ?><?= $t->id_tahun ?>" class="btn btn-primary">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $no++; ?>
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


<div class="modal fade" id="tambahthajaran" tabindex="-1" role="dialog" aria-labelledby="addNewAdminLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewAdminLabel">Tambah Tahun Ajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </button>
            </div>
            <div class="p-5">
                <form class="user" method="post" action="<?= base_url('admin/tambah_thajaran'); ?>" enctype="multipart/form-data">
                    <div class="form-group">

                        <input type="text" class="form-control form-control-user" id="id_tahun" name="id_tahun" placeholder="Masukan id_tahun" value="<?= set_value('id_tahun'); ?>" hidden>
                        <?= form_error('id_tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="number" class="form-control form-control-user" id="tahun_ajaran" name="tahun_ajaran" placeholder="Masukan tahun_ajaran" value="<?= set_value('tahun_ajaran'); ?>">
                        <?= form_error('tahun_ajaran', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <span id="format2"></span>
                        <label>Besar Spp</label>
                        <input type="text" class="form-control form-control-user" id="saldo" name="besar_spp" placeholder="Masukan besar_spp" value="<?= set_value('besar_spp'); ?>" onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);">
                        <?= form_error('besar_spp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Status :</label><br>
                        &nbsp<input type="radio" name="Status" id="ON" class="with-gap" value="ON">
                        <label for="ON" class="m-l-20">ON</label>
                        <input type="radio" name="Status" id="OFF" class="with-gap" value="OFF">
                        <label for="OFF" class="m-l-20">OFF</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
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