<?php
class pelunasan_model extends CI_Model{
    function tampil_data() {
        $query = "SELECT c.id_client, c.nama_client, t.total, t.id_client  
            FROM client as c, transaksi as t";
        return $this->db->query($query)->result();
    }

    function tampil_data_paging($halaman, $batas) {
        $query = "SELECT c.id_client, c.nama_client, t.total, t.id_client  
        FROM client as c, transaksi as t
        WHERE c.id_client = t.id_client LIMIT $halaman, $batas";
        return $this->db->query($query)->result();
    }

    function post($data) {
        $this->db->insert('client', $data);
    }
    function get_one($id) {
        $param = array('id_client' => $id);
        return $this->db->get_where('client', $param);
    }

    function edit($data, $id) {
        $this->db->where('id_client', $id);
        $this->db->update('client', $data);
    }

    function delete($id) {
        $this->db->where('id_client', $id);
        $this->db->delete('client');
    }

    function updateStatusColumn($id_client, $status_client) {
        $this->db->set('status', $status_client);
        $this->db->where('id_client', $id_client);
        $this->db->update('client');
    }
}