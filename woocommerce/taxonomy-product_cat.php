<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

get_navigation();
?>

		<!-- content-section-starts -->
        <div class="container">
	   <div class="products-page">
           
           <?php get_sidebar();?>
			
			<div class="new-product">
			
				
				<div class="new-product-top">
					<ul class="product-top-list">
						<li><a href="index.html">Home</a>&nbsp;<span>&gt;</span></li>
						<li><span class="act">Best Sales</span>&nbsp;</li>
					</ul>
					<p class="back"><a href="index.html">Back to Previous</a></p>
					<div class="clearfix"></div>
				</div>
				<div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
			            <label>Sort By</label>
			            <select>
			                            <option value="">
			                    Position                </option>
			                            <option value="">
			                    Name                </option>
			                            <option value="">
			                    Price                </option>
			            </select>
			            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
	                   </div>
	    		     </div>
		    	        <ul class="women_pagenation">
					     <li>Page:</li>
					     <li class="active"><a href="#">1</a></li>
					     <li><a href="#">2</a></li>
				  	    </ul>
	               		 <div class="clearfix"></div>		
			        </div>
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="pages">   
        	 <div class="limiter visible-desktop">
               <label>Show</label>
                  <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> per page        
               </div>
       	   </div>
					<div class="clearfix"></div>
					<!--content products-->
					
					<?php if(have_posts()) : ?>
					<ul>
						<?php while(have_posts()) : the_post();?>	

							<?php wc_get_template_part('content','product-cat');?>

						<?php endwhile;?>	
						
						
					  
					</ul>
					<?php else : ?>
						<?php wc_get_template('loop/no-products-found.php')?>
					<?php endif;?>
				</div>
				<?php 
				
				wp_enqueue_script('cbpViewModeSwitch', get_template_directory_uri().'/js/cbpViewModeSwitch.js');
				wp_enqueue_script('classie', get_template_directory_uri().'/js/classie.js');
				
				?>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->


<?php


get_sidebar('content-bottom');

get_footer();
?>