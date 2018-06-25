<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
                     <div class="ibox">
                             <?php echo form_open(current_url()); ?>
                            <div class="ibox-head">
                                <div class="ibox-title">Edit LOG</div>
                            </div>
                            <div class="ibox-body">
                                <? foreach($detail as $object) 
                                {?>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <div class="input-group">
                                        <input class="form-control"  name="pin" type="text" disabled value="<?=$object['pin']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" id="daterange_3" name="date" type="text" value="<? echo date("m/d/Y", strtotime($object['tgl'])); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Time</label>
                                    <div class="input-group clockpicker" data-autoclose="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        <input class="form-control" type="text" name="time" value="<?=$object['waktu'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Status</label>
                                    <div>
                                        <select name="status" class="selectpicker show-tick form-control" data-width="200px">
                                        <?
                                            if($object['status']==0){
                                                $masuk  = "selected";
                                                $keluar = "";
                                            }else{
                                                $masuk  = "";
                                                $keluar = "selected";
                                            }
                                        ?>
                                            <option value="0" <?=$masuk?>>Masuk</option>
                                            <option value="1" <?=$keluar?>>Keluar</option>
                                        </select>
                                    </div>
                                </div>

                                <? } ?>
                                <?php echo form_submit('submit', 'UPDATE', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>
