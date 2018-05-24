<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- START SIDEBAR-->
        <nav class="page-sidebar">
            <ul class="side-menu metismenu scroller">
            	<li <?php if(!empty($dashboard)){ echo $dashboard; } ?> >
                    <a href="<?php echo site_url('backend/dashboard'); ?>">{lang_dashboard}</a>
                </li>
            	<li class="heading">SETTING</li>
                <li <?php if(!empty($active)){ echo $active = $active; } ?> >
                    <a href="javascript:;"><i class="sidebar-item-icon ti-settings"></i>
                        <span class="nav-label">User Setting</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        
                        <li>
                            <a href="<?php echo base_url();?>backend/users/add"> {lang_add_user}</a>
                        </li>
                        <li>
                            <a  href="<?php echo site_url('backend/users'); ?>">{lang_users}</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('backend/groups'); ?>">{lang_security_groups}</a>
                        </li>
                        <li <?php if(!empty($config)){ echo $config = $config; } ?> >
                            <a href="javascript:;">
                                <span class="nav-label">Configuration</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="#"> Company Information</a>
                                </li>
                                <li>
                                    <a href="#"> Allowance</a>
                                </li>

                                <li>
                                    <a href="#"> Deduction</a>
                                </li>

                                 <li>
                                    <a href="<?php echo base_url();?>backend/config/departement"> Departement</a>
                                </li>

                                <li>
                                    <a href="#"> Outsource</a>
                                </li> 

                                <li>
                                    <a href="<?php echo base_url();?>backend/config/worktime"> Work Time</a>
                                </li> 

                                <li>
                                    <a href="<?php echo base_url();?>backend/config/grouptime"> Group Event</a>
                                </li>

                               

                                <li>
                                    <a href="#"> Machine</a>
                                </li>

                                    
                            </ul>
                        </li>
                        
                        <li>
                            <a href="<?php echo site_url('backend/maintenance'); ?>">{lang_maintenance} (beta)</a>
                        </li>
                    </ul>
                </li>
              
                 
               <li class="heading">MENU</li>
              <li <?php if(!empty($employee)){ echo $employee; } ?> >
                    <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                        <span class="nav-label">Employee</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        
                        <li>
                            <a  href="<?php echo site_url('backend/employee/add'); ?>">Add Employee</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('backend/employee/'); ?>">Employee Data</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('backend/employee/group'); ?>">Positioning</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>backend/employee/schedule"> Calendar Events</a>
                        </li>  
                       
                    </ul>
                </li>
                 <li <?php if(!empty($report)){ echo $report; } ?> >

                    <a href="javascript:;"><i class="sidebar-item-icon ti-layout-tab-window"></i>
                        <span class="nav-label">{lang_report}</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?php echo site_url('backend/report'); ?>">Calculation </a>
                        </li>
                        
                    </ul>
                </li>
                <li <?php if(!empty($logs)){ echo $logs; } ?> >

                    <a href="javascript:;"><i class="sidebar-item-icon ti-server"></i>
                        <span class="nav-label">Log Data</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?php echo site_url('backend/pull'); ?>">Get Log From Machine</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('backend/log'); ?>">List Log</a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- END SIDEBAR-->
