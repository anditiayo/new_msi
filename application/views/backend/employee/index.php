<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>               
            <div class="page-heading">
                <h1 class="page-title">Employee</h1>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                                <div class="ibox-title">List Employee</div>
                                <div class="ibox-tools">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/add"> <i class="ti-pencil"></i>{lang_add_user}</a>

                                        <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/import"> <i class="la la-sign-in"></i>{lang_import_list}</a>

                                        <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/export"> <i class="la la-sign-out"></i>{lang_export_list}</a>

                                        
                                    </div>
                                </div>
                            </div>
                    <div class="ibox-body">
                        
                         <div class="flexbox mb-4">
                            <div class="flexbox">
                                 <div class="form-group" id="date_5">
                                    
                                    
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
                                        <th>NIK</th>
                                        <th>FIRST NAME</th>
                                        <th>LAST NAME</th>
                                        <th>JOIN</th>
                                        <th>STATUS</th>
                                        <th>HAVE WORKED</th>
                                        <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?PHP
                                        if(!empty($employee_date)){
                                            foreach ($employee_date as $key) {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo sprintf("%'04d", $key['employee_id']);
                                            echo "</td>";
                                            echo "<td>";
                                            echo $key['first_name'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $key['mid_name'].' '.$key['last_name'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $key['join_in'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo status($key['status']);
                                            echo "</td>";
                                            echo "<td>";
                                                if($key['join_in'] == '0000-00-00'){
                                                    echo '';
                                                }else
                                                echo umur($key['join_in']);
                                            
                                            echo "</td>";
                                            echo "<td >";
                                            echo '<a class="btn btn-warning" href="employee/edit/'.$key['employee_id'].'">EDIT</a>';

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

                        