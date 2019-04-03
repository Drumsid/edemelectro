<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if(empty($product) || !$product->is_visible()) {
    return;
}

?>

                        <li> 
                            <?php do_action('woocommerce_before_shop_loop_item'); ?>   

							<?php do_action('woocommerce_before_shop_loop_item_title') ?>
							
							<!-- <div class="simpleCart_shelfItem">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image"> -->
									<!-- <img src="images/p1.jpg" class="img-responsive" alt=""/>
									<div class="mask">
			                       		<div class="info">Quick View</div>
					                </div> -->
									<?php
									 	do_action('woocommerce_shop_loop_item_title');
										remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating');
										do_action('woocommerce_after_shop_loop_item_title');
									?>

									   

                            <?php do_action('woocommerce_after_shop_loop_item'); ?>

							<!-- <div class="cbp-vm-details">
								Silver beet shallot wakame tomatillo salsify mung bean beetroot groundnut.
							</div>
							<a class="cbp-vm-icon cbp-vm-add item_add" href="#">Add to cart</a> -->
						</li>