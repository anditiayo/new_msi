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
		$this->load->model('Employee_model');
		$this->load->model('Reports');
		$this->load->helper('parse');

	}

	

	public function index()
	{
		
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
			

			if (!empty($_POST['submit'])) {
			  $heads = 'backend';
			} else if (!empty($_POST['print'])) {
			  $heads = 'print';
			}else{
				$heads = 'backend';
			}

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
	        $this->data['bydate'] 		= $this->Log_data->get_log_by_date($start_date,$end_date,$status,$departement);
	       
			$this->data['page_content'] = $heads.'/report/index';

			

			$this->render();
		}
	}

	public function report(){
    	if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
			if (!empty($_POST['submit'])) {
			  $heads = 'backend';
			} else if (!empty($_POST['print'])) {
			  $heads = 'print';
			}else{
				$heads = 'backend';
			}

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
	        $this->data['bydate'] 		= $this->Log_data->get_log_by_date2($start_date,$end_date,$status,$departement);
			$this->data['page_content'] = $heads.'/report/reports';

			

			$this->render();
		}
    }

	public function type(){
				if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
			

			if (!empty($_POST['submit'])) {
			  $heads = 'backend';
			} else if (!empty($_POST['print'])) {
			  $heads = 'print';
			}else{
				$heads = 'backend';
			}

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
			$this->data['employeeSearch'] = $this->Log_data->employeeSearch($status,$departement);
	       // $this->data['bydate'] 		= $this->Log_data->get_log_by_date($start_date,$end_date,$status,$departement);
	       
			$this->data['page_content'] = $heads.'/report/report2';

			

			$this->render();
		}
	}



	public function createXLS() {
		$start 		= $this->input->get('start', TRUE);
		$end 		= $this->input->get('end', TRUE);
		$status 	= $this->input->get('status', TRUE);
				$start_date = date("Y-m-d", strtotime($start));
				$end_date 	= date("Y-m-d", strtotime($end));

		$fileName = 'data-'.time().'.xlsx';  
		// load excel library
       	$this->load->library('PHPExcel');
        //membuat objek
        $objPHPExcel = new PHPExcel();

        //Sheet yang akan diolah
        
        $dats = header_date_loop($start,$end);
        $empInfo = $this->Log_data->get_log_by_date($start_date,$end_date,$status);
        $table_columns = array("NO", "NAME", "NIK");

        $column = 0;
        foreach($table_columns as $field)
	  	{
		   	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   	$column++;
	  	}

        for($i = 0; $i < loop_date($start,$end) + 1; $i++)
	    {
	      $detail = date("m/d", strtotime($start . ' + ' . $i . 'day'));
	      $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($i+3,1,$detail);
	    }

	    $hitung = 1;
        global $RECRUITED;
        global $SHIFT3;
        global $countErr;
        global $countJam;
        global $SALARY;
        global $JUM;
        global $JUMBPJS;

        foreach ($empInfo as $key1 => $param1) {
           $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$hitung,$hitung);
               
           $hitung++;
        }
              

	 	

	  	
        //Set Title
        ob_end_clean();
        $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
        //Header
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="'. $fileName.'"');
		header("Pragma: no-cache");
		header("Expires: 0");
        //Download
        //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save("php://output");
        ob_end_clean();

	
    }
    function gettime(){
    	$pin			= $this->input->post('pin');
		$date			= $this->input->post('date');
		
		$date		= date("Y-m-d", strtotime($date));
		
		
		return $this->Log_data->get_log_date($date,$pin);
		
    }



}
