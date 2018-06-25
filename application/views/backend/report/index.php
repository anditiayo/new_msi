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
                         <?php  if ($bydate != ''){  ?>
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
                                                       
                                                        if($param3['WORKHOUR'] == ''){
                                                            $jam = 0;
                                                            $status = 'M';
                                                            $background = 'color:red;';
                                                        }else if($param3['WORKHOUR'] == '00:00:00'){
                                                            $jam = 0;
                                                            $status = 'EDIT';
                                                            $background = 'background:blue;color:white;';
                                                        }else{
                                                            $jam  = decimalHours($param3['WORKHOUR']);
                                                            $background = 'color:red;';
                                                        }
                                                       
                                                        if($jam == 0){
                                                            echo '<a style="font-size:13px; text-align: center;padding:2px;'.$background.'" href="log?tgl='.$tgl.'&pin='.$code.'" target="_blank">'.$status.'</a>';
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
                                                    $GAJIPERHARI = $SALARY/30;
                                                    $TOTALHARI = $countHari;
                                                }
                                                $MASA = masa($RECRUITED);
                                                if($MASA >= 10){
                                                    $TUNJANGAN = 120000;
                                                }else if( $MASA >= 5 && $MASA <= 10){
                                                    $TUNJANGAN = 60000;
                                                }else{
                                                    $TUNJANGAN = 0;
                                                }

                                                if($countHari > 0){
                                                    $TUNJANGAN = $TUNJANGAN*1;
                                                }else{
                                                    $TUNJANGAN =  $TUNJANGAN*0;
                                                }

                                                $SHIFT3 = $SHIFT3;
                                                $GAJI = $SALARY-($GAJIPERHARI*$countErr);
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
                                           

                                           
                                ?>

                                </tbody>
                            </table>

                        </div>
                         <?php  }else{
                                                ECHO 'select the filter';
                                            } ?>
                    </div>
            </div>
        </div>
    </div>