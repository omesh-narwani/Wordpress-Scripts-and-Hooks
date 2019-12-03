<?php
/**
 * Add the custom tab
 */
function my_simple_custom_product_tab( $tabs ) {
	$tabs['my_custom_tab'] = array(
		'title'    => __( 'Custom Tab', 'textdomain' ),
		'callback' => 'my_simple_custom_tab_content',
		'priority' => 50,
	);
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'my_simple_custom_product_tab' );
/**
 * Function that displays output for the shipping tab.
 */
function my_simple_custom_tab_content( $slug, $tab ) {
	?><h2><?php echo wp_kses_post( $tab['title'] ); ?></h2>
	<p>Tab Content</p><?php
}