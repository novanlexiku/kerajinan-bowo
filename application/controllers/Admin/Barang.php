<?php
class Barang extends MY_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
	}
	function index(){

	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){

		$data = array(
    'data' =>	$this->m_barang->tampil_barang(),
		'kat' =>	$this->m_kategori->tampil_kategori(),
		'kat2' =>	$this->m_kategori->tampil_kategori()
    );
		// data variable untuk passing ke view
		$var['title_web'] 	= $this->web_title();
		$var['page_web']  	= 'Barang';

		// tampilan
		$this->admin_template($var);
		$this->load->view('admin/v_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_barang(){
	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
		$kobar=$this->m_barang->get_kobar();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
 		echo $this->session->set_flashdata('msg','tambahbrg');
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_barang(){
	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
		echo $this->session->set_flashdata('msg','editbrg');
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_barang(){
	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		echo $this->session->set_flashdata('msg','hapusbrg');
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
