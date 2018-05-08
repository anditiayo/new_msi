<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
        <!-- START HEADER-->
        <header class="header">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                </li>
                <li class="dropdown mega-menu">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:;">Quick Menu</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-arrow"></div>
                        <div class="mega-toolbar-menu">
                            <div class="d-flex">
                                <a class="mega-toolbar-item" href="javascript:;">
                                    <div class="item-icon"><i class="ti-file"></i></div>
                                    <div class="item-name">Reports</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">74 New</div>
                                </a>
                                <a class="mega-toolbar-item" href="javascript:;">
                                    <div class="item-icon"><i class="ti-shopping-cart-full"></i></div>
                                    <div class="item-name">Orders</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">125 New</div>
                                </a>
                            </div>
                            <div class="d-flex">
                                <a class="mega-toolbar-item" href="javascript:;">
                                    <div class="item-icon"><i class="ti-wallet"></i></div>
                                    <div class="item-name">Profit</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">+1200<sup>$</sup></div>
                                </a>
                                <a class="mega-toolbar-item" href="javascript:;">
                                    <div class="item-icon"><i class="ti-support"></i></div>
                                    <div class="item-name">Support</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">54 New Ticket</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
               <!--  <li>
                    <a class="nav-link search-toggler js-search-toggler"><i class="ti-search"></i>
                        <span>Search here...</span>
                    </a>
                </li> -->
            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!--LOGO-->
            <a class="page-brand" href="<?php echo site_url('backend/dashboard'); ?>"><img style="width: 75%; height: 75%" src="<?php echo base_url();?>asets/img/logos/msi.jpg" alt="image" /></a>
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <img src="<?php echo base_url();?>asets/img/users/admin-image.png" alt="image" />
                        <span>{user_fullname}</span>
                    </a>
                    <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                        <div class="dropdown-arrow"></div>
                        <div class="dropdown-header">
                            <div class="admin-avatar">
                                <img src="<?php echo base_url();?>asets/img/users/admin-image.png" alt="image" />
                            </div>
                            <div>
                                <h5 class="font-strong text-white">{user_fullname}</h5>
                                <!-- <div>
                                    <span class="admin-badge mr-3"><i class="ti-alarm-clock mr-2"></i>30m.</span>
                                    <span class="admin-badge"><i class="ti-lock mr-2"></i>Safe Mode</span>
                                </div> -->
                            </div>
                        </div>
                        <div class="admin-menu-features">
                            <a class="admin-features-item" href="javascript:;"><i class="ti-user"></i>
                                <span>PROFILE</span>
                            </a>
                            <a class="admin-features-item" href="javascript:;"><i class="ti-support"></i>
                                <span>SUPPORT</span>
                            </a>
                            <a class="admin-features-item" href="javascript:;"><i class="ti-settings"></i>
                                <span>SETTINGS</span>
                            </a>
                        </div>
                        <div class="admin-menu-content">
                            
                            <div class="d-flex justify-content-between mt-2">
                                
                                <a class="d-flex align-items-center" href="<?php echo site_url('auth/logout'); ?>">Logout<i class="ti-shift-right ml-2 font-20"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- <li class="timeout-toggler">
                    <a class="nav-link toolbar-icon" data-toggle="modal" data-target="#session-dialog" href="javascript:;"><i class="ti-alarm-clock timeout-toggler-icon rel"><span class="notify-signal"></span></i></a>
                </li> -->
                <li class="dropdown dropdown-notification">
                    <a class="nav-link dropdown-toggle toolbar-icon" data-toggle="dropdown" href="javascript:;"><i class="ti-bell rel"><span class="notify-signal"></span></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                        <div class="dropdown-arrow"></div>
                        <div class="dropdown-header text-center">
                            <div>
                                <span class="font-18"><strong>14 New</strong> Notifications</span>
                            </div>
                            <a class="text-muted font-13" href="javascript:;">view all</a>
                        </div>
                        <div class="p-3">
                            <ul class="timeline scroller" data-height="320px">
                                <li class="timeline-item"><i class="ti-check timeline-icon"></i>2 Issue fixed<small class="float-right text-muted ml-2 nowrap">Just now</small></li>
                                <li class="timeline-item"><i class="ti-announcement timeline-icon"></i>
                                    <span>7 new feedback
                                        <span class="badge badge-warning badge-pill ml-2">important</span>
                                    </span><small class="float-right text-muted">5 mins</small></li>
                                <li class="timeline-item"><i class="ti-truck timeline-icon"></i>25 new orders sent<small class="float-right text-muted ml-2 nowrap">24 mins</small></li>
                                <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>12 New orders<small class="float-right text-muted ml-2 nowrap">45 mins</small></li>
                                <li class="timeline-item"><i class="ti-user timeline-icon"></i>18 new users registered<small class="float-right text-muted ml-2 nowrap">1 hrs</small></li>
                                <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>
                                    <span>Server Error
                                        <span class="badge badge-success badge-pill ml-2">resolved</span>
                                    </span><small class="float-right text-muted">2 hrs</small></li>
                                <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>
                                    <span>System Warning
                                        <a class="text-purple ml-2">Check</a>
                                    </span><small class="float-right text-muted ml-2 nowrap">12:07</small></li>
                                <li class="timeline-item"><i class="fa fa-file-excel-o timeline-icon"></i>The invoice is ready<small class="float-right text-muted ml-2 nowrap">12:30</small></li>
                                <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>5 New Orders<small class="float-right text-muted ml-2 nowrap">13:45</small></li>
                                <li class="timeline-item"><i class="ti-arrow-circle-up timeline-icon"></i>Production server up<small class="float-right text-muted ml-2 nowrap">1 days ago</small></li>
                                <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>Server overloaded 91%<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                                <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>Server error<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- <li>
                    <a class="nav-link quick-sidebar-toggler">
                        <span class="ti-align-right"></span>
                    </a>
                </li> -->
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </header>
