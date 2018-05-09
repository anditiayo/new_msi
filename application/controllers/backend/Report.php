<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Backend
{
	public function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_prefix'), $this->config->item('error_suffix'));
		$this->load->library('grocery_CRUD');
	}

	

	public function index()
	{
		$this->load->model('Log_data');
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
			$this->data['users'] = $this->ion_auth->users()->result();

			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->data['count_users']  = $this->db->count_all($this->config->item('tables', 'ion_auth')['users']);
			$this->data['subtitle']     = $this->lang->line('users');
			
			$start 	= $this->input->post('start');
			$end 	= $this->input->post('end');

			$start_date 	= date("Y-m-d", strtotime($start));
			$end_date 		= date("Y-m-d", strtotime($end));
			$this->data['log']     		= $this->Log_data->get_log($start_date,$end_date);
				
			$this->data['start']     	= $start;
			$this->data['end']     		= $end;
			
			
	        $this->data['log'] = $this->Log_data->get_log($start_date,$end_date);
	        $this->data['employee'] = $this->Log_data->get_employee();
	        $this->data['bydate'] = $this->Log_data->get_log_by_date($start_date,$end_date);
	        $employee = $this->Log_data->get_employee();
	       	$join = $this->Log_data->get_log($start_date,$end_date);
	       
			$this->data['page_content'] = 'backend/report/index';

			

			$this->render();
		}
	}

	public function grocery(){
		$this->Log_data->grocery_data();
		$crud = new grocery_CRUD();
		$crud->set_table('msi_log_data');
		$crud->unset_operations();
		$output = $crud->render();

	}
}
