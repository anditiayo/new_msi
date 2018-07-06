<?php

function Parse_Data($data,$p1,$p2){
    $data=" ".$data;
    $hasil="";
    $awal=strpos($data,$p1);
    if($awal!=""){
    $akhir=strpos(strstr($data,$p1),$p2);
        if($akhir!=""){
        $hasil=substr($data,$awal+strlen($p1),$akhir-strlen($p1));
        }
    }
    return $hasil; 
}


function to_currency($number)
{
    if($number > 0)
    {
        return 'Rp. '.number_format($number, 0, ',', '.');
    }
    else
    {
        return 'Rp. '.number_format(abs($number), 0, ',', '.');
    }
}

function bilangan($number)
{
    if($number > 0)
    {
        return number_format($number, 0, ',', '.');
    }
    else
    {
        return '0';
    }
}
function rupiah($number)
{
    if ($number==0) return '-';
    return to_currency($number);
}
function umur($usia) {     
    $year = date("Y", strtotime($usia));
    $month = date("m", strtotime($usia));
    $day = date("d", strtotime($usia));
    $birthday = strtotime($year.'-'.$month.'-'.$day);
    $current_time = time();
    $curr['month'] = date('n', $current_time);
    $curr['lastmonth'] = $curr['month'] - 1;
    $curr['year'] = date('Y', $current_time);
    $curr['lastyear'] = $curr['year'] - 1;
    $curr['day'] = date('j', $current_time);

    $diff = $current_time - $birthday;
    $age['years'] = intval($diff/31556926);
    $diff = $diff - (31556926 * $age['years']);
    if($curr['month'] > $month) {
    	$age['months'] = $curr['month'] - $month;
    if($curr['day'] < $day) {
    	$age['months']--;
    	$month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    } else {
    	$month_temp = strtotime($curr['year'].'-'.$curr['month'].'-'.$day);
    }
    	$diff = $current_time - $month_temp;
    } elseif($curr['month'] == $month) {
    if($curr['day'] >= $day) {
    	$age['months'] = 0;
    } else {
    	$age['months'] = 11;
    	$month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    	$diff = $current_time - $month_temp;
    }
    } else {
    	$age['months'] = $curr['month'] - $month + 12;
    if($curr['day'] < $day) {
    	$age['months']--;
    	$month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    } else {
    	$month_temp = strtotime($curr['year'].'-'.$curr['month'].'-'.$day);
    }
    	$diff = $current_time - $month_temp;
    }

    $age['days'] = intval($diff/86400);
    $diff = $diff - (86400 * $age['days']);

    $age['hours'] = intval($diff/3600);
    $diff = $diff - (3600 * $age['hours']);

    $age['minutes'] = intval($diff/60);
    $diff = $diff - (60 * $age['minutes']);

    $age['seconds'] = $diff;

    return $age['years'].' Years and '.$age['months'].' Month '.$age['days']. ' Days';

}

function masa($tgl) {     
    $year = date("Y", strtotime($tgl));
    $month = date("m", strtotime($tgl));
    $day = date("d", strtotime($tgl));
    $birthday = strtotime($year.'-'.$month.'-'.$day);
    $current_time = time();
    $curr['month'] = date('n', $current_time);
    $curr['lastmonth'] = $curr['month'] - 1;
    $curr['year'] = date('Y', $current_time);
    $curr['lastyear'] = $curr['year'] - 1;
    $curr['day'] = date('j', $current_time);

    $diff = $current_time - $birthday;
    $age['years'] = intval($diff/31556926);
    $diff = $diff - (31556926 * $age['years']);
    if($curr['month'] > $month) {
        $age['months'] = $curr['month'] - $month;
    if($curr['day'] < $day) {
        $age['months']--;
        $month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    } else {
        $month_temp = strtotime($curr['year'].'-'.$curr['month'].'-'.$day);
    }
        $diff = $current_time - $month_temp;
    } elseif($curr['month'] == $month) {
    if($curr['day'] >= $day) {
        $age['months'] = 0;
    } else {
        $age['months'] = 11;
        $month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
        $diff = $current_time - $month_temp;
    }
    } else {
        $age['months'] = $curr['month'] - $month + 12;
    if($curr['day'] < $day) {
        $age['months']--;
        $month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    } else {
        $month_temp = strtotime($curr['year'].'-'.$curr['month'].'-'.$day);
    }
        $diff = $current_time - $month_temp;
    }

    $age['days'] = intval($diff/86400);
    $diff = $diff - (86400 * $age['days']);

    $age['hours'] = intval($diff/3600);
    $diff = $diff - (3600 * $age['hours']);

    $age['minutes'] = intval($diff/60);
    $diff = $diff - (60 * $age['minutes']);

    $age['seconds'] = $diff;

    return $age['years'];

}

