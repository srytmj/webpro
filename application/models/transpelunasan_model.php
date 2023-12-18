<?php
class transpelunasan_model extends CI_Model{
    function simpan_pelunasan() {
        $nama_client = $this->input->post('client');
        $total_pelunasan = $this->input->post('total_pelunasan');
        $client_data = $this->db->get_where('client', array('nama_client' => $nama_client))->row_array();

        $nominal_dp = 0; // Define or get the correct value for $nominal_dp

        $total_transaksi = $total_pelunasan + $nominal_dp;

        if ($total_transaksi >= $client_data['total']) {
            echo "lunas";
        } elseif ($total_transaksi < $client_data['total']) {
            echo "belum lunas";
        }

        $data_pelunasan_detail = array(
            'id_client' => $client_data['id_client'],
            'nama_client' => $client_data['nama_client'],
            'total' => $client_data['total'],
            'nominal_dp' => $nominal_dp,
            'total_transaksi' => $total_transaksi,
        );

        $this->db->insert('pelunasan_detail', $data_pelunasan_detail);
    }


    function tampil_detail_pelunasan(){
        $query = "SELECT pd.t_detail_id, c.nama_client, pd.nominal_dp, pd.total_transaksi
        FROM pelunasan_detail as pd
        left JOIN client as c ON pd.id_client = c.id_client";
        return $this->db->query($query)->result();
    }
    function hapusitem($id){
        $this->db->where('p_detail_id', $id); 
        $this->db->delete('pelunasan_detail');
    }

    function selesai_pelunasan($data){
        $this->db->insert('transaksi', $data);
        $last_id = $this->db->query("SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1")->row_array();
        $this->db->query("UPDATE pelunasan_detail SET id_transaksi = '". $last_id['id_transaksi']. "' WHERE status = '0'");
        $this->db->query("UPDATE pelunasan_detail SET status = '1' WHERE status = '0'");
    }
}