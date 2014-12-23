
<div class="row">
    <div class="col-md-4  col-md-offset-4">
        <div class="text-center">
           <H1>LOGO</h1>
        </div>
    </div>
</div>
<br/>
<br/>
<div class="row">
    <div class="col-md-4  col-md-offset-4">
        <div class="whitebox">
            <form class="form-signin" role="form" method="POST" enctype="multipart/form-data" action="<?=$this->_base_url;?>invite-preprocess">
                <h2 class="form-signin-heading">Have an invite code?</h2>
<?php //error_request
    if(isset($_SESSION['error_invite'])) {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>OOPS!</strong> '.$_SESSION['error_invite'];
        echo '</div>';
        unset($_SESSION['error_invite']);
    }
    ?>

                <input type="text" name="invite_code" class="form-control" placeholder="Invite Code" required />
                <br/>
                <button class="btn btn-md btn-primary btn-block" type="submit">Join!</button>
            </form>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-4  col-md-offset-4">
        <div class="whitebox">
            <form class="form-signin" role="form" method="POST" enctype="multipart/form-data" action="<?=$this->_base_url;?>invite-request">
                <h2 class="form-signin-heading">Want one?</h2>
<?php //
    if(isset($_SESSION['error_request'])) {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>OOPS!</strong> '.$_SESSION['error_request'];
        echo '</div>';
        unset($_SESSION['error_request']);
    }
    ?>

                <input type="text" name="invite_email" class="form-control" placeholder="Email address" required autofocus />
                <br/>
                <button class="btn btn-md btn-success btn-block" type="submit">Request invite</button>
            </form>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-4  col-md-offset-4">
        <div class="text-center">
            <a href="<?=$this->_base_url;?>login">
                Already a member?
            </a>
        </div>
    </div>
</div>
