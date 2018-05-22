<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model');
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
			$count_user  = $this->db->count_all($this->config->item('tables', 'ion_auth')['users']);
			$count_group = $this->db->count_all($this->config->item('tables', 'ion_auth')['groups']);

			if ($count_user >= 1)
			{
				$this->data['lang_user_plural'] = plural($this->lang->line('user'));
			}
			else
			{
				$this->data['lang_user_plural'] = $this->lang->line('user');
			}

			if ($count_group >= 1)
			{
				$this->data['lang_group_plural'] = plural($this->lang->line('group'));
			}
			else
			{
				$this->data['lang_group_plural'] = $this->lang->line('group');
			}

			$this->data['employee_date']     = $this->Employee_model->get_all();
			$this->data['employee']     = 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('employee');
			$this->data['page_content'] = 'backend/employee/index';

			$this->render();
		}
	}

	public function add(){
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
			$count_user  = $this->db->count_all($this->config->item('tables', 'ion_auth')['users']);
			$count_group = $this->db->count_all($this->config->item('tables', 'ion_auth')['groups']);

			if ($count_user >= 1)
			{
				$this->data['lang_user_plural'] = plural($this->lang->line('user'));
			}
			else
			{
				$this->data['lang_user_plural'] = $this->lang->line('user');
			}

			if ($count_group >= 1)
			{
				$this->data['lang_group_plural'] = plural($this->lang->line('group'));
			}
			else
			{
				$this->data['lang_group_plural'] = $this->lang->line('group');
			}

			$this->data['worklist'] 	= $this->General_model->worklist();
			$this->data['employee']     = 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('employee');
			$this->data['page_content'] = 'backend/employee/add';

			$this->render();
		}
	}

	public function edit($id){
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
			$count_user  = $this->db->count_all($this->config->item('tables', 'ion_auth')['users']);
			$count_group = $this->db->count_all($this->config->item('tables', 'ion_auth')['groups']);

			if ($count_user >= 1)
			{
				$this->data['lang_user_plural'] = plural($this->lang->line('user'));
			}
			else
			{
				$this->data['lang_user_plural'] = $this->lang->line('user');
			}

			if ($count_group >= 1)
			{
				$this->data['lang_group_plural'] = plural($this->lang->line('group'));
			}
			else
			{
				$this->data['lang_group_plural'] = $this->lang->line('group');
			}

			$this->data['info']  		= $this->Employee_model->get_info($id);
			$this->data['regencies']  	= $this->General_model->regencies();
			$this->data['employee']     = 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('employee');
			$this->data['page_content'] = 'backend/employee/edit';

			$this->render();
		}
	}

	public function group(){
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
			
			
			$this->data['group_dept'] 			= $this->uri->segment(3);
			$this->data['grouplist_emp']		= $this->Employee_model->groupworklist();
			$this->data['grouplist_emp_all']	= $this->Employee_model->groupworklist_all();
			
			$this->data['grouplist']	= $this->General_model->grouplist();
			$this->data['employee']     = 'class="active"';
			$this->data['subtitle']     = $this->lang->line('group');
			$this->data['page_content'] = 'backend/employee/group';

			$this->render();
		}
	}

	function change_list(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$to_group		= $this->input->post('to_group');
		$from_group		= $this->input->post('from_group');
		$employee_id 	= isNumbers($this->input->post('name'));

		$date_updated	= date('Y-m-d H:i:s');
		$user_updated 	= $this->data['user_info']['fullname'];
		
		$data 		= $this->Employee_model->edit_groupworklist($to_group,$from_group,$employee_id,$date_updated,$user_updated);
		echo json_encode($data);
	}
}
