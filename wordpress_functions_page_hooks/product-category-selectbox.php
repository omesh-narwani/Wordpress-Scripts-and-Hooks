<?php
/* Show list of category in select box and search */
function find_league(){
    $taxonomy     = 'product_cat';
      $orderby      = 'ID';  
      $show_count   = 0;      // 1 for yes, 0 for no
      $pad_counts   = 0;      // 1 for yes, 0 for no
      $hierarchical = 1;      // 1 for yes, 0 for no  
      $title        = '';  
      $empty        = 0;
    
      $args = array(
             'taxonomy'     => $taxonomy,
             'orderby'      => $orderby,
             'show_count'   => $show_count,
             'pad_counts'   => $pad_counts,
             'hierarchical' => $hierarchical,
             'title_li'     => $title,
             'hide_empty'   => $empty
      );
     $all_categories = get_categories( $args );
     
    ?>
      <div class="header_league_search">
         <h3>Find a Best League for you </h3>
		<form method="get"  action="<?= esc_url( home_url( '/leagues/#' ) ) ?>">
        	
        	<div class="dropdown">
        	<select name="" class="league_cat">
        	 <?php foreach ($all_categories as $cat) {?>
        	 
                <option value="<?=$cat->slug;?>"><?= $cat->name;?></option>
            <?php }  ?>    
            </select>
            </div>
        	<button type="submit" class="SearchBtn">Search</button>
       
        </form>
	</div>
	<?php
}
add_shortcode('league_form','find_league');