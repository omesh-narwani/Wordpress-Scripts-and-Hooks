<?php
add_shortcode( 'form_banner_shortcode', 'form_banner_shortcode_function' );
function form_banner_shortcode_function($atts, $content = null){
    global $wpdb;
	/* Query */
		$query = "SELECT p.ID,p.post_title,pm.meta_value as price FROM wp_posts p, wp_postmeta pm WHERE p.post_type = 'product' and p.`post_status` = 'publish' and p.ID = pm.post_id and pm.meta_key = '_regular_price'";
    $products = $wpdb->get_results ($query);
    //echo "<pre>";
    //print_r($result);

  $ref = shortcode_atts( array(
      'main-heading' => '',
      'sub-heading' => '',
      'heasing-descp-para' => '',
    ), $atts );
?>
<div class="formArea">
    <div class="row">
        <div class="col-md-6">
            
            <p>Select The Service Required: </p>
        </div>
        <div class="col-md-6">
            <input data-val="true" data-val-number="The field OrderCode must be a number." data-val-required="The OrderCode field is required." id="OrderMaster_OrderCode" name="OrderMaster.OrderCode" type="hidden" value="" />
            <input data-val="true" data-val-number="The field OrderDetailCode must be a number." data-val-required="The OrderDetailCode field is required." id="OrderMaster_OrderDetail_OrderDetailCode" name="OrderMaster.OrderDetail.OrderDetailCode" type="hidden" value="" />
            <input data-val="true" data-val-number="The field SelectedProductService must be a number." data-val-required="The SelectedProductService field is required." id="SelectedProductService" name="SelectedProductService" type="hidden" value="150" />
            
			<!-- SELECT SERVICES  -->
            <select name="product" id="product-services" ajaxhandler="product">
                <option value="-1" selected="selected">Select Service</option>
            <?php foreach($products as $product){ ?>
                <option data-proid="<?= $product->ID; ?>"  value="<?= $product->price; ?>"><?=$product->post_title; ?></option>
            <?php } ?>
            </select>
        </div>
    </div>
    <div class="row sec">
        <div class="col-md-6">
            
            <p>Number of Pages Required: </p>
        </div>
        <div class="col-md-6">
           <!-- SELECT PAGES  -->
			<select ajaxHandler="numberofpages" data-val="true" data-val-number="The field SelectedNumberOfPages must be a number." data-val-required="The SelectedNumberOfPages field is required." id="numberofpages1" name="SelectedNumberOfPages">
			<option value="">Select No Of Pages</option>
			<?php for($i=1; $i <=400; $i++){
			    echo "<option value='".$i."'>$i</option>";
			}?>
			
            </select>
			<!-- ORDERT BUTTON  -->
            <a href="#" id="lnlplaceorder" class="anchor" target="_parent">Place Order</a>
        </div>
    </div>
    
    <div class="row">
		<!-- TOTAL AMOUNT  -->
        <div class="col-md-6 TotalAmount"><h5 class="dl">Total Amount:<br><span id="price">$ 0</span></h5></div>

		
        <div class="col-md-6" style="display:none"><h5>Estimated Time:<br><span id="deadline" class="nn"></span><span> Working Days</span></h5></div>
    </div>
</div>
<?php
}
?>
<!-- Jquery Script  OF  Calculator  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
jQuery(window).load(function(){
    jQuery('#numberofpages1').on('change', function() {
        var pages = jQuery(this).val();
        var service1 = jQuery('#product-services').val();
        var pid = jQuery('#product-services').find(':selected').attr('data-proid');
        //var serviceid = jQuery(this).find(':selected').attr('data-proid');
        var totalprice = service1 * pages;
        jQuery( "#price" ).html(totalprice );
        var url = "http://www.websiteladz.com/demo/procontentclub/checkout/?add-to-cart="+pid+"&quantity="+pages;
        var a = document.getElementById('lnlplaceorder'); //or grab it by tagname etc
        a.href = url;
       
    });
});
</script>