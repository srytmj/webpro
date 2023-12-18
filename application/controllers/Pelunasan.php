<?php
class pelunasan extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model(array('pelunasan_model', 'transpelunasan_model'));
        $this->load->helper('formatrp');
    }

    function index() {
        if ($this->input->post('submit')) {
            $this->transpelunasan_model->simpan_pelunasan();
            redirect('pelunasan');
        } else {
            $data['tanggal_transaksi'] = date('Y-m-d');
            $data['client'] = $this->pelunasan_model->tampil_data();
            $data['detail'] = $this->transpelunasan_model->tampil_detail_pelunasan();
            $this->load->view('form_pelunasan', $data);
        }
    }

    function hapusitem(){
        $id = $this ->uri->segment(3);
        $this->transpelunasan_model->hapusitem($id);
        redirect('pelunasan');
    }
}