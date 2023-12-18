<?php
class Auth_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username) {
        $this->db->where('username', $username);
        // $this->db->where('password', $password);
        $query = $this->db->get('usersession');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
?>
