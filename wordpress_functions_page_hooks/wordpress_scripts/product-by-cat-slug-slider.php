<ul class="shop_slider_ul">
    <?php
        $args = array(
     'post_type' => 'product',
     'posts_per_page' => -1, 
    'orderby' => 'ASC', 
    'tax_query' => array(
         'taxonomy' => 'product_cat',
         'field'    => 'term_slug',
         'terms'     =>  'light',
        'operator'      => 'AND'
         )
 );
        $loop = new WP_Query($args);
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <li class="product">    
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        <div class="woo-img">
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="400px" />'; ?></div >
                        <h4><?php the_title(); ?></h4>
                        <span class="price"><?php echo $product->get_price_html(); ?></span> 
                        <span class="attribute"><img src="http://1stopwebsitesolution.com/demo/koko-furniture/wp-content/uploads/2020/04/Attribute.png"></span>                   
                    </a>
                     <div class="bt">
                    <div class="bt-left"><a href="<?php echo get_permalink( $loop->post->ID ) ?>">Add to Cart</a></div>
                   <!-- <div class="bt-right"><a href="<?php //echo get_permalink( $loop->post->ID ) ?>">Buy Now</a></div>-->

</div>
                </li>
    <?php endwhile; ?>
    <?php wp_reset_query();
	
<script>

function mfnSliderShop()
{
	
	
$('.shop_slider_ul').slick({
  centerPadding: '60px',
  slidesToShow: 5,
  arrows: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
	
	
}
</script>	