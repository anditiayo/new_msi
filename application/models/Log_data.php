\<?php
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

	 public function employeeSearch($status,$departement){
	 	if($status == NULL && $departement != NULL){
	 		$stat = "CASE WHEN status != 9 THEN
						id = $departement
					END";
	 	}else if($status != NULL && $departement == NULL){
	 		$stat = "
	 			CASE WHEN status != 9 THEN
					status = $status
				END		
	 		";
	 	}else if($status != NULL && $departement != NULL){
	 		$stat = "CASE WHEN a.status != 9 THEN
					status = $status and id = $departement
					END	
					";
	 	}else{
	 		$stat ="CASE WHEN status != 9 THEN
						employee_id != NULL
					END";
	 	}
	 	$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS ' . $this->db->dbprefix('employee') .
			'(
							SELECT a.id as id,
							a.employee_id as employee_id,
							a.first_name as first_name,
							a.last_name as last_name,
							a.email as email,
							a.place_of_birth as place_of_birth,
							a.birthday as birthday,
							a.gender as gender,
							a.address1 as address1,
							a.address2 as address2,
							a.province_id_1 as province_id_1,
							a.province_id_2 as province_id_2,
							a.city_id_1 as city_id_1,
							a.city_id_2 as city_id_2,
							a.district_id_1 as district_id_1,
							a.district_id_2 as district_id_2,
							a.pos_code1 as pos_code1,
							a.pos_code2 as pos_code2,
							a.phone1 as phone1,
							a.phone2 as phone2,
							a.npwp as npwp,
							a.bpjstk as bpjstk,
							a.bpjs as bpjs,
							a.regular as regular,
							a.user_created as user_created,
							a.date_created as date_created,
							a.date_updated as date_updated,
							a.user_updated as user_updated,
							a.`status` as `status`,
							a.position as position,
							a.join_in as join_in
				FROM ' . $this->db->dbprefix('employees') . ' a
				INNER JOIN ' . $this->db->dbprefix('groupwork') . ' b on a.employee_id = b.employee_id
				INNER JOIN ' . $this->db->dbprefix('departement') . ' c on b.grouptime_id = c.id
				
				)'
		);

	 	$this->db->from('employee');
		$this->db->where("$stat");
		$this->db->order_by("employee_id", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_in($code,$date){
		$this->db->select('MIN(DATE_TIME)');
		$this->db->from('log_data');
		$this->db->where("tgl = '$date' and pin = '$code' and status = 0 LIMIT 1");
        $query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_out($code,$date){
		$this->db->select('MAX(DATE_TIME)');
		$this->db->from('log_data');
		$this->db->where("tgl = '$date' and pin = '$code' and status = 1 LIMIT 1");
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

	public function get_log_date($date,$pin){
		$this->db->from('log_data');
		$this->db->where("pin='$pin' AND tgl = '$date' ");
        $query = $this->db->get();
		return $query->result_array();
	}


	public function get_log_by_id($id){
		$this->db->from('log_data');
		$this->db->where("id",$id);
        $query = $this->db->get();
		return $query->result_array();
	}

	public function getArray(){
		$this->db->from('array');
        $query = $this->db->get();
		return $query->result_array();
	}

	public function getCount(){
		$this->db->select('employee_id');
		$this->db->from('array');
		$this->db->group_by('employee_id');
        $query = $this->db->get();
		return $query->result_array();
	}

	public function get_log_by_date($start_date,$end_date,$status,$departement){
		
		 if ($start_date != NULL AND $end_date != NULL){
		 		$emp = $this->employeeSearch($status,$departement);
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

						$query = $this->db->query("call GETDETAILSEMPLOYEE(".$code.",'$date')"); 


					  	/*$this->db->from('array');
						$this->db->where("employee_id = '$code' AND THEDATE = '$date'");
						$query = $this->db->get();*/
						$objectArray = $query->result_array();
					  	$results[$code][$date] = $objectArray;

					  	mysqli_next_result( $this->db->conn_id );
					  	
					}
				}
				
				
				return $results;
		 }
		
		
		
	}
	public function get_log_by_date2($start_date,$end_date,$status,$departement){
		
		 if ($start_date != NULL AND $end_date != NULL){
		 		$emp = $this->employeeSearch($status,$departement);
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

						//$query = $this->db->query("call ABSENSE(".$code.",'$date')"); 

						

					  	$this->db->from('calculationdetail2');
						$this->db->where("employee_id = '$code' AND THEDATE = '$date' ORDER BY TIMESTAMP DESC LIMIT 1");
						$query = $this->db->get();
						$objectArray = $query->result_array();
					  	$results[$code][$date] = $objectArray;

					  	//mysqli_next_result( $this->db->conn_id );
					  	
					}
				}
				
				
				return $results;
		 }
		
		
		
	}


	public function getDates($code,$date,$sun){
		$query = $this->db->query("call GETDETAILSEMPLOYEE(".$code.",'$date')");
		mysqli_next_result( $this->db->conn_id );
		foreach ($query->result() as $row)
        {	
        		$tgl        = date("Ymd", strtotime($row->DATE));
        		$NICKSTATUS = $row->NICKSTATUS;
        		$EMPID 		= $row->EMPID;
        		if(!empty($EMPID)){
	        		if(!empty($row->WORKHOUR)){
	        			if($row->WORKHOUR == '00:00:00'){
	        				$status 	= 'EDIT';
	                        $background = 'background:blue;color:white;';
	                        $links 		= 'log';
	        				$link 		= '<a style="font-size:13px; text-align: center;padding:2px;'.$background.'" href="'.$links.'?tgl='.$tgl.'&pin='.$code.'" target="_blank">'.$status.'</a>';
	        				echo '<td style="text-align: center; '.$sun.'">'.$link.'</td>';
	        			}else{
	        				echo '<td style="text-align: center; '.$sun.'">'.decimalHours($row->WORKHOUR).'</td>';
	        			}
	                	
	        		}else{
	        			if(!empty($NICKSTATUS)){
	                        $status 	= $NICKSTATUS;
	                        $background = 'color:red;';
	                        $links 		= 'employee/leave';
	        				$link 		= '<a style="font-size:13px; text-align: center;padding:2px;'.$background.'" href="'.$links.'?tgl='.$tgl.'&pin='.$code.'" target="_blank">'.$status.'</a>';
	        				echo '<td style="text-align: center; '.$sun.'">'.$link.'</td>';
	        			}else{
	        				$status 	= 'M';
	                        $background = 'color:red;';
	                        $links 		= 'employee/leave';
	        				$link 		= '<a style="font-size:13px; text-align: center;padding:2px;'.$background.'" href="'.$links.'?tgl='.$tgl.'&pin='.$code.'" target="_blank">'.$status.'</a>';
	        				echo '<td style="text-align: center; '.$sun.'">'.$link.'</td>';
	        			}
	        		}     			
        		}else{
        			echo '<td style="text-align: center; '.$sun.'"></td>';
        		}

        }
        
        return $query->free_result();
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

	public function add_log_manual($pin,$date_time,$date,$time,$status,$day){
		return $hasil = $this->db->query("INSERT INTO ".$this->db->dbprefix('log_data')." (id,pin,date_time,tgl,waktu,day, ver,status)
                                    VALUES('','$pin','$date_time','$date','$time','$day','2','$status')");
	}

	
	

}

