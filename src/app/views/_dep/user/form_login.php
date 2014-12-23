

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Please sign in</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" id="form_login_form" action="<?=$this->_base_url;?>api/user/login/">
                <div class="form-group">
                  <div class="col-lg-12">
                    <input id="username" name="username" type="text" class="form-control" placeholder="Username" autofocus="autofocus" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <div id="form_login_status"></div>
          <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-remote="<?=$this->_base_url;?>form/user/register/" href="#form_register" >Register</a>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" onclick="form_submit()">Login</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
    function form_submit() {
        var form = $('form#form_login_form');
        $.ajax( {
               type: "POST",
               url: form.attr( 'action' ),
               data: form.serialize(),
               dataType: "json",
               success: function( response ) {
               
               if(response.success==true) {
               location.reload();
               } else {
               $('#form_login_status').text(response.reason);
               }
               console.log( response );
               }
               } );
    }
    
    </script>

