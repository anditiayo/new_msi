
<div class="row">
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Group Events List</div>
            </div>
            <div class="ibox-body p-3">
                <div class="table-responsive row" style="overflow-y: auto;overflow-x: hidden; height: 1000px;resize: vertical;">
                <div id="external-events">
                     <?php
                    foreach ($grouplist as $key => $value) {?>
                       
                        <div class="ex-event" data-class="fc-event-primary <? echo $value['id'].' '.$value['time_in'].' '.$value['time_out']; ?>">
                            <i class="badge-point badge-primary mr-3"></i>
                            <? echo $value['name_group'];?>
                        </div>

                    <?}?>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Calendar Events</div>
                <button class="btn btn-primary btn-rounded btn-air my-3" data-toggle="modal" data-target="#new-event-modal">
                    <span class="btn-icon"><i class="la la-plus"></i>New Event</span>
                </button>
            </div>
            <div class="ibox-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <!-- Event Detail Dialog-->
                <div class="modal fade" id="event-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content form-horizontal" id="eventForm" action="javascript:;">
                            <div class="modal-header p-4">
                                <h5 class="modal-title">EDIT EVENT</h5>
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
                                    <input class="form-control form-control-line" id="event-title" type="text" name="title" placeholder="Title">
                                    <input class="form-control form-control-line" id="event-id" type="hidden" name="id" placeholder="Title">
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group mb-4">
                                        <label class="col-form-label text-muted">Start:</label>
                                        <div class="input-group-icon input-group-icon-right">
                                            <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                            <input class="form-control form-control-line datepicker date" id="event-start" type="text" name="start" value="">
                                        </div>
                                    </div>
                                    <div class="col-6 form-group mb-4">
                                        <label class="col-form-label text-muted">End:</label>
                                        <div class="input-group-icon input-group-icon-right">
                                            <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                            <input class="form-control form-control-line datepicker date" id="event-end" type="text" name="end" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4 pt-3">
                                    <label class="ui-switch switch-icon mr-3 mb-0">
                                        <input id="event-allDay" type="checkbox">
                                        <span></span>
                                    </label>All Day</div>
                            </div>
                            <div class="modal-footer justify-content-between bg-primary-50">
                                <button class="btn btn-primary btn-rounded" id="editEventButton" type="submit">Submit</button>
                                <a class="text-danger" id="deleteEventButton" data-dismiss="modal"><i class="la la-trash font-20"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Event Detail Dialog--> 
</div>

