<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap_lainnya extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -  
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $params = array(
            'server_key' => $this->config->item('serverKey'),
            'production' => $this->config->item('isProduction'),
            'sanitized' => $this->config->item('isSanitized'),
            '3ds' => $this->config->item('is3ds')
        );
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('midtrans/checkout_snap');
    }

    public function token()
    {
        $id = $this->input->post('id');
        $nisn = $this->input->post('_nisn');
        $namasiswa = $this->input->post('nama_siswa');
        $total = $this->input->post('total');
        $jenispembayaran = $this->input->post('jenis_pembayaran');

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $total
        );

        // Optional
        $item_details = array();
        $desc = $jenispembayaran;
        $details = array(
            'id' => "$id",
            'price' => $total,
            'quantity' => 1,
            'name' => "$desc"
        );

        array_push($item_details, $details);

        // Optional
        $billing_address = array(
            'first_name' => "$namasiswa",
            'last_name' => 'a',
            'address' => 'a',
            'city' => 'a',
            'postal_code' => 'a',
            'phone' => 'a',
            'country_code' => 'IDN'
        );
        // Optional
        $shipping_address = array(
            'first_name' => "$namasiswa",
            'last_name' => 'a',
            'address' => 'a',
            'city' => 'a',
            'postal_code' => 'a',
            'phone' => 'a',
            'country_code' => 'IDN'
        );
        // Optional
        $customer_details = array(
            'first_name' => "$namasiswa",
            'last_name' => 'a',
            'email' => 'a',
            'phone' => 'a',
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address
        );
        //echo json_encode($item_details);exit;
        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
        );
        //'customer_details' => $customer_details	
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        echo $snapToken;
    }


    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
    }

    public function cekStatusTransaksi($id, $nisn, $orderid)
    {
        try {
            $response = $this->midtrans->status($orderid);
            if ($response->status_code == 200) {
                $sql = "UPDATE tagihan_buku SET status_bayar='0' WHERE id_tag_buku='$id' AND nisn='$nisn' AND order_id='$orderid'";
                $this->db->query($sql);
                echo 'success';
            } else {
                if ($response->transaction_status == 'pending') {
                } else {
                    $sql = "UPDATE tagihan_buku SET status_bayar='1' WHERE id_tag_buku='$id' AND nisn='$nisn' AND order_id='$orderid'";
                    $this->db->query($sql);
                }
                echo $response->transaction_status;
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getCode() . ' ' . $e->getMessage();
        }
    }
}
