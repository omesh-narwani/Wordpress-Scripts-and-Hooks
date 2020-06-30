<?php
/**
 * The template for displaying content in the single-plays.php template
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */

// prev & next post -------------------
mfn_post_navigation_sort();

$single_post_nav = array(
	'hide-header'	=> false,
	'hide-sticky'	=> false,
	'in-same-term'	=> false,
);

$opts_single_post_nav = mfn_opts_get( 'prev-next-nav' );
if( is_array( $opts_single_post_nav ) ){

	if( isset( $opts_single_post_nav['hide-header'] ) ){
		$single_post_nav['hide-header'] = true;
	}
	if( isset( $opts_single_post_nav['hide-sticky'] ) ){
		$single_post_nav['hide-sticky'] = true;
	}
	if( isset( $opts_single_post_nav['in-same-term'] ) ){
		$single_post_nav['in-same-term'] = true;
	}

}

$post_prev = get_adjacent_post( $single_post_nav['in-same-term'], '', true, 'plays' );
$post_next = get_adjacent_post( $single_post_nav['in-same-term'], '', false, 'plays' );
$plays_page_id = mfn_opts_get( 'plays-page' );


// categories -------------------------
$categories 	= '';
$aCategories 	= '';

$terms = get_the_terms( get_the_ID(), 'playscat' );
if( is_array( $terms ) ){
	foreach( $terms as $term ){
		$categories		.= '<li><a href="'. get_term_link($term) .'">'. $term->name .'</a></li>';
		$aCategories[]	= $term->term_id;  
	}
}


// post classes -----------------------
$classes = array();
if( get_post_meta(get_the_ID(), 'mfn-post-slider-header', true) ) $classes[] = 'no-img';
if( ! mfn_opts_get( 'plays-single-title' ) ) $classes[] = 'no-title';

