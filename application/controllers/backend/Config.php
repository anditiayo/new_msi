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
			$this->data['department'] 	= $this->General_model->departement();
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
		$department	= $this->input->post('department');
		$date_created	= date('Y-m-d H:i:s');
		$user_created 	= $this->data['user_info']['fullname'];
		
		$data 		= $this->General_model->add_grouplist($group_name,$work_time,$date_created,$user_created,$department);
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
		$change_dept_id	= $this->input->post('department_e');
		$id_dept_e		= $this->input->post('id_dept_e');
		
		if(!isset($choose) || $choose == ''){
			$work_time = $still;
		}else{
			$work_time = $choose;
		}

		if(!isset($change_dept_id) || $change_dept_id == ''){
			$dept_id = $id_dept_e;
		}else{
			$dept_id = $change_dept_id;
		}
		
		$date_updated	= date('Y-m-d H:i:s');
		$user_updated 	= $this->data['user_info']['fullname'];

		$data 		= $this->General_model->edit_grouplist($edit_id,$group_name,$work_time,$date_updated,$user_updated,$dept_id);
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
	

	public function allowance(){
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
			$this->data['department'] 	= $this->General_model->departement();
			$this->data['active']     	= 'class="active"';
			$this->data['config']     	= 'class="active"';

			$this->data['subtitle']     = $this->lang->line('allowance');
			$this->data['page_content'] = 'backend/config/allowance';

			$this->render();
		}
	}

	function allowances(){
		$data = $this->General_model->allowances();
		echo json_encode($data);
	}

	function addAllowance(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);

		$name			= $this->input->post('name');
		$description	= $this->input->post('description');
		$amount			= $this->input->post('amount');
		$from_employee	= $this->input->post('from_employee');
		$from_company	= $this->input->post('from_company');
		
		$pay			= $this->input->post('pay');
		$type			= $this->input->post('type');

		$start			= $this->input->post('start');
		$end			= $this->input->post('end');

		$mk1			= $this->input->post('mk1');
		$mk2			= $this->input->post('mk2');

		if($start == '' || $start == NULL || $start == '00/00/0000' || $start == '01/01/1970'){
			$start			= '0000-00-00';
		}else{
			$start			= date("Y-m-d", strtotime($start));
		}

		if($end == '' || $end == NULL || $end == '00/00/0000' || $end == '01/01/1970'){
			$end			= '0000-00-00';
		}else{
			$end			= date("Y-m-d", strtotime($end));
		}

		$date_created	= date('Y-m-d H:i:s');
		$user_created 	= $this->data['user_info']['fullname'];
		
		$data 			= $this->General_model->addAllowance($type,$name,$description,$amount,$from_employee,$from_company,$start,$end,$pay,$date_created,$user_created,$mk1,$mk2);
		echo json_encode($data);
	}

	function getAllowance(){
		$id 	= $this->input->get('id');
		$data 	= $this->General_model->getAllowance($id);
		echo json_encode($data);
	}
		
	function editAllowance(){
		
		$id				= $this->input->post('id_allow');
		$typeold		= $this->input->post('typeold');
		$payold			= $this->input->post('payold');

		$name			= $this->input->post('nameEdit');
		$description	= $this->input->post('descriptionEdit');
		$amount			= $this->input->post('amountEdit');
		$from_employee	= $this->input->post('from_employeeEdit');
		$from_company	= $this->input->post('from_companyEdit');
		
		$pay			= $this->input->post('payEdit');
		$type			= $this->input->post('typeEdit');

		$start			= $this->input->post('startEdit');
		$end			= $this->input->post('endEdit');

		$mk1Edit		= $this->input->post('mk1Edit');
		$mk2Edit		= $this->input->post('mk2Edit');


		if($pay == '' || $pay == NULL){
			$pay			= $payold;
		}else{
			$pay			= $pay;
		}

		if($type == '' || $type == NULL){
			$type			= $typeold;
		}else{
			$type			= $type;
		}

		if($start == '' || $start == NULL || $start == '00/00/0000' || $start == '01/01/1970'){
			$start			= '0000-00-00';
		}else{
			$start			= date("Y-m-d", strtotime($start));
		}

		if($end == '' || $end == NULL || $end == '00/00/0000' || $end == '01/01/1970'){
			$end			= '0000-00-00';
		}else{
			$end			= date("Y-m-d", strtotime($end));
		}

		$date_updated	= date('Y-m-d H:i:s');
		$user_updated 	= $this->data['user_info']['fullname'];
		
		$data 	= $this->General_model->editAllowances($id,$type,$name,$description,$amount,$from_employee,$from_company,$start,$end,$pay,$date_updated,$user_updated,$mk1Edit,$mk2Edit);
		echo json_encode($data);

	}

	function delAllowance(){
		$id=$this->input->post('id');
		$data=$this->General_model->delAllowance($id);
		echo json_encode($data);
	}


}
