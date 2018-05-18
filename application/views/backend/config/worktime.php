<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>               
    <div class="page-heading">
        <h1 class="page-title">Work Time</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="col-md-6">
        <div class="ibox">

            <div class="ibox-head">
                        <div class="ibox-title"></div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="<?php echo base_url();?>backend/employee/add"> <i class="ti-pencil"></i>Add Time</a> -->
                                <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#ModalaAdd"><i class="ti-pencil"></i>Add Time</a>
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
                   <!--  <div class="input-group-icon input-group-icon-left mr-3">
                        <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                        <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                    </div> -->
                </div>
                <div class="table-responsive row">

                        <table class="table table-striped" id="mydata">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>In</th>
                                    <th>Out</th>
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
                <h3 class="modal-title" id="myModalLabel">Add Work Time</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-9">
                            <input name="time_name" id="time_name" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >In</label>
                        <div class="col-xs-9">
                            <input name="time_in" id="time_in" class="form-control" type="text" style="width:335px;" required>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Out</label>
                        <div class="col-xs-9">
                            <input name="time_out" id="time_out" class="form-control" type="text" style="width:335px;" required>
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
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <input name="edit_id" id="edit_id"  type="hidden">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-9">
                            <input name="time_name_e" id="time_name_e" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >In</label>
                        <div class="col-xs-9">
                            <input name="time_in_e" id="time_in_e" class="form-control" type="text" style="width:335px;" required>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Out</label>
                        <div class="col-xs-9">
                            <input name="time_out_e" id="time_out_e" class="form-control" type="text" style="width:335px;" required>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        show_time();   //pemanggilan fungsi tampil barang.
        
        $('#mydata').dataTable();
         
 
        function show_time(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>backend/config/worktimelist',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].time_name+'</td>'+
                                '<td>'+data[i].time_in+'</td>'+
                                '<td>'+data[i].time_out+'</td>'+
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
                url  : "<?php echo base_url()?>backend/config/get_worktimelist",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,time_name, time_in, time_out){
                        $('#ModalaEdit').modal('show');
                        $('[name="edit_id"]').val(data.id);
                        $('[name="time_name_e"]').val(data.time_name);
                        $('[name="time_in_e"]').val(data.time_in);
                        $('[name="time_out_e"]').val(data.time_out);
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

        //Simpan Barang
        $('#btn_simpan').on('click',function(){

            var time_name=$('#time_name').val();
            var time_in=$('#time_in').val();
            var time_out=$('#time_out').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/config/add_worktimelist",
                dataType : "JSON",
                data : {time_name:time_name , time_in:time_in, time_out:time_out},
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    show_time();
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            
            var edit_id     = $('#edit_id').val();
            var time_name_e = $('#time_name_e').val();
            var time_in_e   = $('#time_in_e').val();
            var time_out_e  = $('#time_out_e').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/config/edit_worktimelist",
                dataType : "JSON",
                data : {edit_id:edit_id, time_name_e:time_name_e , time_in_e:time_in_e, time_out_e:time_out_e},
                success: function(data){
                    $('#ModalaEdit').modal('hide');
                     show_time();
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>backend/config/del_worktimelist",
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

                        