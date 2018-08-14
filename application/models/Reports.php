<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Model {
	function __construct()
    {
        parent::__construct();
        $this->load->helper('parse');
        
    }

    public function GETREPORT($dateStart,$dateEnd){
    	$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS ' . $this->db->dbprefix('employee') .
			'(
				SELECT 
				a.employee_id as employee_id,
				a.first_name as first_name,
				a.last_name as last_name,
				a.email as email,
				a.place_of_birth as pob,
				a.birthday as birthday,
				a.gender as gender,
				a.address1 as address1,
				a.address2 as address2,
				a.province_id_1 as province1,
				a.province_id_2 as province2,
				a.city_id_1 as cityId1,
				a.city_id_2 as cityId2,
				a.district_id_1 as districtId1,
				a.district_id_2 as districtId2,
				a.pos_code1 as posCode1,
				a.pos_code2 as posCode2,
				a.phone1 as phone1,
				a.phone2 as phone2,
				a.bpjstk as bpjstk,
				a.bpjs as bpjs,
				a.npwp as npwp,
				a.regular as regular,
				a.status as status,
				a.join_in as joinIn,
				b.salary as salary,
				c.given as given,
				c.use as used,
				d.grouptime_id  as grouptime
				FROM ' . $this->db->dbprefix('employees') . ' a
				INNER JOIN ' . $this->db->dbprefix('salary') . ' b ON a.employee_id = b.employee_id
				INNER JOIN ' . $this->db->dbprefix('leave_credit') . ' c ON a.employee_id = c.employee_id
				INNER JOIN ' . $this->db->dbprefix('groupwork') . ' d ON a.employee_id = d.employee_id
			)'
		);

		$this->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS ". $this->db->dbprefix('logData') .
			"(
				SELECT pin,date_time as DateTime,tgl, waktu as Time, day as weekday, `status` as present FROM " . $this->db->dbprefix('log_data') . "
				WHERE tgl BETWEEN '$dateStart' AND '$dateEnd'
			)"
		);


		$this->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS " . $this->db->dbprefix('leaves') .
			"(
				SELECT a.employee_id as employee_id , a.permit,b.name as permitName,a.date, b.nickname as permitNick, b.nilai FROM " . $this->db->dbprefix('leaves') . "  a
				INNER JOIN " . $this->db->dbprefix('leave_permit') . " b on a.permit = b.id
				WHERE date BETWEEN '$dateStart' AND '$dateEnd'
			)"
		);


		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS ' . $this->db->dbprefix('subtitute') .
			'(
				SELECT * FROM ' . $this->db->dbprefix('subtitute') . '
			)'
		);

		
		$this->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS ". $this->db->dbprefix('LOG') .
			"(
				SELECT * FROM " . $this->db->dbprefix('logData') . " a
				JOIN " . $this->db->dbprefix('employee') . " b ON a.pin = b.employee_id
			)"
		);

		
		
		$this->db->FROM('LOG');
		$query = $this->db->get();
		return $query->result_array();



    }

    
}