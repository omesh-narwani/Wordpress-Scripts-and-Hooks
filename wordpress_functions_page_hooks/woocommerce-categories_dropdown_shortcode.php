/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Register a shortcode that creates a product categories dropdown list
 *
 * Use: [product_categories_dropdown orderby="title" count="0" hierarchical="0"]
 */
add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );
function woo_product_categories_dropdown( $atts ) {
	extract( shortcode_atts(array(
		'count'        => '0',
		'hierarchical' => '0',
		'orderby' 	   => ''
	), $atts ) );
	ob_start();
	// Stuck with this until a fix for http://core.trac.wordpress.org/ticket/13258
	wc_product_dropdown_categories( array(
		'orderby'            => ! empty( $orderby ) ? $orderby : 'order',
		'hierarchical'       => $hierarchical,
		'show_uncategorized' => 0,
		'show_counts'        => $count
	) );
	?>
	<script type='text/javascript'>
	/*
		jQuery(function(){
			var product_cat_dropdown = jQuery(".dropdown_product_cat");
			function onProductCatChange() {
				if ( product_cat_dropdown.val() !=='' ) {
					location.href = "<?php //echo esc_url( home_url() ); ?>/?product_cat=" +product_cat_dropdown.val();
				}
			}
			product_cat_dropdown.change( onProductCatChange );
		});*/
	
	</script>
	<?php
	return ob_get_clean();
}
