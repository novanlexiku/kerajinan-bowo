<?php
class Pembelian extends MY_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
	}
	function index(){
	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
		$x['sup']=$this->m_suplier->tampil_suplier();
		// data variable untuk passing ke view
		$var['title_web'] 	= $this->web_title();
		$var['page_web']  	= 'Pembelian';

		// tampilan
		$this->admin_template($var);
		$this->load->view('admin/v_pembelian',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_beli',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart(){
	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
		$nofak=$this->input->post('nofak');
		$tgl=$this->input->post('tgl');
		$suplier=$this->input->post('suplier');
		$this->session->set_userdata('nofak',$nofak);
		$this->session->set_userdata('tglfak',$tgl);
		$this->session->set_userdata('suplier',$suplier);
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_barang->get_barang($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'price'    => $this->input->post('harpok'),
               'harga'    => $this->input->post('harjul'),
               'qty'      => $this->input->post('jumlah')
            );

		$this->cart->insert($data);
		redirect('admin/pembelian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('user_level')=='1'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/pembelian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_pembelian(){
	if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
		$nofak=$this->session->userdata('nofak');
		$tglfak=$this->session->userdata('tglfak');
		$suplier=$this->session->userdata('suplier');
		if(!empty($nofak) && !empty($tglfak) && !empty($suplier)){
			$beli_kode=$this->m_pembelian->get_kobel();
			$order_proses=$this->m_pembelian->simpan_pembelian($nofak,$tglfak,$suplier,$beli_kode);
			if($order_proses){
				$this->cart->destroy();
				$this->session->unset_userdata('nofak');
				$this->session->unset_userdata('tglfak');
				$this->session->unset_userdata('suplier');
				echo $this->session->set_flashdata('msg','simpanbeli');
				redirect('admin/pembelian');
			}else{
				redirect('admin/pembelian');
			}
		}else{
			echo $this->session->set_flashdata('msg','gagalbeli');
			redirect('admin/pembelian');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
