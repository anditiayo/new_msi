            <!-- START PAGE CONTENT-->
            <!-- <div class="page-heading">
                <h1 class="page-title"><?$subtitle?></h1>
            </div> -->
            <div class="page-content fade-in-up">
                <div class="ibox">

            <div class="ibox-head">
                        <div class="ibox-title">LOG</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/add"> <i class="ti-pencil"></i>Add Time</a> -->
                                <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#ModalaAdd"><i class="ti-pencil"></i>Add Log</a>
                               <!--  <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/import"> <i class="la la-sign-in"></i>{lang_import_list}</a>

                                <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/export"> <i class="la la-sign-out"></i>{lang_export_list}</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                       
                         <div class="flexbox mb-4">
                            <div class="flexbox">
                                 <div class="form-group" id="date_5">
                                    <label class="font-normal">Range select</label>
                                    <?php echo form_open(current_url());

                                    	if(!empty($start))
                                    	{
                                    		$start 	= $start;
                                    		$end 	= $end;
                                    	}else
                                    	{
                                    		$start 	= date("m/d/Y");
                                    		$end 	= date("m/d/Y");
                                    	}

                                    ?>

                                    <div class="input-daterange input-group" id="datepicker">
                                        <input class="input-sm form-control" type="text" name="start" id="start" value="<?=$start;?>">
                                        <span class="input-group-addon pl-2 pr-2">to</span>
                                        <input class="input-sm form-control" type="text" name="end" id="end" value="<?=$end;?>">
                                       
                                    </div>
                                     <label class="mb-0 mr-2"></label>
                                   	<div class="input-daterange input-group" >
                                   		<?php echo form_submit('submit', 'FIND', array('class' => 'btn btn-primary')); ?>
                                   	</div>
		                             <?php echo form_close(); ?>
		                            
                                </div>
                            </div>
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                            </div>
                        </div>
                        <div class="table-responsive row">

                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>PIN</th>
                                        <th>DATETIME</th>
                                        <th>DATE</th>
                                        <th>TIME</th>
                                        <th>WEEK</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                	 <?PHP
                                	 	

                                    	if(!empty($log_data)){
                                    		foreach ($log_data as $key) {
                                    		echo "<tr>";
                                    		echo "<td>";
                                    		echo sprintf("%'04d", $key['pin']);
                                    		echo "</td>";
                                    		echo "<td>";
                                    		echo $key['date_time'];
                                    		echo "</td>";
                                    		echo "<td>";
                                    		echo $key['tgl'];
                                    		echo "</td>";
                                    		echo "<td>";
                                    		echo $key['waktu'];
                                    		echo "</td>";
                                    		echo "<td>";
                                    		echo $key['day'];
                                    		echo "</td>";
                                    		echo "<td>";
                                            if($key['status'] == 0){
                                                echo 'Masuk';
                                            }else{
                                                echo 'Keluar';
                                            }
                                    		echo "</td>";
                                    		echo "<td >";
                                    		echo '<a class="btn btn-warning" href="log/edit/'.$key['id'].'">EDIT</a>';

                                    		echo "</td>";
                                    		echo "</tr>";

                                            $tgl = $key['tgl'];
                                    		}
                                    	}
                                    	

                                    ?>
                                  
                                   
                                </tbody>
                            </table>
                                    <?php
                                    $pin = isset($_GET['pin']) ? $_GET['pin'] : '';
                                    ?>
                                    <!-- MODAL ADD -->
                                        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="myModalLabel">Add Log</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                
                                            </div>
                                            <?php echo form_open('backend/log/add_log_manual'); ?>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="control-label col-xs-3" >PIN</label>
                                                        <div class="col-xs-9">
                                                            <input name="pin" id="pin" class="form-control" type="text" style="width:335px;" value="<?=$pin;?>" readonly required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input class="form-control" id="daterange_3" name="date" type="text" value="<? echo date('m/d/Y',strtotime($tgl)); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Time</label>
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-clock-o"></span>
                                                            </span>
                                                            <input class="form-control" type="text" name="time" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-control-label">Status</label>
                                                        <div>
                                                            <select name="status" class="selectpicker show-tick form-control" data-width="200px">
                                                                <option selected="" disabled=""> == SELECT ==</option>
                                                                <option value="0" >Masuk</option>
                                                                <option value="1" >Keluar</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                                        <!--END MODAL ADD-->
                        </div>
                    </div>
                </div>
            </div>

