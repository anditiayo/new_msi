<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="<?php echo base_url();?>asets/js/scripts/worktime.jquery.min.js"></script>
<script src="<?php echo base_url();?>asets/js/scripts/sort.jquery-ui.js"></script>
<script src="<?php echo base_url();?>asets/js/scripts/sort.jquery-ui.min.js"></script>
<link href="<?php echo base_url();?>asets/css/pages/sort.jquery-ui.css" rel="stylesheet" />               
<style type="text/css">
.sortable_list {
margin: 0 auto;
min-height: 20px;
list-style-type: none;
margin: 0;
padding: 5px 0 20px 0;


}

.left{
    width: 300;
    margin-left: 3px;
}
.right{
    width: 315px;
}
.sortable_list li {
padding: 3px 3px;
font-weight: normal;
font-size: 1.2em;
width: 255px;
margin-top:4px;

}

.right li{
background: #ebedee;
border-radius: 3px;
}

.right li i, .left li i{ 
    font-size:14px;color:white; 
    padding:10px 9px 9px;
    margin:-10px -5px -4px; 
    border: 1px solid #aaa;
    background: #ddd;
    border-radius: 1px;
    background-image: -webkit-gradient(linear,left bottom,left top,from(#ddd),to(#bbb));
    background-image: -webkit-linear-gradient(bottom,#ddd 0,#bbb 100%);
    background-image: -o-linear-gradient(bottom,#ddd 0,#bbb 100%);
    background-image: linear-gradient(0deg,#ddd 0,#bbb 100%);
}
.right li i:hover, .right li:hover,.left li i:hover, .left li:hover{
    background: #ebedee;
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
.sort{
margin: 5px 5px 5px 5px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
padding: 10px;
}

/*.sort:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}*/
.right li:hover,.left li:hover{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    font-weight: bold;
    width: 260px;
}


</style>
            <div class="page-heading">
                
                <div id="snoAlertBox" class="alert alert-success" data-alert="alert">
                   <span id="notification"></span>
                </div>

            </div>



                <div class="row">
        <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Group Events List</div>
                            </div>
                            <div class="ibox-body">
                                <div class="table-responsive row" style="overflow-y: auto;overflow-x: hidden; height: 1000px;resize: vertical;">
                                <ul id="0" class="sortable_list left connectedSortable">
                                <?php
                                    foreach ($grouplist_emp as $key => $value) {
                                        echo '<li class="ui-state-highlight"><i class="fa fa-bars"></i>&nbsp;&nbsp;['.$value['employee_id'].'] '.$value['f_name'].' '.$value['m_name'].'</li>';
                                    }
                                ?>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Calendar Events</div>
                            </div>

                            <div class="ibox-body">
                                <div class="table-responsive row">
                               <?php
                                   

                                    foreach ($departementlist as $key => $value) {?>
                                        <div class="sort ibox-title" ><a><? echo $value['label'].'</a>';?>
                                        <ul id="<?=$value['id']?>" class="sortable_list right  connectedSortable">
                                             <?php
                                                foreach ($grouplist_emp_all as $keys => $values) {
                                                    if($value['id'] ==$values['grouptime'] ){
                                                        echo '<li class="ui-state-default"><i class="fa fa-bars"></i>&nbsp;&nbsp;['.$values['employee_id'].'] '.$values['f_name'].' '.$values['m_name'].'</li>';
                                                    }
                                                }
                                            ?>
                                        </ul>
                                        </div>
                                <?}?>
                                </div>
                            </div>
                            <!--  <?
                                 echo "<pre>";
                                    print_r($grouplist);
                            ?> -->
                        </div>
                    </div>
                </div>

            <script type="text/javascript">
             $(function() {
                $( ".sortable_list" ).sortable({
                    connectWith: ".connectedSortable",
                    stop: function(event, ui) {
                        var item_sortable_list_id = $(this).attr('id');
                        console.log(ui);
                       //alert($(ui.sender).attr('id'))
                    },
                    receive: function(event, ui) {

                       //alert("To Group "+this.id); // Where the item is dropped
                       //alert("From Group "+ui.sender[0].id+" TO "+this.id); // Where it came from
                       //alert("Name "+ui.item[0].innerHTML); //Which item (or ui.item[0].id)
                        var to_group    = this.id;
                        var from_group  = ui.sender[0].id;
                        var name        = ui.item[0].innerHTML;
                         $.ajax({

                            type : "POST",
                            url  : "<?php echo base_url()?>backend/employee/change_list",
                            dataType : "JSON",
                            data : {to_group:to_group , from_group:from_group, name:name},
                            success: function(data){
                                console.log(data);
                                document.getElementById("notification").innerHTML = ui.item[0].innerHTML+" has change to group "+to_group ;
                                $("#snoAlertBox").fadeIn();
                                closeSnoAlertBox();
                            },error: function(data){
                                alert('oh');
                            }   
                        });
                         return false;
                    }
                }).disableSelection();
            });

             function closeSnoAlertBox(){
                window.setTimeout(function () {
                  $("#snoAlertBox").fadeOut(3000)
                }, 3000);
            } 
            </script>
