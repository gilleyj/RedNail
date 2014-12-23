<div class="page-header">
<h1>My Races</h1>
</div>

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

<style>
.thumbnail .caption h3 {
    text-overflow: ellipsis;
width: 236px;
    line-height: 32px;
    white-space: nowrap;
overflow: hidden;
    
}
</style>

