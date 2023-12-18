<?php
class Transaksi extends CI_Controller {
    
    public function index() {
        // Load the model
        $this->load->model('transaksi_model');

        // Get all transactions from the database
        $data['transaksi'] = $this->transaksi_model->get_all_transactions();

        // Load view for the transaction list
        $this->load->view('transaksi/read', $data);
    }

    // public function transaksi_form() {
    //     // Load view for the transaction form
    //     $this->load->view('transaksi_form');
    // }

    public function submit() {
        // Load the model
        $this->load->model('transaksi_model');

        // Process form submission
        $data = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'total' => $this->input->post('total'),
            'DP' => $this->input->post('total') * 0.3,
            'Pelunasan' => $this->input->post('total') - ($this->input->post('total') * 0.3),
            'status' => $this->input->post('status'),
            'tanggal_dp' => ($this->input->post('status') == 'Lunas') ? $this->input->post('tanggal_transaksi') : null,
            'tanggal_pelunasan' => ($this->input->post('status') == 'Lunas') ? $this->input->post('tanggal_transaksi') : null
        );

        // Save data to the database or perform necessary actions
        $this->transaksi_model->save_transaksi($data);

        if ($this->input->post('status') == 'Belum Lunas') {
            // If status is "Belum Lunas", redirect to a page to input "jatuh tempo"
            redirect('transaksi/jatuh_tempo_form');
        } else {
            // If status is "Lunas", redirect to the main page or another page as needed
            redirect('transaksi');
        }
    }

    public function jatuh_tempo_form() {
        // Load view for jatuh tempo input
        $this->load->view('jatuh_tempo_form');
    }

    public function save_jatuh_tempo() {
        // Load the model
        $this->load->model('transaksi_model');

        // Process jatuh tempo form submission
        $jatuh_tempo_data = array(
            'Jatuh_Tempo' => $this->input->post('Jatuh_Tempo')
        );

        // Save jatuh tempo data to the database or perform necessary actions
        $this->transaksi_model->save_jatuh_tempo($jatuh_tempo_data);

        // Redirect to the main page or another page as needed
        redirect('transaksi');
    }

    public function add() {
        // Load view for adding a new transaction
        $this->load->view('transaksi/create');
    }

    public function update($id) {
        // Load the model
        $this->load->model('transaksi_model');

        // Get the transaction by ID
        $data['transaction'] = $this->transaksi_model->get_transaction_by_id($id);

        // Load view for updating a transaction
        $this->load->view('transaksi_update_form', $data);
    }

    public function delete($id) {
        // Load the model
        $this->load->model('transaksi_model');

        // Delete the transaction from the database
        $this->transaksi_model->delete_transaksi($id);

        // Redirect back to the transaction list
        redirect('transaksi');
    }
    public function update_submit() {
        // Load the model
        $this->load->model('transaksi_model');
    
        // Process form submission for update
        $data = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'total' => $this->input->post('total'),
            'status' => $this->input->post('status')
            // Add other fields as needed
        );
    
        // Update data in the database or perform necessary actions
        $this->transaksi_model->update_transaksi($data);
    
        // Redirect to the main page or another page as needed
        redirect('transaksi');
    }
    
}
