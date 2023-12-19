<?php
class Gaji extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model(array('Gaji_model', 'transGaji_model'));
    }
    public function index() {
        $data['pegawais'] = $this->Gaji_model->get_pegawai();
        
        $data['report_data'] = $this->Gaji_model->get_report_data();
        
        $this->load->view('gaji/index', $data);
    }

    public function filter() {
        $data['pegawais'] = $this->Gaji_model->get_pegawai();

        $pegawai = $this->input->post('pegawai');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        // Gabungkan bulan dan tahun menjadi format YYYY-MM
        $bulan_tahun = $tahun . '-' . $bulan;

        $data['report_data'] = $this->Gaji_model->get_filtered_data($pegawai, $bulan_tahun, $tahun, $bulan);
        
        $this->load->view('gaji/index', $data);
    }
}
?>
