<?php setlocale(LC_MONETARY, 'en_US'); ?>
<div class="page-header">
    <h1>Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-2">
        <img class="img-circle" src="" width="140" height="140" data-src="holder.js/140x140" alt="Generic placeholder image" />
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
        </div>
        <div class="row">
            <div class="col-md-3 text-right"><strong>Balance</strong></div>
            <div class="col-md-9">
                <p style="font-size: 65px;font-family: serif;">
                    <?=money_format('%(#0n', $balance);?>
                </p>
            </div>
        </div>
       <div class="row">
            <div class="col-md-3 text-right"></div>
            <div class="col-md-9">
                <button class="btn btn-success" data-toggle="modal" data-remote="<?=$this->_base_url;?>form/wallet/add/" href="#form_wallet_add">
                    <i class="icon-usd icon-white"></i> Add to wallet
                </button>
            </div>
        </div>
    </div>
</div>
<hr/>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Races I&rsquo;ve Entered</h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($entries)) : ?>
            
            <div class="row">
                <?php foreach($entries as $track) : ?>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 15px;">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3><?=$track['trackname'];?></h3>
                            <p><?=count($track['segments']);?> Segment<?=(count($track['segments'])==1?'':'s');?></p>
                            <p>Uploaded <?=date('jS \of F Y', strtotime($track['createdate']));?></p>
                            <p>Last Edited <?=date('jS \of F Y', strtotime($track['updatedate']));?></p>
                            <p>
                            <a href="<?=$this->_base_url;?>track/edit/<?=$track['track_id'];?>" class="btn btn-danger">Edit</a>
                            <a href="<?=$this->_base_url;?>track/view/<?=$track['track_id'];?>" class="btn btn-info">View</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
            <p>No Entered Races Yet</p>
            <?php endif ; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">My Races</h3>
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

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">My Tracks <button type="button" class="btn btn-info btn-xs pull-right"  data-toggle="modal" data-remote="<?=$this->_base_url;?>form/track/upload/" href="#form_track_upload">Upload a track</button></h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($tracks)) : ?>

            <div class="row">
                <?php foreach($tracks as $track) : ?>
              <div class="col-sm-6 col-md-3" style="margin-bottom: 15px;">
                <div class="thumbnail">
                  <div class="caption">
                    <h3><?=$track['trackname'];?></h3>
                    <p><?=count($track['segments']);?> Segment<?=(count($track['segments'])==1?'':'s');?></p>
                    <p>Uploaded <?=date('jS \of F Y', strtotime($track['createdate']));?></p>
                    <p>Last Edited <?=date('jS \of F Y', strtotime($track['updatedate']));?></p>
                    <p>
                        <a href="<?=$this->_base_url;?>track/edit/<?=$track['track_id'];?>" class="btn btn-danger">Edit</a> 
                        <a href="<?=$this->_base_url;?>track/view/<?=$track['track_id'];?>" class="btn btn-info">View</a> 
                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
            <?php else : ?>
             <p>No tracks yet</p>
            <?php endif ; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">My Groups
                <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-remote="<?=$this->_base_url;?>form/group/create" href="#form_group_create">Create a group</button>
            </h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($groups)) : ?>
            <div class="row">
                <?php foreach($groups as $group) : ?>
                <div class="col-sm-6 col-md-3 thumbnail_group <?=($group['user_joined']==true?'member':'notmember');?>"
                    data-group-id='<?=$group['group_id'];?>'
                    data-filter-text="<?=strtolower($group['group_name']);?> <?=(isset($group['creator']['username'])?$group['creator']['username']:'');?>">
                    <div class="thumbnail text-center">
                        <br/>
                        <img class="img-circle" src="" width="140" height="140" data-src="holder.js/140x140" alt="Generic placeholder image" />
                        <div class="caption">
                            <h3><?=$group['group_name'];?></h3>
                            <p><?=$group['group_slug'];?></p>
                            <?php if(isset($group['creator']['username'])) : ?>
                            <p><small>From <a href='<?=$this->_base_url;?>profile/<?=$group['creator']['username'];?>'><?=$group['creator']['username'];?></a></small></p>
                            <?php endif; ?>
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

<style>
.thumbnail .caption h3 {
    text-overflow: ellipsis;
    width: 236px;
    line-height: 32px;
    white-space: nowrap;
    overflow: hidden;

}
</style>
