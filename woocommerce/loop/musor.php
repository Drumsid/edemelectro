<?php while($wp_query->have_posts()) : $wp_query->have_posts();?>

						<?php wc_get_template_part('content', 'product'); ?>

				<?php endwhile; ?>


<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p1.jpg" alt="" /></a>
							<div class="mask">
								<a href="single.html">Quick View</a>
							</div>
						<a class="product_name" href="single.html">Sed ut perspiciatis</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$329</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p2.jpg" alt="" /></a>
							<div class="mask">
								<a href="single.html">Quick View</a>
							</div>
						<a class="product_name" href="single.html">great explorer</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$599.8</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p3.jpg" alt="" /></a>
							<div class="mask">
								<a href="single.html">Quick View</a>
							</div>
						<a class="product_name" href="single.html">similique sunt</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$359.6</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p4.jpg" alt="" /></a>
							<div class="mask">
								<a href="single.html">Quick View</a>
							</div>
						<a class="product_name" href="single.html">shrinking </a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$649.99</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p5.jpg" alt="" /></a>
						<div class="mask">
							<a href="single.html">Quick View</a>
						</div>
						<a class="product_name" href="single.html">perfectly simple</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$750</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p6.jpg" alt="" /></a>
						<div class="mask">
							<a href="single.html">Quick View</a>
						</div>
						<a class="product_name" href="single.html">equal blame</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$295.59</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p7.jpg" alt="" /></a>
						<div class="mask">
							<a href="single.html">Quick View</a>
						</div>
						<a class="product_name" href="single.html">Neque porro</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$380</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p8.jpg" alt="" /></a>
						<div class="mask">
							<a href="single.html">Quick View</a>
						</div>
						<a class="product_name" href="single.html">perfectly simple</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$540.6</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/p9.jpg" alt="" /></a>
						<div class="mask">
							<a href="single.html">Quick View</a>
						</div>
						<a class="product_name" href="single.html">praising pain</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$229.5</span></a></p>
					</div>


					<?php 

add_action('widgets_init', 'f_collection');

function f_collection() {
    register_widget('F_Сollection');
}

class F_Сollection extends WP_Widget{

    function F_Сollection() {
        $widget_ops = array(
            'classname' => 'myTempl',
            'description' => 'Описание'
        );

        $control_ops = array(
            'width' => 300,
            'height' => 350
        );

        $this->WP_Widget('fcollection', 'Featured Collection', $widget_ops, $control_ops);
    }
}

function update($new_instance, $old_instance){

    $instance = $old_instance;

    $instance['title'] = strip_tags($new_instance['title']);
    $instance['pcount'] = strip_tags($new_instance['pcount']);

    return $instance;
}

public function widget($args, $instance) {

    $title = apply_filters('widget_title', $instance['title']) ;
    $pcount = $instance['pcount'];

    include "templ.php";
}

function form($instance) {

    $defaults = array(
        'title' => 'Featured Collection',
        'pcount' => 9
    );

    $instance = wp_parse_args((array)$instance, $defaults); ?>
<p>
    <label for="<?php echo $this->get_field_id('title')?>">Title</label>
    <input id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $instance['title'];?>" style="width:100%;">
  
</p>
<p>
    <label for="<?php echo $this->get_field_id('pcount')?>">Count Products</label>
    <input id="<?php echo $this->get_field_id('pcount')?>" name="<?php echo $this->get_field_name('pcount')?>" value="<?php echo $instance['pcount'];?>" style="width:100%;">

</p>

<?php
}


?>

<!-- gh -->

<h3 class="like text-center"><?php echo $title; ?></h3>    

<?php
$args = array(
    'post_type' => 'product',
    // 'meta_key' => '_featured',
    // 'meta_value' => 'yes',
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