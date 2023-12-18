<?php
class Pemesanan_Model extends CI_Model {
    public function get_all_pemesanan() {
        $this->db->select('pemesanan.*, pegawai.nama_pegawai, client.nama_client, paket.nama_paket');
        $this->db->from('pemesanan');
        $this->db->join('pegawai', 'pegawai.id_pegawai = pemesanan.id_pegawai');
        $this->db->join('client', 'client.id_client = pemesanan.id_client');
        $this->db->join('paket', 'paket.id_paket = pemesanan.id_paket');
        
        return $this->db->get()->result_array();
    }
    
    public function create_pemesanan($id_pegawai, $id_client, $id_paket, $bukti_tf) {    
        $data = array(
            'id_pegawai' => $id_pegawai,
            'id_client' => $id_client,
            'id_paket' => $id_paket,
            'tgl_pemesanan' => date('Y-m-d'),
            'bukti_tf' => $bukti_tf
        );
        $this->db->insert('pemesanan', $data);
    }
    public function get_pemesanan_by_id($id_pemesanan) {
        return $this->db->get_where('pemesanan', array('id_pemesanan' => $id_pemesanan))->row_array();
    }
    public function update_pemesanan($id_pemesanan, $id_pegawai, $id_client, $id_paket, $bukti_tf) {
        $data = array(
            'id_pegawai' => $id_pegawai,
            'id_client' => $id_client,
            'id_paket' => $id_paket,
            'tgl_pemesanan' => date('Y-m-d'),
            'bukti_tf' => $bukti_tf
        );

        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan', $data);
    }
    public function delete_pemesanan($id_pemesanan) {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->delete('pemesanan');
    }
    public function search_document($client) {
        if ($client === null) {
            $query = $this->db->get('pemesanan');
            return $query->result();
        } else {
            $client_data = $this->db->get_where('client', array('nama_client' => $client))->row_array();
            $id_client = $client_data['id_client'];

            $this->db->where('id_client', $id_client);
            $query = $this->db->get('pemesanan');
            return $query->result();
        }
    }
    public function get_client(){
        $this->db->select('*');
        $query = $this->db->get('client');
        return $query->result();    
    }
    public function get_pegawai(){
        $this->db->select('*');
        $query = $this->db->get('pegawai');
        return $query->result();    
    }

    public function get_paket(){
        $this->db->select('*');
        $query = $this->db->get('paket');
        return $query->result();
    }
}
