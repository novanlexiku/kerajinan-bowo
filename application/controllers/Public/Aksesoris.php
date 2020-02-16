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
 *	Class ini untuk halaman Aksesoris
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
						'exDate_helper',
						'webSetting_helper'
			);

		$array_model  = array(
						'admin/msetting',
						'public/paksesoris2',
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi index
	public function index()
	{
		// var
		$var['title_web']		= 'Toko Kerajinan Bowo';
		$var['page_web']		= 'Aksesoris';

		// data
		$var['menu'] 			= $this->msetting->load_menu();
		$var['aksesoris_data'] 		= $this->paksesoris2->load_data();

		// setting
		$var['bank_data']  		= $this->msetting->load_data_bank();

		// template
		$this->public_template($var);
		$this->load->view('public/part/aksesoris/index', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');

	}

	// fungsi Aksesoris / halaman
	public function single_page($slug)
	{
		// var
		$var['title_web']		= 'Toko Kerajinan Bowo';
		$var['page_web']		= $this->paksesoris2->load_name($slug);
		$var['menu'] 			= $this->msetting->load_menu();

		// data
		$var['aksesoris_data']  		= $this->paksesoris2->load_sc($slug);

		// setting
		$var['bank_data']  		= $this->msetting->load_data_bank();

		// template
		$this->public_template($var);
		$this->load->view('public/part/single/aksesoris', $var);
		$this->load->view('public/template/footer', $var);
	}

// end model
}
