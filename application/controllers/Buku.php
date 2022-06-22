<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_buku');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Buku';
        $data['buku'] = $this->db->get('buku')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }
    function tambah_buku()
    {
        $id = rand(0000, 9999);
        $nama_buku = $this->input->post('nama_buku');

        $data = array(
            'id' => $id,
            'nama_buku' => $nama_buku,
        );
        // var_dump($data);
        $this->db->insert('buku', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Buku berhasil ditambahkan !
      </div>');

        redirect('buku');
    }
    function update_buku()
    {
        $id = $this->input->post('id');
        $nama_buku = $this->input->post('nama_buku');

        $data = array(
            'id' => $id,
            'nama_buku' => $nama_buku,

        );
        $where = array('id' => $id);
        $this->M_buku->update_data($where, $data, 'buku');
        // var_dump($data);
        // die;
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Buku berhasil diUpdate !
      </div>');
        redirect('buku');
    }
    public function delet_buku()
    {
        $id = $this->input->get('id');
        $this->db->delete('buku', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Buku berhasil diHapus !
      </div>');
        redirect('buku');
    }
}
