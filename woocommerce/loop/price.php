<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$price_html = $product->get_price_html();

if($price_html && !is_shop()) :
?>

<div class="pricey"><span class="item_price"><?php echo $price_html; ?></span></div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
							  </div>
							</div>
<?php endif; ?>