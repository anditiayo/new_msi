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
                            <?php if ($this->ion_auth->is_admin()): ?>
									<div class="form-group">
										<p><?php echo lang('edit_user_groups_heading'); ?></p>
	<?php foreach ($groups as $group): ?>
										<div class="form-check form-check-inline">
											<label class="custom-control custom-checkbox">
	<?php
		$checked  = NULL;
		$disabled = NULL;
		$item     = NULL;

		foreach ($currentGroups as $grp)
		{
			if ($group['id'] == $grp->id)
			{
				$checked = ' checked';
			}

			if ($user_id == 1)
			{
				$disabled = ' disabled';
			}
		}
	?>
												<input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" class="custom-control-input"<?php echo $checked . $disabled; ?>>
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description"><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></span>
											</label>
										</div>
	<?php endforeach; ?>
									</div>
<?php endif; ?>
                            
							
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                   <?
                                   	echo form_hidden('id', $user_id);
									echo form_hidden($csrf);
									echo form_submit('submit', '{lang_save}', array('class' => 'btn btn-primary'));
									echo anchor('backend/users', '{lang_cancel}', array('class' => 'btn btn-outline-secondary'));
                                   ?>
                                </div>
                            </div>
                       <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
