<?php 

class M_data_order extends CI_Model{
	function selectAll(){
		return $this->db->get('order_view')->result();
	}
	
	function selectMenu(){
		$this->db->where('status','Ready');
		$this->db->order_by('jenis');
		$this->db->order_by('status');
		return $this->db->get('menu')->result();
	}
	
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function distinct_id(){
		$this->db->distinct('id_pesan');
		$this->db->select('id_pesan, nomer_meja, nama, status');
		$this->db->from('order_view');		
		$query = $this->db->get();
		return $query->result();
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function update_detail($where, $data,$table){
		$this->db->where($where);
		$this->db->update_batch($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
	function input_detail($data,$table){
		$this->db->insert_batch($table,$data);
	}
	
	function ambil_nomor(){
		$this->db->select('SUBSTRING(id_pesan,13) as id', FALSE);
		$this->db->from('order_view');
		$this->db->order_by('id_pesan','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		
		return $query->row();
	}
}

?>