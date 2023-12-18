<?php
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Sesuaikan dengan aturan autentikasi yang Anda tetapkan
        if (!$this->session->userdata('id_client')) {
            redirect('auth'); // Redirect ke halaman login jika tidak ada sesi
        }
    }

    public function index() {
        // Ambil data id_client dari sesi
        $data['id_client'] = $this->session->userdata('id_client');

        // Load view dashboard dengan data
        $this->load->view('dashboard/dashboard_view', $data);
    }

    public function dokumen() {
        // Akses controller Dokumen
        redirect('dokumen/search');
    }
}
?>
