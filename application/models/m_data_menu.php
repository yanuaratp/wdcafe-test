<?php 

class M_data_menu extends CI_Model{
	function selectAll(){
		$this->db->order_by('jenis');
		$this->db->order_by('status');
		return $this->db->get('menu')->result();
	}
	
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function tampil_data(){
		$this->db->order_by('jenis');
		$this->db->order_by('status');
		return $this->db->get('menu');
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}

?>