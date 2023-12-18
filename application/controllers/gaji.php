<?php
class gaji extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('gaji_model', 'transgaji_model'));
        $this->load->helper('formatrp');

    }

    function index() {
        if (isset($_POST['submit'])) {
            $this->transgaji_model->simpan_gaji();
            redirect('gaji');
        } else {
            $data['tanggal_transaksi'] = date('Y-m-d');
            $data['pegawai'] = $this->gaji_model->tampil_data();
            $data['detail'] = $this->transgaji_model->tampil_detail_gaji();
            $this->load->view('form_gaji', $data);
        }
    }
    

    function hapusitem() {
        $id = $this->uri->segment(3);
        $this->transgaji_model->hapusitem($id);
        redirect('gaji');
    }
}
?>
