<?php
class Dokumen extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('Dokumen_model');
    }
    public function index() {
        $data['dokumen'] = $this->Dokumen_model->get_all_dokumen();
        $this->load->view('dokumen/index', $data);
    }

    public function create() {
        $this->load->view('dokumen/create');
    }

    public function save() {

        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $tanggal_pengiriman = $this->input->post('tanggal_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_model->create_dokumen($id_pegawai, $username, $tanggal_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function store() {
        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_model->create_dokumen($id_pegawai, $username, $tgl_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function edit($id_dokumen) {
        $data['dokumen'] = $this->Dokumen_model->get_dokumen_by_id($id_dokumen);
        $this->load->view('dokumen/edit', $data);
    }

    public function update() {
        $id_dokumen = $this->input->post('id_dokumen');
        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_model->update_dokumen($id_dokumen, $id_pegawai, $username, $tgl_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function delete($id_dokumen) {
        $this->Dokumen_model->delete_dokumen($id_dokumen);

        redirect('dokumen');
    }
    public function search() {
        // Ambil username dari sesi
        $username = $this->session->userdata('username');

        // Panggil model untuk mendapatkan dokumen berdasarkan username
        $data['dokumen'] = $this->Dokumen_model->search_document($username);
        $data['username'] = $username;
        
        // Load view untuk menampilkan dokumen
        $this->load->view('dokumen/search', $data);
    }
}
