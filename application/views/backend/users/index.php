<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$i             = 1;
$user_active   = array('class' => 'btn btn-success btn-sm', 'role' => 'button');
$user_inactive = array('class' => 'btn btn-secondary btn-sm', 'role' => 'button');
$nbr_users     = ($count_users > 0) ? ' <span class="badge badge-info">' . $count_users . '</span>' : NULL;

?>                <div class="row">
                    <div class="col-xl-12">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title"><?=$subtitle?></div>
                                <div class="ibox-tools">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    	<a class="dropdown-item" href="<?php echo base_url();?>backend/users/add"> <i class="ti-pencil"></i>{lang_add_user}</a>

                                    	<a class="dropdown-item" href="<?php echo base_url();?>backend/users/import"> <i class="la la-sign-in"></i>{lang_import_list}</a>

                                        <a class="dropdown-item" href="<?php echo base_url();?>backend/users/export"> <i class="la la-sign-out"></i>{lang_export_list}</a>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                                
                                <div class="ibox-fullwidth-block">
                                    <table class="table table-hover">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th class="pl-4">No</th>
												<th>{lang_first_name}</th>
												<th>{lang_last_name}</th>
												<th>{lang_email}</th>
												<th>{lang_group}</th>
												<th>{lang_status}</th>
												<th>{lang_actions}</th>
                                            </tr>
                                        </thead>

<tbody>
<?php foreach ($users as $user): ?>
												<tr>
													<td class="pl-5"><?php echo $i++; ?></td>
													<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
													<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
	<?php foreach ($user->groups as $group): ?>
														<span class="badge badge-success badge-pill"><?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?></span>
	<?php endforeach; ?>
													</td>
													<td>
	<?php

	if ($user->id != 1)
	{
		echo ($user->active) ? anchor('backend/users/deactivate/' . $user->id, '{lang_active}', $user_active) : anchor('backend/users/activate/'. $user->id, '{lang_inactive}', $user_inactive);
	}

	?>
													</td>
													<td>
														<?php echo anchor('backend/users/edit/' . $user->id, '{lang_edit}', array('class' => 'btn btn-primary btn-sm', 'role' => 'button')); ?>
														<?php echo anchor('#' . $user->id, '{lang_see}', array('class' => 'btn btn-primary btn-sm', 'role' => 'button')); ?>
	<?php

	if ($user->id != 1)
	{
		echo anchor('#' . $user->id, '{lang_delete}', array('class' => 'btn btn-danger btn-sm', 'role' => 'button'));
	}

	?>
													</td>
												</tr>
<?php endforeach; ?>
											</tbody>
										</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


						