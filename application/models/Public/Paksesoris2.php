<?php

/**
 * @package			Codeigniter
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Paksesoris extends CI_Model
 * 
 *	Class ini untuk model aksesoris
 *
 *	@subpackage			library, helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Paksesoris2 extends CI_Model {

	// mengambil data aksesoris
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil nama aksesoris
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

	// mengambil data untuk single page aksesoris
	function load_sc($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');
		$this->db->where('slug_acc', $slug);

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data dari id
	function load_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_aksesoris');
		$this->db->where('id_acc', $id);

		$query = $this->db->get();
		return $query->result();
	}




// end model
}