if( mfn_opts_get( 'share' ) == 'hide-mobile' ){
	$classes[] = 'no-share-mobile';
} elseif( ! mfn_opts_get( 'share' ) ) {
	$classes[] = 'no-share';
}
$classes[] = $aCategories;
$translate['published'] 	= mfn_opts_get('translate') ? mfn_opts_get('translate-published','Submitted by') : __('Submitted by','betheme');
$translate['at'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-at','at') : __('at','betheme');
$translate['categories'] 	= mfn_opts_get('translate') ? mfn_opts_get('translate-categories','Categories') : __('Categories','betheme');
$translate['all'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-all','Show all') : __('Show all','betheme');
$translate['related'] 		= mfn_opts_get('translate') ? mfn_opts_get('translate-related','Related posts') : __('Related posts','betheme');
$translate['readmore'] 		= mfn_opts_get('translate') ? mfn_opts_get('translate-readmore','Read more') : __('Read more','betheme');
$translate['client'] 		= mfn_opts_get('translate') ? mfn_opts_get('translate-client','Client') : __('Client','betheme');
$translate['date'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-date','Date') : __('Date','betheme');
$translate['website'] 		= mfn_opts_get('translate') ? mfn_opts_get('translate-website','Website') : __('Website','betheme');
$translate['view'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-view','View website') : __('View website','betheme');
$translate['task'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-task','Task') : __('Task','betheme');
?>

<div id="plays-item-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<?php 
		// single post navigation | sticky
		if( ! $single_post_nav['hide-sticky'] ){
			echo mfn_post_navigation_sticky( $post_prev, 'prev', 'icon-left-open-big' ); 
			echo mfn_post_navigation_sticky( $post_next, 'next', 'icon-right-open-big' );
		} 
	?>
	
	<?php if( get_post_meta( get_the_ID(), 'mfn-post-template', true ) != 'intro' ): ?>

		<div class="section section-post-header">
        	<div class="title-header">
        	    <div class="section_wrapper clearfix">
    	        <?php
    	            $h = mfn_opts_get( 'title-heading', 1 );
    				echo '<h'. $h .' class="entry-title" itemprop="headline">'. get_the_title() .'</h'. $h .'>';
    	        ?>
    	        <div class="post-meta clearfix">
					<div class="author-date">
						<!--<span class="author">Submitted by: <strong><?php //the_author_meta( 'display_name' ); ?></strong></span> -->
						<span class="author">Submitted by: <strong><?php echo get_field("submitted_by", get_the_ID()); ?></strong></span>
						<div class="date-field">
						<span class="date cdate"><strong>Date Created </strong><time class="entry-date" itemprop="datePublished" pubdate><?php echo get_field("date_created", get_the_ID()); ?></time></span>
					   	<span class="date udate"><strong>Date Updated </strong><time class="entry-date" datetime="<?php the_date('c'); ?>" itemprop="datePublished" pubdate><?php echo get_the_date(); ?></time></span>
				    	</div>
					</div>
					<!--<div class="category">
						<span class="cat-btn"><?php echo $translate['categories']; ?> <i class="icon-down-dir"></i></span>
						<div class="cat-wrapper"><ul><?php echo $categories ?></ul></div>
					</div>-->
				</div>
    	       </div> 
    		</div>
			<div class="section_wrapper clearfix">

		
				<?php 
					// single post navigation | header
					if( ! $single_post_nav['hide-header'] ){
						echo mfn_post_navigation_header( $post_prev, $post_next, mfn_wpml_ID( $plays_page_id ), $translate );
					}
				?>
			    <div class="playbook-col-9">
				<div class="column one post-header">
				
					<div class="button-love"><?php echo mfn_love() ?></div>
					
					<div class="title_wrapper">

						<?php
						//	if( mfn_opts_get( 'plays-single-title' ) ){
								//$h = mfn_opts_get( 'title-heading', 1 );
							//	echo '<h'. $h .' class="entry-title" itemprop="headline">'. get_the_title() .'</h'. $h .'>';
					//		}
						?>
						
						
						
					</div>
					
				</div>
		
				<div class="column one single-photo-wrapper <?php echo mfn_post_thumbnail_type( get_the_ID() ); ?>">
					
					<?php if( mfn_opts_get( 'share' ) ): ?>
					<div class="share_wrapper">
						<span class='st_facebook_vcount' displayText='Facebook'></span>
						<span class='st_twitter_vcount' displayText='Tweet'></span>
						<span class='st_pinterest_vcount' displayText='Pinterest'></span>
						
						<script src="http<?php mfn_ssl(1); ?>://w<?php mfn_ssl(1); ?>.sharethis.com/button/buttons.js"></script>
						<script>stLight.options({publisher: "1390eb48-c3c3-409a-903a-ca202d50de91", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
					</div>
					<?php endif; ?>
					
					<?php if( ! get_post_meta(get_the_ID(), 'mfn-post-slider-header', true) ): ?>
					<div class="image_frame scale-with-grid">
					
						<div class="image_wrapper">
							<?php echo mfn_post_thumbnail( get_the_ID() ); ?>
						</div>
						
						<?php 
							if( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ){
						    	echo '<p class="wp-caption-text '. mfn_opts_get( 'featured-image-caption' ) .'">'. $caption .'</p>';
							}
						?>
								
					</div>
					<?php endif; ?>
					
				</div>
				
				<div class="column one project-description">
				    <span class="org-inv">
    				    <h3>Play Description</h3>
    				    <?php echo get_field("play_description", get_the_ID()); ?>
    				</span>
    				<span class="work-desc">
    				    <h3>Use When…</h3>
    				    <?php echo get_field("use_when", get_the_ID()); ?>
    				</span>
    				
				    
					<ul>
						<?php 
						/*	if( $client = get_post_meta( get_the_ID(), 'mfn-post-client', true ) ){
								echo '<li class="one-third"><span class="label">'. $translate['client'] .'</span>'. $client .'</li>';
							}
							echo '<li class="one-third"><span class="label">'. $translate['date'] .'</span>'. get_the_date() .'</li>';
							if( $link = get_post_meta( get_the_ID(), 'mfn-post-link', true ) ){
								echo '<li class="one-third"><span class="label">'. $translate['website'] .'</span><a target="_blank" href="'. $link .'"><i class="icon-forward"></i>'. $translate['view'] .'</a></li>';
							}
							if( $task = get_post_meta( get_the_ID(), 'mfn-post-task', true ) ){
								echo '<li><span class="label">'. $translate['task'] .'</span>'. $task .'</li>';
							}*/
						?>
					</ul>
				</div>
				</div>
				
				<div class="playbook-col-3">
				    <div class="authors-list">
				        <h3>Play Authors</h3>
				        <?php $str = get_field("example_authors", get_the_ID());
				        $input = preg_replace("/((\r?\n)|(\r\n?))/", ',', $str);
                        $pieces = explode(',', $input);
                        echo "<ul>";
                        foreach($pieces as $part) {
                          echo "<li>$part</li>";
                        }
                        echo "</ul>";
				        ?>
				        
				        
				    </div>    
				</div>  
				</div>
				
				<div class="plays-benefits">
				    <div class="section_wrapper plays-gray clearfix">
				        <div class="advantages">
				            <h3>Advantages</h3>
				            <?php echo get_field("advantages", get_the_ID()); ?>
				        </div> 
				        <div class="disadvantages">
				            <h3>Disadvantages</h3>
				            <?php echo get_field("disadvantages", get_the_ID()); ?>
				        </div>
				        
				    </div>
				</div>      
				<div class="section_wrapper plays-gray clearfix">
				<div class="playbook-col-12">
				    <div class="addi-note">
				        <h3>Additional Notes</h3>
				        
				        <?php echo get_field("additional_note", get_the_ID()); ?>
				    </div> 
				</div>    
				
				
			</div>
		</div>
		
	<?php endif; ?>	
	
	<div class="entry-content" itemprop="mainContentOfPage">
		<?php
			// Content Builder & WordPress Editor Content
			mfn_builder_print( get_the_ID() );
		?>
	</div>
	
	<div class="section section-post-footer">
		<div class="section_wrapper clearfix">
		
			<div class="column one post-pager">
				<?php
					// List of pages
					wp_link_pages(array(
						'before'			=> '<div class="pager-single">',
						'after'				=> '</div>',
						'link_before'		=> '<span>',
						'link_after'		=> '</span>',
						'next_or_number'	=> 'number'
					));
				?>
			</div>
			
		</div>
	</div>
	
	<div class="section section-post-related">
		<div class="section_wrapper clearfix">
		    <?php  
                $posts = get_field('related_posts'); 
                if ($posts) { ?>
                    <h2 class="related-title">Play Related Examples</h2>
                    <ul class="RelatedPostSlider_ul">
                    <?php $i=1; foreach($posts as $post) { setup_postdata($post); 
                    echo '<li class="post-related">';	
										
						echo '<div class="image_frame scale-with-grid">';
						    
							echo '<div class="image_wrapper">';
								echo mfn_post_thumbnail( get_the_ID(), 'plays' );
							echo '</div>';
							
							if( has_post_thumbnail() && $caption = get_post( get_post_thumbnail_id() )->post_excerpt ){
								echo '<p class="wp-caption-text '. mfn_opts_get( 'featured-image-caption' ) .'">'. $caption .'</p>';
							}
							
						echo '</div>';
					
						echo '<div class="desc">';
						    echo '<div class="working-num">Case study #'.$i.':</div>';
							echo '<h4><a href="'. get_permalink() .'">'. get_the_title() .'</a></h4>';
							echo '<div class="post-excerpt">'. get_the_excerpt() .'</div>';
							echo '</div>';
						
					echo '</li>';
                    ?>
                    <?php $i++;} //End for each loop
                    wp_reset_postdata(); //Restores WP post data ?>
                    
                    
                <?php } //End if ?>
			        </ul>
			
			<?php
				if( mfn_opts_get( 'plays-related' ) && $aCategories ){
					
					$related_count  = intval( mfn_opts_get( 'plays-related' ) );
					$related_cols 	= 'col-'. absint( mfn_opts_get( 'plays-related-columns', 3 ) );
					$related_style	= mfn_opts_get( 'related-style' );
					
					$args = array(
						'post_type' 			=> 'plays',
						'tax_query' => array(
							array(
								'taxonomy'	=> 'playscat',
								'field'		=> 'term_id',
								'terms'		=> $aCategories
							),
						),
						'post__not_in'			=> array( get_the_ID() ),
						'posts_per_page'		=> $related_count,
						'post_status'			=> 'publish',
						'no_found_rows'			=> true,
						'ignore_sticky_posts'	=> true,
					);

					$query_related_posts = new WP_Query( $args );
					if ( $query_related_posts->have_posts() ){

						echo '<div class="section-related-adjustment '. $related_style .'">';
						
							echo '<h4>'. $translate['related'] .'</h4>';
							
							echo '<div class="section-related-ul '. $related_cols .'">';
							
								while ( $query_related_posts->have_posts() ){
									$query_related_posts->the_post();
									
									echo '<div class="column post-related '. implode(' ',get_post_class()).'">';	
										
										echo '<div class="image_frame scale-with-grid">';
										
											echo '<div class="image_wrapper">';
												echo mfn_post_thumbnail( get_the_ID(), 'plays' );
											echo '</div>';
											
											if( has_post_thumbnail() && $caption = get_post( get_post_thumbnail_id() )->post_excerpt ){
												echo '<p class="wp-caption-text '. mfn_opts_get( 'featured-image-caption' ) .'">'. $caption .'</p>';
											}
											
										echo '</div>';
										
										echo '<div class="date_label">'. get_the_date() .'</div>';
									
										echo '<div class="desc">';
											echo '<h4><a href="'. get_permalink() .'">'. get_the_title() .'</a></h4>';
											echo '<hr class="hr_color" />';
											echo '<a href="'. get_permalink() .'" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">'. $translate['readmore'] .'</span></a>';
										echo '</div>';
										
									echo '</div>';
								}
							
							echo '</div>';
							
						echo '</div>';
					}	
					wp_reset_postdata();
				}	
			?>
			
		</div>
	</div>
	
</div>