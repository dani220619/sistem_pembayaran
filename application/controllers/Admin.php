<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_thajaran');
        $this->load->model('M_transaksi');
        $this->load->helper('url');
        is_log_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';

        $data['siswa'] = $this->M_transaksi->jumlahsiswa();

        $this->db->select_sum('jumlah');
        $data['juml_spp'] = $this->db->get('spp_bulanan')->row_array();
        $this->db->select_sum('besar_tagihan');
        $data['juml_buku'] = $this->db->get('tagihan_buku')->row_array();
        // $this->db->select_sum('jumlah');
        // $data['juml_siswa'] = $this->db->get('user', 'role_id = 2')->row_array();
        // $this->db->select_sum('uang_masuk');
        // $data['kas_msk'] = $this->db->get('kas')->row_array();
        // $this->db->select_sum('uang_keluar');
        // $data['kas_klr'] = $this->db->get('kas')->row_array();
        // $this->db->select_sum('total_tagihan');
        // $this->db->where_in('status_bayar', '0');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function tahun_ajaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tahun Ajaran';
        $data['tahun_ajaran'] = $this->db->get('tahun_ajaran')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tahun_ajaran', $data);
        $this->load->view('templates/footer');
    }
    function tambah_thajaran()
    {
        $id_tahun = rand(00, 99);
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        $besar_spp = $this->input->post('besar_spp');
        $Status = $this->input->post('Status');
        $data = array(
            'id_tahun' => $id_tahun,
            'tahun_ajaran' => $tahun_ajaran,
            'besar_spp' => $besar_spp,
            'Status'   => $Status
        );
        $this->db->insert('tahun_ajaran', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tahun Ajaran berhasil ditambahkan !
      </div>');
        redirect('admin/tahun_ajaran');
    }
    function update_thajaran()
    {
        $id_tahun = $this->input->post('id_tahun');
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        $besar_spp = $this->input->post('besar_spp');
        $Status = $this->input->post('Status');
        $data = array(
            'id_tahun' => $id_tahun,
            'tahun_ajaran' => $tahun_ajaran,
            'besar_spp' => $besar_spp,
            'Status'     => $Status,
        );
        $where = array('id_tahun' => $id_tahun);
        $this->M_thajaran->update_data($where, $data, 'tahun_ajaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tahun Ajaran berhasil diubah
      </div>');
        redirect('admin/tahun_ajaran');
    }
    public function deleteAjaran()
    {
        $id_tahun = $this->input->get('id_tahun');
        $this->db->delete('tahun_ajaran', array('id_tahun' => $id_tahun));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tahun Ajaran berhasil dihapus
      </div>');
        redirect('admin/tahun_ajaran');
    }
    public function my_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/my_profile', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Role berhasil ditambahkan !
		  </div>');

            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role Access';
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akses Di ubah !
		  </div>');
    }
    public function update_role()
    {
        $role = $this->input->post('role');
        $id = $this->input->post('id');

        $data = ['role' => $role];
        $where = ['id' => $id];

        $this->db->where($where);
        $this->db->update('user_role', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Role berhasil diubah !
      </div>');

        redirect('admin/role');
    }

    public function delete_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Role berhasil dihapus !
      </div>');

        redirect('admin/role');
    }

    public function buat_admin()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Buat Admin';
        $data['admin'] = $this->db->get_where('user', ['role_id' => 1])->result_array();

        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|is_unique[user.nisn]', [
            'is_unique' => 'NISN must unique!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password to short!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/buat_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' =>  htmlspecialchars($this->input->post('fullname', true)),
                'nisn' =>  htmlspecialchars($this->input->post('nisn', true)),
                'jenis_kelamin' =>  1,
                'image' =>  'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun admin berhasil dibuat !
		  </div>');

            redirect('admin/buat_admin');
        }
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
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password saat ini salah !
		  </div>');

                redirect('admin/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan saat ini !
                  </div>');
                    redirect('admin/change_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah !
                  </div>');
                    redirect('admin/change_password');
                }
            }
        }
    }

    public function edit_admin()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $id = $this->input->post('id');

        $data = ['nama' => $nama, 'email' => $email];
        $where = ['id' => $id];

        $this->db->where($where);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Admin berhasil diubah !
      </div>');

        redirect('admin/buat_admin');
    }

    public function delete_admin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Admin berhasil dihapus !
      </div>');

        redirect('admin/buat_admin');
    }

    public function whatsapp()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Whatsapp';

        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/whatsapp', $data);
            $this->load->view('templates/footer');
        } else {
            $pesan = $this->input->post('pesan');

            $sql = "SELECT user.no_hp_ortu
                    FROM user
                    WHERE user.role_id = 2";
            $no_hp = $this->db->query($sql)->result_array();

            foreach ($no_hp as $n) {

                $this->_sendwa($pesan, $no_hp, $n);
            }


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pesan berhasil dikirim !
          </div>');

            redirect('admin/whatsapp');
        }
    }

    private function _sendwa($pesan, $no_hp, $n)
    {
        $n = $n['no_hp_ortu'];
        $curl = curl_init();
        $token = "2APPlbuVrzVm4D9WVZZOtRzB034znPIuQdMn85fPYVd7px2fncFMmD2V7ZmTlXA4";
        $payload = [
            "data" => [
                [
                    'phone' => $n,
                    'message' => $pesan,
                    'secret' => false, // or true
                    'priority' => false, // or true
                ],
            ],
        ];

        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "Content-Type: application/json"
            )
        );

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/v2/send-bulk/text");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        echo "<pre>";
        // print_r($result);
    }
    public function data_siswa()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Siswa';

        $sql = "SELECT user.id, user.nisn,user.nama,user.alamat,user.no_hp
        from user 
        where user.role_id=2";

        $data['data_siswa'] = $this->db->query($sql)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function delete_siswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Siswa berhasil dihapus !
      </div>');

        redirect('admin/data_siswa');
    }

    public function edit_siswa()
    {
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $id = $this->input->post('id');

        $sql = "UPDATE user 
        SET user.nisn = '$nisn', user.nama = '$nama', user.alamat = '$alamat', user.no_hp ='$no_hp'
        WHERE user.id = $id";

        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data siswa berhasil diubah !
      </div>');

        redirect('admin/data_siswa');
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
        $this->load->view('admin/edit_profil', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profil_aksi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');


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
                redirect('admin/my_profile');
            }
        }

        $this->db->set('nisn', $nisn);
        $this->db->set('nama', $nama);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Profile berhasil di ubah!
		  </div>');
        redirect('admin/my_profile');
    }

    public function buat_akun_siswa()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "Tambah Akun Siswa";

        $sql = "SELECT user.* , rombel.rombel
                    FROM USER, rombel
                    WHERE user.`rombel_id` = rombel.id
                    AND user.role_id = 2";
        $data['siswa'] = $this->db->query($sql)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/buat_akun_siswa', $data);
        $this->load->view('templates/footer');
    }
    public function form_registrasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_hp_ortu', 'no hp ortu', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email must unique!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Akun Siswa";

            $sql = "SELECT user.* , rombel.rombel
                    FROM USER, rombel
                    WHERE user.`rombel_id` = rombel.id
                    AND user.role_id = 2";
            $data['siswa'] = $this->db->query($sql)->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/form_registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nisn' => $this->input->post('nisn', true),
                'nama' =>  htmlspecialchars($this->input->post('fullname', true)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'rombel_id' => $this->input->post('jurusan', true),
                'tempat_lahir' =>  htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'no_hp' => $this->input->post('no_hp', true),
                'no_hp_ortu' => $this->input->post('no_hp_ortu', true),
                'alamat' => $this->input->post('alamat', true),
                'email' =>  htmlspecialchars($this->input->post('email', true)),
                'image' =>  'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tahun_masuk' => date("Y"),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun berhasil dibuat !
		  </div>');

            redirect('admin/buat_akun_siswa');
        }
    }
    public function edit_siswa1()
    {
        $id = $this->input->post('id');
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tgl_lahir');
        $no_hp = $this->input->post('no_hp');
        $no_hp_ortu = $this->input->post('no_hp_ortu');
        $rombel = $this->input->post('rombel');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $status = $this->input->post('status');

        $data = [
            'nisn' => $nisn,
            'nama' => $nama,
            'email' => $email,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tanggal_lahir,
            'no_hp' => $no_hp,
            'no_hp_ortu' => $no_hp_ortu,
            'rombel_id' => $rombel,
            'tahun_masuk' => $tahun_masuk,
            'is_active' => $status
        ];
        $where = ['id' => $id];

        $this->db->where($where);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Siswa berhasil diubah !
      </div>');

        redirect('admin/buat_akun_siswa');
    }
    public function delete_siswa1($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Siswa berhasil dihapus !
      </div>');

        redirect('admin/buat_akun_siswa');
    }
}
