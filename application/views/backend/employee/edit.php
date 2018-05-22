<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Form Add Employee</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Add Employee</li>
    </ol>
</div>
<div class="page-content fade-in-up">

    <div class="ibox">
        <?php 

           
            foreach ($info as $key) {?>
               
        
            <div class="ibox-head">
                <div class="ibox-title">General</div>
            </div>
            <div class="ibox-body">
                <?php echo form_open(current_url()); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="Enter Full Name" value="<?=$key['first_name'];?>">
                        </div>
                        <div class="form-group mb-4">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Enter Last Name" value="<?=$key['mid_name'].' '.$key['last_name'];?>">
                        </div>
                        <div class="form-group mb-4">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="Enter Email">
                        </div>
                        <div class="form-group mb-4">
                            <label>Place of Birth</label>
                            <input class="form-control" type="text" placeholder="Enter Place of Birth">
                            <!-- <select class="selectpicker form-control" data-live-search="true">
                                <?php foreach ($regencies as $keys) {

                                    if($keys['id'] == $key['place_of_birth']){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }

                                    ?>
                                     <option <?php echo 'value="'.$keys['id'].'" '.$selected; ?> ><?echo $keys['name'];?></option>
                                <?}?>
                               
                            
                            </select> -->

                        </div>
                        <div class="form-group mb-4">
                            <label>Date of Birth</label>
                            <input class="form-control" id="ex-date" type="text" value="<? echo date('d/m/Y',strtotime($key['birthday'])); ?>">
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
                                <textarea class="form-control" rows="3" placeholder="Enter Address 1"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label>Address 2</label>
                            <div class="input-group-icon input-group-icon-left">
                                <span class="input-icon input-icon-left"></span>
                                <textarea class="form-control" rows="3" placeholder="Enter Address 2"></textarea>
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
                                <input class="form-control" id="ex-phone" type="text" placeholder="Enter Phone">
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
                                <input class="form-control" id="ex-phone2" type="text" placeholder="Enter Phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">

                    <label>Gender</label>
                    <div class="mt-1">
                        <label class="radio radio-inline radio-grey radio-primary">
                            <input type="radio" name="d" value="1" checked>
                            <span class="input-span"></span>Male</label>
                        <label class="radio radio-inline radio-grey radio-primary">
                            <input type="radio" name="d" value="0">
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
                        <input class="form-control" type="text" placeholder="Enter NIK" disabled="" value="<?=$key['employee_id'];?>">
                    </div>
                    <div class="form-group" id="date_1">
                        <label class="font-normal">Join</label>
                        <div class="input-group date">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text" disabled=""  value="<? echo date("d F Y ",strtotime($key['join_in']));?>">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label>Status</label>
                        <select class="selectpicker form-control">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option disabled="">Disabled</option>
                            <option>Mayonnaise</option>
                            <option>Barbecue Sauce</option>
                            <option>Salad Dressing</option>
                            <option>Tabasco</option>
                            <option>Salsa</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label>Position</label>
                        <select class="selectpicker form-control">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option disabled="">Disabled</option>
                            <option>Mayonnaise</option>
                            <option>Barbecue Sauce</option>
                            <option>Salad Dressing</option>
                            <option>Tabasco</option>
                            <option>Salsa</option>
                        </select>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label>Salary</label>
                        <input class="form-control" type="text" id="salary" placeholder="Enter Salary" value="<?php echo salary($key['employee_id']);?>">
                    </div>
                    <div class="form-group mb-4">
                        <label>NPWP</label>
                        <input class="form-control" type="text" id="npwp" placeholder="Enter NPWP">
                    </div>
                    <div class="form-group mb-4">
                        <label>BPJS Ketenagakerjaan</label>
                        <input class="form-control" type="text" id="bpjstk" placeholder="Enter BPJS Ketenagakerjaan Number">
                    </div>
                    <div class="form-group mb-4">
                        <label>BPJS Kesehatan</label>
                        <input class="form-control" type="text" id="bpjsk" placeholder="Enter BPJS Kesehatan Number">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label>Work Attendace Group</label>
                        <select class="selectpicker form-control">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option disabled="">Disabled</option>
                            <option>Mayonnaise</option>
                            <option>Barbecue Sauce</option>
                            <option>Salad Dressing</option>
                            <option>Tabasco</option>
                            <option>Salsa</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label>Allowence & Deduction</label>
                        <select class="multi-select" id="multi_select" multiple="multiple" name="multi_select[]">
                            <option>PPH 21 (Individu)</option>
                            <option>PPH 21 (Company)</option>
                            <option>BPJS Ketenagakerjaan</option>
                            <option selected="">Uang Makan</option>
                            <option selected="">BPJS Kesehatan</option>
                            <option>Tunj. Jabatan</option>
                            <option>Tunj. Masa Kerja</option>
                            <option>Shift/day</option>
                            <option>Lembur</option>
                            <option>Asuransi</option>
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