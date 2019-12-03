   global $wpdb;
      $address =$_POST['address-73'];
      $api = "AIzaSyBGmrdpAfP60bsLln8_3jPT6A2HJvJE_-k";
      
  $prepAddr = str_replace(' ','+',$address);
  $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $prepAddr. '&key=' . $api . '&sensor=false');
  
  // $geocode;
  
  
  //$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
 // echo $url;exit;
  $output= json_decode($geocode);
  //print_r($output);
  $latitude = $output->results[0]->geometry->location->lat;
   $longitude = $output->results[0]->geometry->location->lng;