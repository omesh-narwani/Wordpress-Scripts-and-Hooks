function wps_redirect_bp_login() {
  if( is_user_logged_in() && is_page('signin') ) {
      wp_redirect( home_url('franchise'), 301 );
   // bp_core_redirect( get_option('home') . '/franchise/' );
  }
}
add_action( 'template_redirect', 'wps_redirect_bp_login', 1 );