<div class="page-header">
    <h1><?=$profile['username'];?>'s Profile</h1>
</div>

<div class="row">
    <div class="col-md-2">
        <img class="img-circle" src="" data-src="holder.js/200x200" width="200" height="200" />
    </div>
    
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-3 text-right"><strong><?=$profile['first_name'];?> <?=$profile['last_name'];?></strong></div>
            <div class="col-md-9">
                <p>
                member since the <?=date('jS \of F Y', strtotime($profile['createdate']));?>
                </p>
                <?php if(isset($profile['country_name'])) : ?>
                <p>
                located in <?=$profile['country_name'];?>
                </p>
                <?php endif; ?>
            </div>
            <div class="col-md-3 text-right"><strong>biography</strong></div>
            <div class="col-md-9">
                <p>
                <?=$profile['bio'];?>
                </p>
            </div>
        </div>
    </div>
</div>

<hr/>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Belongs to the following groups</h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($groups)) : ?>
            <div class="row">
                <?php foreach($groups as $group) : ?>
                <div class="col-sm-6 col-md-3 thumbnail_group <?=($group['user_joined']==true?'member':'notmember');?>"
                    data-group-id='<?=$group['group_id'];?>'
                    data-filter-text="<?=strtolower($group['group_name']);?> <?=(isset($group['creator']['username'])?$group['creator']['username']:'');?>">
                    <div class="thumbnail text-center">
                        <img class="img-circle" src="" data-src="holder.js/140x140" width="140" height="140" />
                        <div class="caption">
                            <h3><?=$group['group_name'];?></h3>
                            <p><?=$group['group_slug'];?></p>
                            <?php if(isset($group['creator']['username'])) : ?>
                            <p><small>From <a href='<?=$this->_base_url;?>profile/<?=$group['creator']['username'];?>'><?=$group['creator']['username'];?></a></small></p>
                            <?php endif; ?>
                            <p class="group_follow ">
                                <a onclick="group_action(this);" class="btn-leave btn btn-danger">Leave</a>
                                <a onclick="group_action(this);" class="btn-join btn btn-success">Join</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
            <p>Not a member of any groups</p>
            <?php endif; ?> 
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Started These Races</h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($races)) : ?>
            
            <div class="row">
                <?php foreach($races as $race) : ?>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 15px;">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3><?=$race['race_name'];?></h3>
                            <p>Wager <?=$race['minwager'];?></p>
                            <p>Starts <?=date('jS \of F Y', strtotime($race['start_date']));?></p>
                            <p>Ends <?=date('jS \of F Y', strtotime($race['end_date']));?></p>
                            <p>
                            <a href="<?=$this->_base_url;?>race/view/<?=$race['race_id'];?>" class="btn btn-info">View</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
            <p>No Races Yet</p>
            <?php endif ; ?>
        </div>
    </div>
</div>

<style>
    .thumbnail_group .btn-leave { display: none; }
    .thumbnail_group .btn-join { display: inline-block; }
    .thumbnail_group.member .btn-leave { display: inline-block; }
    .thumbnail_group.member .btn-join { display: none; }
    .thumbnail .caption h3 {
        text-overflow: ellipsis;
        width: 236px;
        line-height: 32px;
        white-space: nowrap;
        overflow: hidden;
    }
</style>

<script>
    function group_action(element) {
        var is_join = $(element).hasClass('btn-join');
        var parent = $(element).parents('.thumbnail_group');
        var group_id = parent.attr('data-group-id');
        if(is_join) {
            var url = '<?=$this->_base_url;?>api/group/join/' + group_id;
            var newclass = 'member';
        } else {
            var url = '<?=$this->_base_url;?>api/group/leave/' + group_id;
            var newclass = 'notmember';
            
        }
        parent.removeClass('member').removeClass('notmember').addClass(newclass);
        $.get(url);
    }
    function filter(element) {
        var value = $(element).val().toLowerCase();
        
        $(".thumbnail_group").each(function() {
                                                   if ($(this).attr('data-filter-text').search(value) > -1) {
                                                   $(this).show();
                                                   }
                                                   else {
                                                   $(this).hide();
                                                   }
                                                   });
    }
    
    </script>
