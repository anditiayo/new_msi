<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!-- START PAGE CONTENT-->


        <div class="ibox">
            <div class="ibox-body">
                
                <div class="flexbox mb-8">
                    <? echo form_open(current_url()); ?>
                    <div class="flexbox">
                        <label class="mb-0 mr-2">Departement</label>

                      
                        <label class="mb-0 mr-2"></label>
                       

                    </div>
                    <div class="flexbox mb-4">
                    <div class="form-group" id="date_5">
                        <label class="font-normal"></label>
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


                    </div>
                </div>
                </div>
                
               
                <?php echo form_close(); ?>
                    <div class="table-responsive row">
                        
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
                                        <th class=''>POT/HARI</th>
                                        <th class=''>PERIOD</th>
                                        <th class=''>OT</th>
                                        <th class=''>TOTAL UPAH</th>
                                        <th class=''>MASA KERJA</th>
                                        <th class=''>TOTAL UANG SHIFT</th>
                                        <th class=''>TOTAL OT</th>
                                        <th class=''>TOTAL AWAL</th>
                                        <th class=''>POT JHT</th>
                                        <th class=''>POT BPJS</th>
                                        <th class=''>POT PENSIUN</th>
                                        <th class=''>POT PPH21</th>
                                        <th class=''>BAYAR</th>
                                        <th class=''>LAIN2</th>
                                        <th class=''>IURAN KOP</th>
                                        <th class=''>PINJ KOP</th>
                                        <th class=''>AKHIR</th>
                                        <th class=''>TOTAL BAYAR</th>
                                       
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
                                            global $countPermit;
                                            global $countJam;
                                            global $SALARY;
                                            global $JUM;
                                            global $JUMBPJS;
                                            global $TOTALHARI;
                                            global $PPH21;
                                            global $OT;
                                            global $JUMPENSIUN;
                                            global $COUNTOT ;
                                            global $TUNJANGAN;
                                            global $COUNTLEMBUR;
                                            global $NILAI;

                                           
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
                                                        $countPermit  = 0;
                                                        $SHIFT3    = 0;
                                                        $COUNTOT   = 0;
                                                        $COUNTLEMBUR = 0; 
                                                    }


                                                    $countHari   += 1;
                                                    
                                                    foreach ($param2 as $key3 => $param3) {
                                                        $tgl        = date("Ymd", strtotime($param3['DATE']));
                                                        $SHIFT3     += $param3['SHIFT3'];
                                                        $SALARY     = $param3['SALARY'];
                                                        $RECRUITED  = $param3['RECRUITD'];
                                                        $TUNJANGAN  = $param3['ALLOWANCE'];
                                                        $OT         = $param3['OTTIME'];
                                                        $OTS        = $param3['OTSTAT'];
                                                        $OTHOUR     = $param3['OTHOUR'];
                                                        $REALOUT    = $param3['REALOUT'];
                                                        $EDATEOUT   = $param3['EDATEOUT'];
                                                        $POINT      = $param3['POINT'];
                                                        $LEMBUR     = $param3['LEMBUR'];
                                                        $NICKSTATUS = $param3['NICKSTATUS'];
                                                        $NILAI      = $param3['NILAI'];
                                                        
                                                        /*if($OTSTAT == 1){
                                                            for($i=0 ; $i < $OTHOUR ; $i++){
                                                                
                                                                $COUNTOT += $OT;
                                                                $DATEOT15 = date("Y-m-d H:i:s", strtotime('+'.$i.'hour +15 minutes',strtotime($EDATEOUT)));
                                                                $DATEOT45 = date("Y-m-d H:i:s", strtotime('+'.$i.'hour +45 minutes',strtotime($EDATEOUT)));
                                                                if($EDATEOUT > $DATEOT15 && $EDATEOUT < $DATEOT45){
                                                                    $COUNTOT += 0.5;
                                                                }else if( $EDATEOUT > $DATEOT45){}

                                                            } 
                                                        }*/


                                                        if($OTS == 1){
                                                            $style = 'color:red;';
                                                            $COUNTOT += $POINT;
                                                            $COUNTLEMBUR += $LEMBUR;
                                                        }else{
                                                            $style = 'color:black;';
                                                            $COUNTOT +=  0;
                                                        }
                                                        
                                                        $EMPID = $param3['EMPID'];                                                        

                                                        if($EMPID != NULL){

                                                            if($param3['WORKHOUR'] == ''){
                                                                if($NICKSTATUS == true){
                                                                    $jam = 0;
                                                                    $status = $NICKSTATUS;
                                                                    $background = 'color:red;';
                                                                    $link = 'employee/leave';
                                                                    $countErr += 1;
                                                                    $countPermit += $NILAI;
                                                                }else{
                                                                    $jam = 0;
                                                                    $status = 'M';
                                                                    $background = 'color:red;';
                                                                    $link = 'employee/leave';
                                                                    $countErr += 1;
                                                                }
                                                               
                                                            }else if($param3['WORKHOUR'] == '00:00:00'){
                                                                $jam = 0;
                                                                $status = 'EDIT';
                                                                $background = 'background:blue;color:white;';
                                                                $link = 'log';
                                                                $countErr += 1;
                                                            }else{
                                                                $jam  = decimalHours($param3['WORKHOUR']);
                                                                $background = 'color:red;';
                                                            }
                                                           
                                                            if($jam == 0){
                                                       echo '<a style="font-size:13px; text-align: center;padding:2px;'.$background.'" href="'.$link.'?tgl='.$tgl.'&pin='.$code.'" target="_blank">'.$status.'</a>';
                                                                $countJam += $jam;
                                                            }else{
                                                                echo '<a style="'.$style.'">'.$jam.'</a>';
                                                                $countJam += $jam;
                                                            }
                                                            
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
                                                

                                                if($countHari > 0){
                                                    if($countErr == true){
                                                        $TUNJANGAN = $TUNJANGAN-($TUNJANGAN/30*$countErr);
                                                    }else{
                                                        $TUNJANGAN = $TUNJANGAN*1;    
                                                    }
                                                    
                                                
                                                }else{
                                                    $TUNJANGAN =  $TUNJANGAN*0;
                                                }
                                              
                                                $SHIFT3 = $SHIFT3;
                                                $GAJI = $SALARY-($GAJIPERHARI*$countPermit)+($GAJIPERHARI*$countErr);
                                                $ASTEK = ($SALARY*(getastek($code,12)/100));
                                                $BPJS = ($SALARY*(getbpjs($code,13)/100));
                                                $PENSIUN = ($SALARY*(getpesiun($code,25)/100));
                                                $AWAL = $GAJI+$TUNJANGAN+($SHIFT3*3000)+$COUNTLEMBUR;
                                                $TOTAL = $AWAL-($ASTEK+$BPJS+$PENSIUN);
                                                $JUM += $TOTAL;
                                                $JUMPENSIUN += $PENSIUN;

                                                $H = floor($COUNTOT/60) ? floor($COUNTOT/60) .'' : '';
                                                $M = $COUNTOT%60 ? $COUNTOT%60 .'' : '';

                                                echo '<td>'.($countHari-$countErr).'</td>';
                                                echo '<td>'.$SHIFT3.'</td>';
                                                echo '<td>'.$countErr.'</td>';
                                                echo '<td>'.$countHari.'</td>';
                                                echo '<td>'.$COUNTOT.'</td>';
                                                echo '<td style="text-align:right;">'.number_format($GAJI).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($TUNJANGAN).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($SHIFT3*3000).'</td>';
                                                echo '<td>'.number_format($COUNTLEMBUR).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($AWAL).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($ASTEK).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($BPJS).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($PENSIUN).'</td>';
                                               
                                                echo '<td style="text-align:right;">0</td>';
                                                echo '<td style="text-align:right;">'.number_format($TOTAL).'</td>';
                                                echo '<td style="text-align:right;">LAIN2</td>';
                                                echo '<td style="text-align:right;">KOP</td>';
                                                echo '<td style="text-align:right;">KOP</td>';
                                                echo '<td style="text-align:right;">AKHIR</td>';
                                                echo '<td style="text-align:right;">BAYAR</td>';
                                                /*echo '<td style="text-align:right;">'.number_format($TUNJANGAN).'</td>';
                                                echo '<td>'.$countJam.'</td>';
                                                
                                                
                                                
                                                
                                                */
                                               
                                                echo "</tr>";
                                                $hitung++; 
                                            }
                                           echo "<tr>";
                                          // echo '<td colspan="'.($TOTALHARI+15).'" style="text-align:right;">'.number_format($JUMPENSIUN).'</td>';
                                           echo '<td colspan="'.($TOTALHARI+16).'" style="text-align:right">'.number_format($JUM).'</td>';

                                           
                                           echo "</tr>";
                                           
                                          

                                           
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
    <script type="text/javascript">
        $('#datepicker').datepicker({
    orientation: 'bottom'
})
    </script>
    <body onload="window.print()">