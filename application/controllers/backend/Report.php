<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Backend
{
	public function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_prefix'), $this->config->item('error_suffix'));
		$this->load->library('grocery_CRUD');
		$this->load->model('Log_data');
		$this->load->model('General_model');
	}

	

	public function index()
	{
		
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
			$this->data['subtitle']     = $this->lang->line('Report');
			
			$start 			= $this->input->post('start');
			$end 			= $this->input->post('end');
			$departement 	= $this->input->post('departement');
			$status			= $this->input->post('status');

			

			
			if ($start != NULL AND $end != NULL){
				$start_date 	= date("Y-m-d", strtotime($start));
				$end_date 		= date("Y-m-d", strtotime($end));
				$this->data['start']     	= $start;
				$this->data['end']     		= $end;
			}else{
				$start_date = NULL;
				$end_date 	= NULL;
				$this->data['start']     	= NULL;
				$this->data['end']     		= NULL;
			}
			$this->data['log']     		= $this->Log_data->get_log($start_date,$end_date);
			$this->data['departement'] 	= $this->General_model->departementHead();
			
			$this->data['status'] 		= $this->General_model->getStatus();

			$this->data['statusback'] 	= $status;
			$this->data['departementback'] 	= $departement;			

			$this->data['allowance']    = $this->General_model->allowances();
				
			
			
			$this->data['report']     	= 'class="active"';
	        $this->data['bydate'] 		= $this->Log_data->get_log_by_date($start_date,$end_date,$status);
	       
			$this->data['page_content'] = 'backend/report/index';

			

			$this->render();
		}
	}

}
