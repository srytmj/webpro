<?php
class Dokumen_Model extends CI_Model {
    public function get_all_dokumen() {
        return $this->db->get('dokumen')->result_array();
    }
    public function create_dokumen($pegawai, $client, $tgl_pengiriman, $jenis_dokumen) {
        // Get id_pegawai based on the provided $pegawai name
        $pegawai_data = $this->db->get_where('pegawai', array('nama_pegawai' => $pegawai))->row_array();
        $id_pegawai = $pegawai_data['id_pegawai'];
    
        // same as above
        $client_data = $this->db->get_where('client', array('nama_client' => $client))->row_array();
        $id_client = $client_data['id_client'];
    
        $data = array(
            'id_pegawai'     => $id_pegawai,
            'id_client'      => $id_client,
            'tgl_pengiriman' => $tgl_pengiriman,
            'jenis_dokumen'  => $jenis_dokumen
        );
    
        $this->db->insert('dokumen', $data);
    }
    public function get_dokumen_by_id($id_dokumen) {
        return $this->db->get_where('dokumen', array('id_dokumen' => $id_dokumen))->row_array();
    }
    public function update_dokumen($id_dokumen, $id_pegawai, $username, $tgl_pengiriman, $jenis_dokumen) {
        $data = array(
            'id_pegawai' => $id_pegawai,
            'username' => $username,
            'tgl_pengiriman' => $tgl_pengiriman,
            'jenis_dokumen' => $jenis_dokumen
        );

        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->update('dokumen', $data);
    }
    public function delete_dokumen($id_dokumen) {
        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->delete('dokumen');
    }
    public function search_document($client) {
        if ($client === null) {
            $query = $this->db->get('dokumen');
            return $query->result();
        } else {
            $client_data = $this->db->get_where('client', array('nama_client' => $client))->row_array();
            $id_client = $client_data['id_client'];

            $this->db->where('id_client', $id_client);
            $query = $this->db->get('dokumen');
            return $query->result();
        }
    }
    public function get_client(){
        $this->db->select('nama_client');
        $query = $this->db->get('client');
        return $query->result();    
    }
    public function get_pegawai(){
        $this->db->select('nama_pegawai');
        $query = $this->db->get('pegawai');
        return $query->result();    
    }
}
