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
        return $hasil;
    }

    public function grouplist(){
        $this->db->select('a.id as id,a.group_name as name_group,b.id as id_time,b.time_name as time_name, c.id as dept_id, c.label as name_dept');
        $this->db->from('grouptime a');
        $this->db->join('worktime b','on a.work_time = b.id','LEFT');
        $this->db->join('departement c','on a.department_id = c.id','LEFT');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_grouplist($group_name,$work_time,$date_created,$user_created,$departement){
        $hasil=$this->db->query("INSERT INTO ".$this->db->dbprefix('grouptime')." (id,group_name,work_time,,departement_id,date_created,date_updated,user_created,user_updated)
                                    VALUES('','$group_name','$work_time',',$departement','$date_created','','$user_created','')");
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

    public function edit_grouplist($edit_id,$group_name,$work_time,$date_updated,$user_updated){
        $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('grouptime')." SET group_name = '$group_name', work_time ='$work_time', date_updated = '$date_updated' , user_updated = '$user_updated' WHERE id = '$edit_id'");
        return $hasil;
    }

    public function get_departement(){
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
        return $hasil;
    }
}