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
        $this->db->where("a.employee_id = '$id'");

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_status($stat){
        $this->db->select('status');
        $this->db->from('status');
        $this->db->where("status_id = '$stat' LIMIT 1");       
        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
                echo $row->status;
        }
        return $query->free_result();  
    }

    function get_salary($id){
        $this->db->select('salary');
        $this->db->from('salary');
        $this->db->where("employee_id = '$id' LIMIT 1");       
        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            echo rupiah($row->salary);
        }
        return $query->free_result();
    }
    function groupworklist_all(){
        $this->db->select('a.employee_id as employee_id, b.first_name as f_name, b.mid_name as m_name, b.last_name as l_name, a.grouptime_id as grouptime');
        $this->db->from('groupwork a');
        $this->db->join('employees b','on a.employee_id = b.employee_id');
        $this->db->order_by("a.employee_id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function groupworklist(){
        $this->db->select('a.employee_id as employee_id, b.first_name as f_name, b.mid_name as m_name, b.last_name as l_name, a.grouptime_id as grouptime');
        $this->db->from('groupwork a');
        $this->db->join('employees b','on a.employee_id = b.employee_id');
        $this->db->where("grouptime_id = 0");
        $this->db->order_by("a.employee_id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    /*function add_groupworklist($to_group,$from_group,$employee_id,$date_updated,$user_updated){
        $hasil=$this->db->query("INSERT INTO ".$this->db->dbprefix('groupwork')." (id,grouptime_id,employee_id,,date_updated,user_updated)
                                    VALUES('','$to_group','$time_in','$time_out','$date_created','','$user_created','')");
        return $hasil;
    }*/

    function edit_groupworklist($to_group,$from_group,$employee_id,$date_updated,$user_updated){
         $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('groupwork')." SET grouptime_id = '$to_group', date_updated = '$date_updated' , user_updated = '$user_updated' WHERE grouptime_id = '$from_group' and employee_id = $employee_id");
        return $hasil;
    }

    
}