function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
background-image: url(http://localhost/wordpress/one.jpeg);  //Add your own logo image in this url 
padding-bottom: 30px; 
} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );