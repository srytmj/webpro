<?php
class Dokumen extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Sesuaikan dengan aturan autentikasi yang Anda tetapkan
        if (!$this->session->userdata('id_client')) {
            redirect('auth'); // Redirect ke halaman login jika tidak ada sesi
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
        $id_client = $this->input->post('id_client');
        $tanggal_pengiriman = $this->input->post('tanggal_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_model->create_dokumen($id_pegawai, $id_client, $tanggal_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function store() {
        $id_pegawai = $this->input->post('id_pegawai');
        $id_client = $this->input->post('id_client');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_model->create_dokumen($id_pegawai, $id_client, $tgl_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function edit($id_dokumen) {
        $data['dokumen'] = $this->Dokumen_model->get_dokumen_by_id($id_dokumen);
        $this->load->view('dokumen/edit', $data);
    }

    public function update() {
        $id_dokumen = $this->input->post('id_dokumen');
        $id_pegawai = $this->input->post('id_pegawai');
        $id_client = $this->input->post('id_client');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Dokumen_model->update_dokumen($id_dokumen, $id_pegawai, $id_client, $tgl_pengiriman, $jenis_dokumen);

        redirect('dokumen');
    }

    public function delete($id_dokumen) {
        $this->Dokumen_model->delete_dokumen($id_dokumen);

        redirect('dokumen');
    }
    public function search() {
        // Ambil id_client dari sesi
        $id_client = $this->session->userdata('id_client');

        // Panggil model untuk mendapatkan dokumen berdasarkan id_client
        $data['dokumen'] = $this->Dokumen_model->search_document($id_client);
        $data['id_client'] = $id_client;
        
        // Load view untuk menampilkan dokumen
        $this->load->view('dokumen/search', $data);
    }
}
