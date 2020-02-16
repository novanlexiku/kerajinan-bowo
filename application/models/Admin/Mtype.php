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
 *	Class ini untuk model tipe aksesoris
 *
 *	@subpackage			helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Mtype extends CI_Model {


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
						'date'
			);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi mengambi data tipe aksesoris
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_category');

		$query = $this->db->get();
		return $query->result();
	}

	// fungsi mengabil data tipe aksesoris dari id
	public function load_edit_data($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where('id_cat', $id);

		$query = $this->db->get();
		return $query->result();

	}

	// mengambil data tipe aksesoris per halaman
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_data_page($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('tbl_category');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->like('name_cat', $search);
		}

       	$this->db->order_by('id_cat', $order);

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

	public function filter_edit_data()
	{
		$id 	= $this->input->post('id');
		$title 	= $this->input->post('title');
		$titlef = $this->input->post('titlef');

		// tanggal dan waktu
		$date 		= date('Y-m-d', now());
		$time		= date('H:i:s', now());

		// url / slug tipe aksesoris
		$slug		= url_title($title, '-', TRUE);

		$check		= $this->db->query("select * from tbl_category where name_cat = '$title'");
		$check_res	= $check->result();

		if($title == $titlef)
		{
			$this->save_edit_data();
		}
		else
		{
			if(count($check_res)>0)
				{
					echo "Judul sudah ada silahkan ganti dengan yang lain";
				}
			else
				{
					$this->save_edit_data();
				}

		}
	}

	public function save_edit_data()
	{
		$id 	= $this->input->post('id');
		$title 	= $this->input->post('title');
		$titlef = $this->input->post('titlef');
		$desc		= $this->input->post('desc');

		// tanggal dan waktu
		$date 		= date('Y-m-d', now());
		$time		= date('H:i:s', now());

		// url / slug tipe aksesoris
		$slug		= url_title($title, '-', TRUE);

		$data 	= array(
					'name_cat'		=> $title,
					'desc_cat'		=> $desc,
					'slug_cat'		=> $slug,
					'date_cat'		=> $date,
					'time_cat'		=> $time,
					'date_time_cat'	=> $date.' '.$time
				);

		$this->db->where('id_cat', $id);
		$this->db->update('tbl_category', $data);

		echo "Tipe aksesoris sudah disimpan";
	}

	// menyimpan data tipe aksesoris
	public function save_data()
	{
		// mengambil data post
		$title		= $this->input->post('title');
		$desc		= $this->input->post('desc');

		// tanggal dan waktu
		$date 		= date('Y-m-d', now());
		$time		= date('H:i:s', now());

		// url / slug tipe aksesoris
		$slug		= url_title($title, '-', TRUE);

		// memfileter title jika ada yang sama dengan database
		$check		= $this->db->query("select * from tbl_category where name_cat = '$title'");
		$check_res	= $check->result();

		if(count($check_res)>0)
		{
			echo "Judul sudah ada silahkan ganti dengan yang lain";
		}
		else
		{
			$data 	= array(
						'name_cat'		=> $title,
						'desc_cat'		=> $desc,
						'slug_cat'		=> $slug,
						'date_cat'		=> $date,
						'time_cat'		=> $time,
						'date_time_cat'	=> $date.' '.$time
				);

			$this->db->insert('tbl_category', $data);

			echo "Tipe aksesoris sudah disimpan";
		}
	}

	// menghapus tipe aksesoris
	public function delete_data($id)
	{
		$this->db->where('id_cat', $id);
		$this->db->delete('tbl_category');

		echo "Tipe aksesoris sudah di hapus";
	}

// end model
}

