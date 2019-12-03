<?php
/* WP E-MEMBER DIRECTORY SHORTCODE */
add_shortcode('memberslisting', 'members_directory');
function members_directory(){
    /* POST GLOBAL */
	global $wpdb;
	$limit = 12;  
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
	$start_from = ($page-1) * $limit; 
	$pagquery = "SELECT * FROM wp_wp_eMember_membership_tbl level, wp_wp_eMember_members_tbl members, wp_wp_members_meta_tbl umeta where level.id = members.membership_level and umeta.user_id = members.member_id ORDER BY members.member_id ASC LIMIT $start_from, $limit";
	
	/* *QUERY* */
	$query = "SELECT * FROM wp_wp_eMember_membership_tbl level, wp_wp_eMember_members_tbl members, wp_wp_members_meta_tbl umeta where level.id = members.membership_level and umeta.user_id = members.member_id";
	$listing = $wpdb->get_results($query, ARRAY_A); 
	
?>
	
	<div class="vc_row members-col-12">
	<?php foreach($listing as $memberslist){ 
		$customfield = $memberslist['meta_value'];
		$customarray = unserialize($customfield);
		$id = $memberslist['user_id'];
		$query_card = "SELECT * FROM wp_wp_eMember_membership_tbl level, wp_wp_eMember_members_tbl members, wp_wp_members_meta_tbl umeta where members.member_id=$id and level.id = members.membership_level and umeta.user_id = members.member_id";
		$member_cards = $wpdb->get_results($query, ARRAY_A);
		?>
		<div class="vc_col-sm-3 member-col-4">
			<div class="member-imageframe">
				<?php //foreach($member_cards as $member_card){ 
				//$customfield2 = $member_card['meta_value'];
				//$designation2 = unserialize($customfield2);
				$designation = $customarray['Designation'];
				$shortbio = $customarray['shortbio'];
				$fname = $memberslist['first_name'];
				$lname = $memberslist['last_name'];
				$username = $fname." ".$lname;
				$url= site_url();
				$profile = $url.'/wp-content/uploads/emember/'.$memberslist['profile_image'];
				$company_name = $memberslist['company_name'];
				$member_level = $memberslist['campaign_name'];
				$lin = ( $customarray['Linkedin'] != '' ) ? $customarray['Linkedin'] : "#"  ;
				$fb  =  ( $customarray['Facebook'] != '' ) ? $customarray['Facebook'] : "#"  ;
				$insta = ( $customarray['Instagram'] != '' ) ? $customarray['Instagram'] : "#"  ;
							
				?>
				<a onClick="members_popup(<?="'$profile'".','."'$username'".','."'$company_name'".','."'$designation'".','."'$member_level'".','."'$shortbio'".','. "'$lin'".','. "'$fb'".','. "'$insta'"?>)" id="user-id<?=$memberslist['user_id']?>">
					<!-- <div class="wpb_single_image"> -->
					<!-- <div class="vc_single_image-wrapper vc_box_border_circle  vc_box_border_white">-->
					
						<img class="vc_single_image-img" src="<?= $profile;?>" />
					<!-- </div>-->
					<!--</div>-->
				</a>
				<?php //} ?>
			</div>
			
			<div class="member-name"><?=$memberslist['first_name']. ' ' .$memberslist['last_name'];?></div>
			<div class="member-designation"><?=$designation;?></div>
		</div>
		<?php } ?>
	</div>
<?php	
	}
?>


