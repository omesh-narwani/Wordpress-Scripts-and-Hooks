/*  Add Column on user table */
function new_contact_methods( $contactmethods ) {
    $contactmethods['Status'] = 'Status';
    return $contactmethods;
}
add_filter( 'user_contactmethods', 'new_contact_methods', 10, 1 );


function new_modify_user_table( $column ) {
    $column['Status'] = 'Status';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'Status' :
            return get_the_author_meta( 'cs_user_status', $user_id );
            break;
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );
/* Remove COlumn User */
add_action('manage_users_columns','kjl_modify_user_columns');
function kjl_modify_user_columns($column_headers) {
  unset($column_headers['jobs']);
  unset($column_headers['posts']);
  return $column_headers;
}
