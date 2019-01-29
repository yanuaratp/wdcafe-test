<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Order extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_order');
		$this->load->helper('url');
	}

	function index(){
		$data['order_view'] = $this->m_data_order->distinct_id();
		$this->load->view('order',$data);
	}
	
	function edit($id_pesan){
		$where = array('id_pesan' => $id_pesan);
		$data['order_view'] = $this->m_data_order->edit_data($where,'order_view')->result();
		$this->load->view('order_edit',$data);
	}
	
	function detail($id_pesan){
		$where = array('id_pesan' => $id_pesan);
		$data['order_view'] = $this->m_data_order->edit_data($where,'order_view')->result();
		$this->load->view('order_detail',$data);
	}
	
	function bayar($id_pesan){
		$where = array('id_pesan' => $id_pesan);
		$databayar = array('status' => 'Bayar');
		$this->m_data_order->update_data($where, $databayar,'pesanan');
		redirect('order/index');
	}
	
	function update(){
		error_reporting(E_ALL ^ E_DEPRECATED);
        $user = $_SESSION['nama'];
        include "koneksi.php";
		$id_pesan = $this->input->post('id_pesan');
		$nomer_meja = $this->input->post('nomer_meja');
        $dataorder = array(
					'nomer_meja' => $nomer_meja	);
					
		$id_menu = $this->input->post('id_menu');
		$jumlah_pesan = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');;
		
		$index = 0;
		foreach($id_menu as $id){
			
			$detailorder = array(
					'jumlah_pesan' => $jumlah_pesan[$index],
					'keterangan' => $keterangan[$index],						
			);
						
			$array = array('id_pesan' => $id_pesan, 'id_menu' => $id_menu[$index]);
			
			$this->m_data_order->update_data($array, $detailorder,'detail_pesanan');
			$index++;
		}
		
		$where = array('id_pesan' => $id_pesan);
		
		$this->m_data_order->update_data($where, $dataorder,'pesanan');
		
            
        
		redirect('order/index');
	}
	
	function hapus($id_pesan){
		$where = array('order_view' => $id_pesan);
		$this->m_data_menu->hapus_data($where,'order');
		redirect('order/index');
	}
	
	function tambah(){
		$data['menu'] = $this->m_data_order->selectMenu();
		$this->load->view('order_tambah',$data);
	}

	function tambah_aksi(){
		$nomor = $this->m_data_order->ambil_nomor();
		
		$nomorid = (int)$nomor->id;
		$nomorid++;
		
		$id_pesan = 'ERP'. date('dmY') . '-' . $nomorid;
		$nomer_meja = $this->input->post('nomer_meja');
		$tanggal_pesan = date('d-m-Y');
		$id_pegawai = $this->input->post('id_pegawai');
		
		
		$dataorder = array(
					'id_pesan' => $id_pesan,
					'nomer_meja' => $nomer_meja,
					'status' => 'Aktif',
					'tanggal_pesan' => $tanggal_pesan,
					'id_pegawai' => $id_pegawai );
					
		$detailorder = array();
		
		$id_menu = $this->input->post('id_menu');
		$jumlah_pesan = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');;
		
		$index = 0;
		foreach($id_menu as $id){
				
			array_push($detailorder, array(
						'id_menu' => $id,
						'jumlah_pesan' => $jumlah_pesan[$index],
						'keterangan' => $keterangan[$index],
						'id_pesan' => $id_pesan,
			));
			$index++;
		}
		$this->m_data_order->input_data($dataorder,'pesanan');
		$this->m_data_order->input_detail($detailorder,'detail_pesanan');
		
		
		redirect('order/index');
	}
	
}
?>