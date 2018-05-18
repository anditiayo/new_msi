<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_data extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('parse');
        
    }

    public function get_employee(){
		$this->db->from('employees');
		$this->db->where('employee_id BETWEEN 1 and 400 order by employee_id asc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_details($code){
		$this->db->select('first_name as name');
		$this->db->from('employees');
		$this->db->where('employee_id ='.$code);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_log($start,$end){
		$this->db->from('log_data');
		$this->db->where("tgl BETWEEN '$start' and '$end' order by tgl,date_time");
        $query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_pin($start,$end,$pin){
		$this->db->from('log_data');
		$this->db->where("pin='$pin' AND tgl BETWEEN '$start' AND '$end' order by tgl,date_time");
        $query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_by_id($id){
		$this->db->from('log_data');
		$this->db->where("id",$id);
        $query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_by_date($start_date,$end_date){
		
		
		$emp = $this->get_employee();
		$results = array();
		$codes = array();
		$array = array();
		foreach ($emp as $key){
			$code = $key['employee_id'];
			$codes[] = array(
				'code' => $key['employee_id'],
				'nama' => $key['first_name']
			);
			for($i = 0; $i < loop_date($start_date,$end_date) + 1; $i++)
	        {
	           	$date = date("Y-m-d", strtotime($start_date . ' + ' . $i . 'day')); 
	        	$this->db->select("pin,tgl,day,ver,
									(SELECT max(status) from ".$this->db->dbprefix('log_data')." where status = 1 and pin = '$code' and tgl ='$date' ) as statout,
									(SELECT min(status) from ".$this->db->dbprefix('log_data')." where status = 0 and pin = '$code' and tgl ='$date' ) as statin,
									(SELECT max(date_time) from ".$this->db->dbprefix('log_data')." where status = 1 and pin = '$code' and tgl ='$date' ) as keluar,
									(SELECT min(date_time) from ".$this->db->dbprefix('log_data')." where status = 0 and pin = '$code' and tgl ='$date' ) as masuk,
									(SELECT min(id) from ".$this->db->dbprefix('log_data')." where status = 0 and pin = '$code' and tgl ='$date' ) as id_in,
									(SELECT max(id) from ".$this->db->dbprefix('log_data')." where status = 1 and pin = '$code' and tgl ='$date' ) as id_out
									");
	        	$this->db->from('log_data');
				$this->db->where("pin = '$code' AND tgl = '$date' GROUP BY tgl order by tgl asc");
				$query = $this->db->get();
			  	$results[$code][$date] = $query->result_array();
			}
		}
		 return $results;
		
		
	}

	 public function get_employee_join(){
		$this->db->from('log_data a');
		$this->db->join('employees b','on a.pin = b.employee_id');
		$this->db->where("a.tgl BETWEEN '2018-04-01' and '2018-04-30'  order by a.tgl,a.date_time,a.status");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_log($PIN,$DateTime,$date,$time,$day,$Verified,$Status){
		
		$sql = "INSERT INTO ".$this->db->dbprefix('log_data')." (pin, date_time,tgl,waktu,day, ver,status)
                SELECT '$PIN', '$DateTime','$date','$time','$day','$Verified','$Status'
                FROM ".$this->db->dbprefix('log_data')."
                WHERE NOT EXISTS(
                    SELECT pin, date_time,ver,status
                    FROM ".$this->db->dbprefix('log_data')."
                    WHERE pin = '$PIN'
                      AND date_time = '$DateTime'
                      AND ver = '$Verified'
                      AND status = '$Status'
                )LIMIT 1";
        $q = $this->db->query($sql);
        return $q;
	}
	

}

