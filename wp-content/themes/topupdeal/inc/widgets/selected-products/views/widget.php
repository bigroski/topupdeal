<?php 
	$groups = array_chunk($instance['products'], 3);
?>
<div class="widget widget-products">
				<h4 class="widget-title"><?php echo $instance['title']; ?></h4>
				<div class="widget-body">
					<div class="owl-carousel owl-nav-top" data-owl-options="{
					'items': 1,
					'loop': true,
					'nav': true,
					'dots': false,'margin': 20}">
					<?php 
					if(!empty($groups)):
						foreach($groups as $group):
					?>
					<div class="products-col product-grid">
						<?php 
							if(!empty($group)):
								$_pf = new WC_Product_Factory();  
								foreach($group as $product_id):
									$product = $_pf->get_product((int)$product_id);
						?>
						<div class="product product-list-sm">
							<figure class="product-media">
								<a href="<?php echo $product->get_permalink(); ?>">
									<?php 
			                            echo $product->get_image();
			                        ?>
								</a>
							</figure>
							<div class="product-details">
								<h3 class="product-name">
									<a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->name; ?></a>
								</h3>
								<!-- <div class="product-price">
									<span class="price">Rs.199.00</span>
								</div> -->
								<div class="product-price">
						        	<?php 
						        		if($product->sale_price != ''):
						        	?>
						        	<ins class="new-price">Rs.<?php echo $product->price; ?></ins><del class="old-price">Rs.<?php echo $product->regular_price ?></del>
						        	<?php 
						        		else:
						        	?>
									<span class="price">Rs.<?php echo $product->price; ?></span>
						        	<?php 
						        		endif;
						        	?>
						        </div>
						        <?php 
        							fw_get_product_star_rating($product);

						        ?>
								<!-- <div class="ratings-container">
									<div class="ratings-full">
										<span class="ratings" style="width:100%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div> -->
							</div>
						</div>
						<?php 
								endforeach;
							endif;
						?>
						
					</div><!-- End Products Col -->
					<?php 
						endforeach;
					endif;
					?>
				</div>
			</div>