/**
* @snippet Add "Confirm Email Address" Field @ WooCommerce Checkout
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=72602
* @author Rodolfo Melogli
* @testedwith WooCommerce 3.0.7
*/
 
// ---------------------------------
// 1) Make original email field half width
// 2) Add new confirm email field
 
add_filter( 'woocommerce_checkout_fields' , 'bbloomer_add_email_verification_field_checkout' );
  
function bbloomer_add_email_verification_field_checkout( $fields ) {
 
$fields['billing']['billing_email']['class'] = array('form-row-first');
 
$fields['billing']['billing_em_ver'] = array(
    'label'     => __('Confirm Email Address', 'bbloomer'),
    'required'  => true,
    'class'     => array('form-row-last'),
    'clear'     => true
);
 
return $fields;
}
 
// ---------------------------------
// 3) Generate error message if field values are different
 
add_action('woocommerce_checkout_process', 'bbloomer_matching_email_addresses');
 
function bbloomer_matching_email_addresses() { 
$email1 = $_POST['billing_email'];
$email2 = $_POST['billing_em_ver'];
if ( $email2 !== $email1 ) {
wc_add_notice( __( 'Your email addresses do not match', 'bbloomer' ), 'error' );
}
}