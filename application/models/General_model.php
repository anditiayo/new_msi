<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
        $this->load->helper('parse');
        
    }

    public function regencies(){
    	$this->db->from('regencies');
		$query = $this->db->get();
		return $query->result_array();
    }


    public function get_data(){
        $this->db->from('msi_log_data');
        return $this->db->get();
    }
    

    public function worklist(){
        $this->db->select('id,time_name,time_out,time_in');
        $this->db->from('worktime');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_worklist($time_name,$time_in,$time_out,$date_created,$user_created){
        $hasil=$this->db->query("INSERT INTO ".$this->db->dbprefix('worktime')." (id,time_name,time_in,time_out,date_created,date_updated,user_created,user_updated)
                                    VALUES('','$time_name','$time_in','$time_out','$date_created','','$user_created','')");
        return $hasil;
    }

    public function get_worklist($id){
        $this->db->select('id,time_name,time_out,time_in');
        $this->db->from('worktime');
        $this->db->where('id',$id);

        $query = $this->db->get();

        $hasil = array();
        if($query->num_rows()>0){
            foreach ($query->result() as $data) {
                $hasil=array(
                    'id'        => $data->id,
                    'time_name' => $data->time_name,
                    'time_in'   => $data->time_in,
                    'time_out'  => $data->time_out,
                    );
            }
        }
        return $hasil;
    }

    public function edit_worklist($edit_id,$time_name,$time_in,$time_out,$date_updated,$user_updated){
    $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('worktime')." SET time_name = '$time_name', time_in ='$time_in', time_out = '$time_out', date_updated = '$date_updated' , user_updated = '$user_updated' WHERE id = '$edit_id'");
    return $hasil;
    }

    public function del_worklist($id){
        $hasil=$this->db->query("DELETE FROM ".$this->db->dbprefix('worktime')." WHERE id='$id'");
        //$this->db->query("ALTER TABLE ".$this->db->dbprefix('worktime')." AUTO_INCREMENT 1");
        return $hasil;
    }

    public function grouplist(){
        $this->db->select('a.id as id,a.group_name as name_group,b.id as id_time,b.time_name as time_name, c.id as dept_id, c.label as name_dept,b.time_in, b.time_out');
        $this->db->from('grouptime a');
        $this->db->join('worktime b','on a.work_time = b.id','LEFT');
        $this->db->join('departement c','on a.department_id = c.id','LEFT');
        $this->db->order_by('a.group_name','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_grouplist($group_name,$work_time,$date_created,$user_created,$department){
        $hasil=$this->db->query("INSERT INTO ".$this->db->dbprefix('grouptime')." (id,group_name,work_time,department_id,date_created,date_updated,user_created,user_updated)
                                    VALUES('','$group_name','$work_time','$department','$date_created','','$user_created','')");
        return $hasil;
    }

    public function get_grouplist($id){
        $this->db->select('a.id as id,a.group_name as name_group,b.id as id_time,b.time_name as time_name, c.id as dept_id, c.label as name_dept');
        $this->db->from('grouptime a');
        $this->db->join('worktime b','on a.work_time = b.id','LEFT');
        $this->db->join('departement c','on a.department_id = c.id','LEFT');
        $this->db->where('a.id',$id);

        $query = $this->db->get();

        $hasil = array();
        if($query->num_rows()>0){
            foreach ($query->result() as $data) {
                $hasil=array(
                    'id'            => $data->id,
                    'name_group'    => $data->name_group,
                    'id_time'       => $data->id_time,
                    'time_name'     => $data->time_name,
                    'dept_id'       => $data->dept_id,
                    'name_dept'     => $data->name_dept
                    );
            }
        }
        return $hasil;
    }

    public function edit_grouplist($edit_id,$group_name,$work_time,$date_updated,$user_updated,$dept_id){
        $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('grouptime')." SET group_name = '$group_name', work_time ='$work_time', date_updated = '$date_updated' , user_updated = '$user_updated',department_id='$dept_id'  WHERE id = '$edit_id'");
        return $hasil;
    }

    public function get_departement(){
        global $items;
        $this->db->from('departement');
        $query = $this->db->get();

        $hasil = array();
        if($query->num_rows()>0){
            foreach ($query->result() as $data) {
                    $thisRef = &$ref[$data->id];

                    $thisRef['parent']  = $data->parent;
                    $thisRef['label']   = $data->label;
                    $thisRef['link']    = $data->link;
                    $thisRef['id']      = $data->id;

                   if($data->parent == 0) {
                        $items[$data->id] = &$thisRef;
                   } else {
                        $ref[$data->parent]['child'][$data->id] = &$thisRef;
                   }
            }
        }
        return get_menu($items);
    }


    public function departement(){
        $this->db->select('IFNULL(b.id,a.id) as id, IFNULL(b.label ,a.label) as label');
        $this->db->from('departement a');
        $this->db->join('departement b','on b.parent = a.id','LEFT');
        $this->db->where(' a.parent=0');
        $this->db->order_by("a.label", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function departementHead(){
        $this->db->from('departement a');
        $this->db->where(' a.parent=0');
        $this->db->order_by("a.id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_departement_list($label,$link,$date,$user){
        $this->db->query("INSERT INTO ".$this->db->dbprefix('departement')." (id,label,link,date_created,user_created)
                VALUES('','$label','$link','$date','$user')");
        
        $id = $this->db->insert_id();

        $arr['menu'] = '<li class="dd-item dd3-item" data-id="'.$id.'" >
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content"><span id="label_show'.$id.'">'.$_POST['label'].'</span>
                            <span class="span-right"><span id="link_show'.$id.'"></span> &nbsp;&nbsp; 
                                <a class="edit-button" id="'.$id.'" label="'.$_POST['label'].'" link="'.$_POST['link'].'" ><i class="fa fa-pencil"></i></a>
                                <a class="del-button" id="'.$id.'"><i class="fa fa-trash"></i></a>
                            </span> 
                        </div>';

        $arr['type'] = 'add';

        return $arr;
    }

    public function upd_departement_list($label,$link,$id,$date,$user){
         $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('departement')." SET label = '$label', link ='$link', date_updated = '$date' , user_updated = '$user' WHERE id = '$id'");
        

        $arr['type']  = 'edit';
        $arr['label'] = $label;
        $arr['link']  = $link;
        $arr['id']    = $id;

        return $arr;


    }

    public function move_departement_list($parentid,$sort,$id,$date_updated,$user_updated){
        $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('departement')." SET parent = '$parentid', sort ='$sort', date_updated = '$date_updated' , user_updated = '$user_updated' WHERE id = '$id'");
        return $hasil;
    }

    public function del_departement_list($id){
        $hasil=$this->db->query("DELETE FROM ".$this->db->dbprefix('departement')." WHERE id='$id'");
         //$this->db->query("ALTER TABLE ".$this->db->dbprefix('departement')." AUTO_INCREMENT 1");
        return $hasil;
    }


    public function addEvent($title,$start,$end,$className,$grouptime_id){
       $this->db->query("INSERT INTO ".$this->db->dbprefix('events')." (id,grouptimeID,title,description,color,start,end,allDay,className)
                                    VALUES('','$grouptime_id','$title','','','$start','$end','','$className')");
        return $this->db->insert_id();
    }

    public function getEvent(){
        $this->db->from('events');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delEvent($id){
        $this->db->where('id', $id);
        $this->db->delete('events');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updEvent($id,$title,$start,$className)
    {
        $this->db->query("UPDATE ".$this->db->dbprefix('events')." SET title = '$title', start ='$start', className = '$className' WHERE id = '$id'");
       return $this->db->insert_id();
    }


    public function allowances()
    {
        $this->db->from('allowance_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addAllowance($type,$name,$description,$amount,$from_employee,$from_company,$start,$end,$pay,$date_created,$user_created,$mk1,$mk2)
    {
        return $this->db->query("INSERT INTO ".$this->db->dbprefix('allowance_type')." 
            (id,type,allowance_name,description,amount,from_emp,from_comp,from_date,end_date,pay,mk1,mk2,date_created,user_created,date_updated,user_updated) 
            VALUES('','$type','$name','$description','$amount','$from_employee','$from_company','$start','$end','$pay','$mk1','$mk2','$date_created','$user_created','','')");
        
    }
    public function getAllowance($id){
        $this->db->select('id,type,allowance_name,description,pay,amount,from_emp,from_comp,from_date,end_date,mk1,mk2');
        $this->db->from('allowance_type');
        $this->db->where('id',$id);

        $query = $this->db->get();

        $hasil = array();
        if($query->num_rows()>0){
            foreach ($query->result() as $data) {
                $hasil=array(
                    'id'                => $data->id,
                    'type'              => $data->type,
                    'allowance_name'    => $data->allowance_name,
                    'description'       => $data->description,
                    'pay'               => $data->pay,
                    'amount'            => $data->amount,
                    'from_employee'     => $data->from_emp,
                    'from_company'      => $data->from_comp,
                    'mk1'               => $data->mk1,
                    'mk2'               => $data->mk2,
                    'starts'             => date('m/d/Y',strtotime($data->from_date)),
                    'ends'               => date('m/d/Y',strtotime($data->end_date))
                    );
            }
        }
        return $hasil;
    }

    public function editAllowances($id,$type,$name,$description,$amount,$from_employee,$from_company,$start,$end,$pay,$date_updated,$user_updated,$mk1Edit,$mk2Edit){
        $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('allowance_type')." SET type = '$type', allowance_name ='$name', description = '$description' , amount = '$amount',from_emp='$from_employee', from_comp = '$from_company', from_date = '$start', end_date = '$end', pay = '$pay',mk1='$mk1Edit',mk2='$mk2Edit', date_updated= '$date_updated', user_updated = '$user_updated'  WHERE id = '$id'");
        return $hasil;
    }

    public function delAllowance($id){
        $hasil=$this->db->query("DELETE FROM ".$this->db->dbprefix('allowance_type')." WHERE id='$id'");
        //$this->db->query("ALTER TABLE ".$this->db->dbprefix('allowance_type')." AUTO_INCREMENT 1");
        return $hasil;
    }

    public function allowancesSelect($id)
    {
        $this->db->from('allowance_type a');
        $this->db->join('allowances b','on a.id = b.allowance_type_id');
        $this->db->where('employee_id',$id);
        $this->db->order_by('a.allowance_name','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

     public function allowancesDiSelect($id)
    {
        $sql = ("SELECT * from ".$this->db->dbprefix('allowance_type')." 
            WHERE id NOT IN  
            (SELECT allowance_type_id FROM ".$this->db->dbprefix('allowances')." where employee_id = '$id') ORDER BY allowance_name asc");
        $query = $this->db->query($sql);
       return $query->result_array();
    }


    public function getStatus(){
        $query = $this->db->from('status')->get();
        return $query->result_array();
    }

    public function getPosition(){
        $query = $this->db->from('positions')->get();
        return $query->result_array();
    }
}