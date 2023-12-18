<?php
class Pemesanan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('Pemesanan_model');
    }
    public function index() {
        $data['pemesanan'] = $this->Pemesanan_model->get_all_pemesanan();
        $this->load->view('pemesanan/index', $data);
    }

    public function create() {
        $data['clients'] = $this->Pemesanan_model->get_client();
        $data['pegawais'] = $this->Pemesanan_model->get_pegawai();
        $data['pakets'] = $this->Pemesanan_model->get_paket();
        $this->load->view('pemesanan/create', $data);
    }

    public function save() {
        $pegawai = $this->input->post('pegawai');
        $client = $this->input->post('client');
        // $tanggal_pengiriman = $this->input->post('tanggal_pengiriman');
        $id_paket = $this->input->post('paket');
        $bukti_tf = $this->input->post('bukti_tf');

        $this->Pemesanan_model->create_pemesanan($pegawai, $client, $id_paket, $bukti_tf);

        redirect('pemesanan');
    }

    public function store() {
        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Pemesanan_model->create_dokumen($id_pegawai, $username, $tgl_pengiriman, $jenis_dokumen);

        redirect('pemesanan');
    }

    public function edit($id_dokumen) {
        $data['pemesanan'] = $this->Pemesanan_model->get_dokumen_by_id($id_dokumen);
        $this->load->view('pemesanan/edit', $data);
    }

    public function update() {
        $id_dokumen = $this->input->post('id_dokumen');
        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $tgl_pengiriman = $this->input->post('tgl_pengiriman');
        $jenis_dokumen = $this->input->post('jenis_dokumen');

        $this->Pemesanan_model->update_dokumen($id_dokumen, $id_pegawai, $username, $tgl_pengiriman, $jenis_dokumen);

        redirect('pemesanan');
    }

    public function delete($id_dokumen) {
        $this->Pemesanan_model->delete_dokumen($id_dokumen);

        redirect('pemesanan');
    }
    public function search() {
        // Ambil username dari sesi
        $client = $this->input->post('nama_client');

        // Panggil model untuk mendapatkan pemesanan berdasarkan username
        $data['pemesanan'] = $this->Pemesanan_model->search_document($client);
        $data['clients'] = $this->Pemesanan_model->get_client();
        
        // Load view untuk menampilkan pemesanan
        $this->load->view('pemesanan/search', $data);
    }

}
