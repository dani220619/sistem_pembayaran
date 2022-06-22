<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
        $this->load->model('M_transaksi');
        $this->load->model('M_jenis_pembayaran');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function my_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/my_profile', $data);
        $this->load->view('templates/footer');
    }
    public function change_password()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('current_password', 'Password saat ini', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password baru', 'required|trim|min_length[6]|matches[konfirmasi_password]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'required|trim|min_length[6]|matches[new_password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password saat ini salah !
		  </div>');

                redirect('user/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan saat ini !
                  </div>');
                    redirect('user/change_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah !
                  </div>');
                    redirect('user/change_password');
                }
            }
        }
    }

    public function edit_profil()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profil';

        // $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        // $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        // $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        // $this->form_validation->set_rules('image', 'Foto', 'required|trim');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit_profil', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profil_aksi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');


        //cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image'];




        //ika ada gambar yang di upload

        if ($upload_image) {
            $config['upload_path']          = './assets/assets/images/profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH, './assets/assets/images/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('user/my_profile');
            }
        }

        $this->db->set('nisn', $nisn);
        $this->db->set('nama', $nama);
        $this->db->set('no_hp', $no_hp);
        $this->db->set('tempat_lahir', $tempat_lahir);
        $this->db->set('tgl_lahir', $tgl_lahir);
        $this->db->set('alamat', $alamat);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Profile berhasil di ubah!
		  </div>');
        redirect('user/my_profile');
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
}
