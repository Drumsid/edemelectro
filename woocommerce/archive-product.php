<?php get_header(); ?>

    <?php get_navigation(); ?>
	
		<?php get_template_part('home', 'banner'); ?>
		<!-- content-section-starts-here -->
		<?php do_action('woocommerce_before_main_content'); ?>

		
				<div class="online-strip">
				<?php if ( function_exists('dynamic_sidebar') ) :?>
					<div class="col-md-4 follow-us">
						<?php dynamic_sidebar('follow us'); ?>
					</div>
				<?php endif; ?>
				<?php if ( function_exists('dynamic_sidebar') ) :?>
					<div class="col-md-4 shipping-grid">
						<?php dynamic_sidebar('shipping'); ?>
							<!-- <div class="shipping">
								<img src="<?php// bloginfo('template_directory'); ?>/images/shipping.png" alt="" />
							</div>
						<div class="shipping-text">
							<h3>Free Shipping</h3>
							<p>on orders over $ 199</p>
						</div>
						<div class="clearfix"></div> -->
					</div>
					<?php endif; ?>
					<div class="col-md-4 online-order">
						<p>Order online</p>
						<h3>Tel:<?php echo get_option('my_phone');?></h3>
					</div>
					<div class="clearfix"></div>
				</div>

				

				<?php do_action('woocommerce_archive_description'); ?>

				<?php 
				$args = array(
					'post_type' => 'product',
					'post_per_page' => 6,
					// 'meta_key' => '_featured',
					// 'meta_value' => 'yes'
				);
				
				global $wp_query;

				$wp_query = new WP_Query($args);

				if($wp_query->have_posts()) :
				?>

			<?php woocommerce_product_loop_start(); ?>

			<?php while($wp_query->have_posts()) : $wp_query->the_post();?>

				<?php wc_get_template_part('content', 'product'); ?>

			<?php endwhile; ?>
				
				
					<div class="clearfix"></div>	
					<?php woocommerce_product_loop_end(); ?>				
				<!-- </div> -->
				<?php endif; ?>

				<?php do_action('woocommerce_after_main_content'); ?>

		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Featured Collection</h3>        			
				     <ul id="flexiselDemo3">
						<li><a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/l1.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.html">perfectly simple</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$759</span></a></p>
							</div>
						</li>
						<li><a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/l2.jpg" class="img-responsive" alt="" /></a>						
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.html">praising pain</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$699</span></a></p>
							</div>
						</li>
						<li><a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/l3.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.html">Neque porro</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
							</div>
						</li>
						<li><a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/l4.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.html">equal blame</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$499</span></a></p>
							</div>
						</li>
						<li><a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/l5.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.html">perfectly simple</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$649</span></a></p>
							</div>
						</li>
				     </ul>
				    <script type="text/javascript">
					 jQuery(window).load(function() {
						jQuery("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <!-- <script type="text/javascript" src="js/jquery.flexisel.js"></script> -->
				   </div>
				   </div>
		<!-- content-section-ends-here -->
		<?php get_footer(); ?>