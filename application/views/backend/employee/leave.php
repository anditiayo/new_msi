<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>               
 
 <div class="row">
        <div class="col-md-6">
        <div class="ibox">

            <div class="ibox-head">
                        <div class="ibox-title">Leave List</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/add"> <i class="ti-pencil"></i>Add Time</a> -->
                                <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#ModalaAdd"><i class="ti-pencil"></i>Add Leave</a>
                               <!--  <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/import"> <i class="la la-sign-in"></i>{lang_import_list}</a>

                                <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/export"> <i class="la la-sign-out"></i>{lang_export_list}</a> -->
                            </div>
                        </div>
                    </div>
            <div class="ibox-body">
                
                 <div class="flexbox mb-4">
                    <div class="flexbox">
                         <div class="form-group" id="date_5">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="table-responsive row">

                        <table class="table table-striped" id="mydata">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Day</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th style="text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                                
                            </tbody>
                        </table>



        <!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Add Leave</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php
                $date   = isset($date) ? $date : date('Y-m-d H:i:s');
                $pin    = isset($pin) ? $pin : '';

            ?>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Employee</label>
                        <div class="col-xs-9">

                            <input list="names" name="name" id="code" class="form-control" value="<?=$pin?>" />
                            <datalist id="names" >
                            <?php

                               

                                foreach ($name as $key) {
                                   
                                    echo '<option value='.$key['employee_id'].'>'.$key['first_name'].' '.$key['last_name'].'</option>';
                                }
                             ?>
                            </datalist>
                            
                        </div>
                    </div>

                    <div class="form-group">
                                    <label class="form-control-label">Permit</label>
                                    <select class="selectpicker form-control" name="permit" id="permit">
                                        <option disabled="" selected="">== SELECT ==</option>
                                        <?php
                                            foreach ($leave_permit as $key) {
                                                echo '<option value='.$key['id'].'>['.$key['nickname'].'] '.$key['name'].'</option>';
                                            }
                                         ?>
                                        
                                    </select>
                                </div>
                    <div class="form-group">
                        <label class="font-normal">Date</label>
                        <div class="input-group date form_datetime">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" name="date" id="date" value="<? echo date('Y-m-d H:i:s',strtotime($date))?>">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <input name="edit_id" id="edit_id"  type="hidden">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Employee</label>
                        <div class="col-xs-9">
                            <input list="names" name="edit_code" id="edit_code" class="form-control" />
                            <datalist id="names" >
                            <?php
                                foreach ($name as $key) {
                                    echo '<option value='.$key['employee_id'].'>'.$key['first_name'].' '.$key['last_name'].'</option>';
                                }
                             ?>
                            </datalist>
                            
                        </div>
                    </div>

                      <div class="form-group">
                                    <label class="form-control-label">Permit</label>
                                    <input type="text" readonly name="namepermit" id="namepermit" class="form-control" />
                                    <input type="hidden" name="permitid" id="permitid" class="form-control" />
                                    <select class="selectpicker form-control" name="edit_permit" id="edit_permit">
                                        <option disabled="" selected="">== SELECT ==</option>
                                        <?php
                                            foreach ($leave_permit as $key) {
                                                echo '<option value='.$key['id'].'>['.$key['nickname'].'] '.$key['name'].'</option>';
                                            }
                                         ?>
                                        
                                    </select>
                                </div>

                    <div class="form-group">
                        <label class="font-normal">Date</label>
                        <div class="input-group date form_datetime">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" name="edit_date" id="edit_date">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Delete</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Delete</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

<script src="<?php echo base_url();?>asets/js/scripts/worktime.jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function(){
        show_leave();   //pemanggilan fungsi tampil 
        
        $('#mydata').dataTable();
         
 
        function show_leave(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>backend/employee/leavelist',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].FIRSTNAME+'</td>'+
                                '<td>'+data[i].DATEFORM+'</td>'+
                                '<td>'+data[i].THEDATE+'</td>'+
                                '<td>['+data[i].NICKNAME+'] '+data[i].STATUSNAME+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url()?>backend/employee/get_leavelist",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,edit_code, edit_permit, edit_date,namepermit,permitid){
                        $('#ModalaEdit').modal('show');
                        $('[name="edit_id"]').val(data.id);
                        $('[name="edit_code"]').val(data.edit_code);
                        $('[name="edit_permit"]').val(data.edit_permit);
                        $('[name="edit_date"]').val(data.edit_date);
                        $('[name="namepermit"]').val(data.namepermit);
                        $('[name="permitid"]').val(data.permitid);
                        
                    });
                }
            });
            return false;
        });


        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

        //Simpan
        $('#btn_simpan').on('click',function(){

            var code    =$('#code').val();
            var permit  =$('#permit').val();
            var date    =$('#date').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/employee/add_leavelist",
                dataType : "JSON",
                data : {code:code , permit:permit, date:date},
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    show_leave();
                }
            });
            return false;
        });

        //Update
        $('#btn_update').on('click',function(){
            
            var edit_id         = $('#edit_id').val();
            var edit_code       = $('#edit_code').val();
            var edit_permit     = $('#edit_permit').val();
            var edit_date       = $('#edit_date').val();
            var permitid        = $('#permitid').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/employee/edit_leavelist",
                dataType : "JSON",
                data : {edit_id:edit_id, edit_code:edit_code , edit_permit:edit_permit, edit_date:edit_date, permitid:permitid},
                success: function(data){
                    $('#ModalaEdit').modal('hide');
                     show_leave();
                }
            });
            return false;
        });

        //Hapus 
        $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>backend/employee/del_leavelist",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                             show_leave();
                    }
                });
                return false;
            });

    });

</script>

                    
                </div>
                </div>
            </div>
        </div>
    </div>

                        