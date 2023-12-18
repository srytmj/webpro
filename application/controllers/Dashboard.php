<?php
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Sesuaikan dengan aturan autentikasi yang Anda tetapkan
        if (!$this->session->userdata('username')) {
            redirect('auth'); // Redirect ke halaman login jika tidak ada sesi
        }
    }

    public function index() {
        // Ambil data username dari sesi
        $data['username'] = $this->session->userdata('username');

        // Load view dashboard dengan data
        $this->load->view('dashboard/index', $data);
    }

    // public function dokumen() {
    //     // Akses controller Dokumen
    //     redirect('dokumen/search');
    // }
}
?>
