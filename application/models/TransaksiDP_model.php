<?php
class TransaksiDP_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_transaksis() {
        $query = $this->db->get('transaksi');
        return $query->result_array();
    }

    public function get_nominal_by_id($id_transaksi) {
        $this->db->select('nominal');
        $this->db->where('id_transaksi', $id_transaksi);
        $query = $this->db->get('transaksi');
        $result = $query->row_array();
        return $result['nominal'];
    }

    public function insert_transaksi_dp($data) {
        return $this->db->insert('transaksi_dp', $data);
    }
}
?>
