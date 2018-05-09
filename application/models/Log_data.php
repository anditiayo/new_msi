<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_data extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('parse');
        
    }

    public function get_employee(){
		$this->db->from('msi_employees');
		$this->db->where('employee_id BETWEEN 2100 and 2200 order by employee_id asc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_details($code){
		$this->db->select('front_name as name');
		$this->db->from('msi_employees');
		$this->db->where('employee_id ='.$code);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_log($start,$end){
		$this->db->from('msi_log_data');
		$this->db->where("tgl BETWEEN '$start' and '$end'  order by tgl,date_time");
        $query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_by_id($id){
		$this->db->from('msi_log_data');
		$this->db->where("id",$id);
        $query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_by_date($start_date,$end_date){
		
		
		$emp = $this->get_employee();
		$results = array();
		$codes = array();
		foreach ($emp as $key){
			$code = $key['employee_id'];
			$codes[] = array(
				'code' => $key['employee_id'],
				'nama' => $key['front_name']
			);
			for($i = 0; $i < loop_date($start_date,$end_date) + 1; $i++)
	        {
	           	$date = date("Y-m-d", strtotime($start_date . ' + ' . $i . 'day')); 
	        	$this->db->select("*,(SELECT min(date_time) from msi_log_data where status = 1 and pin = '$code' and tgl ='$date') as keluar,(SELECT min(date_time) from msi_log_data where status = 0 and  pin = '$code' and tgl ='$date') as masuk");
	        	$this->db->from('msi_log_data');
				$this->db->where("pin = '$code' and tgl ='$date' GROUP by status");
				$query = $this->db->get();
			   	
			   
			   	$arr    	= $query->result_array();
				$tgl 		= array_column($arr, 'tgl');
				$pin 		= array_column($arr, 'pin');
				$datetime 	= array_column($arr, 'date_time');
				$day 		= array_column($arr, 'day');
				$status 	= array_column($arr, 'status');
				$waktu 		= array_column($arr, 'waktu');
				$keluar 	= array_column($arr, 'keluar');
				$masuk 		= array_column($arr, 'masuk');

				if($tgl == $date){
					$obj_date = $date;
				
				}else{
					$obj_date = $tgl;
				}

		        $results[$code][$date] = array(
		            'datetime' 	=> $datetime,
		            'status'	=> $status,
		            'masuk'		=> $masuk,
		            'keluar'	=> $keluar
		        );
			}

		}
		
		 return $results;
		
		
	}

	 public function get_employee_join(){
		$this->db->from('msi_log_data a');
		$this->db->join('msi_employees b','on a.pin = b.employee_id');
		$this->db->where("a.tgl BETWEEN '2018-04-01' and '2018-04-30'  order by a.tgl,a.date_time,a.status");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_log($PIN,$DateTime,$date,$time,$day,$Verified,$Status){
		
		$sql = "INSERT INTO msi_log_data (pin, date_time,tgl,waktu,day, ver,status)
                SELECT '$PIN', '$DateTime','$date','$time','$day','$Verified','$Status'
                FROM msi_log_data
                WHERE NOT EXISTS(
                    SELECT pin, date_time,ver,status
                    FROM msi_log_data
                    WHERE pin = '$PIN'
                      AND date_time = '$DateTime'
                      AND ver = '$Verified'
                      AND status = '$Status'
                )LIMIT 1";
        $q = $this->db->query($sql);
        return $q;
	}
	

}

