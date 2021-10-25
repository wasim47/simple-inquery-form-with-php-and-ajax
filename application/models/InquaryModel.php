<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InquaryModel extends CI_Model{

	public function index(){
		// $this->db->order_by('SetupDate', 'desc');
		// $query = $this->db->get('supplier');
		// $this->db->select('*');
		// $this->db->from('supplier');
		$query = $this->db->get('inquary');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function store($field){
		$this->db->insert('supplier', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}


?>