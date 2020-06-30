
/* SHipping checkout custom fields */

add_filter('woocommerce_checkout_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields($fields)
{
    $fields['billing_options'] = array(
        'label' => __('NIF', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Your NIF here....', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('my-css')   // add class name
    );

    return $fields;
}