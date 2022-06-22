<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    function tampil_detail($where1)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where_in('nisn', $where1);
        return $query = $this->db->get();
    }
    function tampil_buku($where1)
    {
        $this->db->select('*');
        $this->db->from('tagihan_buku');
        $this->db->where_in('nisn', $where1);
        return $query = $this->db->get();
    }
    public function save_pem_bulanan($data)
    {

        return $this->db->insert_batch('pembayaran_bulanan', $data);
    }
    function tampil_data_spp()
    {
        // $this->db->select('*');
        // $this->db->from('pembayaran_bulanan');
        // $this->db->join('user', 'pembayaran_bulanan.nisn=user.nisn');
        return $query = $this->db->get('pembayaran_bulanan');
    }
    public function id_transaksi()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_transaksi,3)) AS kd_max FROM spp_bulanan WHERE DATE(tanggal_bayar)=CURDATE()");
        $kd = 1;
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd++;
        }
        $kode = "SPP-";
        date_default_timezone_set('Asia/Jakarta');
        return $kode . date('dmy') . $kd;
    }
    function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $query = $this->db->get();
    }
    public function tahun()
    {
        $this->db->select('*');
        $this->db->from('tahun_ajaran');

        return $query = $this->db->get()->result();
    }
    public function session_tahun()
    {
        $this->db->select('*');
        $this->db->from('tahun_ajaran');
        $this->db->where_in('Status', 'ON');
        return $query = $this->db->get();
    }
    function tampil_datatahun()
    {
        $this->db->select('*');
        $this->db->from('tahun_ajaran');

        $this->db->where_in('Status', 'ON');
        return $query = $this->db->get();
    }
    function tampil_databulan()
    {
        return $this->db->get('bulan');
    }
    function input_data($data)
    {
        $this->db->insert('pembayaran_bulanan', $data);
    }
    public function save_batch($data)
    {
        return $this->db->insert_batch('spp_bulanan', $data);
    }
    public function nisn()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $query = $this->db->get()->result();
    }
    function copy_input($where)
    {
        $this->db->query('INSERT INTO hapus_transaksi (id_transaksi,nisn,id_bulan,id_tahun,tanggal_bayar,id_bendahara)
                      SELECT id_transaksi,nisn,id_bulan,id_tahun,tanggal_bayar,id
                      FROM spp_bulanan WHERE id_transaksi = \'' . $where . '\'');
    }
    function hapus_data($where2, $table)
    {
        $this->db->where($where2);
        $this->db->delete($table);
    }

    function view_all()
    {

        $this->db->select('*');
        $this->db->from('spp_bulanan');
        $this->db->join('user', 'user.nisn = spp_bulanan.nisn');
        $this->db->join('bulan', 'spp_bulanan.id_bulan = bulan.id_bulan');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun = spp_bulanan.id_tahun');
        $this->db->where('spp_bulanan.status', '0');
        $this->db->order_by('id_transaksi');
        return $this->db->get()->result();
    }
    function laporan_buku()
    {

        $this->db->select('*');
        $this->db->from('tagihan_buku');
        $this->db->join('user', 'user.nisn = tagihan_buku.nisn');
        $this->db->where('status_bayar', '0');
        $this->db->order_by('id_tag_buku');
        return $this->db->get()->result();
    }
    public function view_by_date($tanggal1, $tanggal2)
    {
        $this->db->select('*');
        $this->db->from('spp_bulanan');
        $this->db->join('user', 'spp_bulanan.nisn = user.nisn');
        $this->db->join('bulan', 'spp_bulanan.id_bulan = bulan.id_bulan');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun = spp_bulanan.id_tahun');
        // $this->db->join('user', 'spp_bulanan.id = user.id');
        $this->db->where('tanggal_bayar BETWEEN"' . date('Y-m-d', strtotime($tanggal1)) . '"and"' . date('Y-m-d', strtotime($tanggal2)) . '"');
        $this->db->order_by('tanggal_bayar');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function view_by_nisn($nisn)
    {
        $this->db->select('*');
        $this->db->from('spp_bulanan');
        $this->db->join('user', 'spp_bulanan.nisn = user.nisn');
        $this->db->join('bulan', 'spp_bulanan.id_bulan = bulan.id_bulan');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun = spp_bulanan.id_tahun');
        // $this->db->join('bendahara', 'spp_bulanan.id = bendahara.id_bendahara');
        $this->db->where('spp_bulanan.nisn', $nisn);
        $this->db->order_by('user.nama');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function view_by_year($tahun)
    {
        $this->db->select('*');
        $this->db->from('spp_bulanan');
        $this->db->join('user', 'spp_bulanan.nisn = user.nisn');
        $this->db->join('bulan', 'spp_bulanan.id_bulan = bulan.id_bulan');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun = spp_bulanan.id_tahun');
        // $this->db->join('user', 'spp_bulanan.id = user.id');
        $this->db->where('spp_bulanan.id_tahun="' . $tahun . '"');
        // $this->db->order_by('user.nisn');
        return $query = $this->db->get();
    }
    function laporan_lainnya()
    {

        $this->db->select('*');
        $this->db->from('tagihan_buku');
        $this->db->join('user', 'user.nisn = tagihan_buku.nisn');
        $this->db->where('status_bayar', '0');
        $this->db->order_by('id_tag_buku');
        return $this->db->get()->result();
    }
    public function tanggal_lainya($tanggal1, $tanggal2)
    {
        $this->db->select('*');
        $this->db->from('tagihan_buku');
        $this->db->join('user', 'tagihan_buku.nisn = user.nisn');
        $this->db->where('status_bayar', '0');
        $this->db->where('tanggal_bayar BETWEEN"' . date('Y-m-d', strtotime($tanggal1)) . '"and"' . date('Y-m-d', strtotime($tanggal2)) . '"');
        $this->db->order_by('tanggal_bayar');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function nisn_buku($nisn)
    {
        $this->db->select('*');
        $this->db->from('tagihan_buku');
        $this->db->join('user', 'tagihan_buku.nisn = user.nisn');
        $this->db->where('status_bayar', '0');
        $this->db->where('tagihan_buku.nisn', $nisn);
        $this->db->order_by('user.nama');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function year_lainya($tahun)
    {
        $this->db->select('*');
        $this->db->from('pembayaran_lainnya');
        $this->db->join('santri', 'pembayaran_lainnya.nis = santri.nis');
        $this->db->where('tahun_ajaran="' . $tahun . '"');
        $this->db->order_by('tahun_ajaran');
        return $query = $this->db->get();
    }
    public function year_lain($tahun)
    {

        return $this->db->query("SELECT YEAR(a.tanggal_bayar), a.id_pem_lainya, a.nis, b.nama_santri, a.jenis_pembayaran, a.tanggal_bayar, a.total_tagihan, a.metode_pembayaran
		FROM pembayaran_lainnya a, santri b
		WHERE YEAR(a.tanggal_bayar) = $tahun
		GROUP BY YEAR(a.tanggal_bayar)
		");
    }

    function update_tunggakan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function jumlahsiswa()
    {
        $query = $this->db->get_where('user', ['role_id' => 2]);

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
