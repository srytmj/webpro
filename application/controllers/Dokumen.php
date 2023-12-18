<?php
class Dokumen extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('Dokumen_Model');
    }
    public function index() {
        $data['dokumen'] = $this->Dokumen_Model->get_all_dokumen();
        $this->load->view('dokumen/index', $data);
    }

    public function create() {
        $data['clients'] = $this->Dokumen_Model->get_client();
        $data['pegawais'] = $this->Dokumen_Model->get_pegawai();

        $this->load->view('dokumen/create', $data);
    }

    public function save() {
        $pegawai = $this->input->post('nama_pegawai');
        $client = $this->input->post('nama_client');
        $tanggal_pengiriman = $this->input->post('tanggal_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_Model->create_dokumen($pegawai, $client, $tanggal_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function store() {
        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_Model->create_dokumen($id_pegawai, $username, $tgl_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function edit($id_dokumen) {
        $data['dokumen'] = $this->Dokumen_Model->get_dokumen_by_id($id_dokumen);
        $this->load->view('dokumen/edit', $data);
    }

    public function update() {
        $id_dokumen = $this->input->post('id_dokumen');
        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_Model->update_dokumen($id_dokumen, $id_pegawai, $username, $tgl_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function delete($id_dokumen) {
        $this->Dokumen_Model->delete_dokumen($id_dokumen);

        redirect('dokumen');
    }
    public function search() {
        // Ambil username dari sesi
        $client = $this->input->post('nama_client');

        // Panggil model untuk mendapatkan dokumen berdasarkan username
        $data['dokumen'] = $this->Dokumen_Model->search_document($client);
        $data['clients'] = $this->Dokumen_Model->get_client();
        
        // Load view untuk menampilkan dokumen
        $this->load->view('dokumen/search', $data);
    }
}
