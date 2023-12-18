<?php
class Coa extends CI_controller{
    public $model = NULL;

    public function __construct(){
        parent::__construct();
        //memuat model
    $this->load->model('model_coa');
    $this->model =$this->model_coa;

    //memuat librari database
    $this->load->database();
    }

    public function index(){
    $this->read();
    }
    public function create() {
    //belum implementasi
        if (isset($_POST['btnSubmit'])) {
            $this->model->kode_akun=$_POST['kode_akun'];
            $this->model->nama_akun=$_POST['nama_akun'];
            $this->model->insert();
            redirect('coa');
        }else{
            $this->load->view('coa/create',['model'=>$this->model]);
        }
    }

    public function read() {
        $rows=$this->model->read();
        $this->load->view('coa/read', ['rows'=>$rows]);
    }
    public function update($id) {
        //belum implementasi
        if (isset($_POST['btnSubmit'])) {
            $this->model->kode_akun=$_POST['kode_akun'];
            $this->model->nama_akun=$_POST['nama_akun'];
            $this->model->update();
            redirect('Coa');
        }else{
            $query = $this->db->query("SELECT * FROM coa WHERE 
            kode_akun='$id'");
            //if ($query->num_row() ==0) exit(1);
                $row =$query->row();
                $this->model->kode_akun=$row->kode_akun;
                $this->model->nama_akun=$row->nama_akun;
                $this->load->view('coa/update',
                ['model'=>$this->model]);
        }
    }
    public function delete($id) {
        //menentukan kode_akun yang akan di hapus
        $this->model->kode_akun = $id;
        //menghapus baris data di dalam tabel coa
        $this->model->delete();
        //mengarahkan kembali ke halaman utama/index
        redirect('Coa');
    }
}