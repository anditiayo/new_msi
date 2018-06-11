<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>               
 <div class="row">
        <div class="col-md-12">
        <div class="ibox">

            <div class="ibox-head">
                        <div class="ibox-title"></div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/add"> <i class="ti-pencil"></i>Add Time</a> -->
                                <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#ModalaAdd"><i class="ti-pencil"></i>Add</a>
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
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>From Employee</th>
                                    <th>From Company</th>
                                    <th>Period Start</th>
                                    <th>Period End</th>
                                    <th>Masa Kerja</th>
                                    <th>Pay per</th>

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
                <h3 class="modal-title" id="myModalLabel">Add</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-control-label">Type</label>
                        <select class="selectpicker form-control" name="type" id="type" required>
                            <option selected="" disabled=""> == Select == </option>
                            <option value="Allowance">Allowance</option>
                            <option value="Deduction">Deduction</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Pay</label>
                        <select class="selectpicker form-control" name="pay" id="pay">
                            <option selected="" disabled=""> == Select == </option>
                            <option value="day">Per Day</option>
                            <option value="month">Per Month</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-9">
                            <input name="name" id="name" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Description</label>
                        <div class="col-xs-9">
                            <textarea name="description" id="description" class="form-control" type="text" style="width:335px;"></textarea>
                           
                        </div>
                    </div>

                    <?php

                        $start  = date("m/d/Y");
                        $end    = date("m/d/Y");

                    ?>
                    <div class="form-group" id="date_5">
                        <label class="font-normal">Active Range</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input class="input-sm form-control" type="text" name="start" id="start" value="">
                            <span class="input-group-addon pl-2 pr-2">to</span>
                            <input class="input-sm form-control" type="text" name="end" id="end" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-normal">Masa Kerja</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input class="input-sm form-control" type="text" name="mk1" id="mk1" value="">
                            <span class="input-group-addon pl-2 pr-2">to</span>
                            <input class="input-sm form-control" type="text" name="mk2" id="mk2" value="">
                        </div>
                    </div>

                    <div class="form-group" style="border: 1px solid #EEE; padding: 5px 5px">
                        <label>From Employee</label>
                        <div class="input-group date">
                            <input class="form-control" name="from_employee" id="from_employee" type="text">
                            <span class="input-group-addon">%</span>
                        </div>
                        
                        <label>From Company</label>
                        <div class="input-group date">
                             <input class="form-control" name="from_company" id="from_company" type="text">
                            <span class="input-group-addon">%</span>
                        </div>
                       
                    </div>

                    <div class="form-group" style="border: 1px solid #EEE; padding: 5px 5px">
                        <label class="control-label col-xs-3" >Amount</label>
                        <div class="input-group date">
                            <span class="input-group-addon">Rp. </span>
                            <input name="amount" id="amount" class="form-control" type="text" style="width:335px;" >
                            
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
                    
                    <div class="form-group">
                        <label>Before</label>
                        <input name="id_allow" id="id_allow" class="form-control" type="hidden" style="width:335px;">
                        <span class="badge badge-primary badge-pill displayA"></span>
                        <span class="badge badge-success badge-pill displayB"></span>
                        <input type="hidden" name="displayA" id="displayA"  >
                        <input type="hidden" name="displayB" id="displayB"  >
                    </div>


                    <div class="form-group">
                        <label class="form-control-label">Type</label>
                        <select class="selectpicker form-control" name="typeEdit" id="typeEdit">
                            <option selected="" disabled=""> == Select == </option>
                            <option value="Allowance">Allowance</option>
                            <option value="Deduction">Deduction</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Pay</label>
                        <select class="selectpicker form-control" name="payEdit" id="payEdit">
                            <option selected="" disabled=""> == Select == </option>
                            <option value="day">Per Day</option>
                            <option value="month">Per Month</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-9">
                            <input name="nameEdit" id="nameEdit" class="form-control" type="text" style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Description</label>
                        <div class="col-xs-9">
                            <textarea name="descriptionEdit" id="descriptionEdit" class="form-control" type="text" style="width:335px;"></textarea>
                           
                        </div>
                    </div>
                    <div class="form-group" id="date_5">
                        <label class="font-normal">Active Range</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input class="input-sm form-control" type="text" name="startEdit" id="startEdit" value="">
                            <span class="input-group-addon pl-2 pr-2">to</span>
                            <input class="input-sm form-control" type="text" name="endEdit" id="endEdit" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-normal">Masa Kerja</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input class="input-sm form-control" type="text" name="mk1Edit" id="mk1Edit" value="">
                            <span class="input-group-addon pl-2 pr-2">to</span>
                            <input class="input-sm form-control" type="text" name="mk2Edit" id="mk2Edit" value="">
                        </div>
                    </div>

                    <div class="form-group" style="border: 1px solid #EEE; padding: 5px 5px">
                        <label>From Employee</label>
                        <div class="input-group date">
                            <input class="form-control" name="from_employeeEdit" id="from_employeeEdit" type="text">
                            <span class="input-group-addon">%</span>
                        </div>
                        
                        <label>From Company</label>
                        <div class="input-group date">
                             <input class="form-control" name="from_companyEdit" id="from_companyEdit" type="text">
                            <span class="input-group-addon">%</span>
                        </div>
                   
                    </div>
                    

                    <div class="form-group" style="border: 1px solid #EEE; padding: 5px 5px">
                        <label class="control-label col-xs-3" >Amount</label>
                        <div class="input-group date">
                            <span class="input-group-addon">Rp. </span>
                            <input name="amountEdit" id="amountEdit" class="form-control" type="text" style="width:335px;" >
                            
                        </div>
                    </div>
                  



                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
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
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

