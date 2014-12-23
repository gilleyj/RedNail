<div class="row">
    <div class="col-md-6  col-md-offset-3">
        <div class="whitebox">
            <h1 class="text-center">Welcome!</h1>
            <h4 class="text-center">Please take a moment and personalize your profile</h4>
            <br/>
            <form class="form-horizontal" role="form" id="form_register_form" action="<?=$this->_base_url;?>invite-postprocess" method="post" enctype="multipart/form-data" >
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="username" class="col-md-4 control-label">Invite Code</label>
                    <div class="col-md-8">
                        <input id="invite-code" name="invite-code" type="text" class="form-control" required="required" value="<?=$invite_code;?>" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="username" class="col-md-4 control-label">Username</label>
                    <div class="col-md-8">
                        <input id="username" name="username" type="text" placeholder="'FuriousFast'" class="form-control" required="required" autofocus="autofocus" value="<?=$user['username'];?>"/>
                    </div>
                </div>
                
                <!-- Password input-->
                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Password Twice</label>
                    <div class="col-md-4">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="required" />
                    </div>
                    <div class="col-md-4">
                        <input id="password_confirm" name="password_confirm" type="password" class="form-control" placeholder="Confirm Password" required="required" />
                    </div>
                    
                </div>
                
                <!-- Email input-->
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-8">
                        <input id="email" name="email" type="email" class="form-control" placeholder="'bagerpants@email.com'" required="required" value="<?=$user['email'];?>" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="firstname" class="col-md-4 control-label">First &amp; Last Name</label>
                    <div class="col-md-4">
                        <input id="firstname" name="firstname" type="text" placeholder="'John'" class="form-control" required="required" value="<?=$user['first_name'];?>" />
                    </div>
                    <div class="col-md-4">
                        <input id="lastname" name="lastname" type="text" placeholder="'Public'" class="form-control" required="required" value="<?=$user['last_name'];?>" />
                    </div>
                    
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="country" class="col-md-4 control-label pull-left">Your Country</label>
                    <div class="col-md-8">
                        <input id="country" name="country" type="text" placeholder="'United Kingdom'" class="form-control typeahead" />
                    </div>
                </div>
                
                <!-- Textarea -->
                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Your Bio</label>
                    <div class="col-md-8">
                        <textarea id="description" name="description" placeholder="'I was born as a king, but live in poverty.  I have a bike and I'm not afraid to use it!'" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                <div class="col-md-12 text-right">
                    <button id="btnCancel" name="btnCancel" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
                    <button id="btnSave" name="btnSave" class="btn btn-primary" >Save</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
        //var form = $('form#form_register_form').submit();
        //console.log(form);
        /*
        $.ajax( {
                   type: "POST",
                   url: form.attr( 'action' ),
                   data: form.serialize(),
                   dataType: "json",
                   success: function( response ) {
                        if(response.success==true) {
                            // location.reload();
                        } else {
                            $('#form_register_status').text(response.reason);
                        }
                        console.log( response );
                   }
               });
        */
        //event.preventDefault();
    }


$(function(){
    // Disable Go Button
    $("form :input").on("keypress", function(e) {
        return e.keyCode != 13;
    })

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
