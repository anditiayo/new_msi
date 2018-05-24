<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model('General_model');
	}


	public function index()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login/backend', 'refresh');
		}
		elseif ( ! $this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{


			$this->data['active']     	= 'class="active"';
			$this->data['subtitle']     = $this->lang->line('config');
			$this->data['page_content'] = 'backend/config/dashboard';

			$this->render();
		}
	}

	public function worktime(){
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login/backend', 'refresh');
		}
		elseif ( ! $this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->General_model->get_data();


			$this->data['active']     	= 'class="active"';
			$this->data['config']     	= 'class="active"';

			$this->data['subtitle']     = $this->lang->line('config');
			$this->data['page_content'] = 'backend/config/worktime';

			$this->render();
		}
	}

	function worktimelist(){
		$data = $this->General_model->worklist();
		echo json_encode($data);
	}

	function get_worktimelist(){
		$id 	= $this->input->get('id');
		$data 	= $this->General_model->get_worklist($id);
		echo json_encode($data);
	}

	function add_worktimelist(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$time_name		= $this->input->post('time_name');
		$time_in		= $this->input->post('time_in');
		$time_out		= $this->input->post('time_out');
		$date_created	= date('Y-m-d H:i:s');
		$user_created 	= $this->data['user_info']['fullname'];
		
		$data 		= $this->General_model->add_worklist($time_name,$time_in,$time_out,$date_created,$user_created);
		echo json_encode($data);
	}

	function edit_worktimelist(){
		
		$edit_id		= $this->input->post('edit_id');
		$time_name		= $this->input->post('time_name_e');
		$time_in		= $this->input->post('time_in_e');
		$time_out		= $this->input->post('time_out_e');
		$date_updated	= date('Y-m-d H:i:s');
		$user_updated 	= $this->data['user_info']['fullname'];

		$data 		= $this->General_model->edit_worklist($edit_id,$time_name,$time_in,$time_out,$date_updated,$user_updated);
		echo json_encode($data);
	}

	function del_worktimelist(){
		$id=$this->input->post('id');
		$data=$this->General_model->del_worklist($id);
		echo json_encode($data);
	}


	public function grouptime(){
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login/backend', 'refresh');
		}
		elseif ( ! $this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->General_model->get_data();

			$this->data['worktimelist']	= $this->General_model->worklist();
			$this->data['departement'] 	= $this->General_model->departement();
			$this->data['active']     	= 'class="active"';
			$this->data['config']     	= 'class="active"';

			$this->data['subtitle']     = $this->lang->line('config');
			$this->data['page_content'] = 'backend/config/grouptime';

			$this->render();
		}
	}

	function grouptimelist(){
		$data = $this->General_model->grouplist();
		echo json_encode($data);
	}

	function add_grouptimelist(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$group_name		= $this->input->post('group_name');
		$work_time		= $this->input->post('work_time');
		$departement		= $this->input->post('departement');
		$date_created	= date('Y-m-d H:i:s');
		$user_created 	= $this->data['user_info']['fullname'];
		
		$data 		= $this->General_model->add_grouplist($group_name,$work_time,$date_created,$user_created,$departement);
		echo json_encode($data);
	}

	function get_grouptimelist(){
		$id 	= $this->input->get('id');
		$data 	= $this->General_model->get_grouplist($id);
		echo json_encode($data);
	}

	function edit_grouptimelist(){
		$edit_id		= $this->input->post('edit_id');
		$group_name		= $this->input->post('group_name_e');
		$choose			= $this->input->post('work_time_e');
		$still			= $this->input->post('id_time_e');

		if(!isset($work_time) || $work_time == NULL){
			$work_time = $still;
		}else{
			$work_time = $choose;
		}
		
		$date_updated	= date('Y-m-d H:i:s');
		$user_updated 	= $this->data['user_info']['fullname'];

		$data 		= $this->General_model->edit_grouplist($edit_id,$group_name,$work_time,$date_updated,$user_updated);
		echo json_encode($data);
	}


	public function departement(){
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login/backend', 'refresh');
		}
		elseif ( ! $this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->data['departement'] 	= $this->General_model->get_departement();

			$this->data['group_dept'] 	= $this->uri->segment(3);
			$this->data['active']     	= 'class="active"';
			$this->data['config']     	= 'class="active"';
			$this->data['titletab1']    = 'Dept List';
			$this->data['titletab2']    = 'Create Group';

			$this->data['subtitle']     = $this->lang->line('departement');
			$this->data['page_content'] = 'backend/config/departement';

			$this->render();
		}
	}

	function add_departement(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$id				= $this->input->post('id');
		$label			= $this->input->post('label');
		$link			= $this->input->post('label');
		$date	= date('Y-m-d H:i:s');
		$user 	= $this->data['user_info']['fullname'];
		
		if($id != ''){
			$data 		= $this->General_model->upd_departement_list($label,$link,$id,$date,$user);
		}else{
			if($label != '' && $link != ''){
				$data 		= $this->General_model->add_departement_list($label,$link,$date,$user);
			}else{
				$data['type']  = 'error';
			}
			
		}
		
		echo json_encode($data);
	}

	function move_departement(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$update 		= json_decode($this->input->post('data'));
		$date_updated	= date('Y-m-d H:i:s');
		$user_updated 	= $this->data['user_info']['fullname'];

		$readbleArray = parseJsonArray($update);

		$i=0;
		foreach($readbleArray as $row){
		  $i++;
			$parentid 	= $row['parentID'];
			$sort		= $i;
			$id 		= $row['id'];

			$this->General_model->move_departement_list($parentid,$sort,$id,$date_updated,$user_updated);
		}

		echo json_encode($readbleArray);
	}

	function del_departement(){
		$id=$this->input->post('id');
		$data=$this->General_model->del_departement_list($id);
		echo json_encode($data);
	}
		
		
	


}
