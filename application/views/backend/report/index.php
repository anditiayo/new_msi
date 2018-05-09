<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title"><?$subtitle?></h1>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">REPORT</h5>
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2">FACTORY</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                                    <option value="">All</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                                <label class="mb-0 mr-2"></label>
                                <label class="mb-0 mr-2">GROUP</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                                    <option value="">All</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                                <label class="mb-0 mr-2"></label>
                                <label class="mb-0 mr-2">DEPT</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                                    <option value="">All</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>

                            </div>
                        </div>
                        <div class="flexbox mb-4">
                            <div class="form-group" id="date_5">
                                    <label class="font-normal">Range select</label>
                                    <?php echo form_open(current_url());

                                        if(!empty($start))
                                        {
                                            $start  = $start;
                                            $end    = $end;
                                        }else
                                        {
                                            $start  = date("m/d/Y");
                                            $end    = date("m/d/Y");
                                        }

                                    ?>

                                    <div class="input-daterange input-group" id="datepicker">
                                        <input class="input-sm form-control" type="text" name="start" id="start" value="<?=$start;?>">
                                        <span class="input-group-addon pl-2 pr-2">to</span>
                                        <input class="input-sm form-control" type="text" name="end" id="end" value="<?=$end;?>">
                                       
                                    </div>

                                </div>
                        </div>
                          <div class="flexbox mb-4">
                                <?php echo form_submit('submit', 'FIND', array('class' => 'btn btn-primary')); ?>
                        </div>
                         <?php echo form_close(); ?>
                        <div class="table-responsive row">
                                                                                        <style type="text/css">

        #outerdiv {
            position: absolute;
            top: 0;
            left: 0;
            right: 23em;
        }
        #innerdiv {
            width: 88%;
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
                        if(!empty($bydate))
                        {
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
                                        }

                                        if ($e == 'datetime') {
                                            //echo 'status';
                                            $KERJA =0;
                                            
                                            $d = date("d", strtotime($start));

                                            if($day == $d){
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
                                            if(!empty($val)){
                                                $KERJA +=$val;    
                                            }
                                            
                                        }
                                        $var = 0;
                                        if ($e == 'masuk') {
                                           // echo 'status';
                                            
                                            foreach ($f as $key=>$value){
                                            //echo date("H:i", strtotime($value));
                                                if(empty($value)){
                                                    echo '<tr>';
                                                    echo '<td  style="font-size:12px; text-align: center;">';
                                                    echo "IN!";
                                                    echo '</td>';
                                                }
                                               $var =  date("H:i", strtotime($value));
                                               if($var==true){
                                                    $var = $var;    
                                               }
                                            }

                                        }
                                        if ($var != 0) {
                                            echo $var;
                                        }

                                        if ($e == 'keluar') {
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
                        }

                        ?>
                       
                       </tbody>
                    </table>
                    </div>
                        </div>
                    </div>
                </div>
            </div>

