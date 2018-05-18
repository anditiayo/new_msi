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

			$this->data['active']     	= 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
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

			$this->General_model->get_data();


			$this->data['active']     	= 'class="active"';
			$this->data['config']     	= 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
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
}
