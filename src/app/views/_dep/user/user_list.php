<div class="page-header">
    <h1>User List</h1>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Filter by </h3>
            <br/>
            <input id="filter" name="filter" type="text" placeholder="e.g. 'FuriousFast'" class="form-control" autofocus="autofocus" onkeyup="filter(this)" />
        </div>
        <div class="panel-body">
            <div class="row">
                <?php foreach($users as $user) : ?>
                <div class="col-sm-6 col-md-3 thumbnail_user"
                    data-filter-text="<?=strtolower($user['username']);?> <?=strtolower($user['first_name']);?> <?=strtolower($user['last_name']);?> <?=(isset($user['country_name'])?strtolower($user['country_name']):'');?>">
                    <div class="thumbnail text-center" style="margin-bottom: 15px;">
                        <br/>
                        <img class="img-circle" src="" data-src="holder.js/200x200" width="200" height="200" />
                        <div class="caption">
                            <h3><?=$user['username'];?></h3>
                            <p><?=$user['first_name'];?> <?=$user['last_name'];?></p>
                            <p><?=(isset($user['country_name'])?$user['country_name']:'&nbsp;');?></p>
                            <p><a href="<?=$this->_base_url;?>profile/<?=$user['username'];?>" class="btn btn-info">profile</a></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function filter(element) {
        var value = $(element).val().toLowerCase();
        
        $(".thumbnail_user").each(function() {
                                                   if ($(this).attr('data-filter-text').search(value) > -1) {
                                                   $(this).show();
                                                   }
                                                   else {
                                                   $(this).hide();
                                                   }
                                                   });
    }
    
    </script>
