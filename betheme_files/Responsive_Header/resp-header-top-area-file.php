
<div class="RespHeader">
	<div class="container">
		<div class="column one">
			<div class="top_bar_left clearfix">
				<div class="RespLeft">
				<div class="RespToggle">
				<?php 
				// responsive menu button ---------
					$mb_class = '';
					if( mfn_opts_get('header-menu-mobile-sticky') ) $mb_class .= ' is-sticky';

					echo '<a class="responsive-menu-toggle '. $mb_class .'" href="#">';
						if( $menu_text = trim( mfn_opts_get( 'header-menu-text' ) ) ){
							echo '<span>'. $menu_text .'</span>';
						} else {
							echo '<i class="icon-menu-fine"></i>';
						}  
					echo '</a>';
				?>
				</div>
				<div class="RespSearch">
				   <?php  if( mfn_opts_get( 'header-search' ) ){
							echo '<a id="SearchBtn" href="#"><i class="fa fa-search"></i></a>';
						}?>
						<div class="search_wrapper">
							<!-- #searchform -->
							
							<?php // Search | wrapper
							if( mfn_opts_get( 'header-search' ) ){
								echo '<div class="search-wrapper">';
							
								$translate[ 'search-placeholder' ] = mfn_opts_get( 'translate' ) ? mfn_opts_get( 'translate-search-placeholder', 'Search Product' ) : __( 'Enter your search', 'betheme' );
							
								echo '<form id="side-form" method="get" action="'. esc_url( home_url( '/' ) ) .'">';
								echo '<input type="hidden" name="post_type" value="product" />';
								echo '<input type="text" class="field" name="s" id="s" placeholder="'. $translate['search-placeholder'] .'" />';
								echo '<button type="submit" class="SearchBtn"><i class="fa fa-search"></i></button>';

							
								echo '</form>';
							
								echo '</div>';
							} ?>
						</div>
				</div>
				</div>
				<div class="RespLogo">
						<?php get_template_part( 'includes/include', 'logo' ); ?>
				</div> 
				<div class="RespRight">
				<div class="RespEmailSignup">
					<a href="#"><i class="fa fa-envelope"></i></a>
				</div>
				<div class="RespAccount">
				   <a href="#"><i class="fa fa-user"></i></a>
				</div>
				<div class="RespCheckout">
				   <a href="#"><i class="fa fa-shopping-bag"></i></a>
				</div>
				</div>
			</div>  
		</div>
	</div>  
</div>
<style>
@media only screen and (max-width:959px){
     #Top_bar #logo {
         line-height: 25px !important;
     }
     .TopLogoCustom, .TopMenuCustom {
             display: none;
      }
       .woocommerce div.product div.summary{
               clear: both;
    }
    .header-stack #Top_bar a.responsive-menu-toggle {
        position: relative !important;
        margin-top: 0px !important;
        top: 0px !important;
        left: 0px !important;
       height:auto;
    }
    .header-stack #Top_bar .logo {
        text-align: center !important;
         width: 100% !important;
    } 
    #Top_bar #logo img.logo-mobile {
        display: inline-block;
    }
     .RespHeader {
         padding: 15px 10px;
        display:block;
     }
    .RespToggle, .RespSearch, .RespEmailSignup, .RespEmailSignup, .RespAccount, .RespCheckout  {
        display: inline-block;
    }
    .RespLeft, .RespRight {
        display: inline-block;
    }
    .RespLeft {
        text-align: left;
        float: left;
      width: 25%;
    }
    .RespRight {
        text-align: right;
        float: right;
        width: 30%;
     } 
     .RespRight a {
         padding: 0px 6px;
         line-height: 30px;
     }
     .RespLogo{
          display: inline-block;     
           width: 45%;
     }

     #Top_bar .logo #logo {
          text-align: center !important;
         width: auto;
         margin: auto !important;
      }
     .RespHeader a > i {
         font-size: 16px;
         color: #212121 !important;
        line-height:20px;
       }
      .RespSearch a {
         padding: 0px 10px;
     }
     #Top_bar .RespSearch .search_wrapper {
        background: #212121;

        bottom: -85px;
     }
     #Top_bar .RespSearch .search_wrapper input[type="text"] {
        border-color: #fff !important;
        color: #fff;
        border: 1px solid !important;
        width: 80%;
        display: inline-block;
        padding: 10px 10px;
    }
     .RespSearch .SearchBtn {
       padding: 11px 0px;
       border-radius: 0px;
       background: #001E5F;
       border: 1px solid #FFF;
       width: 17%;
       margin: 0px;
    }
    #Top_bar .RespSearch .search_wrapper::before {
        content: "\f0d8";
        position: absolute;
        top: -15px;
        font-family: fontawesome;
        color: #212121;
        font-size: 32px;
        left: 50px;
    }

}
</style>
<script>
	jQuery("#SearchBtn").click(function (e) {
		 e.stopPropagation();
		 jQuery('.search_wrapper').toggle( "slow" );
	});
</script>