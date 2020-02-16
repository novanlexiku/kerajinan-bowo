<?php

/**
 * @package			Codeigniter
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Type extends MY_Controller
 * 
 *	Class ini untuk halaman tipe
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends MY_Controller {


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
						'exDate_helper'
			);

		$array_model  = array(
						'admin/mtype',
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi index
	public function index()
	{
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2') 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Tipe Aksesoris';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/type/index');
			
		}else
			{
				redirect('');
			}
	}

	public function type_data()
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
		$count  = $this->mtype->load_data();
		$res	= $this->mtype->load_data_page($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_cat, 
							'desc'		=> $row->desc_cat,							
							'date'		=> exDate($row->date_cat),
							'action'	=> '<button class="btn btn-primary edit" idcontent="'.$row->id_cat.'"><i class="material-icons">create</i></button> <div class="btn btn-danger del" idcontent="'.$row->id_cat.'">
            					<i class="material-icons">delete</i></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// input data tipe aksesoris
	public function type_input()
	{
		// view
		$this->load->view('admin/part/type/input');
	}

	// menyimpan data tipe aksesoris
	public function type_save()
	{
		$do_save = $this->mtype->save_data();

		echo $do_save;
	}

	// menghapus data tipe aksesoris
	public function type_delete($id)
	{
		$do_del = $this->mtype->delete_data($id);

		echo $do_del;
	}

	// mengedit data tipe aksesoris
	public function type_edit($id)
	{
		$var['type_data'] = $this->mtype->load_edit_data($id);
		$this->load->view('admin/part/type/edit', $var);
	}

	// save edit data
	public function save_type_edit()
	{
		$do_save = $this->mtype->filter_edit_data();
		echo $do_save;
	}

// end model
}
