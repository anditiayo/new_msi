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
                                        <th class=''></th>
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
                                        $hitung = 1;
                                        foreach ($employeeSearch as $key) {
                                            echo "<tr style='overflow: visible;'>";
                                            echo "<td class='headcol-1'>";
                                                echo $hitung;
                                            echo "</td>";
                                            echo "<td class='headcol2' >";
                                                echo $code = $key['employee_id'];
                                            echo "</td>";
                                            echo "<td class='headcol'>";
                                                echo $name = $key['first_name']; 
                                            echo '</td>';
                                            echo '<td class="long" style="text-align:center;padding:2px;">';
                                            echo checkloopdate($start,$end,$code); 
                                            echo '</td>';
                                           
                                           $hitung ++;
                                        }
                                       
                                          

                                           
                                ?>

                                </tbody>
                            </table>

                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
    orientation: 'bottom'
})
    </script>