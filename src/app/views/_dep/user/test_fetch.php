<div class="well">
	<h1>this is a test fetch</h1>
	<div class="well">
		<?php foreach($countries as $country) : ?>
		<?php 	$this->insert('user/div_country.php',array('country' => $country) ); ?>
		<?php endforeach; ?>
	</div>
</div>