<?php

/**
 * @package			Codeigniter
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Aksesoris extends MY_Controller
 * 
 *	Class ini untuk halaman Aksesoris admin
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Aksesoris extends MY_Controller {


	// Konstruktur
	function __construct()
	{
		parent::__construct();

		// mengambil data model, library, helper


		/**
		 *
		 * Model dan Helper di define dengan array
		 *
		*/

		$array_helper = array(
						'rpCurrency_helper',
						'exDate_helper'
			);

		$array_model  = array(
						'admin/maksesoris',
						'admin/mfacility',
						'admin/mtroom'
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// Fungsi Index
	public function index()
	{
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2') 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Aksesoris';


			// view
			$this->admin_template($var);
			$this->load->view('admin/part/aksesoris/index', $var);
			
		}else
			{
				redirect('');
			}	
	}

	// fungsi data aksesoris
	public function aksesoris_data()
	{
		$order 	= $_GET['order'];	// order database
		$offset = $_GET['offset'];	// offset 
		$limit 	= $_GET['limit'];   // batas menarik data

		if(isset($_GET['search']))
		{
			$search = $_GET['search']; // keyword
		}
		else
		{
			$search = NULL;
		}

		$result = array();
		$count  = $this->maksesoris->load_data();
		$res	= $this->maksesoris->load_dataPage($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_acc, 
							'desc'		=> $row->desc_acc,
							'price'		=> 'Rp. '.rpCurrency($row->price_acc),
							'date'		=> exDate($row->date_acc),
							'action'	=> '<button id="edit" class="btn btn-primary" idcontent="'.$row->id_acc.'"><i class="material-icons">create</i></button> <div id="delete" class="btn btn-danger" idcontent="'.$row->id_acc.'">
            					<i class="material-icons">delete</i></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi input aksesoris
	public function aksesoris_input()
	{
		// data

		// view
		$this->load->view('admin/part/aksesoris/input');
	}


	// fungsi menghapus data aksesoris
	public function aksesoris_delete($id)
	{
		$do_del = $this->maksesoris->delete_data($id);
		echo $do_del;
	}

	// fungsi menyimpan dataaksesoris
	public function aksesoris_save()
	{

		// ajax passing ke php konvert ke array untuk seat
		$id_fac   = $this->input->post('facility');
			
		foreach($id_fac as $ifc)
			{
				$data = $ifc;
			}

		$array = explode(',', $data);

		// ajax passing ke php konvert ke array untuk tipe aksesoris
		$id_troom   = $this->input->post('troom');
			
		foreach($id_troom as $itr)
			{
				$datatwo = $itr;
			}

		$arraytwo = explode(',', $datatwo);

		$this->maksesoris->save_data($array, $arraytwo);

		echo 'data sudah disimpan';
	}

	// fungsi edit data
	public function aksesoris_edit($id)
	{
		// data
		$var['facility_data']	= $this->mfacility->load_data();
		$var['troom_data']		= $this->mtroom->load_data();
		$var['aksesoris_data']  		= $this->maksesoris->load_data_edit($id);

		// view
		$this->load->view('admin/part/aksesoris/edit', $var);
	}

	// fungsi save edit data
	public function aksesoris_save_edit()
	{
		$do_save = $this->maksesoris->save_edit_data();

		echo $do_save;
	}

}
