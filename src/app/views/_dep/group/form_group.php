<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Create a Group</h4>
        </div>
        <div class="modal-body">
            
            <form class="form-horizontal" role="form" id="form_create_group_form" action="<?=$this->_base_url;?>api/group/create/">
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="groupname" class="col-lg-4 control-label">Name</label>
                    <div class="col-lg-8">
                        <input id="groupname" name="groupname" type="text" placeholder="e.g. 'Amazing Monkeys'" class="form-control" required="required" autofocus="autofocus" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="groupslug" class="col-lg-4 control-label">Slug</label>
                    <div class="col-lg-8">
                        <input id="groupslug" name="groupslug" type="text" placeholder="e.g. 'amazing manhattan monkeys'" class="form-control" required="required" autofocus="autofocus" />
                    </div>
                </div>
                
                <!-- Textarea -->
                <div class="form-group">
                    <label class="control-label">Charter</label>
                    <div class="col-lg-12">
                        <textarea id="description" name="description" placeholder="e.g. 'We are the amazing Manhattan Monkeys!  Born to ride, destined to swing tree to tree.'" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            <div id="form_create_group_status"></div>
            <button id="btnCancel" name="btnCancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="btnSave" name="btnSave" class="btn btn-primary" onclick="form_submit()">Save</button>
        </div>
    </div><!-- /.modal-content -->
    
    </form>
    
</div><!-- /.modal-dialog -->

<script>
    function form_submit() {
        var form = $('form#form_create_group_form');
        $.ajax( {
               type: "POST",
               url: form.attr( 'action' ),
               data: form.serialize(),
               dataType: "json",
               success: function( response ) {
               
               if(response.success==true) {
               location.reload();
               } else {
               $('#form_create_group_status').text(response.reason);
               }
               console.log( response );
               }
               } );
    }
        
    </script>
