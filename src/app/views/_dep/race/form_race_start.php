<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Start a race</h4>
        </div>
        <form class="form-horizontal" role="form" id="form_race_start" action="<?=$this->_base_url;?>api/race/start/" method="POST">
            
            <div class="modal-body">
                <!-- Text input-->
                <div class="form-group">
                    <label for="race_name" class="col-lg-4 control-label">Race Name</label>
                    <div class="col-lg-8">
                        <input id="race_name" name="race_name" type="text" placeholder="e.g. My Fantastic Race" class="form-control" required="required" autofocus="autofocus" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="trackname" class="col-lg-4 control-label">Track</label>
                    <div class="col-lg-8">
                        <input id="trackname" name="trackname" type="text" placeholder="" class="form-control" disabled="disabled" />
                        <input id="track_id" name="track_id" type="hidden" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="trackname" class="col-lg-4 control-label">Segment</label>
                    <div class="col-lg-8">
                        <input id="segmentname" name="segmentname" type="text" placeholder="" class="form-control" disabled="disabled" />
                        <input id="segment_id" name="segment_id" type="hidden" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="wager_amount" class="col-lg-4 control-label">Minimum Wager</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input id="card_amount" name="wager_amount" type="text" class="form-control" value="0" />
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="start_date" class="col-lg-4 control-label">Start Date</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input id="start_date" name="start_date" type='text' class="form-control" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="end_date" class="col-lg-4 control-label">End Date</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <div class='input-group date' id='datetimepicker2'>
                                <input id="end_date" name="end_date" type='text' class="form-control" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-4 col-lg-8">
                        <div class="checkbox">
                            <label>
                                <input id="also_entry" name="also_entry" type="checkbox" /> This track is my entry
                            </label>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
                <div id="form_track_upload_status"></div>
                <button id="btnCancel" name="btnCancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="btnSave" name="btnSave" class="btn btn-success" type="submit">Add</button>
            </div>
        </form>
        
    </div><!-- /.modal-content -->
    
    </form>
    
</div><!-- /.modal-dialog -->

<script>
    $(document).ready( function() {
                      console.log(track_data);
                      $('#track_id').val(track_data.track_id);
                      $('#race_name').val(track_data.trackname);
                      $('#trackname').val(track_data.trackname);
                      $('#segmentname').val('Segment ' + selected_segment);
                      $('#segment_id').val(track_data.segments[selected_segment].segment_id);
                      $('#datetimepicker1').datetimepicker({pickTime: false});
                      $('#datetimepicker2').datetimepicker({pickTime: false});
                      });
                      
                      function form_submit() {
                          var form = $('form#form_track_upload_form').submit();
                          /*
                           $.ajax( {
                           type: "POST",
                           url: form.attr( 'action' ),
                           data: form.serialize(),
                           dataType: "json",
                           success: function( response ) {
                           
                           if(response.success==true) {
                           window.location.href = response.url;
                           } else {
                           $('#form_track_upload_status').text(response.reason);
                           }
                           console.log( response );
                           }
                           } );
                           */
                      }

    </script>
