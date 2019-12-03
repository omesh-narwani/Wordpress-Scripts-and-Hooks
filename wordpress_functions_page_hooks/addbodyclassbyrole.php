// Add role class to body
function add_role_to_body($classes) {
 
 global $current_user;
 $user_role = array_shift($current_user->roles);
 
 $classes[] = 'role-'. $user_role;
 return $classes;
}
add_filter('body_class','add_role_to_body');


//add role class to admin body
add_filter( 'admin_body_class', 'custom_admin_body_class' );
function custom_admin_body_class( $classes ) {
    global $current_user;
    $user_role = array_shift($current_user->roles);
        $classes .= ' role-'. $user_role;

	return $classes;
}