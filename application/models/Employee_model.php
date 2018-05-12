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
}