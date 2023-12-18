
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyerahan_model extends CI_Model {
    // Fungsi untuk mendapatkan semua dokumen
    public function get_all_dokumen() {
        return $this->db->get('dokumen')->result_array();
    }

    // Fungsi untuk mendapatkan dokumen berdasarkan ID
    public function get_dokumen_by_id($id_dokumen) {
        return $this->db->get_where('dokumen', array('id_dokumen' => $id_dokumen))->row_array();
    }
}

