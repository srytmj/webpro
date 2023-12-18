<?php
class Gaji extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model(array('gaji_Model', 'transgaji_Model'));
    }
    function index() {
        if (isset($_POST['submit'])) {
            $this->transgaji_Model->simpan_gaji();
            redirect('gaji');
        } else {
            $data['tanggal_transaksi'] = date('Y-m-d');
            $data['pegawai'] = $this->gaji_Model->tampil_data();
            $data['detail'] = $this->transgaji_Model->tampil_detail_gaji();
            $this->load->view('form_gaji', $data);
        }
    }
    

    function hapusitem() {
        $id = $this->uri->segment(3);
        $this->transgaji_Model->hapusitem($id);
        redirect('gaji');
    }
}
?>
