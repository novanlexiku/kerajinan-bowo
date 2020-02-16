<?php

/**
 * @package			Codeigniter
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Dashboard extends MY_Controller
 * 
 *	Class ini untuk halaman index / dashboard admin
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	function __construct()
	{
		parent::__construct();

		$this->load->model('admin/minvoice');
	}

	// fungsi index
	function index()
	{
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2') 
		{
			// data variable untuk passing ke view
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Beranda';

			// tampilan
			$this->admin_template($var);
			$this->load->view('admin/part/home/index', $var);
			
		}else
			{
				redirect('');
			}
	}

}
