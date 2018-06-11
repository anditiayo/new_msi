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
			$this->data['subtitle']     = $this->lang->line('employee_list');
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

			$this->data['allowances']  	= $this->General_model->allowances();
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


			
			$this->data['allowancesDiSelect']  	= $this->General_model->allowancesDiSelect($id);
			$this->data['allowancesSelect']  	= $this->General_model->allowancesSelect($id);
			$this->data['info']  				= $this->Employee_model->get_info($id);
			
			$this->data['getPosition']	= $this->General_model->getPosition();
			$this->data['status']  		= $this->General_model->getStatus();
			$this->data['regencies']  	= $this->General_model->regencies();
			$this->data['departement']  = $this->General_model->departement();
			$this->data['worklist']  	= $this->General_model->worklist();
			
			$this->data['employee']     = 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('employee');
			$this->data['page_content'] = 'backend/employee/edit';

			$this->render();
		}
	}

	public function submit(){
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
			$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);


			$fullname	= $this->input->post('fullname');
			$lastname	= $this->input->post('lastname');
			$email		= $this->input->post('email');
			$pob		= $this->input->post('pob');
			$birthday	= $this->input->post('birthday');
			$address1	= $this->input->post('address1');
			$address2	= $this->input->post('address2');
			$phone1		= $this->input->post('phone1');
			$phone2		= $this->input->post('phone2');
			$gender		= $this->input->post('gender');
			//$nik		= $this->input->post('nik');
			$joinIn		= $this->input->post('joinIn');
			$status		= $this->input->post('status');
			$position	= $this->input->post('position');
			$salary		= $this->input->post('salary');
			$npwp		= $this->input->post('npwp');
			$bpjstk		= $this->input->post('bpjstk');
			$bpjsk		= $this->input->post('bpjsk');
			$regular	= $this->input->post('regular');
			$group		= $this->input->post('group');
			$allowance	= $this->input->post('allowance');
			$id			= $this->input->post('id');
			$joinIn        = date("Y-m-d", strtotime($joinIn));

			$date_updated	= date('Y-m-d H:i:s');
			$user_updateds 	= $this->data['user_info']['fullname'];

			$this->Employee_model->updateData($id,$fullname,$lastname,$email,$pob,$birthday,$address1,$address2,$phone1,$phone2,$gender,$status,$position,$salary,$npwp,$bpjstk,$bpjsk,$regular,$group,$joinIn);
			
			for ($i = 0; $i < count($allowance) ; $i++){
				$data[] = array(
					'employee_id' => $id,
					'allowance_type_id' => $allowance[$i]
					);
			}
			$grup = array(
					'grouptime_id' 	=> $group,
					'employee_id' 	=> $id,
					'date_created'	=> $date_updated,
					'date_updated'	=> $date_updated,
					'user_created'	=> $user_updateds,
					'user_updated'	=> $user_updateds
				);
			$this->Employee_model->updateDataGroupwork($id,$grup);
			$this->Employee_model->updateDataAllowance($id,$data);
			$this->Employee_model->updateDataSalary($id,isNumbers($salary));


				

			
			
			redirect('backend/employee/edit/'.$id);

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
			
			$this->data['departementlist']	= $this->General_model->departement();
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

	public function schedule(){
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
			
			$this->data['segment'] 		= $this->uri->segment(3);
			$this->data['grouplist'] 	= $this->General_model->grouplist();
			
			$this->data['employee']     = 'class="active"';

			$this->data['subtitle']     = $this->lang->line('schedule');
			$this->data['page_content'] = 'backend/employee/schedule';

			$this->render();
		}
	}

	function onDrop(){
		$events			= $this->input->post('event');
		$event 			= json_encode($events);
		$title 			= $events['title'];
		$className 		= $events['className'];

		$a 				= explode(' ',$className);
		$className 		= $a[0];
		$grouptime_id 	= $a[1];
		$start 			= new datetime($events['start']);
		$end 			= new datetime($events['start']);
		$start_in 		= new datetime($a[2]);
		$end_out 		= new datetime($a[3]);


		$a2 = date('H:i:s',strtotime('23:00:00'));
		$a3 = date('H:i:s',strtotime('07:00:00'));
		if($a[2] == $a2 && $a[3] == $a3){
			$dateend = $end->modify('+1 day');
		}else{
			$dateend = $end;
		}

		$merge1 = new datetime($start->format('Y-m-d').' '.$start_in->format('H:i:s'));
		$start = $merge1->format('Y-m-d H:i:s');

		$merge2 = new datetime($dateend->format('Y-m-d').' '.$end_out->format('H:i:s'));
		$end = $merge2->format('Y-m-d H:i:s');
		
		$result 	= $this->General_model->addEvent($title,$start,$end,$className,$grouptime_id);
		echo json_encode($result);
	}

	function onDelete(){
		$events		= $this->input->post('id');
		$event 		= json_encode($events);
		$id 		=$this->input->post('id');
		$result 	= $this->General_model->delEvent($id);
		echo json_encode($events);
	}

	function onUpdate(){
		$events		= $this->input->post('event');
		$event 	= json_encode($events);
		$id 	= $events['id'];
		$start 	= $events['start'];
		//$end 	= $events['start'];
		$title 	= $events['title'];
		$className = substr(json_encode($events['className']),2,-2);
		//$grouptime_id = isNumbers($events['className']);
		$result 	= $this->General_model->updEvent($id,$title,$start,$className);
		echo json_encode($events);
	}

	Public function getEvents()
	{
		$result=$this->General_model->getEvent();
		echo json_encode($result);
	}



}
