// Add this to your theme's functions.php
function kia_add_script_to_footer(){
    if( ! is_admin() ) { ?>
    <script>
jQuery(document).ready(function(){
	jQuery(this).on('click', '.plus', function() {
        $input =  jQuery(this).prev('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $input.val( val + step ).change();
    });
     jQuery(this).on('click', '.minus',  // replace '.quantity' with document (without single quote)
        function(e) {
        $input =  jQuery(this).next('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 0) {
            $input.val( val - step ).change();
        } 
    });
 });
</script>
<?php }
}
add_action( 'wp_footer', 'kia_add_script_to_footer' );