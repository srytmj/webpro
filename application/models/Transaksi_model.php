<?php
class Transaksi_model extends CI_Model {

    public function save_transaksi($data) {
        // Save transaction data to the database or perform necessary actions
        $this->db->insert('transaksi', $data);
    }

    public function save_jatuh_tempo($data) {
        // Get the existing data
        $existingData = $this->db->get('jatuh_tempo')->row();

        if ($existingData) {
            // If there is existing data, update the corresponding fields
            $this->db->update('jatuh_tempo', array(
                'tanggal_dp' => $data['Jatuh_Tempo'],
                'tanggal_pelunasan' => $data['Jatuh_Tempo']
            ));
        } else {
            // If there is no existing data, insert a new record
            $this->db->insert('jatuh_tempo', $data);
        }
    }

    public function get_all_transactions() {
        // Retrieve all transactions from the database
        $query = $this->db->get('transaksi');
        return $query->result();

        // Ensure to return an empty array if there are no transactions
        return $this->db->get('transaksi')->result() ?? [];
    }

    public function delete_transaksi($id) {
        // Delete a transaction from the database
        $this->db->delete('transaksi', array('Id_Transaksi' => $id));
    }

    public function get_transaction_by_id($id) {
        // Retrieve a transaction by ID from the database
        $query = $this->db->get_where('transaksi', array('Id_Transaksi' => $id));
        return $query->row();

        // Ensure to return an empty array if there is no transaction with the given ID
        return $this->db->get_where('transaksi', array('Id_Transaksi' => $id))->row() ?? [];
    }

    public function update_transaksi($data) {
        // Update transaction data in the database or perform necessary actions
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }
    
}
