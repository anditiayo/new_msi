                

                <div class="row">
                    <div class="col-md-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Group Events List</div>
                            </div>
                            <div class="ibox-body p-3">
                                <div id="external-events">
                                     <?php
                                    foreach ($grouplist as $key => $value) {?>
                                       
                                        <div class="ex-event" data-class="fc-event-primary"><i class="badge-point badge-primary mr-3"></i><?=$value['name_group'].' '.$value['time_name'];?></div>

                                    <?}?>
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
                </div>