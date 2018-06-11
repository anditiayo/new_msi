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

	 public function employeeSearch($status){
		$this->db->from('employees');
		$this->db->where("status = '$status' order by employee_id asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_details($code){
		$this->db->select('first_name as name');
		$this->db->from('employees');
		$this->db->where('employee_id ='.$code);
		$query = $this->db->get();
		foreach ($query->result() as $row)
        {
                echo $row->name;
        }
        return $query->free_result();  
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

	public function get_log_by_date($start_date,$end_date,$status){
		
		
		$emp = $this->employeeSearch($status);
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

/*	           	$sql = "SELECT 
							
							IFNULL((SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 0 AND pin = '$code' AND tgl = '$date'),'00:00:00') AS REAL_IN,
							IFNULL((SELECT max(waktu) FROM  ".$this->db->dbprefix('log_data')." WHERE status = 1 AND  pin = '$code' AND tgl = '$date'),'00:00:00') AS REAL_OUT,
							f.time_in AS IN_EMP,
							f.time_out AS OUT_EMP,
							d.time_in AS IN_GRP,
							d.time_out AS OUT_GRP,

							CASE  
								WHEN (SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 0 AND pin = '$code' AND tgl = '$date') < IFNULL(d.time_in,f.time_in) THEN
								TIMEDIFF(IFNULL(d.time_in,f.time_in),(SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')."  WHERE status = 0 AND pin = '$code' AND tgl = '$date'))
								ELSE
								TIMEDIFF((SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 0 AND pin = '$code' AND tgl = '$date'),IFNULL(d.time_in,f.time_in))
							END AS MORELESSIN,
							CASE 
								WHEN (SELECT max(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 1 AND pin = '$code' AND tgl = '$date') >= IFNULL(d.time_out,f.time_out) THEN
									TIMEDIFF((SELECT max(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 1 AND pin = '$code' AND tgl = '$date'),IFNULL(d.time_out,f.time_out))
								ELSE
									TIMEDIFF((SELECT max(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 1 AND pin = '$code' AND tgl = '$date'),IFNULL(d.time_out,f.time_out))
							END AS MORELESSOUT,
							DATE_ADD(IFNULL(d.time_out,f.time_out),INTERVAL 1 HOUR) AS STARTOVERTIME,
							#IFNULL((SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 0 AND pin = '$code' AND tgl = '$date'),'00:00:00') AS EXMP,

							CASE 
								WHEN (SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 0 AND pin = '$code' AND tgl = '$date') IS NULL AND (SELECT max(waktu) FROM  ".$this->db->dbprefix('log_data')." WHERE status = 1 AND  pin = '$code' AND tgl = '$date') 
									THEN
										'ERROR1'
									WHEN (SELECT max(waktu) FROM  ".$this->db->dbprefix('log_data')." WHERE status = 1 AND  pin = '$code' AND tgl = '$date') IS NULL AND (SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 0 AND pin = '$code' AND tgl = '$date') 
									THEN 
										'ERROR2'
									WHEN (SELECT min(waktu) FROM ".$this->db->dbprefix('log_data')." WHERE status = 0 AND pin = '$code' AND tgl = '$date') IS NULL AND (SELECT max(waktu) FROM  ".$this->db->dbprefix('log_data')." WHERE status = 1 AND  pin = '$code' AND tgl = '$date') IS NULL
									THEN 
										'ERROR3'
									ELSE
											DATE_SUB((TIMEDIFF(IFNULL(d.time_out,f.time_out),IFNULL(d.time_in,f.time_in))),INTERVAL 1 HOUR)
							END AS WORKHOUR,
							g.salary as SALARY,
							a.pin AS NIK,
							a.tgl AS DATE,
							c.group_name AS GROUPS,
							d.time_name AS TIMENAME,
							e.join_in as RECRUITED


							FROM ".$this->db->dbprefix('log_data')." a 
							LEFT JOIN ".$this->db->dbprefix('events')." b 			ON DATE_FORMAT(a.tgl,'%Y-%m-%d') 	= DATE_FORMAT(b.start,'%Y-%m-%d')
							LEFT JOIN ".$this->db->dbprefix('grouptime')." c		ON b.grouptimeID 									= c.id
							LEFT JOIN ".$this->db->dbprefix('worktime')." d 		ON d.id 													= c.work_time
							LEFT JOIN ".$this->db->dbprefix('employees')." e 	ON a.pin 													= e.employee_id
							LEFT JOIN ".$this->db->dbprefix('worktime')." f 		ON e.regular 											= f.id
							LEFT JOIN ".$this->db->dbprefix('salary')." g 			ON e.employee_id 				 					= g.employee_id				
							WHERE a.tgl = '$date' 
							AND a.pin		= '$code'
							GROUP BY tgl 
							ORDER BY tgl ASC
							";*/

	        	/*$this->db->select("pin,tgl,day,ver,
									(SELECT max(status) from ".$this->db->dbprefix('log_data')." where status = 1 and pin = '$code' and tgl ='$date' ) as statout,
									(SELECT min(status) from ".$this->db->dbprefix('log_data')." where status = 0 and pin = '$code' and tgl ='$date' ) as statin,
									(SELECT max(date_time) from ".$this->db->dbprefix('log_data')." where status = 1 and pin = '$code' and tgl ='$date' ) as keluar,
									(SELECT min(date_time) from ".$this->db->dbprefix('log_data')." where status = 0 and pin = '$code' and tgl ='$date' ) as masuk,
									(SELECT min(id) from ".$this->db->dbprefix('log_data')." where status = 0 and pin = '$code' and tgl ='$date' ) as id_in,
									(SELECT max(id) from ".$this->db->dbprefix('log_data')." where status = 1 and pin = '$code' and tgl ='$date' ) as id_out
									");
	        	$this->db->from('log_data');
				$this->db->where("pin = '$code' AND tgl = '$date' GROUP BY tgl order by tgl asc");
				$query = $this->db->get();*/

				$query = $this->db->query("call GETDETAILSEMPLOYEE(".$code.",'$date')");  

			  	$results[$code][$date] = $query->result_array();
			  	mysqli_next_result( $this->db->conn_id );

				/*$query = $this->db->query($sql);
			  	$results[$code][$date] = $query->result_array();*/
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

	public function updateLog($id,$status){
		 $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('log_data')." SET status = '$status' WHERE id = '$id'");
        return $hasil;
	}
	

}

