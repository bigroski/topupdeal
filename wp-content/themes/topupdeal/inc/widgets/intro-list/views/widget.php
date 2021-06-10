<div class="service-list mb-4">
	<?php 
		if(!empty($instance['block'])):
			foreach($instance['block'] as $item):			
	?>
	<div class="icon-box icon-box-side ">
		<span class="icon-box-icon">
			<i class="<?php echo $item['box_icon']; ?>"></i>
		</span>
		<div class="icon-box-content">
			<h4 class="icon-box-title"><?php echo $item['box_heading']; ?></h4>
			<p><?php echo $item['box_title']; ?></p>
		</div>
	</div>
	<?php 
			endforeach;
		endif;
	?>
</div>