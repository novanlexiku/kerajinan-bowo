<?php
class Pengguna extends MY_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_pengguna');
	}
	function index(){
	if($this->session->userdata('user_level')=='1'){
		$data['data']=$this->m_pengguna->get_pengguna();
		// data variable untuk passing ke view
		$var['title_web'] 	= $this->web_title();
		$var['page_web']  	= 'Pengguna';

		// tampilan
		$this->admin_template($var);
		$this->load->view('admin/v_pengguna',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function tambah_pengguna(){
	if($this->session->userdata('user_level')=='1'){
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$level=$this->input->post('level');
		if ($password2 <> $password) {
			echo $this->session->set_flashdata('msg','passwordtidaksama');
			redirect('admin/pengguna');
		}else{
			$this->m_pengguna->simpan_pengguna($nama,$username,$password,$level);
			echo $this->session->set_flashdata('msg','tambahpengguna');
			redirect('admin/pengguna');
		}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_pengguna(){
	if($this->session->userdata('user_level')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$level=$this->input->post('level');
		if (empty($password) && empty($password2)) {
			$this->m_pengguna->update_pengguna_nopass($kode,$nama,$username,$level);
			echo $this->session->set_flashdata('msg','updatepengguna');
			redirect('admin/pengguna');
		}elseif ($password2 <> $password) {
			echo $this->session->set_flashdata('msg','passwordtidaksama');
			redirect('admin/pengguna');
		}else{
			$this->m_pengguna->update_pengguna($kode,$nama,$username,$password,$level);
			echo $this->session->set_flashdata('msg','updatepengguna');
			redirect('admin/pengguna');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function nonaktifkan(){
	if($this->session->userdata('user_level')=='1'){
		$kode=$this->input->post('kode');
		$this->m_pengguna->update_status($kode);
		echo $this->session->set_flashdata('msg','penggunadeactivated');
		redirect('admin/pengguna');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function aktifkan(){
	if($this->session->userdata('user_level')=='1'){
		$kode=$this->input->post('kode');
		$this->m_pengguna->update_status2($kode);
		echo $this->session->set_flashdata('msg','penggunaactivated');
		redirect('admin/pengguna');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
