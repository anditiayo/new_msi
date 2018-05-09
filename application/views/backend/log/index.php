            <!-- START PAGE CONTENT-->
            <!-- <div class="page-heading">
                <h1 class="page-title"><?$subtitle?></h1>
            </div> -->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">LOG</h5>
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
                                	 	

                                    	if(!empty($log)){
                                    		foreach ($log as $key) {
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
                                    		echo $key['status'];
                                    		echo "</td>";
                                    		echo "<td >";
                                    		echo '<a class="btn btn-warning" href="log/edit/'.$key['id'].'">EDIT</a>';

                                    		echo "</td>";
                                    		echo "</tr>";
                                    		}
                                    	}
                                    	

                                    ?>
                                  
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
