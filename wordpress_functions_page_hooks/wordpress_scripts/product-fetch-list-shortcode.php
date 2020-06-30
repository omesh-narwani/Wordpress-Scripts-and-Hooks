<?php
function rakitpc() {
    // HERE below, define your Product category names
    $term_names = array('T-shirts');

    // The WP_Query
    $query = new WP_Query( array(
        'posts_per_page' => -1,
        'post_type' => 'product',
        'post_status' => 'publish',
        'hide_empty' => 0,
        'orderby' => 'title',
        'tax_query' => array( array(
            'taxonomy' => 'product_cat', // for a Product category (or 'product_tag' for a Product tag)
            'field'    => 'name',        // can be 'name', 'slug' or 'term_id'
            'terms'    => $term_names,
        ) ),
        'echo' => '0'
    ) );

    $output = '<select>';
    // foreach ( $products as $product ) {
    if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();

        $permalink = get_permalink($query->post->ID);
        $title = $query->post->post_title;
        $output .= '<option value="' . $permalink . '">' . $title . '</option>';

    endwhile;

    wp_reset_postdata();

    $output .='</select>';

    else :

    $output = '<p>No products found<p>';

    endif;

    return $output;
}

add_shortcode( 'gege', 'rakitpc' );

?>