<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyerahan extends CI_Controller {
    // Fungsi untuk mendapatkan semua penyerahan
    public function index() {
        // Load the model to interact with the database
        $this->load->model('Penyerahan_Model');

        // Get all dokumen data
        $data['dokumen'] = $this->Penyerahan_Model->get_all_dokumen();

        // Load the view and pass the data to it
        $this->load->view('dokumen/penyerahan_view', $data);
    }

    // ... (other methods remain unchanged)

    // Fungsi untuk mendapatkan penyerahan berdasarkan ID
    public function get_penyerahan_by_id($id_penyerahan) {
        return $this->db->get_where('penyerahan', array('id_penyerahan' => $id_penyerahan))->row_array();
    }

    // Fungsi untuk membuat penyerahan baru
    public function create_penyerahan($id_dokumen, $username, $tanggal_pengiriman, $jenis_dokumen) {
        $data = array(
            'id_dokumen' => $id_dokumen,
            'username' => $username,
            'tanggal_pengiriman' => $tanggal_pengiriman,
            'jenis_dokumen' => $jenis_dokumen
        );

        $this->db->insert('penyerahan', $data);
    }

    // Fungsi untuk mengupdate penyerahan
    public function update_penyerahan($id_penyerahan, $id_dokumen, $username, $tanggal_pengiriman, $jenis_dokumen) {
        $data = array(
            'id_dokumen' => $id_dokumen,
            'username' => $username,
            'tanggal_pengiriman' => $tanggal_pengiriman,
            'jenis_dokumen' => $jenis_dokumen
        );

        $this->db->where('id_penyerahan', $id_penyerahan);
        $this->db->update('penyerahan', $data);
    }

    // Fungsi untuk menghapus penyerahan
    public function delete_penyerahan($id_penyerahan) {
        $this->db->where('id_penyerahan', $id_penyerahan);
        $this->db->delete('penyerahan');
    }
}