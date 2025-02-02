<?php
class Retur extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_penjualan');
	}
	function index(){
	if($this->session->userdata('user_level')=='1' || $this->session->userdata('user_level')=='2'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['retur']=$this->m_penjualan->tampil_retur();
		$title = array(
      'title' => 'Halaman Retur' ,
	    );
		$this->load->view('nav/header',$title);
		$this->load->view('admin/v_retur',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('user_level')=='1' || $this->session->userdata('user_level')=='2'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_retur',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function simpan_retur(){
	if($this->session->userdata('user_level')=='1' || $this->session->userdata('user_level')=='2'){
		$kobar=$this->input->post('kode_brg');
		$nabar=$this->input->post('nabar');
		$satuan=$this->input->post('satuan');
		$harjul=str_replace(",", "", $this->input->post('harjul'));
		$qty=$this->input->post('qty');
		$keterangan=$this->input->post('keterangan');
		$this->m_penjualan->simpan_retur($kobar,$nabar,$satuan,$harjul,$qty,$keterangan);
		echo $this->session->set_flashdata('msg','simpanretur');
		redirect('admin/retur');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function hapus_retur(){
	if($this->session->userdata('user_level')=='1' || $this->session->userdata('user_level')=='2'){
		$kode=$this->uri->segment(4);
		$this->m_penjualan->hapus_retur($kode);
		echo $this->session->set_flashdata('msg','hapusretur');
		redirect('admin/retur');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

}
