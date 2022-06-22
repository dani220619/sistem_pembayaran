<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan_buku extends CI_Controller
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
        $data['tagihan_buku'] = $this->db->get('tagihan_buku')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tagihan_buku/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_tagbuku()
    {
        $id_tag_buku = rand(0000, 9999);
        $nisn = $this->input->post('nisn[]', TRUE);
        $tahun_ajaran_id = $this->input->post('tahun_ajaran_id');

        // $id_trans = rand(000000, 999999);
        $user_id = $this->input->post('user_id');
        $status_bayar = $this->input->post('status_bayar');
        $data = array();
        $index = 0; // Set index array awal dengan 0
        foreach ($nisn as $key) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'nisn' => $key,
                'user_id' => $user_id,
                'id_tag_buku' => $id_tag_buku++,  // Ambil dan set data nama sesuai index array dari $index
                'tahun_ajaran_id' => $tahun_ajaran_id,

                'status_bayar' => '',
                // 'id_trans' => $id_trans,  // Ambil dan set data telepon sesuai index array dari $index
            ));
            $key;
        }
        // var_dump($data);
        // die;
        $this->db->insert_batch('tagihan_buku', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tagihan Buku berhasil ditambahkan !
      </div>');
        redirect('tagihan_buku');
    }
    public function delete_tagbuku()
    {
        $id_tag_buku = $this->input->get('id_tag_buku');
        $this->db->delete('tagihan_buku', array('id_tag_buku' => $id_tag_buku));
        $this->session->set_flashdata('message12', '<div class="alert alert-danger" role="alert">
        
        Hapus Tagihan Buku Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('tagihan_buku');
    }
}
