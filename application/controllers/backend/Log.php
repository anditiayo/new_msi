<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
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

			$this->data['log']     = $this->Log_data->get_log();

			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('log');
			$this->data['page_content'] = 'backend/log/index';

			$this->render();
		}
	}
}