<?php
/* SUPSYSTIC MEMBER DIRECTORY SHORTCODE */
add_shortcode('memberslisting', 'members_directory');
function members_directory(){
global $wpdb;
	//$query = "SELECT * FROM wp_wp_eMember_membership_tbl level, wp_wp_eMember_members_tbl members where level.id = members.membership_level and members.membership_level = 4 ORDER BY members.member_id ASC LIMIT 0, 8";
	$query = "SELECT DISTINCT M.ID, M.display_name, M.user_nicename, UM.meta_value FROM wp_users M,wp_usermeta UM, wp_supsystic_membership_orders O, wp_supsystic_membership_orders_products L where M.ID = O.uid and M.ID = UM.user_id and O.id = L.oid and UM.meta_key = 'supsystic_membership_last_activity' and (L.pid = 3 or L.pid = 2 ) ORDER BY M.ID DESC LIMIT 0, 8";
	$listing = $wpdb->get_results($query, ARRAY_A); 
    //echo "<pre>";
    //print_r($listing);exit;
	
	?>
	
	<div class="vc_row members-col-12">
	<?php foreach($listing as $memberslist){ 
	     $url= site_url();
		//$customfield = $memberslist['meta_value'];
		//$customarray = unserialize($customfield);
		$id = $memberslist['ID'];
		$query_img = "SELECT source FROM wp_supsystic_membership_users_images UI, wp_supsystic_membership_images MI where UI.image_id = MI.id and UI.type = 'avatar' and UI.user_id = $id";
		$member_img = $wpdb->get_results($query_img, ARRAY_A);
		if(empty($member_img)){
		    $profile = $url."/wp-content/uploads/2018/06/dummy-image.png";
		}else{
		    $profile = $member_img[0]['source'];
		}
		 $user_info = get_user_meta($memberslist['ID']);
		 
		
		?>
		
		<div class="vc_col-sm-3 member-col-4">
			<div class="member-imageframe">
				<?php 
				$shortbio = $customarray['shortbio'];
				$fname = $user_info['first_name'][0];
				$lname = $user_info['last_name'][0];
				$username = $fname." ".$lname;
							
				?>
				
				<img class="vc_single_image-img" src="<?= $profile;?>" />
				<?php
				    if($memberslist['meta_value'] > (time() - (15 * MINUTE_IN_SECONDS)) ){
				?>
				<div class="available-status"><h3>Online Now</h3></div>
				<?php } ?>
				<div class="membersDetail">
				    <h3><?= $username;?></h3>
				    <a href="<?= $url.'/profile-2/'.$memberslist['user_nicename'];?>">View Profile</a>
				</div>    
				
				<?php //} ?>
			</div>
			
			
		</div>
		<?php } ?>
	</div>
<?php	
	}
<?php//Available Members 
function available_members(){
global $wpdb;
	$query = "SELECT * FROM wp_users M, wp_usermeta UM where M.ID = UM.user_id and UM.meta_key = 'supsystic_membership_last_activity' ORDER BY M.ID ASC LIMIT 0, 8";
	$listing = $wpdb->get_results($query, ARRAY_A); 
	//echo "<pre>";
    //print_r($listing);exit;
	?>
	
	<div class="vc_row members-col-12">
	<?php foreach($listing as $memberslist){ 
	    $url= site_url();
		$id = $memberslist['ID'];
		$query_img = "SELECT source FROM wp_supsystic_membership_users_images UI, wp_supsystic_membership_images MI where UI.image_id = MI.id and UI.type = 'avatar' and UI.user_id = $id";
		$member_img = $wpdb->get_results($query_img, ARRAY_A);
		if(empty($member_img)){
		    $profile = $url."/wp-content/uploads/2018/06/dummy-image.png";
		}else{
		    $profile = $member_img[0]['source'];
		}
		 $user_info = get_user_meta($memberslist['ID']);
	?>
		<div class="vc_col-sm-3 member-col-4">
			<div class="member-imageframe">
				<?php //foreach($member_cards as $member_card){ 
				
				$fname = $user_info['first_name'][0];
				$lname = $user_info['last_name'][0];
				$username = $fname." ".$lname;
				
				
				?>
				<img class="vc_single_image-img" src="<?= $profile;?>" />
				<?php
				    if($memberslist['meta_value'] > (time() - (5 * MINUTE_IN_SECONDS)) ){
				?>
				<div class="available-status"><h3>Available Now</h3></div>
				<?php } ?>
				<div class="membersDetail">
				    
				    <h3><?=$username;?></h3>
				    <a href="<?= $url.'/profile-2/'.$memberslist['user_nicename'];?>">View Profile</a>
				</div>    
				
				<?php //} ?>
			</div>
			
			
		</div>
		<?php } ?>
	</div>
<?php	
	}
add_shortcode('availablemembers', 'available_members');