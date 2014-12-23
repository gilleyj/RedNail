<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">User Registration</h4>
        </div>
        <div class="modal-body">
            
            <form class="form-horizontal" role="form" id="form_register_form" action="<?=$this->_base_url;?>api/user/register/">
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="username" class="col-lg-4 control-label">Username</label>
                    <div class="col-lg-8">
                        <input id="username" name="username" type="text" placeholder="e.g. 'FuriousFast'" class="form-control" required="required" autofocus="autofocus" />
                    </div>
                </div>
                
                <!-- Password input-->
                <div class="form-group">
                    <label for="password" class="col-lg-4 control-label">Password Twice</label>
                    <div class="col-lg-4">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div class="col-lg-4">
                        <input id="password_confirm" name="password_confirm" type="password" class="form-control" placeholder="Confirm Password" required="required" />
                    </div>
                    
                </div>
                
                <!-- Email input-->
                <div class="form-group">
                    <label for="email" class="col-lg-4 control-label">Email</label>
                    <div class="col-lg-8">
                        <input id="email" name="email" type="email" class="form-control" placeholder="e.g 'Bagerpants@betty.com'" required="required" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="firstname" class="col-lg-4 control-label">First &amp; Last Name</label>
                    <div class="col-lg-4">
                        <input id="firstname" name="firstname" type="text" placeholder="e.g. 'Betty'" class="form-control" />
                    </div>
                    <div class="col-lg-4">
                        <input id="lastname" name="lastname" type="text" placeholder="e.g 'Bagerpants'" class="form-control" />
                    </div>
                    
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">Your Country</label>
                    <div class="col-lg-8">
                        <input id="country" name="country" type="text" placeholder="e.g. 'United Kingdom'" class="form-control typeahead" />
                    </div>
                </div>
                
                <!-- Textarea -->
                <div class="form-group">
                    <label class="control-label">Your Bio</label>
                    <div class="col-lg-12">
                        <textarea id="description" name="description" placeholder="e.g. 'I was born to a king, but lived in poverty.  I have a bike and I'm not afraid to use it!'" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            <div id="form_register_status"></div>
            <button id="btnCancel" name="btnCancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="btnSave" name="btnSave" class="btn btn-primary" onclick="form_submit()">Save</button>
        </div>
    </div><!-- /.modal-content -->
    
    </form>
    
</div><!-- /.modal-dialog -->

<style>
    .twitter-typeahead .tt-hint
    {
        display: block;
        height: 37px;
        padding: 0px 12px;
        font-size: 14px;
        line-height: 1.428571429;
        border: 1px solid transparent;
        border-radius:4px;
    }
    
    .twitter-typeahead .hint-small
    {
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 3px;
        line-height: 1.5;
    }
    
    .twitter-typeahead .hint-large
    {
        height: 45px;
        padding: 10px 16px;
        font-size: 18px;
        border-radius: 6px;
        line-height: 1.33;
    }
    </style>

<script>
    function form_submit() {
        var form = $('form#form_register_form');
        $.ajax( {
               type: "POST",
               url: form.attr( 'action' ),
               data: form.serialize(),
               dataType: "json",
               success: function( response ) {
               
               if(response.success==true) {
               location.reload();
               } else {
               $('#form_register_status').text(response.reason);
               }
               console.log( response );
               }
               } );
    }
    
    
    $(function(){
      $('#country.typeahead').typeahead({
                                        name: 'countries',
                                        valueKey: 'short_name',
                                        prefetch: '<?=$this->_base_url;?>api/countries.json',
                                        template: [
                                                   '<p class="repo-language">{{short_name}} ({{long_name}})</p>',
                                                   ].join(''),
                                        engine: Hogan
                                        });
      });
    
    </script>
