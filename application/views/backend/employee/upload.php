


        <div class="row">
        <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                                <div class="ibox-title"></div>
                                <div class="ibox-tools">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                     
                                    </div>
                                </div>
                            </div>
                    <div class="ibox-body">
                        <div class="table-responsive row">

                            <?php
                                echo form_open_multipart($action);
                     
                                echo '<div class="form-group">';
                                echo '<label>Judul ' . form_error('judul') . '</label>'; // show error judul
                                echo form_input('judul', $judul, 'class="form-control" placeholder="Judul"');
                                echo '</div>';
                     
                                echo '<div class="form-group">';
                                echo '<label>File Excel ' . $error . '</label></br>'; // show error upload
                                echo form_upload('userfile');
                                echo '</div>';
                     
                                echo form_submit('mysubmit', 'Upload', 'class="btn btn-primary"');
                                echo form_close();
                                ?>
                        </div>
                    </div>
                </div>
            </div>
