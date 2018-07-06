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
			$this->data['departement']  = $this->General_model->departement();
			$this->data['allowances']  	= $this->General_model->allowances();
			$this->data['worklist'] 	= $this->General_model->worklist();
			$this->data['getPosition']	= $this->General_model->getPosition();
			$this->data['status']  		= $this->General_model->getStatus();
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

	public function leave(){
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
			
			$this->data['date']			= $this->input->get('tgl', TRUE);
			$this->data['pin']			= $this->input->get('pin', TRUE);

			$this->data['name']			= $this->Employee_model->get_all();
			$this->data['leave_permit']	= $this->Employee_model->leave_permit();
			$this->data['segment'] 		= $this->uri->segment(3);
			$this->data['grouplist'] 	= $this->General_model->grouplist();
			
			$this->data['employee']     = 'class="active"';

			$this->data['subtitle']     = $this->lang->line('schedule');
			$this->data['page_content'] = 'backend/employee/leave';

			$this->render();
		}
	}
		public function overtime(){
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
			
			$this->data['date']			= $this->input->get('tgl', TRUE);
			$this->data['pin']			= $this->input->get('pin', TRUE);
			$this->data['segment'] 		= $this->uri->segment(3);
			$this->data['grouplist'] 	= $this->General_model->grouplist();
			$this->data['name']			= $this->Employee_model->get_all();
			
			$this->data['employee']     = 'class="active"';

			$this->data['subtitle']     = $this->lang->line('schedule');
			$this->data['page_content'] = 'backend/employee/overtime';

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

	function leavelist(){
		$data = $this->Employee_model->leavelist();
		echo json_encode($data);
	}

	function add_leavelist(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$code		= $this->input->post('code');
		$permit		= $this->input->post('permit');
		$date		= $this->input->post('date');
		$date			= date("Y-m-d", strtotime($date));
		$date_created	= date('Y-m-d H:i:s');
		$user_created 	= $this->data['user_info']['fullname'];
		
		$data 		= $this->Employee_model->add_leavelist($code,$permit,$date,$date_created,$user_created);
		echo json_encode($data);
	}

	function get_leavelist(){
		$id 	= $this->input->get('id');
		$data 	= $this->Employee_model->get_leavelist($id);
		echo json_encode($data);
	}

	function edit_leavelist(){
		$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$id			= $this->input->post('edit_id');
		$code		= $this->input->post('edit_code');
		$permit		= $this->input->post('edit_permit');
		$date		= $this->input->post('edit_date');
		$permitid	= $this->input->post('permitid');
		
		if($permit == true){
			$permit = $permit;
		}else{
			$permit = $permitid;
		}

		$date			= date("Y-m-d", strtotime($date));
		$date_updated	= date('Y-m-d H:i:s');
		$user_updated 	= $this->data['user_info']['fullname'];
		
		$data 		= $this->Employee_model->edit_leavelist($id,$code,$permit,$date,$date_updated,$user_updated);
		echo json_encode($data);
	}

	function del_leavelist(){
		$id 		= $this->input->post('id');
		$data 		= $this->Employee_model->del_leavelist($id);
		echo json_encode($data);
	}

	public function upload($error = NULL)
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

			$this->data['action'] =  site_url('backend/employee/proses');
			$this->data['judul'] =  set_value('judul');
			$this->data['error'] =  $error['error'];

			$this->data['employee']     = 'class="active"';
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('employee_list');
			$this->data['page_content'] = 'backend/employee/upload';

			$this->render();
		}
       
    }

    public function proses()
    {
        // validasi judul
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
 
        if ($this->form_validation->run() == FALSE) {
            // jika validasi judul gagal
            $this->index();
        } else {
            // config upload
            $config['upload_path'] = './temp_upload/';
            $config['allowed_types'] = 'xls';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('gambar')) {
                // jika validasi file gagal, kirim parameter error ke index
                $error = array('error' => $this->upload->display_errors());
                $this->index($error);
            } else {
              // jika berhasil upload ambil data dan masukkan ke database
              $upload_data = $this->upload->data();
 
              // load library Excell_Reader
              $this->load->library('excel_reader');
 
              //tentukan file
              $this->excel_reader->setOutputEncoding('230787');
              $file = $upload_data['full_path'];
              $this->excel_reader->read($file);
              error_reporting(E_ALL ^ E_NOTICE);
 
              // array data
              $data = $this->excel_reader->sheets[0];
              $dataexcel = Array();
              for ($i = 1; $i <= $data['numRows']; $i++) {
                   if ($data['cells'][$i][1] == '')
                       break;
                   $dataexcel[$i - 1]['nama'] = $data['cells'][$i][1];
                   $dataexcel[$i - 1]['tempat_lahir'] = $data['cells'][$i][2];
                   $dataexcel[$i - 1]['tanggal_lahir'] = $data['cells'][$i][3];
              }
              
              //load model
              $this->load->model('Data_model');
              $this->Data_model->loaddata($dataexcel);
 
              //delete file
              $file = $upload_data['file_name'];
              $path = './temp_upload/' . $file;
              unlink($path);
            }
        //redirect ke halaman awal
        redirect(site_url('backend/employee/upload'));
        }
    }

    function overtimelist(){
    	$data = $this->Employee_model->overtimelist();
		echo json_encode($data);
    }
    function add_overtimelist(){
    	$this->data['user_info'] = $this->user_info_model->get_info($this->ion_auth->user()->row()->id);
		
		$code		= $this->input->post('code');
		$date		= $this->input->post('date');
		$date			= date("Y-m-d", strtotime($date));
		$date_created	= date('Y-m-d H:i:s');
		$user_created 	= $this->data['user_info']['fullname'];
		
		$data 		= $this->Employee_model->add_overtimelist($code,$date,$date_created,$user_created);
		echo json_encode($data);
    }



}
