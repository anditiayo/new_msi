<?php
if (isset($this->session->userdata['logged_in'])) {
	header("location: http://localhost/smarthr/auth/user_login_process");
}

if (isset($logout_message)) {
	echo "<div class='message'>";
		echo $logout_message;
	echo "</div>";
}

if (isset($message_display)) {
	echo "<div class='message'>";
	echo $message_display;
	echo "</div>";
}

?>

<body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <!-- <i class="ace-icon fa fa-leaf green"></i> -->
                                    <span class="red">ERP</span>
                                    <span class="white" id="id-text2">Application</span>
                                </h1>
                                <h4 class="blue" id="id-company-text">PT MEGAH SEMBADA INDUSTRIES</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                LOGIN
                                            </h4>

                                            <div class="space-6"></div>

                                           <?php echo form_open('auth/user_login_process'); ?>
                                           <?php
												echo "<div class='error_msg'>";
												if (isset($error_message)) {
													echo $error_message;
												}
												echo validation_errors();
												echo "</div>";
											?>
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" placeholder="Username" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Password" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            <input type="checkbox" class="ace" />
                                                            <span class="lbl"> Remember Me</span>
                                                        </label>

                                                      
                                                        <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                           <?php echo form_close(); ?>

                                            
                                        </div><!-- /.widget-main -->

                                       
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->




                            <div class="navbar-fixed-top align-right">
                                <br />
                                &nbsp;
                                <a id="btn-login-dark" href="#">Dark</a>
                                &nbsp;
                                <span class="blue">/</span>
                                &nbsp;
                                <a id="btn-login-blur" href="#">Blur</a>
                                &nbsp;
                                <span class="blue">/</span>
                                &nbsp;
                                <a id="btn-login-light" href="#">Light</a>
                                &nbsp; &nbsp; &nbsp;
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->