<?php

class gaji_model extends CI_Model {
function tampil_data() {
    $query = "SELECT p.id_pegawai, p.nama_pegawai, p.status_pegawai, p.gaji_pokok, t.id_pegawai  
        FROM pegawai as p, transaksi as t";
    return $this->db->query($query)->result();
}

function tampil_data_paging($halaman, $batas) {
    $query = "SELECT p.id_pegawai, p.nama_pegawai, p.status_pegawai, p.gaji_pokok, t.id_pegawai  
        FROM pegawai as p, transaksi as t
        WHERE p.id_pegawai = t.id_pegawai LIMIT $halaman, $batas";
    return $this->db->query($query)->result();
}

    function post($data) {
        $this->db->insert('pegawai', $data);
    }
    function get_one($id) {
        $param = array('id_pegawai' => $id);
        return $this->db->get_where('pegawai', $param);
    }
    function edit($data, $id) {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }
    function delete($id) {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
    }
        function updateStatusColumn($id_pegawai, $status_pegawai) {
        $this->db->set('status', $status_pegawai);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai');
    }
}