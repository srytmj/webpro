<?php
class transgaji_model extends CI_Model {
    function simpan_gaji() {
        $nama_pegawai = $this->input->post('pegawai');
        $jumlah_proyek = $this->input->post('jumlah_proyek');
    
        $pegawai_data = $this->db->get_where('pegawai', array('nama_pegawai' => $nama_pegawai))->row_array();
    
        if ($pegawai_data['status_pegawai'] == 'pegawai tetap') {
            $gaji_pokok = $pegawai_data['gaji_pokok'];
        } else {
            $gaji_pokok = 4000000;
        }
    
        // Calculate total gaji
        $total_gaji = $jumlah_proyek * $gaji_pokok;
    
        $data_gaji_detail = array(
            'id_pegawai'   => $pegawai_data['id_pegawai'],
            'gaji_pokok'   => $gaji_pokok,
            'jumlah_proyek'=> $jumlah_proyek,
            'status'       => $pegawai_data['status_pegawai'],
            'total_gaji'   => $total_gaji,
        );
    
        // Insert data into gaji_detail table
        $this->db->insert('gaji_detail', $data_gaji_detail);
    }

    function tampil_detail_gaji() {
        $query = "SELECT gd.p_detail_id, p.nama_pegawai, p.gaji_pokok, gd.jumlah_proyek, p.status_pegawai
        FROM gaji_detail as gd
        left JOIN pegawai as p ON gd.id_pegawai = p.id_pegawai";
        // WHERE gd.status = 'pegawai tetap'";
    
        return $this->db->query($query)->result(); // Make sure the result is an array of objects
    }

    function hapusitem($id){
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }

    function selesai_gaji($data){
        $this->db->insert('transaksi', $data);
        $last_id = $this->db->query("SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1")->row_array();
        $this->db->query("UPDATE gaji_detail SET id_transaksi = '". $last_id['id_transaksi']. "' WHERE status = '0'");
        $this->db->query("UPDATE gaji_detail SET status = '1' WHERE status = '0'");
    }
}
?>
