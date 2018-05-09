<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <div class="page-content fade-in-up">
                <div class="alert alert-primary alert-bordered">
                    
                    <p>{message}</p>
                    
                </div>
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">ADD USER</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="ti-angle-down"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <?php echo form_open(current_url()); ?>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{lang_first_name}</label>
                                <div class="col-sm-10">
									<?php echo form_input($first_name); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{lang_last_name}</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($last_name); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{lang_email}</label>
                                <div class="col-sm-10">
                                    <?
                                    	if ($identity_column !== 'email')
											{
												echo '<p>';
												echo lang('create_user_identity_label', 'identity');
												echo '<br />';
												echo form_error('identity');
												echo form_input($identity);
												echo '</p>';
											}
                                    ?>

											<?php echo form_input($email); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{lang_company_name}</label>
                                <div class="col-sm-10">
									<?php echo form_input($company); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{lang_phone}</label>
                                <div class="col-sm-10">
									<?php echo form_input($phone); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{lang_password}</label>
                                <div class="col-sm-10">
                                   	<?php echo form_input($password); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{lang_password_confirm}</label>
                                <div class="col-sm-10">
                                	<?php echo form_input($password_confirm); ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <?php echo form_submit('submit', '{lang_create}', array('class' => 'btn btn-primary')); ?>
									<?php echo anchor('backend/users', '{lang_cancel}', array('class' => 'btn btn-primary')); ?>
                                </div>
                            </div>
                       <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
