<?php
class TransaksiDP extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('TransaksiDP_model');
    }

    public function create() {
        $this->load->helper('form');

        // Load all transactions for dropdown
        $data['transaksis'] = $this->TransaksiDP_model->get_all_transaksis();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_transaksi = $this->input->post('id_transaksi');
            $nama_client = $this->input->post('nama_client');
            $tgl_dp = $this->input->post('tgl_dp');

            // Get nominal from transaksi table and multiply by 30%
            $nominal_dp = $this->Transaksi_model->get_nominal_by_id($id_transaksi) * 0.3;

            $data_to_insert = array(
                'id_transaksi' => $id_transaksi,
                'nama_client' => $nama_client,
                'tgl_dp' => $tgl_dp,
                'nominal_dp' => $nominal_dp,
            );

            $this->TransaksiDP_model->insert_transaksi_dp($data_to_insert);

            redirect("transaksidp/create");
        } else {
            $this->load->view('transaksidp/create', $data);
        }
    }
}
?>
