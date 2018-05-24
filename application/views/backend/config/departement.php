                
                <style type="text/css">
                     .span-right{
                        float:right;
                    }
                    #snoAlertBox{
                    position:fixed;
                    z-index:9999;
                    top:12px;
                    right:12px;
                    margin:0px auto;
                    text-align:center;
                    display:none;
                    width: 300px;
                    padding: 15px 15px 15px 50px;
                    }
                    .hide {
    display: none;
}

                </style>
            <div class="page-heading">
                
                <div id="snoAlertBox" class="alert alert-success" data-alert="alert">
                   <span id="notification"></span>
                </div>

            </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">{titletab1}</div>
                                <input type="hidden" id="nestable-output">
                                 <menu id="nestable-menu">
                                        <button type="button" class="btn btn-primary mr-2" data-action="expand-all">Expand All</button>
                                        <button type="button" class="btn btn-primary mr-2" data-action="collapse-all">Collapse All</button>
                                        <button id="save" class="btn btn-primary mr-2">Save</button>
                                </menu>
                               
                            </div>
                            <div class="ibox-body">
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <div class="dd" id="nestable">{departement}</div>
                                     </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">{titletab2}
                                   
                                </div>
                            </div>
                            <div class="ibox-body">

                                <table class="table table-bordered table-hover">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>DEPT NAME</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" id="label" class="form-control" placeholder="" required></td>
                                        <input type="hidden" id="link" class="form-control" placeholder="">
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" id="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="button" id="reset" class="btn btn-primary mr-2">Reset</button>
                                            </div>
                                            </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" id="id">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Departement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="id" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus Departement ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

            <!-- END PAGE CONTENT-->
            <script src="<?php echo base_url();?>asets/vendors/jquery/dist/jquery.min.js"></script>

            <script src="<?php echo base_url();?>asets/vendors/nestable/jquery.nestable.js"></script>
            <script type="text/javascript">
                 function closeSnoAlertBox(){
                window.setTimeout(function () {
                  $("#snoAlertBox").fadeOut(3000)
                }, 3000);
            } 
            </script>
            <script>
        $(function() {
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            // activate Nestable for list 1
            $('#nestable').nestable({
                    group: 1
                })
                .on('change', updateOutput);

            // activate Nestable for list 2
           /* $('#nestable2').nestable({
                    group: 1
                })
                .on('change', updateOutput);*/

            // output initial serialised data
            updateOutput($('#nestable').data('output', $('#nestable-output')));
           /* updateOutput($('#nestable2').data('output', $('#nestable2-output')));*/

                $('#nestable-menu').on('click', function(e)
                {
                    var target = $(e.target),
                        action = target.data('action');
                    if (action === 'expand-all') {
                        $('.dd').nestable('expandAll');
                    }
                    if (action === 'collapse-all') {
                        $('.dd').nestable('collapseAll');
                    }
                });
        });


    </script>
    <script>
  $(document).ready(function(){
    $("#load").hide();
    $("#submit").click(function(){
       $("#load").show();

       var dataString = { 
              label : $("#label").val(),
              link : $("#link").val(),
              id : $("#id").val()
            };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>backend/config/add_departement",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){
              if(data.type == 'add'){
                 $("#menu-id").append(data.menu);
              } else if(data.type == 'edit'){
                 $('#label_show'+data.id).html(data.label);
                 $('#link_show'+data.id).html(data.link);
              } else if(data.type == 'error'){
                document.getElementById("notification").innerHTML = "Fill form";
                $("#snoAlertBox").fadeIn();
                closeSnoAlertBox();
              }
              $('#label').val('');
              $('#link').val('');
              $('#id').val('');
              $("#load").hide();


            } ,error: function(xhr, status, error) {
              alert('Save Menu '+error);
            },
        });
    });

    $('.dd').on('change', function() {
        $("#load").show();
     
          var dataString = { 
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>backend/config/move_departement",
            data: dataString,
            cache : false,
            success: function(data){
              $("#load").hide();
              console_log(data);
            } ,error: function(xhr, status, error) {
              alert('Move '+error);
            },
        });
    });

    $("#save").click(function(){
         $("#load").show();
     
          var dataString = { 
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>backend/config/move_departement",
            data: dataString,
            cache : false,
            success: function(data){
              document.getElementById("notification").innerHTML = "Data has been saved";
                $("#snoAlertBox").fadeIn();
              closeSnoAlertBox();
            } ,error: function(xhr, status, error) {
              alert('Move '+error);
            },
        });
    });
    $(document).on("click",".del-button",function() {
            var id = $(this).attr('id');
            $('#ModalHapus').modal('show');
            $('[name="id"]').val(id);
    });


    $(document).on("click",".edit-button",function() {
        var id = $(this).attr('id');
        var label = $(this).attr('label');
        /*var link = $(this).attr('link');*/
        $("#id").val(id);
        $("#label").val(label);
       $("#link").val(link);
    });

    $(document).on("click","#reset",function() {
        $('#label').val('');
        $('#link').val('');
        $('#id').val('');
    });

  });

</script>

<script type="text/javascript">
            $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>backend/config/del_departement",
                data: { id : id },
                cache : false,
                success: function(data){
                  $('#ModalHapus').modal('hide');
                  $("li[data-id='" + id +"']").remove();
                } ,error: function(xhr, status, error) {
                  alert(error);
                },
            });
                return false;
            });
</script>