function to_pdf($html, $filename='', $stream=TRUE) 
{
    require_once(APPPATH."libraries/dompdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}

function cetak_report($html,$out)
{
	if ($out=='pdf')
		to_pdf($html,'Report'.rand(100,1000));
	else
		echo $html;

}

function nomor_pasien($id)
{
	return sprintf("%05d",$id); 
}

function nama_bulan($i)
{
    $bulan = array(
        'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
    );

    return $bulan[$i-1];
}

function bulan_romawi($i)
{
    $bulan = array(
        'I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'
    );

    return $bulan[$i-1];
}

function tanggal($tanggal)
{
return date('d',strtotime($tanggal)).'  '.nama_bulan(date('m',strtotime($tanggal))).' '.date('Y',strtotime($tanggal));
	  			
}

function t($v)
{
    if ((int)$v==0)
        return "-";
    return (int)$v;

}

function tahun_akademik($str){
	$r = substr($str, -1);
	$t = substr($str,0, -1);
	if($r==1)
		return $t.' GANJIL';
	else
		return $t.' GENAP';

}

function beda_tanggal($start,$end = false) {
    if(!$end) { $end = date('Y-m-d'); }
    return round((strtotime($start)-strtotime($end))/86400);
}

function loop_date($start,$end){
    $datediff = strtotime($end) - strtotime($start);
    $datediff = floor($datediff/(60*60*24));
    return $datediff;
}

function header_date_loop($start,$end){
    $detail = NULL;
    for($i = 0; $i < loop_date($start,$end) + 1; $i++)
    {
      $detail .= '<th style="text-align: center">'.date("m/d", strtotime($start . ' + ' . $i . 'day')) .'</th>';
    }
    return $detail;
}

function checkloopdate($start,$end,$code){
    $CI = get_instance();
    $CI->load->model('Log_data');
    $detail = NULL;
    for($i = 0; $i < loop_date($start,$end) + 1; $i++)
    {
        $sun    = date("D", strtotime($start . ' + ' . $i . 'day'));
        $dates    = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));
        if($sun == "Sun"){
            $sun = "background:pink";    
        }else{
            $sun = "background:#FFF";
        }
           
        $detail .=  $CI->Log_data->getDates($code,$dates,$sun);

      //$detail .= '<td style="text-align: center; '.$sun.'">'.date("m/d", strtotime($start . ' + ' . $i . 'day')) .'</td>';
    }
    return $detail;
}


function data_loop($start,$end,$data){
    $detail = NULL;
    for($i = 0; $i < loop_date($start,$end) + 1; $i++)
    {   
        $loop = date("m/d", strtotime($start . ' + ' . $i . 'day'));
        $real = date("m/d", strtotime($data));
        if($loop==$real){
            $detail .= '<td class="long">'.$loop.'</td>';
        }else{
            $detail .= '<td class="long">'.$real.'</td>';
        }
        
    
    }
    return $detail;
}


function get_mot($month, $year)
{
   return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year %400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}

function get_employee($code){

    $CI = get_instance();
    $CI->load->model('Log_data');
    $detail = $CI->Log_data->get_details($code);
    return $detail;

}

function is_array_empty($arr){
  if(is_array($arr)){     
      foreach($arr as $key => $value){
          if(!empty($value) || $value != NULL || $value != ""){
              return true;
              //break;//stop the process we have seen that at least 1 of the array has value so its not empty
          }
      }
      return false;
  }
}

    function ck_connect(){
            date_default_timezone_set('Asia/Jakarta');
            $IP     = "192.168.1.201";
            
            $date   = date("Y-m-d h:i:s" );

            $Connect = fsockopen($IP, "80", $errno, $errstr, 1);
            if (!$Connect) {
                echo "$errstr ($errno)<br />\n";
            } else {
                return $Connect;
            }
    }

