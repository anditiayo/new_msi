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
        $this->db->from('workshit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_worklist($time_name,$time_in,$time_out,$date_created,$user_created){
        $hasil=$this->db->query("INSERT INTO ".$this->db->dbprefix('workshit')." (id,time_name,time_in,time_out,date_created,date_updated,user_created,user_updated)
                                    VALUES('','$time_name','$time_in','$time_out','$date_created','','$user_created','')");
        return $hasil;
    }

    public function get_worklist($id){
        $this->db->select('id,time_name,time_out,time_in');
        $this->db->from('workshit');
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
    $hasil=$this->db->query("UPDATE ".$this->db->dbprefix('workshit')." SET time_name = '$time_name', time_in ='$time_in', time_out = '$time_out', date_updated = '$date_updated' , user_updated = '$user_updated' WHERE id = '$edit_id'");
    return $hasil;
    }

    public function del_worklist($id){
        $hasil=$this->db->query("DELETE FROM ".$this->db->dbprefix('workshit')." WHERE id='$id'");
        return $hasil;
    }
}