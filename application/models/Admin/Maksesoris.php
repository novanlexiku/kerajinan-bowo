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
 *	@subpackage			library, helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Maksesoris extends CI_Model {


	// konstruktur
	function __construct()
	{
		parent::__construct();

		// HELPER
		$this->load->helper('date');

		// LIBRARY
		$this->load->library('upload');
	}

	// mengambil data aksesoris
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data aksesoris per halaman
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_dataPage($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('tbl_aksesoris');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->like('name_acc', $search);
		}

       	$this->db->order_by('id_acc', $order);

       	// kondisi jika pembatasan dan offset tidak ada
        if($limit != NULL && $offset!=NULL)
        {
        	$this->db->limit($limit,$offset);
        }
       	elseif($offset == NULL)
       	{
       		$this->db->limit($limit);
       	}
        
        $query = $this->db->get();
        
        return $query->result();
	}

	// menyimpan data aksesoris
	public function save_data($array_one, $array_two)
	{
		$title 		= $this->input->post('title');
		$desc  		= $this->input->post('desc');
		$price 		= $this->input->post('price');

		$date  = date('Y-m-d', now());
		$time  = date('H:i:s', now());

		$data  = $_POST['imageFile'];
		$slug  = url_title($title, '-', TRUE);

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$imageName = 'tg'.time().'.png';
		file_put_contents('assets/hpublic/img_aksesoris/'.$imageName, $data);

		$aksesoris    = array(
				'name_acc'		=> $title,
				'desc_acc'		=> $desc,
				'slug_acc'		=> $slug,
				'image_acc'		=> $imageName,
				'price_acc'		=> $price,
				'date_acc'		=> $date,
				'time_acc'		=> $time,
				'date_time_acc'	=> $date.' '.$time
			);

		$this->db->insert('tbl_aksesoris', $aksesoris);

		$id_aksesoris = $this->db->insert_id();

		$id_fac   = $array;

		foreach($id_fac as $ifc)
		{
			$facaksesoris[] = array(
					'id_acc'			=> $id_aksesoris,
					'id_seat'		=> $ifc,
					'date_ms'		=> $date,
					'time_ms'		=> $time,
					'date_ms'		=> $date.' '.$time
				);
		}
		$this->db->insert_batch('tbl_meta_seat', $facaksesoris);

		$id_troom = $arraytwo;

		foreach($id_troom as $itr)
		{
			$itraksesoris[] = array(
					'id_acc'				=> $id_aksesoris,
					'id_cat'			=> $itr,
					'date_mc'			=> $date,
					'time_mc'			=> $time,
					'date_time_mc'		=> $date.' '.$time
				);
		}
		$this->db->insert_batch('tbl_meta_category', $itraksesoris);

		return $facaksesoris;
	}

	// fungsi load data edit
	public function load_data_edit($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');
		$this->db->where('id_acc', $id);

		$query = $this->db->get();
		return $query->result();
	}

	// fungsi hapus data
	public function delete_data($id)
	{
		$this->db->where('id_acc', $id);
		$this->db->delete('tbl_aksesoris');

		echo "Aksesoris sudah di hapus";
	}

	// fungsi filter edit data


	// fungsi save edit data
	public function save_edit_data()
	{
		$id 		= $this->input->post('idaksesoris');
		$title 		= $this->input->post('title');
		$desc  		= $this->input->post('desc');
		$price 		= $this->input->post('price');

		$date  = date('Y-m-d', now());
		$time  = date('H:i:s', now());

		$data  = $_POST['imageFile'];
		$slug  = url_title($title, '-', TRUE);


		if($data == 'data:,')
		{
			$aksesoris    = array(
					'name_acc'		=> $title,
					'desc_acc'		=> $desc,
					'slug_acc'		=> $slug,
					'price_acc'		=> $price,
					'date_acc'		=> $date,
					'time_acc'		=> $time,
					'date_time_acc'	=> $date.' '.$time
				);

			$this->db->where('id_acc', $id);
			$this->db->update('tbl_aksesoris', $aksesoris);
		}
		else
		{
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			$data = base64_decode($data);
			$imageName = 'tg'.time().'.png';
			file_put_contents('assets/hpublic/img_aksesoris/'.$imageName, $data);

			$aksesoris    = array(
					'name_acc'		=> $title,
					'desc_acc'		=> $desc,
					'slug_acc'		=> $slug,
					'image_acc'		=> $imageName,
					'price_acc'		=> $price,
					'date_acc'		=> $date,
					'time_acc'		=> $time,
					'date_time_acc'	=> $date.' '.$time
				);

			$this->db->where('id_acc', $id);
			$this->db->update('tbl_aksesoris', $aksesoris);	
		}

		echo "Data sudah di edit";

	}

}
