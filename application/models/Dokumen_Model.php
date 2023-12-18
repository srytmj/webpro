<?php
class Dokumen_model extends CI_Model {
    public function get_all_dokumen() {
        return $this->db->get('dokumen')->result_array();
    }

    public function create_dokumen($id_pegawai, $id_client, $tgl_pengiriman, $jenis_dokumen) {
        $data = array(
            'id_pegawai' => $id_pegawai,
            'id_client' => $id_client,
            'tgl_pengiriman' => $tgl_pengiriman,
            'jenis_dokumen' => $jenis_dokumen
        );

        $this->db->insert('dokumen', $data);
    }

    public function get_dokumen_by_id($id_dokumen) {
        return $this->db->get_where('dokumen', array('id_dokumen' => $id_dokumen))->row_array();
    }

    public function update_dokumen($id_dokumen, $id_pegawai, $id_client, $tgl_pengiriman, $jenis_dokumen) {
        $data = array(
            'id_pegawai' => $id_pegawai,
            'id_client' => $id_client,
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
    
    public function search_document($id_client) {
        // Sesuaikan dengan struktur tabel dan kolom pada database Anda
        $this->db->where('id_client', $id_client);
        $query = $this->db->get('dokumen');

        return $query->result();
    }
}
