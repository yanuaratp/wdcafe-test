<?php 

class M_data_user extends CI_Model{
	function selectAll(){
		return $this->db->get('admin')->result();
	}
	
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function tampil_data(){
		return $this->db->get('admin');
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
	
	public function cek_username($username)
	{
	    $this->db->where('username', $username);
	    $query = $this->db->get('admin');
	    if($query->num_rows() > 0)
	        return 1;
	    else
	        return 0;
	}
}

?>