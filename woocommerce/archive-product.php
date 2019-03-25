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
					//'post_type' => 'product',
					//'category_name' => 'retro',
					//'post_per_page' => 9
					// 'meta_key' => '_featured',
					// 'meta_value' => 'yes'
					//'numberposts' => -1,
					'posts_per_page' => 9,
					'orderby' => 'date',
					'order' => 'ASC',
					'post_type' => 'product',
					//'product_cat' => 'retro'
				);

			//	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			//	print_r($term); //выводит все данные о странице слаг категорию Id и тп

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

		<?php get_sidebar('content-bottom'); ?>
		<!-- content-section-ends-here -->
		<?php get_footer(); ?>