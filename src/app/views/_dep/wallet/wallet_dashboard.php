<?php setlocale(LC_MONETARY, 'en_US'); ?>
<div class="page-header">
    <h1>Your wallet</h1>
</div>

<div class="row">
    <div class="col-md-2">
        <img class="img-circle" src="" data-src="holder.js/140x140" width="140" height="140" alt="Generic placeholder image" />
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
                <a class="btn btn-danger" href="<?=$this->_base_url;?>wallet/add_fee">
                    <i class="icon-road icon-white"></i> Add Random Fee
                </a>
                <a class="btn btn-warning" href="<?=$this->_base_url;?>wallet/add_winnings">
                    <i class="icon-road icon-white"></i> Add Random Winnings
                </a>
            </div>
        </div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Wallet History</h3>
        </div>
        <div class="panel-body">
            <?php if(isset($transactions) && isset($transactions[0]['amount'] )) : ?>
            <div class="table-responsive">
                <table class="table">
                     <colgroup>
                        <col class="col-md-3" />
                        <col class="col-md-1" />
                        <col class="col-md-2" />
                        <col class="col-md-6" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($transactions as $row) : ?>
                        <?php 
                            $class = '';
                            if($row['transaction_type'] == 'deposit')  $class = 'active';
                            if($row['transaction_type'] == 'other_fee')  $class = 'danger';
                            if($row['transaction_type'] == 'service_charge')  $class = 'danger';
                            if($row['transaction_type'] == 'race_winnings')  $class = 'success';
                            ?>
                        <tr class="<?=$class;?>">
                            <td><?=date("D, d M y H:i:s O",strtotime($row['transaction_date']));?></td>
                            <td class="text-right"><?=money_format('%(#0n', $row['amount']);?></td>
                            <td><?=str_replace('_',' ',$row['transaction_type']);?></td>
                            <td>
                                <?=($row['approval_code']!=''?' (approval:'.$row['approval_code'].') ':'');?>
                                <?=($row['approval_code']!=''?' (reference:'.$row['reference_number'].') ':'');?>
                                <?=$row['comment'];?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else : ?>
            <p>No transactions on record</p>
            <?php endif ;?>
        </div>
    </div>
</div>

