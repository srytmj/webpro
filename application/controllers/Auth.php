<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_Model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login/login_view');
    }

    public function process_login() {
        $username = $this->input->post('username');
        // $password = $this->input->post('password');

        $user = $this->Auth_Model->login($username);

        if ($user) {
            // Login berhasil, simpan username ke dalam session
            $this->session->set_userdata('username', $user->username);

            // Redirect ke halaman lain jika diperlukan
            redirect();
        } else {
            // Login gagal, redirect ke halaman login
            redirect('auth');
        }
    }

    public function logout() {
        // Hapus session dan redirect ke halaman login
        $this->session->sess_destroy();
        redirect();
    }
}
?>
