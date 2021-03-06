<style>
	@media print {

		h3,
		.sidebar,
		#santri,
		#cari-tunggakan,
		#cetak-tunggakan,
		hr,
		label {
			display: none;
		}

		.container-fluid {
			background-color: #fff;
		}

		.table {
			margin-bottom: 0;
		}

		.table-bordered {
			color: #000;
			border: 1px solid #000;
		}
	}
</style>
<div class="container-fluid">
	<h3>Laporan Tunggakan</h3>
	<div class="form-group" id="form-nis">
		<label>NISN/Nama Siswa</label>
		<input list="nisn" name="nisn" id="siswa" class="form-control" style="max-width: 200px" placeholder="Ketik nisn/Nama" value="<?= $_GET['nisn'] ?? '' ?>">
		<datalist id="nisn">
			<option value="">Semua</option>
			<?php
			$siswa = $this->db->query("SELECT nisn, nama FROM user ORDER BY nisn")->result();
			foreach ($siswa as $data) {
				echo '<option value="' . $data->nisn . '">' . $data->nisn . ' | ' . $data->nama . '</option>';
			}
			?>
		</datalist><br>
		<button id="cari-tunggakan" class="btn btn-success" onclick="javascript: window.location = '<?= base_url('laporan/laporan_tunggakan?nisn=') ?>'+$('#siswa').val();">Cari</button>
	</div>
	<hr>
	<div style="<?= (isset($_GET['nisn']) ? 'display: block;' : 'display: none;') ?>">
		<button id="cetak-tunggakan" class="btn btn-success" onclick="print()">Print</button>
		<center>
			<table>
				<tr>
					<td>
						<img src="<?= base_url('assets/img/aplikasi/logo.png') ?>" style="width: 100px; height: 100px;">
					</td>
					<td>
						<center>
							<h5>LAPORAN TUNGGAKAN</h5>
							<h3>SMA N 1 SELOMERTO</h3>
							<p>JL. BALEKAMBANG KM 4 SELOMERTO, Balekambang, Kec. Selomerto, Kab. Wonosobo Prov. Jawa Tengah</p>
						</center>
					</td>
				</tr>
			</table>
			<h4>LAPORAN TUNGGAKAN</h4>
		</center>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width: 5%;text-align: center">No.</th>
					<th style="width: 15%;text-align: center">NIS</th>
					<th style="width: 30%;text-align: center">Nama</th>
					<th style="width: 10%;text-align: center">Th. Ajaran</th>
					<th style="width: 15%;text-align: center">Total (Rp.)</th>
					<th style="width: 20%;text-align: center">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($_GET['nisn']) && $_GET['nisn'] != '')
					$where = " AND z.nisn='" . $_GET['nisn'] . "' ";
				else
					$where = "";

				$sql = "
						SELECT z.* FROM 
						(
							SELECT g.*, s.nama, ta.besar_spp, '1' AS jenis  FROM 
							(
								SELECT a.id_pem_bulan AS id_pem,a.nisn,a.tahun_ajaran,a.jenis_pembayaran,f.total_spp AS total_bayar,IFNULL(f.jml_bulan,0) AS jml_bulan,IF(f.jml_bulan = 12, 'Lunas', 'Belum Lunas') AS status_bayar 
								FROM pembayaran_bulanan a
								LEFT JOIN 
								(
									SELECT e.nisn,e.tahun_ajaran,SUM(e.besar_spp) AS total_spp,COUNT(e.id_bulan) AS jml_bulan FROM 
									(
										SELECT b.id_transaksi,b.nisn,b.id_bulan,b.id_tahun,c.tahun_ajaran,b.jumlah AS besar_spp
										FROM spp_bulanan b
										INNER JOIN tahun_ajaran c ON b.id_tahun = c.id_tahun
										WHERE b.status='0'
									) e GROUP BY e.nisn,e.tahun_ajaran
								) f ON a.nisn = f.nisn AND a.tahun_ajaran = f.tahun_ajaran
							) g
							INNER JOIN user s ON g.nisn = s.nisn
							INNER JOIN tahun_ajaran ta ON g.tahun_ajaran = ta.tahun_ajaran
							UNION ALL
							SELECT a.id_tag_buku AS id_pem, a.nisn, a.tahun_ajaran, a.jenis_pembayaran, a.total_tagihan AS total_bayar, 0 AS jml_bulan, IF(a.status_bayar = '0', 'Lunas', 'Belum Lunas') AS status_bayar, s.nama_santri, 0 AS besar_spp, '2' AS jenis
							FROM tagihan_buku a
							INNER JOIN user s ON a.nisn = s.nisn
						) z
						WHERE z.status_bayar = 'Belum Lunas'" . $where . "
						ORDER BY z.nisn, z.jenis
					   ";
				$result = $this->db->query($sql)->result_array();
				$nisn_old = '';
				$no = 0;
				foreach ($result as $v) {
					if ($nisn_old != trim($v['nisn'])) {
						$no++;
						$cno = $no;
						$nisn = trim($v['nisn']);
						$nama_santri = $v['nama'];
						$nisn_old = $nis;
					} else {
						$cno = '';
						$nisn = '';
						$nama_santri = '';
					}

					echo '<tr>
							<td style="text-align: center;">' . $cno . '</td>
							<td style="text-align: center;">' . $nisn . '</td>
							<td>' . $nama . '</td>
							<td style="text-align: center;">' . $v['tahun_ajaran'] . '</td>
							<td style="text-align: right;">' . number_format(($v['jenis'] == '1' && $v['jml_bulan'] == 0 ? 12 * $v['besar_spp'] : ($v['jenis'] == '1' && $v['jml_bulan'] > 0 ? (12 * $v['besar_spp']) - $v['total_bayar'] : $v['total_bayar'])), 0, ',', '.') . '</td>
							<td>' . $v['jenis_pembayaran'] . '</td>
						  </td>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>