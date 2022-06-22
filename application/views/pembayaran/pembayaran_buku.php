<script>
    var _issubmit = false;
</script>
<div class="card-body">
    <div class="card shadow mb-4 border-bottom-primary" id="tagihanbulanan" value="0">

        <a href="#tagihanbulan" class="d-block bg-primary border border-primary card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-white">Tagihan Buku</h6>
        </a>


        <div class="collapse show" id="tagihanbulan">

            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NISN</th>
                                <th>Tahun Ajaran</th>
                                <th>Jenis Pembayaran</th>
                                <th>Dibayar</th>
                                <th>No Virtual Akun</th>
                                <th>Status Bayar</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            foreach ($siswa_buku as $t) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $t->nisn ?></td>
                                    <td><?php echo $t->tahun_ajaran_id ?></td>
                                    <td><?php echo $t->jenis_pembayaran ?></td>
                                    <td><?php echo $t->besar_tagihan ?></td>
                                    <td><?php echo $t->no_virtual ?></td>


                                    <!-- <td style="<?= ($t->status_bayar == 'Lunas' ? 'color: green' : 'color: red') ?>"><?php echo $t->status_bayar ?></td> -->
                                    <td style="<?= ($t->status_bayar == '0' ? 'color: green' : 'color: red') ?>"><?php echo ($t->status_bayar == '0' ? 'Lunas' : ($t->status_bayar == '1' ? 'Pending' : 'Belum Lunas')) ?></td>
                                    <td>
                                        <!-- <a href="#" class='btn btn-dange' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatetagbuku<?= $t->id_tag_buku ?>">Bayar</a> -->
                                        <?php if ($t->status_bayar != '0' && $t->status_bayar != '1') { ?>
                                            <a href="#" class="btn btn-danger" style="font-size:15px;color:#fff" data-toggle="modal" data-target="#updatetagbuku<?= $t->id_tag_buku ?>">Bayar</a>
                                        <?php }
                                        #untuk cek status transaksi
                                        if (($t->status_bayar == '1' || $t->status_bayar == '2') && $t->metode_pembayaran == 'Online') {

                                            echo '<a href="javascript:void(0)" onclick="cekStatusTransaksi(\'' . $t->id_tag_buku . '\',\'' . $t->nisn . '\',\'' . $t->order_id . '\')"><input type=reset class="btn btn-warning" value=\'Cek Transaksi\'></a>';

                                            echo anchor('pembayaran/hapus_pemlainya/' . $t->id_tag_buku . '/' . $t->nisn . '/' . $t->order_id, '<input type=reset class="btn btn-danger" value=\'Hapus\'>');
                                        } elseif ($t->status_bayar == '0') {
                                            echo anchor('pembayaran/cetak_kwitansi_pembayaran/' . $t->id_tag_buku . '/' . $t->nisn, 'Cetak', array('title' => 'Cetak Kwitansi Pembayaran', 'class' => 'btn btn-info'));
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updatetagbuku<?= $t->id_tag_buku ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Pembayaran Buku </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <form id="form-pembayaran-buku<?= $t->id_tag_buku ?>" class="user" method="post" action="<?= base_url('pembayaran/pem_buku'); ?>" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="id-tag-buku<?= $t->id_tag_buku ?>">Id</label><br>
                                                        <input type="text" class="form-control form-control-user" id="id-tag-buku<?= $t->id_tag_buku ?>" name="id_tag_buku" value="<?php echo $t->id_tag_buku ?>" readonly>
                                                        <input type="hidden" id="nisn<?= $t->id_tag_buku ?>" name="nisn" value="<?php echo $t->nisn ?>">
                                                        <input type="hidden" id="status-bayar<?= $t->id_tag_buku ?>" name="status_bayar" value="<?php echo $t->status_bayar ?>">
                                                        <input type="hidden" id="tanggal-bayar<?= $t->id_tag_buku ?>" name="tanggal_bayar" value="<?php echo $tgl_bayar; ?>">
                                                        <input type="hidden" name="result_type" id="result-type<?= $t->id_tag_buku ?>" value="">
                                                        <input type="hidden" name="result_data" id="result-data<?= $t->id_tag_buku ?>" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Semester</label>
                                                        <select id="jenis-pembayaran<?= $t->id_tag_buku ?>" name="jenis_pembayaran" class="form-control" onchange="CekInput(this.value, '<?= $t->id_tag_buku ?>')">
                                                            <option selected disabled>Pilih Semester</option>
                                                            <?php
                                                            foreach ($this->db->query('SELECT * from jenis_pembayaran')->result() as $sis) { /*$this->m_transaksi->tampil_datatahun()->result() */
                                                            ?>

                                                                <option value="<?php echo $sis->jenis_pembayaran ?>"> <?php echo $sis->jenis_pembayaran ?> | Rp.<?php echo number_format($sis->besar_tagihan) ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>kelas</label>
                                                        <select id="kelas<?= $t->id_tag_buku ?>" name="kelas" class="form-control">
                                                            <option selected disabled>Pilih kelas</option>
                                                            <?php
                                                            foreach ($this->db->query('SELECT * from kelas')->result() as $sis) { /*$this->m_transaksi->tampil_datatahun()->result() */
                                                            ?>

                                                                <option value="<?php echo $sis->id ?>"><?php echo $sis->kelas ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jurusan</label>
                                                        <select id="jurusan<?= $t->id_tag_buku ?>" name="jurusan" class="form-control">
                                                            <option selected disabled>Pilih jurusan</option>
                                                            <?php
                                                            foreach ($this->db->query('SELECT * from rombel')->result() as $sis) { /*$this->m_transaksi->tampil_datatahun()->result() */
                                                            ?>

                                                                <option value="<?php echo $sis->id ?>"><?php echo $sis->rombel ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Total Tagihan</label>
                                                        <input type="text" class="form-control form-control-user" id="total-tagihan<?= $t->id_tag_buku ?>" name="besar_tagihan" placeholder="" value="" readonly>
                                                    </div>
                                                    <div class="form-group col-14 ">
                                                        <label>Metode Pembayaran</label>
                                                        <select id="metode-pembayaran<?= $t->id_tag_buku ?>" class="form-control" name="metode_pembayaran" required>
                                                            <option value="">Pilih Metode Pembayaran</option>
                                                            <option value="Online">Online</option>
                                                            <?php if ($_SESSION["role_id"] == "1") { ?>
                                                                <option value="Manual">Bayar Ditempat</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        //var _issubmit = false;
                                        //$(document).ready(function() {
                                        $("#form-pembayaran-buku<?= $t->id_tag_buku ?>").submit(function(e) {
                                            e.preventDefault();
                                            //alert($('#metode-pembayaran<?= $t->id_tag_buku ?>').val());exit;
                                            if ($('#metode-pembayaran<?= $t->id_tag_buku ?>').val() == 'Online' && _issubmit === false) {
                                                _issubmit = true;
                                                var _id = $('#id-tag-buku<?= $t->id_tag_buku ?>').val();
                                                var _nisn = $('#nisn<?= $t->id_tag_buku ?>').val();
                                                var _namasiswa = $('#nm-siswa<?= $t->id_tag_buku ?>').val(); //ada di detail_santri.php
                                                var _total = $('#total-tagihan<?= $t->id_tag_buku ?>').val(); //text().split('|')[1].replace('Rp. ', '').replace('.', '');
                                                var _jenispembayaran = $('#jenis-pembayaran<?= $t->id_tag_buku ?>').val();
                                                //alert('a');exit;
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?= base_url() ?>snap_lainnya/token',
                                                    data: {
                                                        id: _id,
                                                        nisn: _nisn,
                                                        nama_siswa: _namasiswa,
                                                        total: _total,
                                                        jenis_pembayaran: _jenispembayaran
                                                    },
                                                    cache: false,
                                                    success: function(data) {
                                                        console.log('token = ' + data);
                                                        //alert(data);exit;
                                                        var resultType = document.getElementById('result-type<?= $t->id_tag_buku ?>');
                                                        var resultData = document.getElementById('result-data<?= $t->id_tag_buku ?>');

                                                        function changeResult(type, data) {
                                                            $("#result-type<?= $t->id_tag_buku ?>").val(type);
                                                            $("#result-data<?= $t->id_tag_buku ?>").val(JSON.stringify(data));
                                                        }
                                                        snap.pay(data, {
                                                            onSuccess: function(result) {
                                                                changeResult('success', result);
                                                                console.log(result.status_message);
                                                                console.log(result);
                                                                //alert('success');
                                                                $("#form-pembayaran-buku<?= $t->id_tag_buku ?>").submit();
                                                            },
                                                            onPending: function(result) {
                                                                changeResult('pending', result);
                                                                console.log(result.status_message);
                                                                //alert('pending');
                                                                $("#form-pembayaran-buku<?= $t->id_tag_buku ?>").submit();
                                                            },
                                                            onError: function(result) {
                                                                changeResult('error', result);
                                                                console.log(result.status_message);
                                                                //alert('error');
                                                                $("#form-pembayaran-buku<?= $t->id_tag_buku ?>").submit();
                                                            }
                                                        });
                                                    },
                                                    error: function(jqXHR, textStatus, errorThrown) {
                                                        alert('status code: ' + jqXHR.status + ' errorThrown: ' + errorThrown + ' responseText: ' + jqXHR.responseText);
                                                    }
                                                });
                                            } else {
                                                this.submit();
                                            }
                                        });
                                        //});
                                    </script>

                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
    <input type="hidden" name="result_type" id="result-type" value=""></div>
    <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>
-->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-UpR2ZlWMWplZAkJ2"></script>
<script>
    function CekInput(val, id) {
        a = val; //$("select#jenis_pembayaran option").filter(":selected").val();
        console.log(a);
        if (a == 'Semester 1') {
            $("input#total-tagihan" + id).val('<?= $semester1 ?>');
        } else if (a == 'Semester 2') {
            $("input#total-tagihan" + id).val('<?= $semester2 ?>');
        } else if (a == 'Semester 3') {
            $("input#total-tagihan" + id).val('<?= $semester3 ?>');
        } else if (a == 'Semester 4') {
            $("input#total-tagihan" + id).val('<?= $semester4 ?>');
        } else if (a == 'Semester 5') {
            $("input#total-tagihan" + id).val('<?= $semester5 ?>');
        } else if (a == 'Semester 6') {
            $("input#total-tagihan" + id).val('<?= $semester6 ?>');
        }
    }
</script>
<script type="text/javascript">
    function cekStatusTransaksi(_id, _nisn, _orderid) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>Snap_lainnya/cekStatusTransaksi/' + _id + '/' + _nisn + '/' + _orderid,
            data: {},
            cache: false,
            success: function(result) {
                alert(result);
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('status code: ' + jqXHR.status + ' errorThrown: ' + errorThrown + ' responseText: ' + jqXHR.responseText);
            }
        });
    }
</script>