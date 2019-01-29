<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class User extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_user');
		$this->load->helper('url');
	}

	function index(){
		$data['admin'] = $this->m_data_user->selectAll();
		$this->load->view('user',$data);
	}
	
	function edit($idadmin){
		$where = array('idadmin' => $idadmin);
		$data['admin'] = $this->m_data_user->edit_data($where,'admin')->result();
		$this->load->view('user_edit',$data);
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
				$this->m_data_user->update_data($where,$dataadmin,'admin');
            }
            
        
		redirect('user/index');
	}
	
	function hapus($idadmin){
		$where = array('idadmin' => $idadmin);
		$this->m_data_user->hapus_data($where,'admin');
		redirect('user/index');
	}
	
	function tambah(){
		$this->load->view('user_tambah');
	}

	function tambah_aksi(){
		
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$privileges = $this->input->post('privileges');	
		
		$dataadmin = array(
					'username' => $username,
					'password' => md5($password),
		            'nama' => $nama,
					'privileges' => $privileges );

		$this->m_data_user->input_data($dataadmin,'admin');
		
		redirect('user/index');
	}
	
}
?>