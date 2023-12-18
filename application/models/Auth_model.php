<?php
class Auth_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($id_client) {
        $this->db->where('id_client', $id_client);
        // $this->db->where('password', $password);
        $query = $this->db->get('client');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
?>
