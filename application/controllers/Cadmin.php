<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('rpCurrency_helper');
		$this->load->helper('exDate_helper');

		// load model
		$this->load->model('admin/mfacility');
		$this->load->model('admin/maksesoris2');
		$this->load->model('admin/mtroom');
	}

	public function index()
	{
		if ($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2') 
		{
			redirect('admin/beranda');
		}else
			{
				redirect('');
			}
	}

	// FUNCTION HOTEL
	public function p_aksesoris()
	{
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

		function aksesoris_data()
		{

			$order 	= $_GET['order'];
			$offset = $_GET['offset'];
			$limit 	= $_GET['limit'];

			if(isset($_GET['search']))
			{
				$search = $_GET['search'];
			}
			else
			{
				$search = NULL;
			}

			$result = array();
			$count  = $this->maksesoris2->load_data();
			$res	= $this->maksesoris2->load_dataPage($order, $offset, $limit, $search);

			foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_acc, 
							'desc'		=> $row->desc_acc,
							'price'		=> 'Rp. '.rpCurrency($row->price_acc),
							'date'		=> exDate($row->date_acc),
							'action'	=> '<button class="btn btn-primary"><i class="material-icons">create</i></button>
											<div id="delete" class="btn btn-danger" idaksesoris="'.$row->id_acc.'">
            								<i class="material-icons">delete</i>
            								</div>
											'
							);
			}
			echo json_encode(array('total'=>count($count), 'rows'=>$result));
		}

		function aksesoris_input()
		{

			// view
			$this->load->view('admin/part/aksesoris/input');
		}

		function aksesoris_save()
		{
			// $id_fac   = $this->input->post('facility');
			
			// $array = explode(',', $id_fac);

			// $id_troom   = $this->input->post('troom');
			

			// $arraytwo = explode(',', $id_troom);

			$this->maksesoris2->save_data($array, $arraytwo);

			echo 'data sudah disimpan';
		}

		function aksesoris_delete()
		{
			$do_del = $this->maksesoris2->delete_data();
			echo $do_del;
		}


	// FUNCTION ROOM TYPE
	public function p_type_room()
	{
		if ($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2') 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Tipe Aksesoris';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/troom/index', $var);
			
		}else
			{
				redirect('');
			}
	}

		// child function
		function type_room_data()
		{
			$order 	= $_GET['order'];
			$offset = $_GET['offset'];
			$limit 	= $_GET['limit'];

			if(isset($_GET['search']))
			{
				$search = $_GET['search'];
			}
			else
			{
				$search = NULL;
			}

			$result = array();
			$count  = $this->mtroom->load_data();
			$res	= $this->mtroom->load_dataPage($order, $offset, $limit, $search);

			foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_cat, 
							'desc'		=> $row->desc_cat,
							'date'		=> exDate($row->date_cat),
							'action'	=> '<button class="btn btn-primary"><i class="material-icons">create</i></button>
											<div id="delete" class="btn btn-danger" idaksesoris="'.$row->id_cat.'">
            								<i class="material-icons">delete</i>
            								</div>
											'
							);
			}
			echo json_encode(array('total'=>count($count), 'rows'=>$result));
		}

		function type_room_input()
		{
			$this->load->view('admin/part/troom/input');
		}

		function type_room_save()
		{
			$do_save = $this->mtroom->save_data();

			echo $do_save;
		}

	// FUNCTION FACILITY
	public function p_facility()
	{
		if ($this->session->userdata('user_level')=='1'|| $this->session->userdata('user_level')=='2') 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Seat';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/facility/index', $var);
			
		}else
			{
				redirect('');
			}
	}

		function facility_data()
		{
			$var['facility_data'] = $this->mfacility->load_data();

			$this->load->view('admin/part/facility/data', $var);
		}

		function facility_input()
		{
			$this->load->view('admin/part/facility/input');
		}

		function facility_save()
		{
			$do_save = $this->mfacility->save_data();

			echo $do_save;
		}


// akhir controller
}
