<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
        $this->load->helper('parse');
        
    }

    public function get_all(){
    	$this->db->from('employees');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_info($id){
        $this->db->from('employees a');
        $this->db->join('regencies b',' on a.place_of_birth = b.id');
        $this->db->where("a.employee_id = '$id'");

        $query = $this->db->get();
        return $query->result_array();
    }
}