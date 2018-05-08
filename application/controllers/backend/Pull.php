<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pull extends Backend
{
	public function __construct()
	{
		parent::__construct();
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

			date_default_timezone_set('Asia/Jakarta');
			$IP     = "192.168.1.201";
			$Key    = "0";
			$date   = date("Y-m-d h:i:s" );

			$Connect = fsockopen($IP, "80", $errno, $errstr, 1);
			if ($Connect) {
			  $soap_request = "
			  <GetAttLog>
			    <ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey>
			    <Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg>
			  </GetAttLog>";

			  $newLine  = "\r\n";
			  fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
			  fputs($Connect, "Content-Type: text/xml".$newLine);
			  fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
			  fputs($Connect, $soap_request.$newLine);
			  $buffer   = "";
			  while($Response = fgets($Connect, 1024)) {
			    $buffer = $buffer.$Response;
			  }
			} else echo "Koneksi Gagal";

			$buffer = Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
			$buffer = explode("\r\n",$buffer);

			for($a=1;$a<count($buffer)-1;$a++){

			  $data     = Parse_Data($buffer[$a],"<Row>","</Row>");
			  $PIN      = Parse_Data($data,"<PIN>","</PIN>");
			  $DateTime = Parse_Data($data,"<DateTime>","</DateTime>");
			  $Verified = Parse_Data($data,"<Verified>","</Verified>");
			  $Status   = Parse_Data($data,"<Status>","</Status>");
			  $name     = Parse_Data($data,"<Name>","</Name>");
			  $time     = date('H:i:s',strtotime($DateTime));
			  $date     = date('Y-m-j',strtotime($DateTime));
			  $day      = date('w',strtotime($DateTime));
			  
			   $this->Log_data->insert_log($PIN,$DateTime,$date,$time,$day,$Verified,$Status);
			   $this->data['load'] 		= $DateTime;
			   $this->data['buffer'] 	= $a;
	           	if(isset($PIN)!=NULL || isset($PIN)!=''){
	              $percent = intval($a/(count($buffer)-2) * 100)."%";
	          	}

			}

			$this->data['percent']     	= $percent;
			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('pull');
			$this->data['page_content'] = 'backend/pull/index';

			$this->render();
		}
	}
}
