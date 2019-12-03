<?php
/**
  # Alternatively, you can disable automatic updates in WordPress by adding
  # this line of code in your wp-config.php file: 
*/

/* 1. This will disable all automatic WordPress updates. */
define( 'WP_AUTO_UPDATE_CORE', false );

/* 2. Disable automatic WordPress plugin updates: */
add_filter( 'auto_update_plugin', '__return_false' );

/* 3. Disable automatic WordPress theme updates: */
add_filter( 'auto_update_theme', '__return_false' );

?>