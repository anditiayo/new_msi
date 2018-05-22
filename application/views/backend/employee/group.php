<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="<?php echo base_url();?>asets/js/scripts/worktime.jquery.min.js"></script>
<script src="<?php echo base_url();?>asets/js/scripts/sort.jquery-ui.js"></script>
<script src="<?php echo base_url();?>asets/js/scripts/sort.jquery-ui.min.js"></script>
<link href="<?php echo base_url();?>asets/css/pages/sort.jquery-ui.css" rel="stylesheet" />               
<style type="text/css">
.sortable_list {

width: 265px;
min-height: 20px;
list-style-type: none;
margin: 0;
padding: 5px 0 20px 0;
margin-right: 10px;


}

.sortable_list li {
margin: 5px 0 0;
padding: 5px;
font-weight: normal;
font-size: 1.2em;
width: 255px;
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


</style>
            <div class="page-heading">
                <h1 class="page-title">Employee</h1>
                
                <div id="snoAlertBox" class="alert alert-success" data-alert="alert">
                   <span id="notification"></span>
                </div>

            </div>



            <div class="flexbox-b mb-5">
                    <span class="mr-4 static-badge badge-pink"><i class="la la-calendar-check-o font-36"></i></span>
                    <div>
                        <h5 class="font-strong">Calendar Events</h5>
                        <!-- <div class="text-light">Found 18 Events for this week</div> -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Group Events List</div>
                            </div>
                            <div class="ibox-body">
                                <div class="table-responsive row" style="overflow-y: auto;overflow-x: hidden; height: 1000px;resize: vertical;">
                                <ul id="0" class="sortable_list connectedSortable">
                                <li >LIST NAMA</li>
                                <?php
                                    foreach ($grouplist_emp as $key => $value) {
                                        echo '<li class="ui-state-highlight">['.$value['employee_id'].'] '.$value['f_name'].' '.$value['m_name'].'</li>';
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
                                    foreach ($grouplist as $key => $value) {?>
                                        <div><a><? echo $value['name_group'].'</a></br><a>'.$value['time_name'];?></a>
                                        <ul id="<?=$value['id']?>" class="sortable_list connectedSortable">
                                             <?php
                                                foreach ($grouplist_emp_all as $keys => $values) {
                                                    if($value['id'] ==$values['grouptime'] ){
                                                        echo '<li class="ui-state-default">['.$values['employee_id'].'] '.$values['f_name'].' '.$values['m_name'].'</li>';
                                                    }
                                                   
                                                }
                                            ?>
                                           
                                            
                                        </ul>
                                        </div>
                                <?}?>
                                </div>
                            </div>
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
