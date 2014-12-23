<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Upload a GPS Track</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" role="form" id="form_track_upload_form" action="<?=$this->_base_url;?>api/track/upload/" enctype="multipart/form-data" method="POST">
                <!-- Text input-->
                <div class="form-group">
                    <label for="track_files" class="col-lg-4 control-label">GPX Track File</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse&hellip; <input type="file" name="track_files" id="track_files">
                                </span>
                            </span>
                            <input type="text" class="form-control" name="track_files" id="track_files" readonly>
                        </div>
                        <span class="help-block">
                            The file should be in GPX format for now
                        </span>
                    </div>
                </div>
            </form>
            
        </div>
        <div class="modal-footer">
            <div id="form_track_upload_status"></div>
            <button id="btnCancel" name="btnCancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="btnSave" name="btnSave" class="btn btn-success" onclick="form_submit()">Add</button>
        </div>
    </div><!-- /.modal-content -->
    
    </form>
    
</div><!-- /.modal-dialog -->

    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 999px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            background: red;
            cursor: inherit;
            display: block;
        }
        input[readonly] {
            background-color: white !important;
            cursor: text !important;
        }
    </style>
    

<script>
        $(document)
            .on('change', '.btn-file :file', function() {
                var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
        });
        
        $(document).ready( function() {
            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                
                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;
                
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
                
            });
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
