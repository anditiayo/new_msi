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

    public function leave_permit(){
        $this->db->from('leave_permit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_info($id){

        $this->db->select('a.employee_id as employee_id,
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
                            b.grouptime_id as grouptimeId,
                            c.id as grouptimeIds,
                            c.group_name as groupName,
                            c.work_time as workTimeID,
                            d.id as positionID
                            '
                        );
        $this->db->from('employees a');
        $this->db->join('groupwork b','on a.employee_id = b.employee_id','LEFT');
        $this->db->join('grouptime c','on b.grouptime_id = c.id','LEFT');
        $this->db->join('positions d','on a.position = d.id','LEFT');

        $this->db->where("a.employee_id = '$id'");
        $this->db->order_by("a.employee_id", "asc");
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getInfo($masuk,$keluar,$id){
        $this->db->select("TIMEDIFF(b.time_in,'$masuk') as masuk, TIMEDIFF('$keluar',b.time_out) as keluar");
        $this->db->from('employees a');
        $this->db->join('worktime b','a.regular = b.id','LEFT');
        $this->db->where("a.employee_id = '$id'");
        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
               
                echo $a = '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:green;color:white";>'.$row->masuk.'</td> <td align="right" style="font-size:13px; text-align: center;padding:2px; background:yellow;">'.$row->keluar.'</td>';

               
        }
        return $query->free_result(); 
    }

    public function updateData($id,$fullname,$lastname,$email,$pob,$birthday,$address1,$address2,$phone1,$phone2,$gender,$status,$position,$salary,$npwp,$bpjstk,$bpjsk,$regular,$group,$joinIn){
        $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('employees')." 
                SET 
                first_name      = '$fullname', 
                last_name       = '$lastname' , 
                email           = '$email',
                place_of_birth  = '$pob',
                birthday        = '$birthday',
                address1        = '$address1',
                address2        = '$address2',
                phone1          = '$phone1',
                phone2          = '$phone2',
                gender          = '$gender',
                status          = '$status',
                position        = '$position',
                npwp            = '$npwp',
                bpjstk          = '$bpjstk',
                bpjs            = '$bpjsk',
                regular         = '$regular',
                join_in         = '$joinIn'

                WHERE 
                employee_id = '$id' 
               ");
        return $hasil;

    }

    public function updateDataAllowance($id,$data){
            $this->db->query("DELETE FROM ".$this->db->dbprefix('allowances')." WHERE employee_id = '$id'");

            if ($this->db->trans_status() === false)
            {
                return false;
            }
            else
            {
                foreach ($data as $key => $value) {
                    $this->db->insert('allowances',$value);
                }
            }
           
    }

    public function updateDataGroupwork($id,$grup){
            $this->db->query("DELETE FROM ".$this->db->dbprefix('groupwork')." WHERE employee_id = '$id'");

            if ($this->db->trans_status() === false)
            {
                return false;
            }
            else
            {
                $this->db->insert('groupwork',$grup);
            }
           
    }

     public function updateDataSalary($id,$salary){
            $this->db->query("DELETE FROM ".$this->db->dbprefix('salary')." WHERE employee_id = '$id'");

            if ($this->db->trans_status() === false)
            {
                return false;
            }
            else
            {
                $value = array(
                    'employee_id' => $id,
                    'salary' => $salary
                );
                $this->db->insert('salary',$value);
            }
           
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

    function getalldec($code,$num){

        $this->db->select('b.amount as amount,b.from_emp as fromemp ,b.from_comp as fromcomp,b.pay as pay');
        $this->db->from('allowances a');
        $this->db->join('allowance_type b','on a.allowance_type_id = b.id');
        $this->db->where("a.employee_id = '$code' and allowance_type_id = '$num' LIMIT 1");       
        $query = $this->db->get();
        return $query->result_array();
    }

    function leavelist(){
        $this->db->select('a.id as id,
                            a.date as THEDATE,
                            DATE_FORMAT(a.date, "%W") as DATEFORM,
                            a.approval as APPROVE,
                            a.approvaldate as APPROVEDATE,
                            a.approveby as APPROVEBY,
                            c.first_name as FIRSTNAME,
                            c.last_name as LASTNAME,
                            b.name as STATUSNAME,
                            b.nickname as NICKNAME,
                            b.nilai as NILAI,
                            d.given as GIVEN,
                            d.`use` as USED');
        $this->db->from('leaves a, leave_permit b,employees c, leave_credit d');
        $this->db->where("a.permit = b.id and a.employee_id = c.employee_id and a.employee_id = d.employee_id");   
        $query = $this->db->get();
        return $query->result_array();
    }

    function add_leavelist($code,$permit,$date,$date_created,$user_created){
         $hasil=$this->db->query("INSERT INTO ".$this->db->dbprefix('leaves')." (id,employee_id,permit,date,create_datetime,create_user)
                                    VALUES('','$code','$permit','$date','$date_created','$user_created')");
        return $hasil;
    }

    public function get_leavelist($id){
        $this->db->select("
                            a.id as id,
                            a.employee_id as edit_code,
                            a.permit as edit_permit,
                            a.date as edit_date,
                            CONCAT('[',b.nickname,'] ',b.name) as namepermit,
                            b.id as permitid
                        ");
        $this->db->from('leaves a, leave_permit b');
        $this->db->where("a.permit = b.id AND a.id = '$id'");  

        $query = $this->db->get();

        $hasil = array();
        if($query->num_rows()>0){
            foreach ($query->result() as $data) {
                $hasil=array(
                    'id'            => $data->id,
                    'edit_code'     => $data->edit_code,
                    'edit_permit'   => $data->edit_permit,
                    'edit_date'     => $data->edit_date,
                    'namepermit'    => $data->namepermit,
                    'permitid'      => $data->permitid
                    );
            }
        }
        return $hasil;
    }

    function edit_leavelist($id,$code,$permit,$date,$date_updated,$user_updated){
        $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('leaves')." SET employee_id = '$code', permit ='$permit', update_datetime = '$date_updated' , update_user = '$user_updated', date='$date'  WHERE id = '$id'");
        return $hasil;
    }

    public function del_leavelist($id){
        $hasil=$this->db->query("DELETE FROM ".$this->db->dbprefix('leaves')." WHERE id='$id'");
        return $hasil;
    }

    function overtimelist(){
        $this->db->select('a.id, a.employee_id, CONCAT(b.first_name,b.last_name) as nama, a.date');
        $this->db->from('overtime a, employees b');
        $this->db->where('a.employee_id = b.employee_id');    
        $query = $this->db->get();
        return $query->result_array();
    }

    function add_overtimelist($code,$date,$date_created,$user_created){
         $hasil=$this->db->query("INSERT INTO ".$this->db->dbprefix('overtime')." (id,employee_id,date,date_created,user_created)
                                    VALUES('','$code','$date','$date_created','$user_created')");
        return $hasil;
    }


    
}