
<h3 class="like text-center"><?php echo $title; ?></h3>    

<?php
$args = array(
    'post_type' => 'product',
    'meta_key' => 'featured',
    'meta_value' => 'yes',
    'posts_per_page' => $pcount,
    'orderby' => ['ID' => 'DESC']
);


$featured_query = new WP_Query($args);
?>
            <?php if($featured_query->have_posts()) : ?>

				     <ul id="flexiselDemo3">

                    <?php while($featured_query->have_posts()) : $featured_query->the_post();?>

                        <li>
                            <a href="<?php get_the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail($featured_query->post->ID, 'shop_catalog', ['class' => 'img-responsive']);?>
                            </a>
							<div class="product liked-product simpleCart_shelfItem">
							    <a class="like_name" href="<?php get_the_permalink(); ?>"><?php get_the_title(); ?></a>
                                
                                    <?php
                                    
                                        global $product;

                                        $class = implode( ' ', array_filter( array(
                                            'button',
                                            'product_type_' . $product->get_type(),
                                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                                        ) ) );
                                    
                                    ?>
                                <?php if($price_html = $product->get_price_html()) : ?>
							        <p><a data-quantity="1" data-product_id="<?php echo $product->id;?>" data-product_sku="<?php echo $product->get_sku();?>" class="item_add <?php echo $class; ?>" href="<?php echo esc_url($product->add_to_cart_url()) ?>"><i></i> <span class=" item_price"><?php echo $price_html ?></span></a></p>
                                <?php endif; ?>
							</div>
						</li>


                    <?php endwhile; ?>

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
                   <?php endif; ?>