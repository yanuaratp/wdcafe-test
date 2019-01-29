<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Menu extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_menu');
		$this->load->helper('url');
	}

	function index(){
		$data['menu'] = $this->m_data_menu->selectAll();
		$this->load->view('menu',$data);
	}
	
	function edit($id_menu){
		$where = array('id_menu' => $id_menu);
		$data['menu'] = $this->m_data_menu->edit_data($where,'menu')->result();
		$this->load->view('menu_edit',$data);
	}
	
	function update(){
		error_reporting(E_ALL ^ E_DEPRECATED);
        $user = $_SESSION['nama'];
        include "koneksi.php";
		$id_menu = $this->input->post('id_menu');
		$nama_menu = $this->input->post('nama_menu');
		$jenis = $this->input->post('jenis');
		$harga = $this->input->post('harga');
		$status = $this->input->post('status');
		
		$datamenu = array(
					'nama_menu' => $nama_menu,
					'jenis' => $jenis,
					'harga' => $harga,
					'status' => $status );
		
		$where = array('id_menu' => $id_menu);
		$this->m_data_menu->update_data($where,$datamenu,'menu');
            
            
        
		redirect('menu/index');
	}
	
	function hapus($id_menu){
		$where = array('id_menu' => $id_menu);
		$this->m_data_menu->hapus_data($where,'menu');
		redirect('menu/index');
	}
	
	function tambah(){
		$this->load->view('menu_tambah');
	}

	function tambah_aksi(){
		
		$nama_menu = $this->input->post('nama_menu');
		$jenis = $this->input->post('jenis');
		$harga = $this->input->post('harga');
		$status = $this->input->post('status');
		
		$datamenu = array(
					'nama_menu' => $nama_menu,
					'jenis' => $jenis,
					'harga' => $harga,
					'status' => $status );
		
		$this->m_data_menu->input_data($datamenu,'menu');
		
		redirect('menu/index');
	}
	
}
?>