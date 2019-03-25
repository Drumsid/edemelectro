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