function beda_waktu($date1, $date2, $format = false) 
{
    $diff = date_diff( date_create($date1), date_create($date2) );
    if ($format)
        return $diff->format($format);
    
    return array('y' => $diff->y,
                'm' => $diff->m,
                'd' => $diff->d,
                'h' => $diff->h,
                'i' => $diff->i,
                's' => $diff->s
            );
}

function status($stat){
    $CI = get_instance();
    $CI->load->model('Employee_model');
    $detail = $CI->Employee_model->get_status($stat);
    return $detail;
}

function salary($id){
    $CI = get_instance();
    $CI->load->model('Employee_model');
    $detail = $CI->Employee_model->get_salary($id);
    return $detail;
}

//POSITIONING
function isNumbers($string){
    $chars = '';
    $nums = '';
    for ($index=0;$index<strlen($string);$index++) {
        if(isNumber($string[$index]))
            $nums .= $string[$index];
        else    
            $chars .= $string[$index];
    }
    return $nums;
}

function isNumber($c) {
    return preg_match('/[0-9]/', $c);
} 

//nestable
function get_menu($items,$class = 'dd-list') {

    $html = "<ol class=\"".$class."\" id=\"menu-id\">";
    if($items == NULL){

    }else{
            foreach($items as $key=>$value) {
        $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                    <div class="dd-handle dd3-handle">Drag</div>
                    <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['label'].'</span> 
                        <span class="span-right"><span id="link_show'.$value['id'].'"></span> &nbsp;&nbsp; 
                            <a class="edit-button" id="'.$value['id'].'" label="'.$value['label'].'" link="'.$value['link'].'" ><i class="fa fa-pencil"></i></a>
                            <a class="del-button" id="'.$value['id'].'"><i class="fa fa-trash"></i></a></span> 
                    </div>';
        if(array_key_exists('child',$value)) {
            $html .= get_menu($value['child'],'child');
        }
            $html .= "</li>";
    }
    $html .= "</ol>";

    return $html;
  
    }


}


function parseJsonArray($jsonArray, $parentID = 0) {

  $return = array();
  foreach ($jsonArray as $subArray) {
    $returnSubSubArray = array();
    if (isset($subArray->children)) {
        $returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
    }

    $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
    $return = array_merge($return, $returnSubSubArray);
  }
  return $return;
}

function timeCount($masuk,$keluar,$code){
    $CI = get_instance();
    $CI->load->model('Employee_model');
    $return = $CI->Employee_model->getInfo($masuk,$keluar,$code);

    return $return;
   
}

function decimalHours($WORKHOUR)
{
    $hms = explode(":", $WORKHOUR);
    return ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
}

function getbpjs($code,$num)
{
   
    $CI = get_instance();
    $CI->load->model('Employee_model');
    $return = $CI->Employee_model->getalldec($code,$num);
    $percent = 0 ;
    if ($return == TRUE){
        $percent = 1;   
    }else{
        $percent = 0;
    }
    return $percent;
}

function getastek($code,$num)
{
    $CI = get_instance();
    $CI->load->model('Employee_model');
    $return = $CI->Employee_model->getalldec($code,$num);
    $percent = 0 ;
    if ($return == TRUE){
        $percent = 2;   
    }else{
        $percent = 0;
    }
    return $percent;   
}

function getpesiun($code,$num)
{
    $CI = get_instance();
    $CI->load->model('Employee_model');
    $return = $CI->Employee_model->getalldec($code,$num);
    $percent = 0 ;
    if ($return == TRUE){
        $percent = 1;   
    }else{
        $percent = 0;
    }
    return $percent;   
}

function brandExcel() {
    $this->load->library('excel');
    $result = $this->config_model->getBrandsForExcel();
    $this->excel->to_excel($result, 'brands-excel'); 
}

function sum_the_time($time1, $time2) {
$times = array($time1, $time2);
  $seconds = 0;
  foreach ($times as $time)
  {
    list($hour,$minute,$second) = explode(':', $time);
    $seconds += $hour*3600;
    $seconds += $minute*60;
    $seconds += $second;
  }
  $hours = floor($seconds/3600);
  $seconds -= $hours*3600;
  $minutes  = floor($seconds/60);
  $seconds -= $minutes*60;
  // return "{$hours}:{$minutes}:{$seconds}";
  return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); 
}