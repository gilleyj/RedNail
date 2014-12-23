<div class="page-header">
    <h1>Group List</h1>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Filter by
                <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-remote="<?=$this->_base_url;?>form/group/create" href="#form_group_create">Create a group</button>
            </h3>
            <br/>
            <input id="filter" name="filter" type="text" placeholder="e.g. 'FuriousFast'" class="form-control" autofocus="autofocus" onkeyup="filter(this)" />
        </div>
        <div class="panel-body">
            <div class="row">
                <?php foreach($groups as $group) : ?>
                <div class="col-sm-6 col-md-3 thumbnail_group <?=($group['user_joined']==true?'member':'notmember');?>"
                    data-group-id='<?=$group['group_id'];?>'
                    data-filter-text="<?=strtolower($group['group_name']);?> <?=(isset($group['creator']['username'])?$group['creator']['username']:'');?>">
                    <div class="thumbnail text-center">
                        <img class="img-circle" src="" data-src="holder.js/140x140" width="140" height="140"/>
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
        </div>
    </div>
</div>

<style>
    .thumbnail_group .btn-leave { display: none; }
    .thumbnail_group .btn-join { display: inline-block; }
    .thumbnail_group.member .btn-leave { display: inline-block; }
    .thumbnail_group.member .btn-join { display: none; }
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
