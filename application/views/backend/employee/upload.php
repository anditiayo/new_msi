


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
                            $output = '';
                            $output .= form_open_multipart('backend/import/save');
                            $output .= '<div class="row">';
                            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group">';
                            $output .= form_label('Choose file', 'image');
                            $output .= '<select class="form-control" name="option" id="option">';
                            $output .= '<option value="" disabled selected> ==SELECT== </option>';
                            $output .= '<option value="1"> Upload Potongan Pinjaman</option>';
                            $output .= '<option value="2"> Upload Simpan Wajib</option>';
                            $output .= '<option value="3"> Excel</option>';

                            $output .= '</select>';
                            $data = array(
                                'name' => 'userfile',
                                'id' => 'userfile',
                                'class' => 'form-control filestyle',
                                'value' => '',
                                'data-icon' => 'false'
                            );
                            $output .= form_upload($data);
                            $output .= '</div> <span style="color:red;">*Please choose an Excel file(.xls or .xlxs) as Input</span></div>';
                            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group text-right">';
                            $data = array(
                                'name' => 'importfile',
                                'id' => 'importfile-id',
                                'class' => 'btn btn-primary',
                                'value' => 'Import',
                            );
                            $output .= form_submit($data, 'Import Data');
                            $output .= '</div>
                                                    </div></div>';
                            $output .= form_close();
                            echo $output;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
