<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('templates/auth-header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/auth-footer');
        } else {
            //validasi email
            $this->_login();
        }
    }

    private function _login()
    {
        $nisn = $this->input->post('nisn');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nisn' => $nisn])->row_array();

        if ($user) {

            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'nisn' => $user['nisn'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth/index');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NISN belum aktif</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			NISN tidak terdaftar !
		  </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
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
            $data['title'] = "Registrasi akun";
            $this->load->view('templates/auth-header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth-footer');
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
                'date_created' => time()
            ];
            var_dump($data);
            die;
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun berhasil dibuat !
		  </div>');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Logout berhasil
		  </div>');

        redirect('auth');
    }

    public function blocked()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('auth/blocked', $data);
    }

    private function _sendEmail($token, $type, $nama)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aderohmatmaulana33@gmail.com',
            'smtp_pass' => '089612664228',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('aderohmatmaulana33@gmail.com', 'SMAN 1 Solomerto');
        $this->email->to($this->input->post('email'));
        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik Link Berikut Untuk Reset Password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth-header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth-footer');
        } else {
            $email = $this->input->post('email');
            $akun_user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($akun_user) {
                $token = base64_encode(openssl_random_pseudo_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot', $email);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Silahkan Cek Email Untuk Reset Password !
		  </div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email Tidak Terdaftar Atau Tidak Aktif !
		  </div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $akun_user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($akun_user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset Password Gagal, Token Salah !
		  </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset Password Gagal, Email Salah !
		  </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]|matches[password1]');


        if ($this->form_validation->run() == false) {

            $data['title'] = 'Change Password';
            $this->load->view('templates/auth-header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth-footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Password Besrhasil Diubah Silahkan Login !
		  </div>');
            redirect('auth');
        }
    }
}
