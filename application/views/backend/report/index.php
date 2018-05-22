<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
                                        <th class=''>HK</th>
                                        <?echo header_date_loop($start,$end);?>
                                            <th class=''>HARI</th>
                                            <th class=''>SHIFT 3</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php
                                            /*echo '<pre>';
                                            print_r($bydate);*/

                                            $hitung = 1;
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
                                    }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>