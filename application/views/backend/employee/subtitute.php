<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>               
 <div class="row">
        <div class="col-md-6">
        <div class="ibox">

            <div class="ibox-head">
                        <div class="ibox-title">Subtitute</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/add"> <i class="ti-pencil"></i>Add Time</a> -->
                                <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#ModalaAdd"><i class="ti-pencil"></i>Add Sub</a>
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
                                    <th>NIK</th>
                                    <th>Name</th>
                                    <th>From</th>
                                    <th>To</th>
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
                <h3 class="modal-title" id="myModalLabel">Add Subs</h3>
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
                        <label class="font-normal">from</label>
                        <div class="input-group date form_datetime">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" name="fromdate" id="fromdate" value="<? echo date('Y-m-d H:i:s',strtotime($date))?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-normal">to</label>
                        <div class="input-group date form_datetime">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" name="todate" id="todate" value="<? echo date('Y-m-d H:i:s',strtotime($date))?>">
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

                            <input list="editnames" name="idEdit" id="idEdit" class="form-control" value="<?=$pin?>" />
                            <datalist id="editnames" >
                            <?php
                                foreach ($name as $key) {
                                    echo '<option value='.$key['employee_id'].'>'.$key['first_name'].' '.$key['last_name'].'</option>';
                                }
                             ?>
                            </datalist>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-normal">Date</label>
                        <div class="input-group date form_datetime">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" name="fromdateEdit" id="fromdateEdit" value="<? echo date('Y-m-d H:i:s',strtotime($date))?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-normal">Date</label>
                        <div class="input-group date form_datetime">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" name="todateEdit" id="todateEdit" value="<? echo date('Y-m-d H:i:s',strtotime($date))?>">
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
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus ini?</p></div>
                                        
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
        show_time();   //pemanggilan fungsi tampil 
        
        $('#mydata').dataTable();
         
 
        function show_time(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>backend/employee/Subtitutelist',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].employee_id+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].todate+'</td>'+
                                '<td>'+data[i].fromdate+'</td>'+
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
                url  : "<?php echo base_url()?>backend/employee/get_subtitutelist",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,employee_id, fromdate, todate){
                        $('#ModalaEdit').modal('show');
                        $('[name="edit_id"]').val(data.id);
                        $('[name="idEdit"]').val(data.employee_id);
                        $('[name="fromdateEdit"]').val(data.fromdate);
                        $('[name="todateEdit"]').val(data.todate);
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

            var code        =$('#code').val();
            var todate      =$('#todate').val();
            var fromdate    =$('#fromdate').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/employee/add_subtitutelist",
                dataType : "JSON",
                data : {code:code ,todate:todate,fromdate:fromdate},
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    show_time();
                }
            });
            return false;
        });

        //Update
        $('#btn_update').on('click',function(){
            
            var edit_id     = $('#edit_id').val();
            var idEdit      = $('#idEdit').val();
            var fromdateEdit    = $('#fromdateEdit').val();
            var todateEdit    = $('#todateEdit').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/employee/edit_subtitutelist",
                dataType : "JSON",
                data : {edit_id:edit_id, idEdit:idEdit , fromdateEdit:fromdateEdit, todateEdit:todateEdit},
                success: function(data){
                    $('#ModalaEdit').modal('hide');
                     show_time();
                }
            });
            return false;
        });

        //Hapus 
        $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>backend/employee/del_subtitutelist",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                             show_time();
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

                        