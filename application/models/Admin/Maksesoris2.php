<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maksesoris2 extends CI_Model {


	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('date');

		// load library
		$this->load->library('upload');
	}

	function load_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');

		$query = $this->db->get();
		return $query->result();
	}

	function load_dataPage($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('tbl_aksesoris');

		if($search != NULL)
		{
			$this->db->like('name_acc', $search);
		}
       	$this->db->order_by('id_acc', $order); 
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

	function save_data($array, $arraytwo)
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

		$aksesoris = array(
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

	function delete_data()
	{
		$id_aksesoris = $this->input->post('id');

		// delete aksesoris
		$this->db->where('id_aksesoris', $id_aksesoris);
		$this->db->delete('aksesoris');

		// delete meta
		$this->db->where('id_aksesoris', $id_aksesoris);
		$this->db->delete('aksesoris_facility_meta');

		$res = 'Data aksesoris sudah dihapus';

		return $res;
	}

// end of model
}
