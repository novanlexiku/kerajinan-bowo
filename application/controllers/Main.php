<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends MY_Controller {

		protected $access = array('1', '2');
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
			$this->load->model('m_penjualan');
			$this->load->model('m_laporan');
			$this->load->model('m_grafik');
			$this->load->library('datatables');
		}
		public function index()
		{
			if($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2'){
				// data variable untuk passing ke view
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Beranda';

			// tampilan
			$this->admin_template($var);
			$this->load->view('admin/part/home/index', $var);
			}else{
				$this->load->view('admin/v_index');
				}



		}
		function graf_stok_barang(){
			$x['report']=$this->m_grafik->statistik_stok();
			$this->load->view('admin/v_index',$x);
		}


		function graf_penjualan_perbulan(){
			$bulan=$this->input->post('bln');
			$x['report']=$this->m_grafik->graf_penjualan_perbulan($bulan);
			$x['bln']=$bulan;
			$this->load->view('admin/v_index',$x);
		}
		function graf_penjualan_pertahun(){
			$tahun=$this->input->post('thn');
			$x['report']=$this->m_grafik->graf_penjualan_pertahun($tahun);
			$x['thn']=$tahun;
			$this->load->view('admin/v_index',$x);
		}
		function lap_stok_barang(){
			$x['data']=$this->m_laporan->get_stok_barang();
			$this->load->view('admin/v_index',$x);
		}
		function lap_data_barang(){
			$x['data']=$this->m_laporan->get_data_barang();
			$this->load->view('admin/v_index',$x);
		}
		function lap_data_penjualan(){
			$x['data']=$this->m_laporan->get_data_penjualan();
			$x['jml']=$this->m_laporan->get_total_penjualan();
			$this->load->view('admin/v_index',$x);
		}
		function lap_penjualan_pertanggal(){
			$tanggal=$this->input->post('tgl');
			$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
			$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
			$this->load->view('admin/v_index',$x);
		}
		function lap_penjualan_perbulan(){
			$bulan=$this->input->post('bln');
			$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
			$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
			$this->load->view('admin/v_index',$x);
		}

		function lap_penjualan_pertahun(){
			$tahun=$this->input->post('thn');
			$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
			$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
			$this->load->view('admin/v_index',$x);
		}
		function lap_laba_rugi(){
			$bulan=$this->input->post('bln');
			$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($bulan);
			$x['data']=$this->m_laporan->get_lap_laba_rugi($bulan);
			$this->load->view('admin/v_index',$x);
		}
	}

	/* End of file Main.php */
	/* Location: ./application/controllers/Main.php */
