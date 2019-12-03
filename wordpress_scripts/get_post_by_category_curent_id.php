<?php
$id = get_the_ID();
    $terms = get_the_terms( get_the_ID(), 'condition' );
    $term_id =  $terms[0]->term_id;
	$tax_query = array();
	$taxes     = get_theme_mod( 'stm_similar_query', '' );
	$query     = array(
		'post_type'      => stm_listings_post_type(),
		'post_status'    => 'publish',
		'posts_per_page' => '3',
		'post__not_in'   => array( get_the_ID() ),
		'tax_query' => array(
        array (
            'taxonomy' => 'condition',
            'field' => 'term_id',
            'terms' => 213,
        )
    ),
		
	);
?>