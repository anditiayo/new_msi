            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title"><?$subtitle?></h1>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">LOG</h5>
                         <div class="flexbox mb-4">
                            <div class="flexbox">
                                 <div class="form-group" id="date_5">
                                    <label class="font-normal">Range select</label>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input class="input-sm form-control" type="text" name="start" value="04/12/2017">
                                        <span class="input-group-addon pl-2 pr-2">to</span>
                                        <input class="input-sm form-control" type="text" name="end" value="08/17/2018">
                                        <button class="btn btn-primary btn-air">FIND</button>
                                    </div>

		                                
		                            
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
                                        <th>TIME</th>
                                        <th>WEEK</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                	 <?PHP
                                    	
                                    	foreach ($log as $key) {
                                    		echo "<tr>";
                                    		echo "<td>";
                                    		echo $key['pin'];
                                    		echo "</td>";
                                    		echo "<td>";
                                    		echo $key['date_time'];
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
                                    		echo '<a class="badge badge-success badge-pill" href="log/'.$key['id'].'">ACTION</a>';
                                    		echo "</td>";
                                    		echo "</tr>";
                                    	}

                                    ?>
                                  
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>