<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_profile');
		$this->load->library('encrypt');
		$this->load->helper('url');
	}

	function index(){
		$data['admin'] = $this->m_data_profile->selectAll();
		$this->load->view('profile',$data);
	}
	
	function edit($idadmin){
		$where = array('idadmin' => $idadmin);
		$data['admin'] = $this->m_data_profile->edit_data($where,'admin')->result();
		$this->load->view('profile_edit',$data);
	}
	
	function update(){
		error_reporting(E_ALL ^ E_DEPRECATED);
		$user = $_SESSION['nama'];
		include "koneksi.php";
		$idadmin = $this->input->post('idadmin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$privileges = $this->input->post('privileges');
			
            $query = mysql_query("SELECT * from admin where idadmin = '$idadmin'");
            
            if($query === FALSE) { 
                die(mysql_error()); // TODO: better error handling
            }
			
            while($row = mysql_fetch_array($query))
            { 
             	$pass = $row['password'];
             	if($pass != $password){
             		$dataadmin = array(
								'username' => $username,
			             		'password' => md5($password),
			             		'nama' => $nama,
								'privileges' => $privileges );
								
             	} else {
             		$dataadmin = array(
								'username' => $username,
			             		'nama' => $nama,
								'privileges' => $privileges );
								
             	}
				
				
				$where = array('idadmin' => $idadmin);
				$this->m_data_profile->update_data($where,$dataadmin,'admin');
			}
		redirect('profile/index');
	}

	function upload_foto(){
		$idadmin = $this->input->post('idadmin');
		$foto = $this->input->post('foto');
		
		$data = array(
			'foto' => $foto
		);

		$where = array(
			'idadmin' => $idadmin
		);
		
		$this->m_data_profile->update_data($where,$data,'admin');
		redirect('profile/index');
	}
	
}
?>