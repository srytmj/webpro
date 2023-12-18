<?php
class model_coa extends CI_model {
    public $kode_akun;
    public $nama_akun;
    public $labels = [];

    public function __construct() {
        parent::__construct();
        $this->labels = $this->_attributelabels();

        $this->load->database();
    }

    public function insert() {
        $sql = sprintf("INSERT INTO coa VALUES('%d','%s')",
            $this->kode_akun,
            $this->nama_akun,
        );
        $this->db->query($sql);
    }

    public function update() {
        $sql = sprintf("UPDATE coa SET nama_akun ='%s' WHERE kode_akun='%d'",
            $this->nama_akun,
            $this->kode_akun
        );
        $this->db->query($sql);
    }

    public function delete() {
        $sql = sprintf("DELETE FROM coa WHERE kode_akun='%s'", $this->kode_akun);
        $this->db->query($sql);
    }

    public function read() {
        $sql = "SELECT * FROM coa ORDER BY kode_akun";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function _attributelabels() {
        return [
            'kode_akun' => 'kode_akun:',
            'nama_akun' => 'nama_akun:',
            'no_hp' => 'no_hp:',
            'tanggal_wedding' => 'tanggal_wedding:',
            'tanggal_booking_konsultasi' => 'tanggal_booking_konsultasi:'
        ];
    }
}
?>