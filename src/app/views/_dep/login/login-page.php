<br/>
<div class="row">
    <div class="col-md-4  col-md-offset-4">
        <div class="whitebox">
            <form class="form-signin" role="form" method="POST" enctype="multipart/form-data" action="<?=$this->_base_url;?>login-process">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" name="email" class="form-control input-email-address" placeholder="Email address" required value="<?=$email_address;?>" autofocus />
                <input type="password" name="password" class="form-control input-password" placeholder="Password" required />
                <label class="checkbox">
                    <input type="checkbox" name="remember-me" value="remember-me" "<?=($remember_me='on'?'checked':'');?>"  /> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-4  col-md-offset-4">
        <div class="text-center">
            <a href="<?=$this->_base_url;?>forgot">
                Forgot your password?
            </a>
        </div>
    </div>
</div>


<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }
.form-signin-heading {
    margin-top: 0px;
}

.input-email-address {
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
    border-bottom: none;
    // margin-bottom: -1px;
}
.input-password {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-top: none;
    //margin-top: -1px;
}
.whitebox, .yellowbox {
    padding: 15px;
    border-radius: 4px;
    border: 1px solid #ccc;
    background-color: #fff;
}
</style>
