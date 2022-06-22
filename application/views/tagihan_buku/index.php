<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Tagihan Buku</h3>
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
                                        <h4 class="card-title">Tabel Tagihan Buku</h4>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahthajaran">Tambah Tagihan Buku</a>
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
                                                <th>ID</th>
                                                <th>User id</th>
                                                <th>Tahun Ajaran</th>

                                                <th>Is Active</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($tagihan_buku as $t) :
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $t->id_tag_buku ?></td>
                                                    <td><?php echo $t->user_id ?></td>
                                                    <td><?php echo $t->tahun_ajaran_id ?></td>

                                                    <td><?php echo $t->is_active ?></td>
                                                    <td class="text-bold-500">
                                                        <a class=" btn badge bg-danger"><i data-feather="trash-2" width="20" class="mb-1" data-bs-toggle="modal" data-bs-target="#deletetagbuku<?php echo $t->id_tag_buku ?>"></i>Hapus</a>
                                                    </td>
                                                </tr>

                                                <!--delete donatur-->
                                                <div class="modal fade" id="deletetagbuku<?= $t->id_tag_buku ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Tagihan Buku</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Anda yakin ingin menghapus Tagihan Buku Dengan Nama <?= $t->id_tag_buku ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('tagihan_buku/delete_tagbuku?id_tag_buku=') ?><?= $t->id_tag_buku ?>" class="btn btn-primary">Hapus</a>
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
                <h5 class="modal-title" id="addNewAdminLabel">Tambah Tagihan Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </button>
            </div>
            <div class="p-5">
                <form class="user" method="post" action="<?= base_url('tagihan_buku/tambah_tagbuku'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="status_bayar" name="status_bayar" placeholder="Masukan status_bayar" value="<?= set_value('status_bayar'); ?>" hidden>
                        <input type="text" class="form-control form-control-user" id="id_tag_buku" name="id_tag_buku" placeholder="Masukan id_tag_buku" value="<?= set_value('id_tag_buku'); ?>" hidden>
                        <?= form_error('id_tag_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <input name="user_id" class="form-control" type="text" value="<?= $user['id']; ?>" hidden>
                    <div class="form-group">

                        <select class="selectpicker" data-mdb-filter="true" title="Pilih siswa" name="nisn[]" id="nisn" data-actions-box="true" data-virtual-scroll="false" data-live-search="true" multiple required>
                            <?php
                            foreach ($this->db->query('SELECT a.nisn, a.nama FROM user a where role_id = 2 ')->result() as $sis) { /*$this->m_transaksi->tampil_datatahun()->result() */
                            ?>
                                <option value="<?php echo $sis->nisn ?>"> <?php echo $sis->nisn . ' | ' . $sis->nama . '' ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select id="tahun_ajaran" name="tahun_ajaran_id" class="form-control">
                            <option>Pilih Tahun Ajaran</option>
                            <?php
                            foreach ($this->db->query('SELECT a.id_tahun, a.tahun_ajaran FROM tahun_ajaran a where Status="ON"')->result() as $sis) { /*$this->m_transaksi->tampil_datatahun()->result() */
                            ?>

                                <option value="<?php echo $sis->tahun_ajaran ?>"> <?php echo  $sis->tahun_ajaran  ?> </option>
                            <?php } ?>
                        </select>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('.bootstrap-select').selectpicker();
    });
</script>
<script>
    function CekInput() {
        a = $("select#jenis_pembayaran option").filter(":selected").val();
        console.log(a);
        if (a == 'Semester 1') {
            $("input#saldo").val('<?= $semester1 ?>');
        } else if (a == 'Semester 2') {
            $("input#saldo").val('<?= $semester2 ?>');
        } else if (a == 'Semester 3') {
            $("input#saldo").val('<?= $semester3 ?>');
        } else if (a == 'Semester 4') {
            $("input#saldo").val('<?= $semester4 ?>');
        } else if (a == 'Semester 5') {
            $("input#saldo").val('<?= $semester5 ?>');
        } else if (a == 'Semester 6') {
            $("input#saldo").val('<?= $semester6 ?>');
        }
    }
</script>