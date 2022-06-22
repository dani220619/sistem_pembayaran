<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('M_transaksi');
        $this->load->model('M_jenis_pembayaran');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pembayaran';
        $data['siswa'] = $this->db->get_where('user', ['role_id' => 2])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($nisn)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pembayaran';
        $data['tgl_bayar'] = date("Y-m-d");
        $where1 = array('nisn' => $nisn);
        $data1['siswa'] = $this->M_transaksi->tampil_detail($where1)->result();
        $data['siswa_buku'] = $this->M_transaksi->tampil_buku($where1)->result();

        $sql = "select jenis_pembayaran.besar_tagihan from jenis_pembayaran where jenis_pembayaran.jenis_pembayaran = 'Semester 1'";
        $data['semester1'] = $this->db->query($sql)->row_array();
        $data['semester1'] = $data['semester1']['besar_tagihan'];

        $sql = "select jenis_pembayaran.besar_tagihan from jenis_pembayaran where jenis_pembayaran.jenis_pembayaran = 'Semester 2'";
        $data['semester2'] = $this->db->query($sql)->row_array();
        $data['semester2'] = $data['semester2']['besar_tagihan'];

        $sql = "select jenis_pembayaran.besar_tagihan from jenis_pembayaran where jenis_pembayaran.jenis_pembayaran = 'Semester 3'";
        $data['semester3'] = $this->db->query($sql)->row_array();
        $data['semester3'] = $data['semester3']['besar_tagihan'];

        $sql = "select jenis_pembayaran.besar_tagihan from jenis_pembayaran where jenis_pembayaran.jenis_pembayaran = 'Semester 4'";
        $data['semester4'] = $this->db->query($sql)->row_array();
        $data['semester4'] = $data['semester4']['besar_tagihan'];

        $sql = "select jenis_pembayaran.besar_tagihan from jenis_pembayaran where jenis_pembayaran.jenis_pembayaran = 'Semester 5'";
        $data['semester5'] = $this->db->query($sql)->row_array();
        $data['semester5'] = $data['semester5']['besar_tagihan'];

        $sql = "select jenis_pembayaran.besar_tagihan from jenis_pembayaran where jenis_pembayaran.jenis_pembayaran = 'Semester 6'";
        $data['semester6'] = $this->db->query($sql)->row_array();
        $data['semester6'] = $data['semester6']['besar_tagihan'];

        $sql = "
        SELECT a.id_pem_bulan,a.nisn,a.tahun_ajaran,a.jenis_pembayaran,f.total_spp,f.jml_bulan,IF(f.jml_bulan = 12, 'Lunas', 'Belum Lunas') AS status_bayar 
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
        WHERE a.nisn = '" . $nisn . "'
        ";
        $data1['pembayaran_bulanan'] = $this->db->query($sql)->result();


        $query = $this->db->query('SELECT * FROM user 
				WHERE nisn =' . $nisn .  '');
        if ($query->num_rows() == 0) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembayaran/detail_siswa', $data1);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembayaran/detail_siswa', $data1);
            $this->load->view('pembayaran/pembayaran_bulanan', $data1);
            $this->load->view('pembayaran/pembayaran_buku', $data);
            $this->load->view('templates/footer');
        }
    }

    function pem_buku()
    {
        $id_tag_buku = $this->input->post('id_tag_buku');
        $nisn = $this->input->post('nisn');
        $tanggal_bayar = $this->input->post('tanggal_bayar');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $besar_tagihan = $this->input->post('besar_tagihan');
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $status_bayar = $this->input->post('status_bayar');
        $statustype = $this->input->post('result_type');
        $statusdata = $this->input->post('result_data');
        $json = json_decode($statusdata, true);
        //echo $json['order_id'];exit;
        $no_virtual = ($metode_pembayaran == 'Manual' ? '' : $json['va_numbers'][0]['va_number'] . '|' . $json['va_numbers'][0]['bank']);
        $status = ($metode_pembayaran == 'Manual' ? '0' : ($statustype == 'success' ? '0' : ($statustype == 'pending' ? '1' : '2')));
        $orderid = ($metode_pembayaran == 'Manual' ? '' : $json['order_id']);
        $data = array(
            'id_tag_buku' => $id_tag_buku,
            'nisn' => $nisn,
            'tanggal_bayar' => $tanggal_bayar,
            'jenis_pembayaran' => $jenis_pembayaran,
            'besar_tagihan' => $besar_tagihan,
            'metode_pembayaran' => $metode_pembayaran,
            'no_virtual' => $no_virtual,
            'status_bayar' => $status,
            'order_id' => $orderid
        );
        // echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('pembayaran/detail/' . $nisn, '') . "';</script>"; exit;
        // var_dump($data);
        // die;
        $where = array('id_tag_buku' => $id_tag_buku);
        $sql = $this->M_jenis_pembayaran->update_data($where, $data, 'tagihan_buku');

        if ($sql) { // Jika sukses
            echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('pembayaran/detail/' . $nisn, '') . "';</script>";
        } else { // Jika gagal
            echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('pembayaran/detail/' . $nisn, '') . "';</script>";
        }
    }

    public function pembayaran_spp()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pembayaran';
        $data['siswa'] = $this->db->get_where('user', ['role_id' => 2])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/pembayaran_spp', $data);
        $this->load->view('templates/footer');
    }
    public function index_bulanan()
    {
        $data['title'] = 'Pembayaran Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembayaran_bulanan'] = $this->M_transaksi->tampil_data_spp()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/index_bulanan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_pem_bulanan()
    {

        // Ambil data yang dikirim dari form
        $id_pem_bulan = rand(0000, 9999);
        $nisn = $this->input->post('nisn[]', TRUE);
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        // $id_trans = rand(000000, 999999);
        $jenis_pembayaran =  $this->input->post('jenis_pembayaran');
        $data = array();

        $index = 0; // Set index array awal dengan 0
        foreach ($nisn as $key) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'nisn' => $key,
                'id_pem_bulan' => $id_pem_bulan++,  // Ambil dan set data nama sesuai index array dari $index
                'tahun_ajaran' => $tahun_ajaran,
                // 'id_trans' => $id_trans,  // Ambil dan set data telepon sesuai index array dari $index
                'jenis_pembayaran' => $jenis_pembayaran,

            ));

            $key;
        }

        $sql =  $this->db->insert_batch('pembayaran_bulanan', $data);
        // var_dump($data);
        // exit();
        // $sql = $this->M_transaksi->save_pem_bulanan($data);

        if ($sql) { // Jika sukses
            echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('pembayaran/index_bulanan') . "';</script>";
        } else { // Jika gagal
            echo "<script>alert('Data gagal disimpan');window.location = '" . base_url('pembayaran/index_bulanan') . "';</script>";
        }
    }

    public function spp_bulanan($id, $nisn)
    {
        $data['id_transaksi'] = $this->M_transaksi->id_transaksi();
        $data['tgl_bayar'] = date("Y-m-d");
        $data['title'] = 'Transaksi Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where1 = array('nis' => $nisn);

        $data['santri'] = $this->M_transaksi->tampil_data($where1)->result();
        $data['santri'] = $this->M_transaksi->tampil_detail($where1)->result();
        $data['tahun'] = $this->M_transaksi->tahun();
        $data['tahun'] = $this->db->get('tahun_ajaran')->result_array();
        $data['tahun_ajaran'] = $this->M_transaksi->session_tahun()->result();
        //$data['pem_bulan'] = $this->M_transaksi->pem_bulan($where1)->result();
        //filter berdasarkan tahun ajaran dan nis
        $sql = "
				SELECT a.*, b.nama_bulan, c.tahun_ajaran 
				FROM spp_bulanan a 
				JOIN bulan b ON a.id_bulan = b.id_bulan 
				JOIN tahun_ajaran c ON a.id_tahun = c.id_tahun 
				WHERE a.nisn='" . $nisn . "' 
				AND c.tahun_ajaran IN (
					SELECT d.tahun_ajaran FROM pembayaran_bulanan d WHERE d.id_pem_bulan='" . $id . "' 
				)
				ORDER BY a.id_tahun,a.id_bulan
				";
        $data['pem_bulan'] = $this->db->query($sql)->result();
        $data['thaj'] = $this->db->query("SELECT b.id_tahun 
						FROM pembayaran_bulanan a
						inner join tahun_ajaran b ON a.tahun_ajaran = b.tahun_ajaran  
						WHERE a.id_pem_bulan='" . $id . "'")->row()->id_tahun;
        $data['id_pem_bulan'] = $id;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/spp_bulanan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {

        // Ambil data yang dikirim dari form
        $bulan = $this->input->post('bulan[]', TRUE);
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        // $id_trans = rand(000000, 999999);
        $id_transaksi =  $this->input->post('id_transaksi');
        $tgl_bayar = $this->input->post('tgl_bayar');
        $id_tahun = $this->input->post('tahun_ajaran');
        $metode_pembayaran = $this->input->post('metode_pembayaran', TRUE);
        $id = $this->input->post('id');
        $idpembulan = $this->input->post('id_pem_bulan');
        $data = array();
        $statustype = $this->input->post('result_type');
        $statusdata = $this->input->post('result_data');
        $json = json_decode($statusdata, true);
        //echo $json['order_id'];exit;
        $status = ($metode_pembayaran == 'Manual' ? '0' : ($statustype == 'success' ? '0' : ($statustype == 'pending' ? '1' : '2')));
        $orderid = ($metode_pembayaran == 'Manual' ? '' : $json['order_id']);
        $no_virtual = ($metode_pembayaran == 'Manual' ? '' : $json['va_numbers'][0]['va_number'] . '|' . $json['va_numbers'][0]['bank']);

        $index = 0; // Set index array awal dengan 0
        #penyesuaian tambahan untuk simpan jumlah tabel spp_bulanan
        $jmlspp = $this->db->query("select besar_spp from tahun_ajaran where id_tahun = '" . $id_tahun . "'")->row()->besar_spp;
        foreach ($bulan as $key) { // Kita buat perulangan berdasarkan nisn sampai data terakhir
            array_push($data, array(
                'id_bulan' => $key,
                'nisn' => $nisn,  // Ambil dan set data nama sesuai index array dari $index
                'nama' => $nama,
                // 'id_trans' => $id_trans,  // Ambil dan set data telepon sesuai index array dari $index
                'id_transaksi' => $id_transaksi++,
                'tanggal_bayar' => $tgl_bayar,
                'metode_pembayaran' => $metode_pembayaran,
                'jumlah' => $jmlspp,
                'id_tahun' => $id_tahun,
                'id' => $id,  // Ambil dan set data alamat sesuai index array dari $index
                'Status' => $status,
                'order_id' => $orderid,
                'no_virtual' => $no_virtual
            ));

            $key;
        }
        // var_dump($data);
        // die;
        $sql = $this->M_transaksi->save_batch($data);
        if ($sql) { // Jika sukses
            echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('pembayaran/spp_bulanan/' . $idpembulan . '/' . $nisn, '') . "';</script>";
        } else { // Jika gagal
            echo "<script>alert('Data gagal disimpan');window.location = '" . base_url('pembayaran/spp_bulanan/' . $idpembulan . '/' . $nisn, '') . "';</script>";
        }
    }
    function hapus($id_transaksi, $nisn, $idpembulan)
    {
        $where = $id_transaksi;
        $where2 = array('id_transaksi' => $id_transaksi);
        $this->M_transaksi->copy_input($where);
        $this->M_transaksi->hapus_data($where2, 'spp_bulanan');
        if ($where2) { // Jika sukses
            echo "<script>alert('Data berhasil dihapus');window.location = '" . base_url('pembayaran/spp_bulanan/' . $idpembulan . '/' . $nisn, '') . "';</script>";
        } else { // Jika gagal
            echo "<script>alert('Data gagal dihapus');window.location = '" . base_url('pembayaran/spp_bulanan/' . $idpembulan . '/' . $nisn, '') . "';</script>";
        }
    }

    public function delete_pem_bulanan()
    {
        $id_pem_bulan = $this->input->get('id_pem_bulan');
        $this->db->delete('pembayaran_bulanan', array('id_pem_bulan' => $id_pem_bulan));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Berhasil!
          </div>');
        redirect('pembayaran/index_bulanan');
    }
    public function cetak_spp_bulanan($id, $nisn)
    {
        $data['tgl_cetak'] = date("Y-m-d H:i:s");
        $data['title'] = 'Cetak Kartu SPP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where1 = array('nisn' => $nisn);
        $data['siswa'] = $this->M_transaksi->tampil_detail($where1)->row();
        //filter berdasarkan tahun ajaran dan nisn
        $sql = "
				SELECT a.*, b.nama_bulan, c.tahun_ajaran 
				FROM spp_bulanan a 
				JOIN bulan b ON a.id_bulan = b.id_bulan 
				JOIN tahun_ajaran c ON a.id_tahun = c.id_tahun 
				WHERE a.nisn='" . $nisn . "' 
				AND c.tahun_ajaran IN (
					SELECT d.tahun_ajaran FROM pembayaran_bulanan d WHERE d.id_pem_bulan='" . $id . "' 
				)
				ORDER BY a.id_tahun,a.id_bulan
				";
        $data['pem_bulan'] = $this->db->query($sql)->result_array();
        $data['thaj'] = $this->db->query("SELECT b.tahun_ajaran 
						FROM pembayaran_bulanan a
						inner join tahun_ajaran b ON a.tahun_ajaran = b.tahun_ajaran  
						WHERE a.id_pem_bulan='" . $id . "'")->row()->tahun_ajaran;
        $data['id_pem_bulan'] = $id;
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/kartu_spp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_kwitansi_pembayaran($id, $nisn)
    {
        $data['tgl_cetak'] = date("Y-m-d H:i:s");
        $data['title'] = 'Transaksi Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where1 = array('nisn' => $nisn);
        $where2 = array('nisn' => $nisn, 'id_tag_buku' => $id);
        $data['siswa'] = $this->M_transaksi->tampil_detail($where1)->row();
        $data['tag_buku'] = $this->db->query("SELECT * FROM tagihan_buku WHERE id_tag_buku=" . $id . " AND nisn='" . $nisn . "'")->row();
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/kwitansi_pembayaran', $data);
        $this->load->view('templates/footer');
    }
}
