<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paksesoris extends CI_Model {


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
		$this->db->join('tbl_meta_category', 'tbl_meta_category.id_acc = tbl_aksesoris.id_acc');
		$this->db->join('tbl_category', 'tbl_category.id_cat = tbl_meta_category.id_cat');

		$query = $this->db->get();
		return $query->result();
	}

	function load_name($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');
		$this->db->where('slug_acc', $slug);

		$query = $this->db->get();
		
		foreach($query->result() as $row)
		{
			$res = $row->name_acc;
		}

		return $res;
	}

	function load_sc($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');
		$this->db->where('slug_acc', $slug);

		$query = $this->db->get();
		return $query->result();
	}

	function load_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');
		$this->db->where('id_acc', $id);

		$query = $this->db->get();
		return $query->result();
	}

	function load_inv($unique_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_invoice');
		$this->db->where('code_inv', $unique_id);

		$query = $this->db->get();
		return $query->result();
	}

// end of model
}
