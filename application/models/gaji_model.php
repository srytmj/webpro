<?php

class Gaji_Model extends CI_Model {
    public function get_report_data() {
        $this->db->select(
            'p.nama_pegawai AS Nama_Pegawai, '.
            'gaji_pokok AS Gaji_Pokok, '.
            'COUNT(ps.id_pemesanan) AS Jumlah_Proyek, '.
            'gaji_pokok + (COUNT(ps.id_pemesanan) * paket.harga) AS Total_Gaji, '.
            'status_pegawai AS Status_Pegawai, '.
            'DATE_FORMAT(tgl_pemesanan, "%Y-%m") AS Bulan'
        );
        $this->db->from('pemesanan ps');
        $this->db->join('pegawai p', 'ps.id_pegawai = p.id_pegawai');
        $this->db->join('paket', 'ps.id_paket = paket.id_paket');
        $this->db->group_by('p.nama_pegawai, DATE_FORMAT(tgl_pemesanan, "%Y-%m")');
        $this->db->order_by('Bulan, Nama_Pegawai');

        return $this->db->get()->result_array();
    }
    
    public function get_filtered_data($pegawai, $bulan_tahun, $tahun, $bulan) {
        $this->db->select(
            'p.nama_pegawai AS Nama_Pegawai, '.
            'gaji_pokok AS Gaji_Pokok, '.
            'COUNT(ps.id_pemesanan) AS Jumlah_Proyek, '.
            'gaji_pokok + (COUNT(ps.id_pemesanan) * paket.harga) AS Total_Gaji, '.
            'status_pegawai AS Status_Pegawai, '.
            'DATE_FORMAT(tgl_pemesanan, "%Y-%m") AS Bulan'
        );
        $this->db->from('pemesanan ps');
        $this->db->join('pegawai p', 'ps.id_pegawai = p.id_pegawai');
        $this->db->join('paket', 'ps.id_paket = paket.id_paket');
        
        // Add filter for the employee name
        if ($pegawai !== '') {
            $this->db->like('p.nama_pegawai', $pegawai);
        }
    
        // Add filter for the month and year if provided
        if ($bulan == 0) {
            $this->db->where('DATE_FORMAT(tgl_pemesanan, "%Y") = ', $tahun);
        } else{
            if ($bulan_tahun !== '') {
                $this->db->where('DATE_FORMAT(tgl_pemesanan, "%Y-%m") = ', $bulan_tahun);
            }
        }

    
        $this->db->group_by('p.nama_pegawai, DATE_FORMAT(tgl_pemesanan, "%Y-%m")');
        $this->db->order_by('Bulan, Nama_Pegawai');
    
        return $this->db->get()->result_array();
    }
    
    public function get_pegawai(){
        $this->db->distinct();
        $this->db->select('p.nama_pegawai');
        $this->db->from('pegawai p');
        $this->db->join('pemesanan ps', 'p.id_pegawai = ps.id_pegawai', 'inner');
        $query = $this->db->get();
    
        return $query->result();    
    }
    
}