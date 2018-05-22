<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>               
    <div class="page-heading">
        <h1 class="page-title">Group Event</h1>
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
                                <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#ModalaAdd"><i class="ti-pencil"></i>Add New Group</a>
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
                                    <th>Work Time</th>
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
                <h3 class="modal-title" id="myModalLabel">Add group Time</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-9">
                            <input name="group_name" id="group_name" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Work Time</label>
                        <div class="col-xs-9">
                            <select name="work_time" id="work_time" class="selectpicker show-tick form-control" data-width="335px">
                                <option selected="" disabled="" value="NULL">Work Time List</option>
                                <?
                                    foreach ($worktimelist as $key) {
                                        echo "<option value='".$key['id']."'>".$key['time_name']."</option>";
                                    }
                                ?>
                            </select>
                            
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
                            <input name="group_name_e" id="group_name_e" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Before</label>
                        <div class="col-xs-9">
                            <input disabled="" name="work_time_display" id="work_time_display" class="form-control" type="text" style="width:335px;">
                            <input name="id_time_e" id="id_time_e" class="form-control" type="hidden">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Change Work Time to</label>
                        <div class="col-xs-9">
                            <select name="work_time_e" id="work_time_e" class="selectpicker show-tick form-control" data-width="335px">
                               
                                <option selected="" disabled="" value="NULL">Work Time List</option>
                                <?
                                    foreach ($worktimelist as $key) {
                                       echo "<option value='".$key['id']."'>".$key['time_name']."</option>";
                                    }
                                ?>
                            </select>
                            
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
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
        show_time();   //pemanggilan fungsi tampil 
        $('#mydata').dataTable();
         
 
        function show_time(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>backend/config/grouptimelist',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].name_group+'</td>'+
                                '<td>'+data[i].time_name+'</td>'+
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
                url  : "<?php echo base_url()?>backend/config/get_grouptimelist",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,group_name,work_time){
                        $('#ModalaEdit').modal('show');
                        $('[name="edit_id"]').val(data.id);
                        $('[name="group_name_e"]').val(data.name_group);
                        $('[name="work_time_display"]').val(data.time_name);
                        $('[name="id_time_e"]').val(data.id_time);
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

            var group_name=$('#group_name').val();
            var work_time=$('#work_time').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/config/add_grouptimelist",
                dataType : "JSON",
                data : {group_name:group_name , work_time:work_time},
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    show_time();
                },error: function(data){
                    alert(data);
                }
            });
            return false;
        });

        //Update
        $('#btn_update').on('click',function(){
            var edit_id         = $('#edit_id').val();
            var group_name_e    = $('#group_name_e').val();
            var work_time_e     = $('#work_time_e').val();
            var id_time_e       = $('#id_time_e').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>backend/config/edit_grouptimelist",
                dataType : "JSON",
                data : {edit_id:edit_id, group_name_e:group_name_e , work_time_e:work_time_e, id_time_e:id_time_e},
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
            url  : "<?php echo base_url()?>backend/config/del_grouptimelist",
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

                        