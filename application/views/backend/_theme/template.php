<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url();?>asets/img/logos/msi.jpg" type="image/gif" sizes="16x16">
    <title>{pagetitle}</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?php echo base_url();?>asets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="<?php echo base_url();?>asets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/clockpicker/dist/bootstrap-clockpicker.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/multiselect/css/multi-select.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/dataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?php echo base_url();?>asets/css/main.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>asets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url();?>asets/css/jquery.dataTables.css'?>">
    <!-- PAGE LEVEL STYLES-->
     <link href="<?php echo base_url();?>asets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <? if(isset($segment)){?>
    <link href="<?php echo base_url();?>asets/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asets/vendors/fullcalendar/dist/fullcalendar.print.min.css" rel="stylesheet" media="print" />
    <link href="<?php echo base_url();?>asets/vendors/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <?}?>
</head>

	<body>
		<div class="page-wrapper">
			<!-- BEGIN PAGA BACKDROPS-->
			    <div class="sidenav-backdrop backdrop"></div>
			    <div class="preloader-backdrop">
			        <div class="page-preloader"></div>
			    </div>
			    <!-- END PAGA BACKDROPS-->
			{nav_header}
			{nav_side}
			<div class="content-wrapper">
	            <!-- START PAGE CONTENT-->
                <div class="page-heading">
                    <h1 class="page-title">{subtitle}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo site_url('backend/dashboard'); ?>"><i class="la la-home font-20"></i></a>
                        </li>
                        <li class="breadcrumb-item">Head Content Name</li>
                        <li class="breadcrumb-item">Content Name</li>
                        <li class="breadcrumb-item">Child Content Name</li>
                    </ol>
                </div>
	            <div class="page-content fade-in-up">
	            	{content}
                	<!-- New Event Dialog-->
                    <div class="modal fade" id="new-event-modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form class="modal-content form-horizontal" id="newEventForm" action="javascript:;">
                                <div class="modal-header p-4">
                                    <h5 class="modal-title">NEW EVENT</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <div class="form-group mb-4">
                                        <label class="text-muted mb-3">Category</label>
                                        <div>
                                            <label class="radio radio-outline-primary radio-inline check-single" data-toggle="tooltip" data-original-title="General">
                                                <input type="radio" name="category" checked value="fc-event-primary">
                                                <span class="input-span"></span>
                                            </label>
                                            <label class="radio radio-outline-warning radio-inline check-single" data-toggle="tooltip" data-original-title="Payment">
                                                <input type="radio" name="category" value="fc-event-warning">
                                                <span class="input-span"></span>
                                            </label>
                                            <label class="radio radio-outline-success radio-inline check-single" data-toggle="tooltip" data-original-title="Technical">
                                                <input type="radio" name="category" value="fc-event-success">
                                                <span class="input-span"></span>
                                            </label>
                                            <label class="radio radio-outline-danger radio-inline check-single" data-toggle="tooltip" data-original-title="Registration">
                                                <input type="radio" name="category" value="fc-event-danger">
                                                <span class="input-span"></span>
                                            </label>
                                            <label class="radio radio-outline-info radio-inline check-single" data-toggle="tooltip" data-original-title="Security">
                                                <input type="radio" name="category" value="fc-event-info">
                                                <span class="input-span"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input class="form-control form-control-line" id="new-event-title" type="text" name="title" placeholder="Title">
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group mb-4">
                                            <label class="col-form-label text-muted">Start:</label>
                                            <div class="input-group-icon input-group-icon-right">
                                                <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                                <input class="form-control form-control-line datepicker date" id="new-event-start" type="text" name="start" value="">
                                            </div>
                                        </div>
                                        <div class="col-6 form-group mb-4">
                                            <label class="col-form-label text-muted">End:</label>
                                            <div class="input-group-icon input-group-icon-right">
                                                <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                                <input class="form-control form-control-line datepicker date" id="new-event-end" type="text" name="end" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4 pt-3">
                                        <label class="ui-switch switch-icon mr-3 mb-0">
                                            <input id="new-event-allDay" type="checkbox" checked>
                                            <span></span>
                                        </label>All Day</div>
                                </div>
                                <div class="modal-footer justify-content-start bg-primary-50">
                                    <button class="btn btn-primary btn-rounded" id="addEventButton" type="submit">Add event</button>
                                </div>
                            </form>
                        </div>
                    </div>
	        	

			        

	        	</div>
                <!-- END PAGE CONTENT-->
                <footer class="page-footer">
                    <div class="font-13">2018 © <b>PT Megah Sembada Industries</b></div>
                    <div>
                        
                        <a class="px-3" href="#" target="_blank">V.B 1.009</a>
                    </div>
                    <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
                </footer>
	    	</div>
     	</div>
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader"></div>
        </div>
        <!-- END PAGA BACKDROPS-->

    <!-- CORE PLUGINS-->



    <?php
    if(!isset($group_dept)){?>
    <script src="<?php echo base_url();?>asets/vendors/jquery/dist/jquery.min.js"></script>

    <?}?>
    

    <script src="<?php echo base_url();?>asets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?php echo base_url();?>asets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/multiselect/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/dataTables/datatables.min.js"></script>

    <script src="<?php echo base_url();?>asets/vendors/dataTables/jquery.js'?>"></script>
    <script src="<?php echo base_url();?>asets/vendors/dataTables/bootstrap.js'?>"></script>
    <script src="<?php echo base_url();?>asets/vendors/dataTables/jquery.dataTables.js'?>"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url();?>asets/js/app.min.js"></script>
    <script src="<?php echo base_url();?>asets/js/scripts/form-plugins.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="<?php echo base_url();?>asets/js/scripts/dashboard_6.js"></script>
   
    <script src="<?php echo base_url();?>asets/vendors/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery.steps/build/jquery.steps.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery.maskedinput/dist/jquery.maskedinput.min.js"></script>

    <? if(isset($segment)){?>
    <script src="<?php echo base_url();?>asets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url();?>asets/vendors/jquery-ui/jquery-ui.min.js"></script>

    <!-- PAGE LEVEL SCRIPTS-->
    <script src="<?php echo base_url();?>asets/js/scripts/toastr-demo.js"></script>
    <script src="<?php echo base_url();?>asets/js/scripts/calendar-demo.js"></script>
    <?}?>
    <script>
        $(function() {
            $('#datatable').DataTable({
                pageLength: 25,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false
                }]
            });

            var table = $('#datatable').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(4).search($(this).val()).draw();
            });
        });
    </script>
    <script>
        $(function() {
            $('#form-wizard').steps({
                headerTag: "h6",
                bodyTag: "section",
                titleTemplate: '<span class="step-number">#index#</span> #title#',
                onStepChanging: function(event, currentIndex, newIndex) {
                    var form = $(this);
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onFinishing: function(event, currentIndex) {
                    var form = $(this);
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    toastr.success('Submitted!');
                }
            }).validate({
                errorPlacement: function errorPlacement(error, element) {
                    error.insertAfter(element);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                },
                errorClass: "help-block error",
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        })
    </script>
    
    <script>
        $(function() {
            $('#ex-date').mask('99/99/9999', {
                placeholder: 'dd/mm/yyyy'
            });
            $('#time_in').mask('99:99:99', {
                placeholder: 'tt:mm:dd'
            });
            $('#time_out').mask('99:99:00', {
                placeholder: 'tt:mm:dd'
            });
            $('#time_in_e').mask('99:99:99', {
                placeholder: 'tt:mm:dd'
            });
            $('#time_out_e').mask('99:99:00', {
                placeholder: 'tt:mm:dd'
            });
           
            $('#ex-ext').mask('(999) 999-9999? x9999');
            $('#ex-credit').mask('****-****-****-****', {
                placeholder: '*'
            });
            //$('#salary').mask('999.999.999.999');
            $('#npwp').mask('99.999.999.9-999.999');
            
            $('#ex-tax').mask('99-9999999');
            $('#ex-currency').mask('$ 99.99');
            $('#ex-product').mask('a*-999-a999', {
                placeholder: 'a*-999-a999'
            });
            
            $.mask.definitions['~'] = '[+-]';
            $('#ex-eye').mask('~9.99 ~9.99 999');

        })
    </script>
    <style type="text/css">
    table{
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 5px;
        text-align: left;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
          
            var markup = "<tr><td><label class='ui-switch switch-icon switch-large switch-square'><input type='checkbox' id='record'><span></span></label></td><td><input class='form-control' type='text' id='record' name='name[]' placeholder='Name'></td><td><input class='form-control' type='text' id='record' name='family_status[]'' placeholder='Family Status'></td></tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[id="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
	</body>
</html>