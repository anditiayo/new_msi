<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Adminca bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Datatables</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="<?=base_url()?>assets/vendors/dataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?=base_url()?>assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body>
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler" href="<?=base_url()?>#">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                </li>
                <li class="dropdown mega-menu">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?=base_url()?>#">Mega</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-arrow"></div>
                        <div class="mega-toolbar-menu">
                            <div class="d-flex">
                                <a class="mega-toolbar-item" href="<?=base_url()?>#">
                                    <div class="item-icon"><i class="ti-file"></i></div>
                                    <div class="item-name">Reports</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">74 New</div>
                                </a>
                                <a class="mega-toolbar-item" href="<?=base_url()?>#">
                                    <div class="item-icon"><i class="ti-shopping-cart-full"></i></div>
                                    <div class="item-name">Orders</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">125 New</div>
                                </a>
                            </div>
                            <div class="d-flex">
                                <a class="mega-toolbar-item" href="<?=base_url()?>#">
                                    <div class="item-icon"><i class="ti-wallet"></i></div>
                                    <div class="item-name">Profit</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">+1200<sup>$</sup></div>
                                </a>
                                <a class="mega-toolbar-item" href="<?=base_url()?>#">
                                    <div class="item-icon"><i class="ti-support"></i></div>
                                    <div class="item-name">Support</div>
                                    <div class="item-text">Lorem Ipsum is simply dummy.</div>
                                    <div class="item-details">54 New Ticket</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a class="nav-link search-toggler js-search-toggler"><i class="ti-search"></i>
                        <span>Search here...</span>
                    </a>
                </li>
            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!--LOGO-->
            <a class="page-brand" href="<?=base_url()?>index.html">A</a>
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <img src="<?=base_url()?>assets/img/users/admin-image.png" alt="image" />
                        <span>Super User</span>
                    </a>
                    <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                        <div class="dropdown-arrow"></div>
                        <div class="dropdown-header">
                            <div class="admin-avatar">
                                <img src="<?=base_url()?>assets/img/users/admin-image.png" alt="image" />
                            </div>
                            <div>
                                <h5 class="font-strong text-white">Super User</h5>
                                <div>
                                    <span class="admin-badge mr-3"><i class="ti-alarm-clock mr-2"></i>30m.</span>
                                    <span class="admin-badge"><i class="ti-lock mr-2"></i>Safe Mode</span>
                                </div>
                            </div>
                        </div>
                        <div class="admin-menu-features">
                            <a class="admin-features-item" href="<?=base_url()?>#"><i class="ti-user"></i>
                                <span>PROFILE</span>
                            </a>
                            <a class="admin-features-item" href="<?=base_url()?>#"><i class="ti-support"></i>
                                <span>SUPPORT</span>
                            </a>
                            <a class="admin-features-item" href="<?=base_url()?>#"><i class="ti-settings"></i>
                                <span>SETTINGS</span>
                            </a>
                        </div>
                        <div class="admin-menu-content">
                            <div class="text-muted mb-2">Your Wallet</div>
                            <div><i class="ti-wallet h1 mr-3 text-light"></i>
                                <span class="h1 text-success"><sup>$</sup>12.7k</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <a class="text-muted" href="<?=base_url()?>#">Earnings history</a>
                                <a class="d-flex align-items-center" href="<?=base_url()?>auth/logout">Logout<i class="ti-shift-right ml-2 font-20"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="timeout-toggler">
                    <a class="nav-link toolbar-icon" data-toggle="modal" data-target="#session-dialog" href="<?=base_url()?>#"><i class="ti-alarm-clock timeout-toggler-icon rel"><span class="notify-signal"></span></i></a>
                </li>
                <li class="dropdown dropdown-notification">
                    <a class="nav-link dropdown-toggle toolbar-icon" data-toggle="dropdown" href="<?=base_url()?>#"><i class="ti-bell rel"><span class="notify-signal"></span></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                        <div class="dropdown-arrow"></div>
                        <div class="dropdown-header text-center">
                            <div>
                                <span class="font-18"><strong>14 New</strong> Notifications</span>
                            </div>
                            <a class="text-muted font-13" href="<?=base_url()?>#">view all</a>
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
                <li>
                    <a class="nav-link quick-sidebar-toggler">
                        <span class="ti-align-right"></span>
                    </a>
                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar">
            <ul class="side-menu metismenu scroller">
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-home"></i>
                        <span class="nav-label">Dashboards</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>index.html">Visitors</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>dashboard_ecommerce.html">Shop</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>dashboard_blog.html">Blog</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>dashboard_4.html">Dashboard v4</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>dashboard_5.html">Dashboard v5</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>dashboard_6.html">Dashboard v6</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>dashboard_7.html">Dashboard v7</a>
                        </li>
                    </ul>
                </li>
                <li class="heading">FEATURES</li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-paint-roller"></i>
                        <span class="nav-label">Basic UI</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>colors.html">Colors</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>panels.html">Panels</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>#">
                                <span class="nav-label">Tabs</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="<?=base_url()?>tabs-pill.html">Pills</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>tabs-line.html">Line tabs</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>alerts.html">Alerts</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>tooltip_popover.html">Tooltip &amp; Popover</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>badges_progress.html">Badges &amp; Progress</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>lists.html">List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-package"></i>
                        <span class="nav-label">Components</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>toastr.html">Toastr Notifications</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>sweetalert.html">Sweet Alert</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>alertify.html">Alertify</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>idle_timer.html">Idle timer</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>session_timeout.html">Session Timeout</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>code_editor.html">Code Editor</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>tree_view.html">Tree View</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>nestable.html">Nestable List</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>clipboard.html">Clipboard</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>masonry.html">Masonry</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pdf_viewer.html">PDF viewer</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-heart"></i>
                        <span class="nav-label">Buttons</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>#">
                                <span class="nav-label">Base Buttons</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="<?=base_url()?>buttons-default.html">Default style</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>buttons-rounded.html">Rounded style</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>buttons-square.html">Square style</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>buttons-air.html">Air style</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>button-icon.html">Button Icon</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>button-labeled.html">Labeled buttons</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>button-animated.html">Animated buttons</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>buttons-fab.html">FAB buttons</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>button-groups.html">Button Groups</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>button-dropdowns.html">Button dropdowns</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>buttons-social.html">Social Buttons</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-layers-alt"></i>
                        <span class="nav-label">Widgets</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>widgets-statistics.html">Statistics Widgets</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>widgets-list.html">App &amp; List Widgets</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>widgets-user.html">User Widgets</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>widgets-blog.html">Blog Widgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-check-box"></i>
                        <span class="nav-label">Forms</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>#">
                                <span class="nav-label">Form Controls</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="<?=base_url()?>form-controls.html">Inputs</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>form-switch.html">Switch</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>form-checkbox-radio.html">Checkbox &amp; Radio</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>form-input-groups.html">Input Groups</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>form_layouts.html">Form Layouts</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>form_advanced.html">Advanced Plugins</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>form_masks.html">Form input masks</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>form_validation.html">Form Validation</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>text_editors.html">Text Editors</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>form_dropzone.html">Dropzone File Upload</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>image_cropping.html">Image Cropping</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>autocomplete.html">Autocomplete</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>form_wizard.html">Form Wizard</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-layout-tab-window"></i>
                        <span class="nav-label">Tables</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse in">
                        <li>
                            <a href="<?=base_url()?>table_basic.html">Basic Tables</a>
                        </li>
                        <li>
                            <a class="active" href="<?=base_url()?>datatables.html">Datatables</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-bar-chart"></i>
                        <span class="nav-label">Charts</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>charts_flot.html">Flot Charts</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>charts_morris.html">Morris Charts</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>chartjs.html">Chart.js</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>c3.html">C3 Charts</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>charts_peity.html">Peity Charts</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>charts_sparkline.html">Sparkline Charts</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>charts_rickshaw.html">Rickshaw Charts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-map-alt"></i>
                        <span class="nav-label">Maps</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>maps_google.html">Google maps</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>datamaps.html">Datamaps</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>maps_vector.html">Vector maps</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>icons.html"><i class="sidebar-item-icon ti-comments-smiley"></i>
                        <span class="nav-label">Icons</span>
                    </a>
                </li>
                <li class="heading">PAGES</li>
                <li>
                    <a href="<?=base_url()?>mailbox.html"><i class="sidebar-item-icon ti-email"></i>
                        <span class="nav-label">Mailbox</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-pencil"></i>
                        <span class="nav-label">Blog</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>blog_list.html">List</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>article.html">Article</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-shopping-cart"></i>
                        <span class="nav-label">E-Commerce</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>dashboard_ecommerce.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>ecommerce_products_list.html">Products list</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>ecommerce_add_product.html">Add new product</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>ecommerce_orders_list.html">Orders list</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>ecommerce_order_details.html">Order details</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>ecommerce_customers.html">Customers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>calendar.html"><i class="sidebar-item-icon ti-calendar"></i>
                        <span class="nav-label">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-files"></i>
                        <span class="nav-label">General Pages</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>faq.html">FAQ</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>search.html">Search</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>timeline.html">Timeline</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>timeline_horizontal.html">Horizontal timeline</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pricing-table-1.html">Pricing Table v1</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pricing-table-2.html">Pricing Table v2</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pricing-table-3.html">Pricing Table v3</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pricing-table-4.html">Pricing Table v4</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pricing-table-5.html">Pricing Table v5</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>pricing-table-6.html">Pricing Table v6</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-user"></i>
                        <span class="nav-label">Custom Pages</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>#">
                                <span class="nav-label">User Pages</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="<?=base_url()?>profile.html">Profile</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>login.html">Login v1</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>login-2.html">Login v2</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>login-3.html">Login v3</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>login-4.html">Login v4</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>login-5.html">Login v5</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>lockscreen.html">Lockscreen</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>forgot_password.html">Forgot password</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>#">
                                <span class="nav-label">Error Pages</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="<?=base_url()?>error_404.html">404 error</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>error_404-2.html">404 error v2</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>error_403.html">403 error</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>error_500.html">500 error</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>maintenance.html">Maintenance Mode</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>#"><i class="sidebar-item-icon ti-anchor"></i>
                        <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?=base_url()?>#">Level 2</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>#">
                                <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="<?=base_url()?>#">Level 3</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>#">Level 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Datatables</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item">Datatables</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        
                        <div >
                        	<?php echo $contents;?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>Adminca</b> - Save your time, choose the best</div>
                <div>
                    <a class="px-3 pl-4" href="<?=base_url()?>http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">Purchase</a>
                    <a class="px-3" href="<?=base_url()?>http://admincast.com/adminca/documentation.html" target="_blank">Docs</a>
                </div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- START SEARCH PANEL-->
    <form class="search-top-bar" action="http://admincast.com/adminca/preview/admin_7/html/search.html">
        <input class="form-control search-input" type="text" placeholder="Search...">
        <button class="reset input-search-icon"><i class="ti-search"></i></button>
        <button class="reset input-search-close" type="button"><i class="ti-close"></i></button>
    </form>
    <!-- END SEARCH PANEL-->
    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="ti-settings theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <h5 class="text-center mb-4 mt-3">SETTINGS</h5>
            <div class="font-strong mb-3">LAYOUT OPTIONS</div>
            <div class="check-list mb-4">
                <label class="checkbox checkbox-grey checkbox-primary mt-3">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
                <label class="checkbox checkbox-grey checkbox-primary mt-3">
                    <input id="_drawerSidebar" type="checkbox">
                    <span class="input-span"></span>Drawer sidebar</label>
            </div>
            <div class="font-strong mb-3">LAYOUT STYLE</div>
            <div class="check-list mb-4">
                <label class="radio radio-grey radio-primary">
                    <input type="radio" name="layout-style" value="" checked>
                    <span class="input-span"></span>Fluid</label>
                <label class="radio radio-grey radio-primary mt-3">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- New question dialog-->
    <div class="modal fade" id="session-dialog">
        <div class="modal-dialog" style="width:400px;" role="document">
            <div class="modal-content timeout-modal">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mt-3 mb-4"><i class="ti-lock timeout-icon"></i></div>
                    <div class="text-center h4 mb-3">Set Auto Logout</div>
                    <p class="text-center mb-4">You are about to be signed out due to inactivity.<br>Select after how many minutes of inactivity you log out of the system.</p>
                    <div id="timeout-reset-box" style="display:none;">
                        <div class="form-group text-center">
                            <button class="btn btn-danger btn-fix btn-air" id="timeout-reset">Deactivate</button>
                        </div>
                    </div>
                    <div id="timeout-activate-box">
                        <form id="timeout-form" action="#">
                            <div class="form-group pl-3 pr-3 mb-4">
                                <input class="form-control form-control-line" type="text" name="timeout_count" placeholder="Minutes" id="timeout-count">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-fix btn-air" id="timeout-activate">Activate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End New question dialog-->
    <!-- QUICK SIDEBAR-->
    <div class="quick-sidebar">
        <ul class="nav nav-tabs tabs-line">
            <li class="nav-item">
                <a class="nav-link active" href="<?=base_url()?>#tab-1" data-toggle="tab"><i class="ti-comment"></i>
                    <div>Messages</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>#tab-2" data-toggle="tab"><i class="ti-settings"></i>
                    <div>Settings</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>#tab-3" data-toggle="tab"><i class="ti-notepad"></i>
                    <div>Logs</div>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane chat-panel active" id="tab-1">
                <div class="chat-list">
                    <div class="scroller">
                        <div class="media-list">
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u3.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-muted">12:05</small>
                                    <div class="media-heading">Frank Cruz</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u8.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-right text-success"><i class="badge-point badge-success mr-2"></i>12:05<br><span class="badge badge-danger badge-circle">3</span></small>
                                    <div class="media-heading">Lynn Weaver</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u2.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-muted">12:05</small>
                                    <div class="media-heading">Becky Brooks</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u5.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-muted">12:05</small>
                                    <div class="media-heading">Bob Gonzalez</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u6.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-right text-success"><i class="badge-point badge-success mr-2"></i>12:05</small>
                                    <div class="media-heading">Connor Perez</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u11.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-muted">12:05</small>
                                    <div class="media-heading">Tyrone Carroll</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u9.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-right text-success"><i class="badge-point badge-success mr-2"></i>12:05<br><span class="badge badge-danger badge-circle">1</span></small>
                                    <div class="media-heading">Tammy Newman</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u1.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-muted">12:05</small>
                                    <div class="media-heading">Jeanne Gonzalez</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u10.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-muted">12:05</small>
                                    <div class="media-heading">Stella Obrien</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                            <a class="media" href="<?=base_url()?>#" data-toggle="show-chat">
                                <div class="media-img">
                                    <img class="img-circle" src="<?=base_url()?>assets/img/users/u7.jpg" alt="image" width="40" />
                                </div>
                                <div class="media-body"><small class="float-right text-muted">12:05</small>
                                    <div class="media-heading">Jeanne Smith</div>
                                    <div class="font-13 text-lighter">Lorem Ipsum is simply dummy.</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="messenger">
                    <div class="messenger-header">
                        <a class="messenger-return" href="<?=base_url()?>#">
                            <span class="ti-angle-left"></span>
                        </a>
                        <div class="text-center text-white">
                            <h6 class="mb-1 font-16">Lynn Weaver</h6>
                            <div>
                                <span class="badge-point badge-danger mr-2"></span><small>Online</small></div>
                        </div>
                        <div class="dropdown">
                            <a class="messenger-more dropdown-toggle" data-toggle="dropdown">
                                <span class="ti-more-alt"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item">
                                    <span class="ti-heart m-r-10"></span>Add to favorite</a>
                                <a class="dropdown-item">
                                    <span class="ti-close m-r-10"></span>Clear chat</a>
                            </div>
                        </div>
                    </div>
                    <div class="messenger-messages">
                        <div class="scroller">
                            <div class="messenger-message">
                                <div class="message-image">
                                    <img src="<?=base_url()?>assets/img/users/u8.jpg" alt="image" />
                                </div>
                                <div class="message-body">Hi Jack. You are comfortable today.</div>
                            </div>
                            <div class="messenger-message messenger-message-answer">
                                <div class="message-body">Hi Lynn. Yes Sure.</div>
                            </div>
                            <div class="messenger-message">
                                <div class="message-image">
                                    <img src="<?=base_url()?>assets/img/users/u8.jpg" alt="image" />
                                </div>
                                <div class="message-body">Hi. What is your main principle in work.</div>
                            </div>
                            <div class="messenger-message messenger-message-answer">
                                <div class="message-body">Our main principle: We work hard to make our client comfortable.</div>
                            </div>
                            <div class="message-time">4.30 PM</div>
                            <div class="messenger-message">
                                <div class="message-image">
                                    <img src="<?=base_url()?>assets/img/users/u8.jpg" alt="image" />
                                </div>
                                <div class="message-body">
                                    <p>Here are some beautiful photos.</p>
                                    <div class="mb-3">
                                        <img src="<?=base_url()?>assets/img/blog/culinary-1.jpg" alt="image" />
                                    </div>
                                    <div>
                                        <img src="<?=base_url()?>assets/img/blog/01.jpg" alt="image" />
                                    </div>
                                </div>
                            </div>
                            <div class="messenger-message messenger-message-answer">
                                <div class="message-body">Thanks, they are beautiful.</div>
                            </div>
                            <div class="messenger-message">
                                <div class="message-image">
                                    <img src="<?=base_url()?>assets/img/users/u8.jpg" alt="image" />
                                </div>
                                <div class="message-body">How many hours are you comfortable.</div>
                            </div>
                            <div class="messenger-message messenger-message-answer">
                                <div class="message-body">In the evening at 6.30 clock.</div>
                            </div>
                        </div>
                    </div>
                    <div class="messenger-form">
                        <div class="messenger-form-inner">
                            <input class="messenger-input" type="text" placeholder="Type a message">
                            <div class="messenger-actions">
                                <span class="messanger-button messanger-paperclip">
                                    <input type="file"><i class="la la-paperclip"></i></span>
                                <a class="messanger-button" href="<?=base_url()?>#"><i class="fa fa-send-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-2">
                <div class="scroller">
                    <div class="font-bold mb-4 mt-2">APP SETTINGS</div>
                    <div class="settings-item">Show notifications
                        <label class="ui-switch switch-icon">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">Enable autologout
                        <label class="ui-switch switch-icon">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">Show recent activity
                        <label class="ui-switch switch-icon">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">Chat history
                        <label class="ui-switch switch-icon">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">Users activity
                        <label class="ui-switch switch-icon">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">Orders history
                        <label class="ui-switch switch-icon">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">SMS Alerts
                        <label class="ui-switch switch-icon">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="font-bold mb-4">SYSTEM SETTINGS</div>
                    <div class="settings-item">Error Reporting
                        <label class="ui-switch switch-icon">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">Server logs
                        <label class="ui-switch switch-icon">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="settings-item">Global search
                        <label class="ui-switch switch-icon">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-3">
                <div class="log-tabs">
                    <a class="active" href="<?=base_url()?>#" data-type="all" data-toggle="tooltip" data-original-title="All logs"><i class="ti-view-grid"></i></a>
                    <a href="<?=base_url()?>#" data-type="server" data-toggle="tooltip" data-original-title="Server logs"><i class="ti-harddrives"></i></a>
                    <a href="<?=base_url()?>#" data-type="app" data-toggle="tooltip" data-original-title="App logs"><i class="ti-pulse"></i></a>
                </div>
                <div class="logs">
                    <div class="scroller">
                        <ul class="logs-list">
                            <li class="log-item" data-type="app"><i class="ti-check log-icon text-success"></i>
                                <div>
                                    <a>2 Issue fixed</a><small class="float-right text-muted">Just now</small></div>
                            </li>
                            <li class="log-item" data-type="app"><i class="ti-announcement log-icon"></i>
                                <div>
                                    <a>7 new feedback</a>
                                    <span class="badge badge-warning badge-pill ml-1">important</span><small class="float-right text-muted">5 mins</small></div>
                            </li>
                            <li class="log-item" data-type="server"><i class="ti-check log-icon text-success"></i>
                                <div>
                                    <a>Production server up</a><small class="float-right text-muted">24 mins</small></div>
                            </li>
                            <li class="log-item" data-type="app"><i class="ti-shopping-cart log-icon"></i>
                                <div>
                                    <a>12 New orders</a><small class="float-right text-muted">45 mins</small></div>
                            </li>
                            <li class="log-item" data-type="server"><i class="ti-info-alt log-icon text-danger"></i>
                                <div>
                                    <a>Server error</a>
                                    <span class="badge badge-primary badge-pill ml-1">resolved</span><small class="float-right text-muted">1 hrs</small></div>
                            </li>
                            <li class="log-item" data-type="server"><i class="ti-harddrives log-icon text-danger"></i>
                                <div>
                                    <a>Server overloaded 91%</a><small class="float-right text-muted">2 hrs</small></div>
                            </li>
                            <li class="log-item" data-type="app"><i class="ti-user log-icon"></i>
                                <div>
                                    <a>18 new users registered</a><small class="float-right text-muted">12.07</small></div>
                            </li>
                            <li class="log-item" data-type="app"><i class="ti-shopping-cart log-icon"></i>
                                <div>
                                    <a>5 New orders</a>
                                    <span class="badge badge-success badge-pill ml-1">pending</span><small class="float-right text-muted">12.30</small></div>
                            </li>
                            <li class="log-item" data-type="server"><i class="ti-info-alt log-icon text-danger"></i>
                                <div>
                                    <a>System error</a><small class="float-right text-muted">13.45</small></div>
                            </li>
                            <li class="log-item" data-type="app"><i class="fa fa-file-excel-o log-icon"></i>
                                <div>
                                    <a>The invoice is ready</a><small class="float-right text-muted">16.30</small></div>
                            </li>
                            <li class="log-item" data-type="server"><i class="ti-server log-icon text-danger"></i>
                                <div>
                                    <a>Database overloaded 92%</a><small class="float-right text-muted">17.15</small></div>
                            </li>
                            <li class="log-item" data-type="server"><i class="ti-check log-icon text-success"></i>
                                <div>
                                    <a>Production server up</a><small class="float-right text-muted">18.05</small></div>
                            </li>
                            <li class="log-item" data-type="app"><i class="ti-user log-icon"></i>
                                <div>
                                    <a>12 new users registered</a><small class="float-right text-muted">18.22</small></div>
                            </li>
                            <li class="log-item" data-type="app"><i class="ti-shopping-cart log-icon"></i>
                                <div>
                                    <a>8 New orders</a><small class="float-right text-muted">20.00</small></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICK SIDEBAR-->
    <!-- CORE PLUGINS-->
    <script src="<?=base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/toastr/toastr.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?=base_url()?>assets/vendors/dataTables/datatables.min.js"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $(function() {
            $('#datatable').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false
                }]
            });

            var table = $('#datatable').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(4).search($(this).val()).draw();
            });
        });
    </script>
</body>

</html>