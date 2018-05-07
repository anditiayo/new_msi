<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="row">
    <div class="col-xl-12">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">REPORT</div>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item"> <i class="ti-pencil"></i>Create</a>
                        <a class="dropdown-item"> <i class="ti-pencil-alt"></i>Edit</a>
                        <a class="dropdown-item"> <i class="ti-close"></i>Remove</a>
                    </div>
                </div>
            </div>
            <div class="ibox-body">
                <div class="ibox-fullwidth-block">
                	                                        <style type="text/css">

        #outerdiv {
            position: absolute;
            top: 0;
            left: 0;
            right: 23em;
        }
        #innerdiv {
            width: 78%;
            overflow-x:scroll;
            margin-left: 20.01em;
            padding-top:-10px;
            overflow-y:visible;
            padding-bottom:1px;
        }
         .headcol-1 {
            position:absolute;
           
            width:3em;
            left:1EM;
            right: 5em;
            top:auto;
            border-right: 0px none black;
            border-top-width:3px;
            /*only relevant for first row*/
            margin-top:-3px;
            /*compensate for top border*/
            background:yellow;
        }
        .headcol-1:before {
           
        }
        .headcol {
            position:absolute;
           
            width:11em;
            left:4em;
            right: 5em;
            top:auto;
            border-right: 0px none black;
            border-top-width:3px;
            /*only relevant for first row*/
            margin-top:-3px;
            /*compensate for top border*/
            background:yellow;
        }
        .headcol2 {
            position:absolute;
           
            width:5em;
            left:15em;
            right: 6em;
            top:auto;
            border-right: 0px none black;
            border-top-width:3px;
            /*only relevant for first row*/
            margin-top:-3px;
            /*compensate for top border*/
            background:yellow;
        }
        .headcol2:before {
           
        }
        .headcol:before {
           
        }
        .long {
            background:#fff;
           
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
        }
</style>

<div id="innerdiv">
                	<table class="table table-hover" border='0'>
                        <thead class="thead-default">
                           <?PHP
                           	    $start  = '2018-04-01';
                                $end    = '2018-04-30';
                           ?>
                           	<tr>
                           		<th class='headcol-1'>NO</th>
                           		<th class='headcol2'>NIK</th>
                           		<th class='headcol'>NAMA</th>
                           		<th class=''></th>
                           		<?
                           			for($i = 0; $i < loop_date($start,$end) + 1; $i++)
								        {
								            echo '<th style="text-align: center">'.date("m/d", strtotime($start . ' + ' . $i . 'day')) .'</th>'; 
								        }
                           		?>
                                <th class=''>HARI</th>
                           	</tr>
                           

                        </thead>

                        <tbody>
			            <?php

                     /* echo "<pre>";
                        print_r($bydate);*/
                        
                        $hitung =1;
                       
                        $total_kerja = 0;
                        foreach ($bydate as $a => $b)
                        {
                                echo "<tr style='overflow: visible;'>";
                                echo "<td class='headcol-1'>";
                                    echo $hitung;
                                echo "</td>";
                                echo "<td class='headcol2' >";
                                    echo $code = $a;     
                                echo "</td>";
                                echo "<td class='headcol'>";
                                    $array = get_employee($code);               
                                    foreach($array as $object) {
                                        echo $name[] = $object->name;
                                    }
                                echo '</td>'; 
                                echo '<td></td>'; 
                                foreach ($b as $c => $d) 
                                {
                                    echo '<td class="long">';
                                    $time = $c;
                                    $day = date("d", strtotime($time));
                                    foreach ($d as $e => $f)
                                    {
                                        echo '<table>';
                                        //echo $e;
                                        if($e =='status'){
                                            //echo 'status';
                                            foreach ($f as $key=>$value){
                                             // echo '='.$value;
                                            } 
                                        }elseif ($e == 'datetime') {
                                            //echo 'status';
                                            $KERJA =0;
                                            
                                            if($day == '01'){
                                                $val = 0;   
                                            }
                                            foreach ($f as $key=>$value){
                                                if($key == 0){
                                                    echo '<tr>';
                                                    echo '<td  style="font-size:12px; text-align: center;">';
                                                    echo date("H:i", strtotime($value));
                                                    echo '</td>';
                                                    if(!empty($value)){
                                                        $val += 0.5;
                                                    }
                                                }else{
                                                    echo '<td  style="font-size:12px; text-align: center;">';
                                                    echo date("H:i", strtotime($value));
                                                    echo '</td>';
                                                    echo '</tr>';
                                                    if(!empty($value)){
                                                        $val += 0.5;
                                                    }
                                                }
                                            }
                                            $KERJA +=$val;
                                        }elseif ($e == 'masuk') {
                                           // echo 'status';
                                            foreach ($f as $key=>$value){
                                            //echo date("H:i", strtotime($value));
                                                if(empty($value)){
                                                    echo '<tr>';
                                                    echo '<td  style="font-size:12px; text-align: center;">';
                                                    echo "IN!";
                                                    echo '</td>';
                                                }
                                            } 
                                        }elseif ($e == 'keluar') {
                                           // echo 'status';
                                            foreach ($f as $key=>$value){
                                            //echo date("H:i", strtotime($value));
                                                if(empty($value)){
                                                    echo '<td  style="font-size:12px; text-align: center;">';
                                                    echo "OUT!";
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                            } 
                                        }
                                        echo '</table>';
                                    }
                                     echo '</td>';
                                }
                                echo '<td>'.$KERJA.'</td>'; 
                                echo "</tr>";
                                $hitung++;
                        }
			    		?>
			           
					   </tbody>
					</table>
					                        
                      
           </div>
            </div>
            </div>
        </div>
    </div>
</div>