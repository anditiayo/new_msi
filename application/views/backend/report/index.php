<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!-- START PAGE CONTENT-->

    <script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
        <div class="ibox" >
            <div class="ibox-body">
                <h5 class="font-strong mb-4">REPORT</h5>
                <div class="flexbox mb-8">
                    <? echo form_open(current_url()); ?>
                    <div class="flexbox">
                       
                        <select class="form-control show-tick" id="type-filter" name="departement" title="Please select" data-style="btn-solid" data-width="150px">
                             <option selected disabled>Please select</option>
                            <?
                               
                               
                                foreach ($departement as $key => $value) {
                                     if($departementback == $value['id']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                    echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['label'].'</option>';
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

                            <div class="input-daterange input-group" id="datepicker">
                                <input class="input-sm form-control" type="text" name="start" id="start" value="<?=$start;?>">
                                <span class="input-group-addon pl-2 pr-2">to</span>
                                <input class="input-sm form-control" type="text" name="end" id="end" value="<?=$end;?>">

                            </div>

                    </div>
                </div>
                </div>
                
                <div class="flexbox mb-4">
                    <?php echo form_submit('submit', 'FIND', array('class' => 'btn btn-primary')); ?>
                    <input type="button" class="btn btn-primary'" onclick="printDiv('innerdiv')" value="Print" />
                    
                   <!--  <a class="btn btn-primary" href='#'>Confirm</a> -->
                    
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
                                margin-left: 25.01em;
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
                                width: 10em;
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
                                        <th class=''>POT/HARI</th>
                                        <th class=''>PERIOD</th>
                                        <th class=''>OT</th>
                                        <th class=''>TOTALUPAH</th>
                                        <th class=''>MASAKERJA</th>
                                        <th class=''>UANGSHIFT</th>
                                        <th class=''>OVERTIME</th>
                                        <th class=''>TOTALAWAL</th>
                                        <th class=''>POTJHT</th>
                                        <th class=''>POTBPJS</th>
                                        <th class=''>POTPENSIUN</th>
                                        <th class=''>POTPPH21</th>
                                        <th class=''>BAYAR</th>
                                        <th class=''>LAIN2</th>
                                        <th class=''>IURANKOP</th>
                                        <th class=''>PINJKOP</th>
                                        <th class=''>AKHIR</th>
                                        <th class=''>TOTAL</th>
                                       
                                    </tr>
                                   

                                </thead>

                                <tbody>

                                    <?php
                                           /*echo '<pre>';
                                            print_r($bydate);*/
                                            global $countJam;
                                            global $countErr;
                                            global $countPermit;
                                            global $countJam;

                                            $hitung = 1;
                                            foreach ($bydate as $key1 => $param1) {
                                                echo "<tr style='overflow: visible;'>";
                                                echo "<td class='headcol-1'>";
                                                    echo $hitung;
                                                echo "</td>";
                                                echo "<td class='headcol2' >";
                                                    $code = $key1;
                                                    echo get_groups($code).' '.sprintf("%'04d", $code);     
                                                echo "</td>";
                                                echo "<td class='headcol'>";
                                                    echo get_employee($code);
                                                echo '</td>'; 
                                                
                                                
                                                $countHari  = 0;
                                                //echo '<td>'.count($param1).'</td>';
                                                //echo "</tr>";
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
                                                   
                                                    $countHari   += 1;

                                                    if($day == $d)
                                                    {
                                                        $countJam  = 0;
                                                        $countErr  = 0;
                                                        $countPermit  = 0;
                                                        $SHIFT3    = 0;
                                                        $HK = 0;
                                                        $COUNTOT   = 0;
                                                        $COUNTLEMBUR = 0; 
                                                    }

                                                    foreach ($param2 as $key3 => $param3) {
                                                        $tgl            = date("Ymd", strtotime($param3['DATES']));
                                                        $NIK            = $param3['NIK'];
                                                        $DATES          = $param3['DATES'];
                                                        $FNAME          = $param3['FNAME'];
                                                        $LNAME          = $param3['LNAME'];
                                                        $JAMMASUK       = $param3['JAMMASUK'];
                                                        $JAMKELUAR      = $param3['JAMKELUAR'];
                                                        $JOININ         = $param3['JOININ'];
                                                        $NPOSISI        = $param3['NPOSISI'];
                                                        $NSTATUS        = $param3['NSTATUS'];
                                                        $GAJI           = $param3['GAJI'];
                                                        $GROUPID        = $param3['GROUPID'];
                                                        $GROUPSHIFTNAME = $param3['GROUPSHIFTNAME'];
                                                        $GROUPNAME      = $param3['GROUPNAME'];
                                                        $EVENTIN        = $param3['EVENTIN'];
                                                        $EVENTOUT       = $param3['EVENTOUT'];
                                                        $REGULARTIMENAME    = $param3['REGULARTIMENAME'];
                                                        $REGULARIN      = $param3['REGULARIN'];
                                                        $REGULAROUT     = $param3['REGULAROUT'];
                                                        $DATES          = $param3['DATES'];
                                                        $OVERTIME       = $param3['OVERTIME'];
                                                        $SIMPANAN       = $param3['SIMPANAN'];
                                                        $JMLPINJAMAN    = $param3['JMLPINJAMAN'];
                                                        $CICILAN        = $param3['CICILAN'];
                                                        $TODATE         = $param3['TODATE'];
                                                        $FROMDATE       = $param3['FROMDATE'];
                                                        $SUBTITUTE      = $param3['SUBTITUTE'];
                                                        $PERMITS        = $param3['PERMITS'];
                                                        $NPERMITS       = $param3['NPERMITS'];
                                                        $NICKPERMITS    = $param3['NICKPERMITS'];
                                                        $OVERTIMESTATS  = $param3['OVERTIMESTATS'];
                                                        $ALLOWANCE      = $param3['ALLOWANCE'];
                                                        $BPSJKET        = $param3['BPSJKET'];
                                                        $BPSJKES        = $param3['BPSJKES'];
                                                        $PENSIUN        = $param3['PENSIUN'];
                                                        $WORKHOUR       = $param3['WORKHOUR'];
                                                        $DATAIN         = $param3['DATAIN'];
                                                        $DATAOUT        = $param3['DATAOUT'];
                                                        $SHIFT          = $param3['SHIFT'];
                                                        
                                                        $REALIND        = $param3['REALIND'];
                                                        $REALIN         = $param3['REALIN'];
                                                        $REALOUT        = $param3['REALOUT'];

                                                        $OT             = $param3['OTTIME'];
                                                        $OTSTAT         = $param3['OTSTAT'];
                                                        $OTHOUR         = $param3['OTHOUR'];
                                                        $LEMBUR         = $param3['LEMBUR'];
                                                        $POINT         = $param3['POINT'];

                                                        $WORKHOUROT     = $param3['WORKHOUROT'];

                                                                
                                                        
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

                                                        $COUNTLEMBUR    += $LEMBUR;
                                                        $COUNTOT        += $POINT;
                                                        /*if($OTS == 1){
                                                            $style = 'color:pink;';
                                                            $COUNTOT += $POINT;
                                                            $COUNTLEMBUR += $LEMBUR;
                                                        }else{
                                                            
                                                            $COUNTOT +=  0;
                                                        }*/

                                                        //cek ganti hari
                                                        /*if($SUBTITUTE == 'FR' || $SUBTITUTE == 'TO'){
                                                            $SUB = 1;
                                                        }else{
                                                            $SUB = 0;
                                                        }*/

                                                        //cek ijin
                                                       /* if($NICKPERMITS != ''){
                                                            $NICKPERMITS = $NICKPERMITS; 
                                                        }else{
                                                            $NICKPERMITS = 0;
                                                        }*/

                                                        //cek jadwal
                                                        if($EVENTIN != '' AND $EVENTOUT != ''){
                                                            $event = 1;
                                                        }else{
                                                            $event = 'NO EVENT';
                                                        }

                                                        //cek shift3
                                                        if($SHIFT == 3){
                                                            $background = 'background:yellow;color:black;';
                                                            $CEKSHIFT3 = 1;
                                                        }else{
                                                            $background = 'background:transparent;color:black;';
                                                            $CEKSHIFT3 = 0;
                                                        }

                                                        if($WORKHOUR != NULL){
                                                            
                                                            if($WORKHOUR == '00:00:00'){

                                                                if($EVENTIN != '' && $JAMMASUK == '' && $JAMKELUAR == ''){
                                                                    $datenow = date('Y-m-d');

                                                                    if($datenow <= $DATES){
                                                                        $status = '';
                                                                        $background = '';
                                                                        $link ='';
                                                                    }else{
                                                                        if($NICKPERMITS != ''){
                                                                            $status = $NICKPERMITS;
                                                                            $background = 'padding:2px;background:red;color:white;';
                                                                            $link = 'employee/leave';
                                                                            $countPermit += 1;
                                                                        }else if($SUBTITUTE == 'FR'){
                                                                            $status = 'GH'.$SUBTITUTE;
                                                                            $background = 'padding:2px;background:orange;color:black;';
                                                                            $link = 'employee/subtitute';
                                                                        }else if($SUBTITUTE == 'TO'){
                                                                            $status = 'GH'.$SUBTITUTE;
                                                                            $background = 'padding:2px;background:orange;color:black;';
                                                                            $link = 'employee/subtitute';
                                                                        }else{
                                                                            $status = 'M';
                                                                            $background = 'padding:2px;background:red;color:white;';
                                                                            $countErr += 1;
                                                                            $link = 'employee/leave';
                                                                        }
                                                                        
                                                                        
                                                                    }
                                                                }else if($EVENTIN != '' && $JAMMASUK != '' && $JAMKELUAR == ''){
                                                                    if($SHIFT == 3){
                                                                        $status = '';
                                                                        $background = '';
                                                                        $link ='';
                                                                    }else{
                                                                        $status = 'EDIT';
                                                                        $background = 'padding:2px;background:blue;color:white;';
                                                                        $link = 'log';
                                                                    }
                                                                }else if($EVENTIN != '' && $JAMMASUK == '' && $JAMKELUAR != ''){
                                                                    if($SHIFT == 3){
                                                                        $status = '';
                                                                        $background = '';
                                                                        $link ='';
                                                                    }else{
                                                                        $status = 'EDIT';
                                                                        $background = 'padding:2px;background:blue;color:white;';
                                                                        $link = 'log';
                                                                    }
                                                                }else if($EVENTIN == '' && $JAMMASUK != '' && $JAMKELUAR != ''){
                                                                    $status = 'EV';
                                                                    $background = 'color:green;';
                                                                    $link = 'employee/schedule';
                                                                }else {
                                                                    $status = '';
                                                                    $background = '';
                                                                    $link ='';
                                                                }


                                                                /*$status = 'EDIT'.$JAMMASUK.'='.$JAMKELUAR.'+'.$EVENTIN;
                                                                $background = 'background:blue;color:black;';*/

                                                            }else{
                                                                $status = decimalHours($WORKHOUR);
                                                                $HK = 1;
                                                                $link = 'log';
                                                            }
                                                            
                                                        }else{

                                                            if($event == 1 ){
                                                                $datenow = date('Y-m-d');

                                                                if($datenow <= $DATES){
                                                                    $status = '';
                                                                        $background = '';
                                                                        $link ='';
                                                                }else{

                                                                    if($NICKPERMITS != ''){
                                                                        $status = $NICKPERMITS;
                                                                        $background = 'padding:2px;background:grey;color:white;';
                                                                        
                                                                        $link = 'employee/leave';
                                                                    }else{
                                                                        $status = 'M';
                                                                        $background = 'padding:2px;background:red;color:white;';
                                                                        $countErr += 1;
                                                                        $link = 'employee/leave';
                                                                    }
                                                                    
                                                                }
                                                                
                                                            
                                                            }else if($event == 'NO EVENT' ){
                                                                if($OVERTIMESTATS != ''){
                                                                    $status = sprintf('%0.2f', decimalHours($WORKHOUROT));
                                                                    $background = 'color:green;';
                                                                    $link = 'employee/schedule';
                                                                }else if($SUBTITUTE == 'FR'){
                                                                    $status = 'GH'.$SUBTITUTE;
                                                                    $background = 'padding:2px;background:orange;color:black;';
                                                                    $link = 'employee/subtitute';
                                                                }else if($SUBTITUTE == 'TO'){
                                                                    $status = 'GH'.$SUBTITUTE;
                                                                    $background = 'padding:2px;background:orange;color:black;';
                                                                    $link = 'employee/subtitute';
                                                                }else{

                                                                    $status = 'EV';
                                                                    $background = 'padding:2px;background:green;color:white;';
                                                                    $link = 'employee/schedule';
                                                                }
                                                                
                                                                
                                                            }

                                                            
                                                        }
                                                        if($OVERTIMESTATS != ''){
                                                            $star = '<span style="color:red;"">&#42;</span>';   
                                                        }else{
                                                            $star = '';   
                                                        }
                                                        
                                                        echo '<a style="font-size:13px; text-align: center;padding:1px;'.$background.'" href="'.$link.'?tgl='.$tgl.'&pin='.$code.'" target="_blank">'.$status.'</a>'.$star;
                                                        
                                                        $SHIFT3+=$CEKSHIFT3;
                                                        
                                                       
                                                        
                                                        
                                                    }
                                                    echo '</td>';
                                                }

                                                ?>
                                                   
                                                <?

                                                $GAJI_PERHARI        = $GAJI/30;
                                                $ALLOWANCE_PER_HARI   = $ALLOWANCE/30;


                                                #POTONGAN
                                                $POT_TIDAK_MASUK_GAJI       = $countErr*$GAJI_PERHARI;
                                                $POT_TIDAK_MASUK_ALLOWANCE  = $countErr*$ALLOWANCE_PER_HARI;
                                                $POT_IJIN_ALLOWANCE         = $countPermit*$ALLOWANCE_PER_HARI;
                                                
                                                #TUNJANGAN
                                                $TOTAL_ALLOWANCE             =  $ALLOWANCE - $POT_IJIN_ALLOWANCE - $POT_TIDAK_MASUK_ALLOWANCE;

                                                $TOTAL_POTONGAN_TIDAK_MASUK  = $POT_TIDAK_MASUK_GAJI+$POT_TIDAK_MASUK_ALLOWANCE+$POT_IJIN_ALLOWANCE;

                                                $H = floor($COUNTOT/60) ? floor($COUNTOT/60) .'' : '';
                                                $M = $COUNTOT%60 ? $COUNTOT%60 .'' : '';

                                                $TOTALAWAL          = $GAJI+$ALLOWANCE+$COUNTLEMBUR-$TOTAL_POTONGAN_TIDAK_MASUK;
                                                $BAYAR              = $TOTALAWAL-$BPSJKET-$BPSJKES-$PENSIUN;
                                                $AKHIR              = $BAYAR-$SIMPANAN-$CICILAN;

                                                echo '<td>'.($countHari-$countErr).'</td>';
                                                echo '<td>'.$SHIFT3.'</td>';
                                                echo '<td>'.$countErr.'</td>';
                                                echo '<td>'.$countHari.'</td>';
                                                echo '<td>'.$COUNTOT.'</td>';
                                                echo '<td style="text-align:right;">'.number_format($GAJI).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($TOTAL_ALLOWANCE).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($SHIFT3*3000).'</td>';
                                                echo '<td>'.number_format($COUNTLEMBUR).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($TOTALAWAL).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($BPSJKET).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($BPSJKES).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($PENSIUN).'</td>';
                                              
                                                echo '<td style="text-align:right;">0</td>';
                                                echo '<td style="text-align:right;">'.number_format($BAYAR).'</td>';
                                                echo '<td style="text-align:right;"><input type="text"  name="lain2"></td>';
                                                echo '<td style="text-align:right;">'.number_format($SIMPANAN).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($CICILAN).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($AKHIR).'</td>';
                                                echo '<td style="text-align:right;">'.number_format($AKHIR).'</td>';
                                               
                                                
                                               
                                                echo "</tr>";
                                                $hitung++;
                                            }
/*                                            $hitung = 1;
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
                                                        $NICKSUB    = $param3['NICKSUB'];
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
                                                        }


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
                                                                }else if($NICKSUB==TRUE){
                                                                    $jam = 0;
                                                                    $status = $NICKSUB;
                                                                    $background = 'color:red;';
                                                                    $link = 'employee/leave';
                                                                    $countErr += 1;
                                                                    
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
                                                $GAJI = $SALARY-($GAJIPERHARI*$countErr);
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
                                                //echo '<td style="text-align:right;">'.number_format($TUNJANGAN).'</td>';
                                                //echo '<td>'.$countJam.'</td>';
                                                
                                               
                                                echo "</tr>";
                                                $hitung++; 
                                            }
                                           echo "<tr>";
                                          // echo '<td colspan="'.($TOTALHARI+15).'" style="text-align:right;">'.number_format($JUMPENSIUN).'</td>';
                                           echo '<td colspan="'.($TOTALHARI+16).'" style="text-align:right">'.number_format($JUM).'</td>';

                                           
                                           echo "</tr>";*/
                                           
                                          

                                           
                                ?>

                                </tbody>
                            </table>

                        </div>
                         <?php  } ?>
                    </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
    orientation: 'bottom'
})
    </script>