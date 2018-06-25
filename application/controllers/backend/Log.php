<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model('Log_data');
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
			$this->load->model('Log_data');

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
			
			
			
			$start 	= $this->input->post('start');
			$end 	= $this->input->post('end');

			$start_date 	= date("Y-m-d", strtotime($start));
			$end_date 		= date("Y-m-d", strtotime($end));
			if(!empty($start) || !empty($end) ){
				$this->data['log_data']     = $this->Log_data->get_log($start_date,$end_date);
			}else{
				
				$date 		= $this->input->get('tgl', TRUE);
				$start_date = date("Y-m-d", strtotime($date));
				$end_date 	= date("Y-m-d", strtotime($date));
				$pin 		= $this->input->get('pin', TRUE);

				$this->data['log_data']     = $this->Log_data->get_log_pin($start_date,$end_date,$pin);
			}
			$this->data['start']     	= $start;
			$this->data['end']     		= $end;
			$this->data['logs']     	= 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('log');
			$this->data['page_content'] = 'backend/log/index';

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
			$this->load->model('Log_data');

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
			$status			= $this->input->post('status');

			$this->Log_data->updateLog($id,$status);
			$detail  = $this->Log_data->get_log_by_id($id);
			


			$this->data['log']     		= 'class="active"';
			$this->data['detail']     	= $detail;
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('log');
			$this->data['page_content'] = 'backend/log/edit';
			
			$this->render();
			
		}
	}

	public function add_log_manual(){
		
		$pin		= $this->input->post('pin');
		$date		= $this->input->post('date');
		$date		= date("Y-m-d", strtotime($date));
		$tgl		= date("Ydm", strtotime($date));
		$time		= $this->input->post('time');
		$time		= date("H:i:s", strtotime($time));
		$status		= $this->input->post('status');
		$day      	= date('w',strtotime($date));
		$date_time  = date('Y-m-d H:i:s',strtotime("$date $time"));
		$data 		= $this->Log_data->add_log_manual($pin,$date_time,$date,$time,$status,$day);
		var_dump($data);
	
		redirect('backend/log?tgl='.$tgl.'&pin='.$pin);
	}
}
