<!-- START PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">

    <div class="ibox">
        <?php 

           
            foreach ($info as $key) {?>
               
        
            <div class="ibox-head">
                <div class="ibox-title">General</div>
            </div>
            <div class="ibox-body">
                <?php echo form_open('backend/employee/submit'); ?>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group mb-4">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="Enter Full Name" name="fullname" id="fullname" value="<?=$key['first_name'];?>">
                        </div>
                        <div class="form-group mb-4">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Enter Last Name" name="lastname" id="lastname" value="<?=$key['last_name'];?>">
                        </div>
                        <div class="form-group mb-4">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="Enter Email" name="email" id="email" value="<?=$key['email'];?>">
                        </div>
                        <div class="form-group mb-4">
                            <label>Place of Birth</label>
                           <!--  <input class="form-control" type="text" placeholder="Enter Place of Birth" > -->
                             <select class="form-control" data-live-search="true" name="pob" id="pob">
                                <?php foreach ($regencies as $keys) {

                                    if($keys['id'] == $key['pob']){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }

                                    ?>
                                     <option <?php echo 'value="'.$keys['id'].'" '.$selected; ?> ><?echo $keys['name'];?></option>
                                <?}?>
                               
                            
                            </select> 

                        </div>
                        <div class="form-group mb-4">
                            <label>Date of Birth</label>
                            <input class="form-control" id="ex-date" name="birthday" type="text" value="<? echo date('d/m/Y',strtotime($key['birthday'])); ?>">
                            <span class="help-block">Data format dd/mm/yyyy
                                <span></span>
                            </span>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label>Address 1</label>
                            <div class="input-group-icon input-group-icon-left">
                                <span class="input-icon input-icon-left"></span>
                                <textarea class="form-control" rows="3" placeholder="Enter Address 1" name="address1"><?echo $key['address1'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label>Address 2</label>
                            <div class="input-group-icon input-group-icon-left">
                                <span class="input-icon input-icon-left"></span>
                                <textarea class="form-control" rows="3" placeholder="Enter Address 2" name="address2"><?echo $key['address2'];?></textarea>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label>Phone number</label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">+62<i class="fa fa-angle-down ml-1"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:;">+62</a>
                                    </div>
                                </div>
                                <input class="form-control" id="ex-phone" type="text" placeholder="Enter Phone" name="phone1" value="<?echo $key['phone1'];?>">
                            </div>

                        </div>
                        <div class="form-group mb-4">
                            <label>Mobile number</label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">+62<i class="fa fa-angle-down ml-1"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:;">+62</a>
                                    </div>
                                </div>
                                <input class="form-control" id="ex-phone2" type="text" placeholder="Enter Phone" name="phone2" value="<?echo $key['phone2'];?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">

                    <label>Gender</label>
                    <div class="mt-1">

                        <? 
                        
                        if($key['gender'] == 1){
                            $checkedM = 'checked';
                            $checkedF = '';
                        }else{
                            $checkedM = '';
                            $checkedF = 'checked';
                        }
                        

                        ?>

                        <label class="radio radio-inline radio-grey radio-primary">
                            <input type="radio" name="gender" value="1" <? echo $checkedM.' '.$checkedF;?> >
                            <span class="input-span"></span>Male</label>
                        <label class="radio radio-inline radio-grey radio-primary">
                            <input type="radio" name="gender" value="0" <? echo $checkedM.' '.$checkedF;?>>
                            <span class="input-span"></span>Female</label>
                    </div>
                </div>
            </div>
    </div>
<!--     <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Family</div>
        </div>
        <div class="ibox-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>Option</th>
                                <th>Name</th>
                                <th>Family Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="ui-switch switch-icon switch-large switch-square">
                                        <input type="checkbox" name="record">
                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="record" name="name[]" placeholder="Name">
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="record" name="family_status[]" placeholder="Family Status">
                                </td>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input type="button" class="add-row btn btn-primary mr-2" value="Add">
                                    <button type="button" class="delete-row btn btn-outline-secondary">Delete</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div> -->
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Details</div>
        </div>
        <div class="ibox-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group mb-4">
                        <label>NIK</label>
                        <input class="form-control" type="text" placeholder="Enter NIK" readonly="" name="nik" value="<?=sprintf("%'04d", $key['employee_id']);?>">
                         <input class="form-control" type="hidden" name="id" id="id" value="<?=$key['employee_id'];?>">
                    </div>
                    <div class="form-group" id="date_1">
                        <label class="font-normal">Join</label>
                        <div class="input-group date">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text"  name="joinIn"  value="<? echo date("d F Y ",strtotime($key['joinIn']));?>">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option selected disabled value="NULL"> == Select == </option>
                            <?
                                foreach ($status as $keys) {

                                    if($key['status'] == $keys['status_id']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                        echo '<option value="'.$keys['status_id'].'" '.$selected.' >'.$keys['status'].'</option>';
                                    }  
                            ?>
                        </select>

                        
                    </div>

                    <div class="form-group mb-4">
                        <label>Position</label>
                        <select class="form-control" name="position">
                            <option selected disabled value="NULL"> == Select == </option>
                            <?
                                foreach ($getPosition as $keys => $values) {
                                    
                                    if($key['positionID'] == $values['id']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                    
                                    echo '<option value="'.$values['id'].'" '.$selected.'>'.$values['name'].'</option>';
                                }
                            ?>
                          
                        </select>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label>Salary</label>
                        <input class="form-control" type="text" id="salary" name="salary" placeholder="Enter Salary" value="<?php echo salary($key['employee_id']);?>">
                    </div>
                    <div class="form-group mb-4">
                        <label>NPWP</label>
                        <input class="form-control" type="text" id="npwp" name="npwp" placeholder="Enter NPWP" value="<?=$key['npwp'];?>">
                    </div>
                    <div class="form-group mb-4">
                        <label>BPJS Ketenagakerjaan</label>
                        <input class="form-control" type="text" id="bpjstk" name="bpjstk" placeholder="Enter BPJS Ketenagakerjaan Number" value="<?=$key['bpjstk'];?>">
                    </div>
                    <div class="form-group mb-4">
                        <label>BPJS Kesehatan</label>
                        <input class="form-control" type="text" id="bpjsk" name="bpjsk" placeholder="Enter BPJS Kesehatan Number" value="<?=$key['bpjs'];?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label>Regular Worktime</label>
                        <select class="form-control" name="regular">
                            <option selected disabled value="NULL"> == Select == </option>
                             <?
                                foreach ($worklist as $keys => $values) {

                                    if($key['regular'] == $values['id']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }

                                    echo '<option value="'.$values['id'].'" '.$selected.'>'.$values['time_name'].'</option>';
                                }

                            ?>
                        </select>

                    </div>
                    <div class="form-group mb-4">
                        <label>Group Worktime</label>
                        <select class="form-control" name="group">
                            <option selected disabled value="NULL"> == Select == </option>
                             <?
                                foreach ($departement as $keys => $values) {

                                     if($key['grouptimeIds'] == $values['id']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }

                                    echo '<option value="'.$values['id'].'" '.$selected.'>'.$values['label'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label>Allowence & Deduction</label>
                        <select class="multi-select" id="multi_select" multiple="multiple" name="allowance[]" >
                            <?
                                foreach ($allowancesDiSelect as $keys => $values)
                                {
                                   
                                    echo '<option value="'.$values['id'].'">'.$values['allowance_name'].'</option>';
                                }
                                foreach ($allowancesSelect as $keys => $values)
                                {
                                   
                                    echo '<option value="'.$values['id'].'" selected>'.$values['allowance_name'].'</option>';
                                }

                               
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="ibox-footer">
            <?php 
            echo form_submit('submit', '{lang_save}', array('class' => 'btn btn-primary'));
            echo anchor('backend/employee', '{lang_cancel}', array('class' => 'btn btn-outline-secondary'));
            ?>
           
        </div>
        <?    }
        ?>
        <?php echo form_close(); ?>
    </div>
</div>
</div>