<script src="<?php echo base_url();?>asets/js/scripts/worktime.jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        show();   //pemanggilan fungsi tampil 
        
        $('#mydata').dataTable();
         
 
        function show(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>backend/config/allowances',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td><span class="badge badge-primary badge-pill">'+data[i].type +'</span></td>'+
                                '<td>'+data[i].allowance_name+'</td>'+
                                '<td>'+data[i].description+'</td>'+
                                '<td>'+data[i].amount+'</td>'+
                                '<td>'+data[i].from_emp+'%</td>'+
                                '<td>'+data[i].from_comp+'%</td>'+
                                '<td>'+data[i].from_date+'</td>'+
                                '<td>'+data[i].end_date+'</td>'+
                                '<td>'+data[i].mk1+' to '+data[i].mk2+'</td>'+
                                '<td><span class="badge badge-success badge-pill">'+data[i].pay+'</span></td>'+
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
                url  : "<?php echo base_url()?>backend/config/getAllowance",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,type){
                        $('#ModalaEdit').modal('show');
                        $('[name="id_allow"]').val(data.id);
                        $('[name="displayA"]').val(data.type);
                        $('[name="displayB"]').val(data.pay);
                        $('.displayA').text(data.type);
                        $('.displayB').text('per '+data.pay);

                        $('[name="nameEdit"]').val(data.allowance_name);
                        $('[name="descriptionEdit"]').val(data.description);
                        $('[name="amountEdit"]').val(data.amount);
                        $('[name="from_employeeEdit"]').val(data.from_employee);
                        $('[name="from_companyEdit"]').val(data.from_company);
                        $('[name="startEdit"]').val(data.starts);
                        $('[name="endEdit"]').val(data.ends);

                        $('[name="mk1Edit"]').val(data.mk1);
                        $('[name="mk2Edit"]').val(data.mk2);

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
            var name            = $('#name').val();
            var description     = $('#description').val();
            var from_employee   = $('#from_employee').val();
            var from_company    = $('#from_company').val();
            var start           = $('#start').val();
            var end             = $('#end').val();
            var amount          = $('#amount').val();
            var pay             = $('#pay').val();
            var type            = $('#type').val();
            var mk1             = $('#mk1').val();
            var mk2             = $('#mk2').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/config/addAllowance",
                dataType : "JSON",
                data : {name:name , description:description, amount:amount, from_employee:from_employee, from_company:from_company, start:start, end:end, pay:pay, type:type, mk1:mk1, mk2:mk2},
                success: function(data){

                    $('#ModalaAdd').modal('hide');
                    show();
                }
            });
            return false;
        });

        //Update
        $('#btn_update').on('click',function(){
            var id_allow        = $('#id_allow').val();
            var typeold         = $('#displayA').val();
            var payold          = $('#displayB').val();
            var nameEdit        = $('#nameEdit').val();
            var descriptionEdit = $('#descriptionEdit').val();
            var from_employeeEdit   = $('#from_employeeEdit').val();
            var from_companyEdit    = $('#from_companyEdit').val();
            var startEdit       = $('#startEdit').val();
            var endEdit         = $('#endEdit').val();
            var amountEdit      = $('#amountEdit').val();
            var payEdit         = $('#payEdit').val();
            var typeEdit        = $('#typeEdit').val();
            var mk1Edit         = $('#mk1Edit').val();
            var mk2Edit         = $('#mk2Edit').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/config/editAllowance",
                dataType : "JSON",
                data : {
                        id_allow    : id_allow,
                        typeold     : typeold,
                        payold      : payold,
                        nameEdit    : nameEdit , 
                        descriptionEdit     : descriptionEdit, 
                        amountEdit          : amountEdit, 
                        from_employeeEdit   : from_employeeEdit, 
                        from_companyEdit    : from_companyEdit, 
                        startEdit   : startEdit, 
                        endEdit     : endEdit, 
                        payEdit     : payEdit, 
                        typeEdit    : typeEdit,
                        mk1Edit     : mk1Edit,
                        mk2Edit     : mk2Edit
                    },
                success: function(data){
                    $('#ModalaEdit').modal('hide');
                     show();
                }
            });
            return false;
        });

        //Hapus 
        $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>backend/config/delAllowance",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                             show();
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

                        