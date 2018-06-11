<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!-- START PAGE CONTENT-->

        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">REPORT</h5>
                <div class="flexbox mb-4">
                    <? echo form_open(current_url()); ?>
                    <div class="flexbox">
                        <label class="mb-0 mr-2">Departement</label>
                        <select class="form-control show-tick" id="type-filter" name="departement" title="Please select" data-style="btn-solid" data-width="150px">
                             <option selected disabled>Please select</option>
                            <?
                                 if($departementback == $value['status_id']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                foreach ($departement as $key => $value) {
                                    echo '<option value="'.$value['id'].'" >'.$value['label'].'</option>';
                                }
                            ?>
                        </select>
                        <label class="mb-0 mr-2"></label>
                        <label class="mb-0 mr-2">Status</label>
                        <select class="show-tick form-control" id="type-filter" name="status" title="Please select" data-style="btn-solid" data-width="150px">
                             <option selected disabled>Please select</option>
                             <?

                                foreach ($status as $key => $value) {
                                    if($statusback == $value['status_id']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                    echo '<option value="'.$value['status_id'].'" '.$selected.'>'.$value['status'].'</option>';
                                }
                            ?>
                        </select>
                        <label class="mb-0 mr-2"></label>
                       

                    </div>
                </div>
                <div class="flexbox mb-4">
                    <div class="form-group" id="date_5">
                        <label class="font-normal">Range select</label>
                        <?php 

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
                                overflow-x: scroll;
                                margin-left: 20.01em;
                                padding-top: -10px;
                                overflow-y: visible;
                                padding-bottom: 1px;
                            }
                            
                            .headcol-1 {
                                position: absolute;
                                width: 3em;
                                left: 1EM;
                                right: 5em;
                                top: auto;
                                border-right: 0px none black;
                                border-top-width: 3px;
                                /*only relevant for first row*/
                                margin-top: -3px;
                                /*compensate for top border*/
                                /*background:yellow;*/
                            }
                            
                            .headcol-1:before {}
                            
                            .headcol {
                                position: absolute;
                                width: 11em;
                                left: 4em;
                                right: 5em;
                                top: auto;
                                border-right: 0px none black;
                                border-top-width: 3px;
                                /*only relevant for first row*/
                                margin-top: -3px;
                                /*compensate for top border*/
                                /*background:yellow;*/
                            }
                            
                            .headcol2 {
                                position: absolute;
                                width: 5em;
                                left: 15em;
                                right: 6em;
                                top: auto;
                                border-right: 0px none black;
                                border-top-width: 3px;
                                /*only relevant for first row*/
                                margin-top: -3px;
                                /*compensate for top border*/
                                /* background:yellow;*/
                            }
                            
                            .headcol2:before {}
                            
                            .headcol:before {}
                            
                            .long {
                                background: #fff;
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
                                       
                                        <?echo header_date_loop($start,$end);?>
                                            <th class=''>HK</th>
                                            <th class=''>SHIFT3</th>
                                            <th class=''>PER HARI</th>
                                            <th class=''>TOTAL UPAH</th>
                                            <th class=''>MASA KERJA</th>
                                            <th class=''>JAM</th>
                                            
                                            
                                            <th class=''>TOTAL AWAL</th>
                                    </tr>
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php
                                           /*echo '<pre>';
                                            print_r($bydate);*/
                                            $hitung = 1;
                                            global $RECRUITED;
                                            global $SHIFT3;
                                            global $countErr;
                                            global $countJam;
                                            global $SALARY;
                                            foreach ($bydate as $key1 => $param1) {
                                                echo "<tr style='overflow: visible;'>";
                                                echo "<td class='headcol-1'>";
                                                    echo $hitung;
                                                echo "</td>";
                                                echo "<td class='headcol2' >";
                                                    $code = $key1;
                                                    echo sprintf("%'04d", $code);     
                                                echo "</td>";
                                                echo "<td class='headcol'>";
                                                    echo get_employee($code);
                                                echo '</td>'; 
                                                //echo '<td>'.count($param1).'</td>';
                                                $countHari  = 0;

                                                foreach ($param1 as $key2 => $param2) {
                                                    $time   = $key2;
                                                    $sun    = date("D", strtotime($time));
                                                    $day    = date("d", strtotime($time));
                                                    $d      = date("d", strtotime($start));

                                                    if($sun == "Sun"){
                                                        $sun = "background:pink";    
                                                    }else{
                                                        $sun = "background:#FFF";
                                                    }
                                                    
                                                    echo '<td class="long" style="text-align:center;padding:2px; '.$sun.'">';
                                                    if($day == $d)
                                                    {
                                                      
                                                        $countJam  = 0;
                                                        $countErr  = 0;
                                                        $SHIFT3    = 0;
                                                    }


                                                    $countHari   += 1;
                                                    foreach ($param2 as $key3 => $param3) {
                                                        $tgl        = date("Ymd", strtotime($param3['DATE']));
                                                        $SHIFT3     += $param3['SHIFT3'];
                                                        $SALARY     = $param3['SALARY'];
                                                        $RECRUITED  = $param3['RECRUITD'];
                                                        $jam  = decimalHours($param3['WORKHOUR']);
                                                        if($jam == 0){
                                                            echo '<a style="font-size:13px; text-align: center;padding:2px; background:blue;color:white"; href="log?tgl='.$tgl.'&pin='.$code.'" target="_blank">EDIT</a>';
                                                            $countErr += 1;
                                                        }else{
                                                            echo $jam;
                                                            $countJam += $jam;
                                                        } 
                                                    }
                                                    echo '</td>';
                                                   
                                                }
                                                if($countJam == NULL){
                                                    $countHari = 0;
                                                    $GAJIPERHARI = 0;
                                                    $TOTALHARI = 0;
                                                }else{
                                                    $countHari = $countHari;
                                                    $GAJIPERHARI = $SALARY/$countHari;
                                                    $TOTALHARI = $countHari-$countErr;
                                                }
                                                $MASA = masa($RECRUITED);
                                                if($MASA >= 10){
                                                    $TUNJANGAN = 120000;
                                                }else if( $MASA >= 5 && $MASA <= 10){
                                                    $TUNJANGAN = 60000;
                                                }else{
                                                    $TUNJANGAN = 0;
                                                }
                                                $SHIFT3 = $SHIFT3*3000;
                                                $GAJI = $TOTALHARI*$GAJIPERHARI;
                                                $AWAL = $GAJI+$TUNJANGAN+$SHIFT3;

                                                echo '<td>'.$countHari.'</td>';
                                                echo '<td>'.$SHIFT3.'</td>';
                                                echo '<td>'.number_format($GAJIPERHARI).'</td>';
                                                echo '<td>'.number_format($GAJI).'</td>';
                                                echo '<td>'.number_format($TUNJANGAN).'</td>';
                                                echo '<td>'.$countJam.'</td>';
                                                
                                                
                                                echo '<td>'.number_format($AWAL).'</td>';
                                                echo "</tr>";
                                                $hitung++; 
                                            }
/*                                          $hitung = 1;
                                            global $RECRUITED;
                                            global $SHIFT3;
                                            global $countErr;
                                            global $countJam;
                                            global $salary;
                                            foreach ($bydate as $key1 => $param1) {
                                                echo "<tr style='overflow: visible;'>";
                                                echo "<td class='headcol-1'>";
                                                    echo $hitung;
                                                echo "</td>";
                                                echo "<td class='headcol2' >";
                                                    $code = $key1;
                                                    echo sprintf("%'04d", $code);     
                                                echo "</td>";
                                                echo "<td class='headcol'>";
                                                    echo get_employee($code);
                                                echo '</td>'; 
                                                //echo '<td>'.count($param1).'</td>';
                                                $countHari  = 0;
                                                foreach ($param1 as $key2 => $param2) {
                                                    $time   = $key2;
                                                    $sun    = date("D", strtotime($time));
                                                    $day    = date("d", strtotime($time));
                                                    $d      = date("d", strtotime($start));
                                                    if($sun == "Sun"){
                                                        $sun = "background:pink";    
                                                    }else{
                                                        $sun = "background:#FFF";
                                                    }
                                                    echo '<td class="long" style="text-align:center;padding:0.5px; '.$sun.'">';
                                                    if($day == $d)
                                                    {
                                                      
                                                        $countJam  = 0;
                                                        $countErr  = 0;
                                                        $SHIFT3    = 0;
                                                    }


                                                     $countHari   += 1;
                                                    foreach ($param2 as $key3 => $param3) {
                                                        $tgl        = date("Ymd", strtotime($param3['DATE']));

                                                        
                                                        $REAL_IN      = date("H:i", strtotime($param3['REAL_IN']));
                                                        $WORKHOUR      = $param3['WORKHOUR'];
                                                        if($WORKHOUR == 'ERROR1'){
                                                            $countErr += 1;
                                                            echo '<a href="log?tgl='.$tgl.'&pin='.$code.'" target="_blank">EDIT</a>';
                                                        }else if($WORKHOUR == 'ERROR2'){
                                                           $countErr += 1;
                                                            echo '<a href="log?tgl='.$tgl.'&pin='.$code.'" target="_blank">EDIT</a>';
                                                        }else if($WORKHOUR == 'ERROR3'){
                                                            $countErr += 1;
                                                            echo '<a href="log?tgl='.$tgl.'&pin='.$code.'" target="_blank">EDIT</a>';
                                                        }else{
                                                        echo $jam = decimalHours($WORKHOUR);
                                                           //echo $WORKHOUR;
                                                           $countJam += $jam;
                                                        }
                                                        $salary      = $param3['SALARY'];
                                                        $RECRUITED   = $param3['RECRUITED'];
                                                        $SHIFT   = $param3['TIMENAME'];
                                                        if($SHIFT == 'SHIFT3'){
                                                            $SHIFT3 += 1;
                                                        }
                                                        
                                                    }
                                                   
                                                }
                                                $MASA = masa($RECRUITED);
                                                if($MASA >= 10){
                                                    $TUNJANGAN = 120000;
                                                }else if( $MASA >= 5 && $MASA <= 10){
                                                    $TUNJANGAN = 60000;
                                                }else{
                                                    $TUNJANGAN = 0;
                                                }
                                                $TOTALHARI = $countHari-$countErr;
                                                $GAJIPERHARI = $salary/$countHari;
                                                $GAJI = $TOTALHARI*$GAJIPERHARI+$TUNJANGAN;
                                                

                                                echo '<td>'.$TOTALHARI.'</td>';
                                                echo '<td>'.$SHIFT3.'</td>';
                                                echo '<td>'.number_format($GAJIPERHARI).'</td>';
                                                echo '<td>'.number_format($TUNJANGAN).'</td>';
                                                echo '<td>'.$countJam.'</td>';
                                                
                                                
                                                echo '<td>'.number_format($GAJI).'</td>';

                                                $hitung++; 
                                            }*/

                                            /*$hitung = 1;
                                            $total_kerja = 0;
                                            $IN = 0;
                                            $OUT = 0;
                                            $SF = 0;
                                            foreach ($bydate as $key => $value)
                                            {
                                                echo "<tr style='overflow: visible;'>";
                                                echo "<td class='headcol-1'>";
                                                    echo $hitung;
                                                echo "</td>";
                                                echo "<td class='headcol2' >";
                                                    $code = $key;
                                                    echo sprintf("%'04d", $code);     
                                                echo "</td>";
                                                echo "<td class='headcol'>";
                                                    echo get_employee($code);
                                                echo '</td>'; 
                                                echo '<td>'.count($value).'</td>';

                                                foreach ($value as $keys => $val)
                                                {
                                                    $time   = $keys;
                                                    $sun    = date("D", strtotime($time));
                                                    $day    = date("d", strtotime($time));
                                                    if($sun == "Sun"){
                                                        $sun = "background:pink";    
                                                    }else{
                                                        $sun = "background:#FFF";
                                                    }



                                                    echo '<td class="long" style="padding:2px; '.$sun.'">';

                                                    $d      = date("d", strtotime($start));
                                                    if($day == $d)
                                                    {
                                                        $IN     = 0;
                                                        $OUT    = 0;
                                                        $count_in  = 0;
                                                        $count_out = 0;
                                                        $count_sf  = 0;
                                                    }
                                                    foreach ($val as $keyes => $values) {

                                                    echo '<table style="margin:0">';
                                                    echo '<tr>';
                                                        $masuk      = date("H:i", strtotime($values['masuk']));
                                                        $keluar     = date("H:i", strtotime($values['keluar']));
                                                        $tgl        = date("Ymd", strtotime($values['tgl']));
                                                        $HM         = explode(":", $masuk);
                                                        $HK         = explode(":", $keluar);

                                                        timeCount($masuk,$keluar,$code);

                                                        if($masuk == '01:00' && 07 >= $HK[0] && $HK[0]< 15 ){
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:blue;color:white";>';
                                                            echo 'SF'.$count_sf += 0.5;
                                                            echo '</td>';

                                                        }elseif($masuk == '01:00'){
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:red;color:white";>';
                                                            echo '<a href="log?tgl='.$tgl.'&pin='.$code.'" target="_blank">ERR!</a>';
                                                            echo '</td>';
                                                        }else{
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:green;color:white";>';
                                                            echo $masuk;

                                                            echo '</td>';
                                                            $count_in += 0.5;
                                                        }

                                                        if( $keluar == '01:00' &&  $HM[0] > 17  ){
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:blue;color:white";>';
                                                            echo 'SF'.$count_sf += 0.5;
                                                            echo '</td>';

                                                        }elseif($keluar == '01:00'){
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:red;color:white";>';
                                                             echo '<a href="log?tgl='.$tgl.'&pin='.$code.'" target="_blank">ERR!</a>';
                                                            echo '</td>';
                                                        }elseif($HM[0] >= 17 && $HK [0] >= 06 ){
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:yellow;">';
                                                            echo $keluar;
                                                            echo '</td>';
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:blue;color:white";>';
                                                            echo 'SF'.$count_sf += 1;
                                                            echo '</td>';
                                                            $count_out += 0.5;

                                                        }else{
                                                            echo '<td align="right" style="font-size:13px; text-align: center;padding:2px; background:yellow;">';
                                                            echo $keluar;
                                                            echo '</td>';
                                                            $count_out += 0.5;
                                                        }
                                                echo '</tr>';
                                                echo '</table>';
                                                echo '</td>';
                                                if(!empty($count_in)){
                                                   $IN =$count_in;    
                                                }

                                                if(!empty($count_out)){
                                                   $OUT =$count_out;    
                                                }
                                                }

                                                if(!empty($count_sf)){
                                                    $SF = $count_sf;  
                                                }else{
                                                    $SF = 0;  
                                                }

                                                $total_kerja = $OUT+$IN;
                                            }
                                            echo '<td>'.$total_kerja.'</td>';       
                                            echo '<td>'. $SF .'</td>'; 
                                            echo "</tr>";
                                        $hitung++; 
                                    }*/
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>