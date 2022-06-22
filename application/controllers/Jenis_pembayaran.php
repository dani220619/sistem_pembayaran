<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url("auth"));
        }
        $this->load->model('M_jenis_pembayaran');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['title'] = 'Jenis Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jen_pembayaran'] = $this->M_jenis_pembayaran->tampil_data()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jenis_pembayaran/index', $data);
        $this->load->view('templates/footer');
    }
    function tambah_aksi()
    {
        $id_jen_pembayaran = rand(00, 99);
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $besar_tagihan = $this->input->post('besar_tagihan');
        $data = array(
            'id_jen_pembayaran' => $id_jen_pembayaran,
            'jenis_pembayaran' => $jenis_pembayaran,
            'besar_tagihan' => $besar_tagihan,
            'date_created' => time()

        );
        $this->M_jenis_pembayaran->input_data($data, 'jenis_pembayaran');
        $this->session->set_flashdata('message12', '<div class="alert alert-success" role="alert">
        
        Tambah Jenis Pembayaran Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('jenis_pembayaran');
    }
    function update()
    {
        $id_jen_pembayaran = $this->input->post('id_jen_pembayaran');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $besar_tagihan = $this->input->post('besar_tagihan');
        $data = array(
            'id_jen_pembayaran' => $id_jen_pembayaran,
            'jenis_pembayaran' => $jenis_pembayaran,
            'besar_tagihan' => $besar_tagihan,
        );
        // var_dump($data);
        // die;
        $where = array('id' => $id_jen_pembayaran);
        $this->M_jenis_pembayaran->update_data($where, $data, 'jenis_pembayaran');

        $this->session->set_flashdata('message12', '<div class="alert alert-warning " role="alert">
        
        Update Jenis Pembayaran Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('jenis_pembayaran');
    }
    public function delete_jenis_pembayaran()
    {
        $id_jen_pembayaran = $this->input->get('id_jen_pembayaran');
        $this->db->delete('jenis_pembayaran', array('id_jen_pembayaran' => $id_jen_pembayaran));
        $this->session->set_flashdata('message12', '<div class="alert alert-danger" role="alert">
        
        Hapus Jenis Pembayaran Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('jenis_pembayaran');
    }
}
