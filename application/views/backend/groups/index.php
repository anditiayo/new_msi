<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$i          = 1;
$nbr_groups = ($count_groups > 0) ? ' <span class="badge badge-info">' . $count_groups . '</span>' : NULL;

?>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title"><?=$subtitle?></div>
                                <div class="ibox-tools">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"> <?php echo anchor('backend/groups/add', '{lang_add_group}', array('class' => 'dropdown-item')); ?></a>
                                        <a class="dropdown-item"> <?php echo anchor('backend/groups/import', '{lang_import_list}', array('class' => 'dropdown-item')); ?></a>
                                        <a class="dropdown-item"> <?php echo anchor('backend/groups/export', '{lang_export_list}', array('class' => 'dropdown-item')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                                
                                <div class="ibox-fullwidth-block">
                                    <table class="table table-hover">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th class="pl-4">No</th>
												<th>{lang_name}</th>
												<th>{lang_color}</th>
												<th>{lang_description}</th>
												<th>{lang_actions}</th>
                                            </tr>
                                        </thead>

											<tbody>
<?php foreach ($groups as $group): ?>
												<tr>
													 <td class="pl-4"><?php echo $i++; ?></td>
													<td><?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?></td>
													<td>-</td>
													<td><?php echo htmlspecialchars($group->description, ENT_QUOTES, 'UTF-8'); ?></td>
													<td>
														<?php echo anchor('backend/groups/edit/' . $group->id, '{lang_edit}', array('class' => 'btn btn-primary btn-sm', 'role' => 'button')); ?>
	<?php

	if ($group->id != 1)
	{
		echo anchor('#' . $group->id, '{lang_delete}', array('class' => 'btn btn-danger btn-sm', 'role' => 'button'));
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

