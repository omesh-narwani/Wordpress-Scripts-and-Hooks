<?php
/**
 * Template Name: Process Page
 *
 * @package Betheme
 * @author Muffin Group
 */

 session_start();
if(isset($_REQUEST)){
    //print_r($_POST);exit;
    global $wpdb;
      $address =$_POST['address-73'];
      
      
  $prepAddr = str_replace(' ','+',$address);
  $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
  
  $output= json_decode($geocode);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;
  //$pointss = 'POINTFROMTEXT(\'POINT(49.227239 17.564932)\')';
 // $pointss = str_replace('', "", $string);
     $mypoints = $latitude." ".$longitude;
     $card_number =$_POST['reg-code-73'];
     $description =$_POST['DESCRIPTION'];
     $postal_code =$_POST['land'];
     $city =$_POST['city-73'];
 //print_r($_POST);
 $newCon = mysqli_connect('localhost','belgiumi_userbelgiumi','T%Z[qXHZ4Jh7','belgiumi_belgiumi');
 if($address != "")
 {
echo $query = "INSERT INTO `wp_wpgmza`(`map_id`, `address`, `description`, `lat`, `lng`, `anim`, `infoopen`, `approved`, `latlng`, `postal_code`, `city`, `card_number`) VALUES ( 1, '".$address."', '".$description."', '".$latitude."', '".$longitude."', '0', '0', '1', ST_GeomFromText('POINT($mypoints)'),'".$postal_code."','".$city."','".$card_number."')";
//exit;
$exec = mysqli_query($newCon,$query);

$rowsAffected = mysqli_affected_rows($newCon);
echo $rowsAffected;
}

  /*
        $tablename = $wpdb->prefix.'wpgmza';
       $sql1 = $wpdb->insert( $tablename, array(
            'id' => q'',
            'map_id' => '1', 
            'address' => 'asdsad',
            'description' => 'adsadad',
            'pic' => 'b',
            'link' => 'b',
            'icon' => 'b',
            'lat' => '49.227239',
            'lng' =>'17.564932',
            'anim' => '0',
            'title' => 'b',
            'infoopen' => '1',
            'category' => '0',
            'approved' => '1',
            'retina' => '0',
            'type' => '0',
            'did' => '0',
            'other_data' => 'b',
            'latlng' => $pointss
            ));
            $wpdb->show_errors();
             $wpdb->print_error($sql1);exit;
    */
    
     
}
        
      if($_GET['lang'] == 'en' ){
                $_SESSION['smessage'] = 'Thank you, your good deed was registered.';
                header("Location:http://belgiumisgreat.be/?lang=en");
        }elseif($_GET['lang'] == 'fr' ){
                $_SESSION['smessage'] = 'Merci, votre bonne action a été enregistrée.';
                header("Location:http://belgiumisgreat.be/?lang=fr");
        }else{
                $_SESSION['smessage'] = 'Bedankt, uw goede daad werd geregistreerd.';
                header("Location:http://belgiumisgreat.be/");
        }
