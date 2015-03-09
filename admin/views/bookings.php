<?php 
   if (!isset($_SESSION['admin'])) {
	   if(isset($_POST['userlogin']) && $_REQUEST['UserName'] && $_REQUEST['UserPassword']){
		   $auth = new siteauth();
		   $output = $auth->login($_REQUEST['UserName'], $_REQUEST['UserPassword']);
	   }
	   
	   		//Bejelentkezés
	if (!isset($output)) {
		$output = '';
	}
	
	$content = '
	<title>HR Tech Europe - London Admin</title>
	<!--Include Admin styles-->
	  <link href="css/admin_general.css" rel="stylesheet">
	  <link href="css/admin_login.css" rel="stylesheet">
	<!--Include Font Awesome -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
	
	<!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 | Log in</h1>
	  
	  <p class="WelcomeTexT">Welcome to the Administration page of the <br> HR Tech Europe - London Conference`s Website</p>
	<!--Form container-->
	 <div id="container">
	  
	  <form id="AdminLoginForm" method="post" name="login" enctype="multipart/form-data">';
	
		$content .= '<ul class="adatok">';		
			$content .= '<li><p>'.$output.'</p></li>';
			$content .= '<li><input class="AdminInputField" type="text" name="UserName" id="loginnev" placeholder="Username"></li>';
			$content .= '<li><input class="AdminInputField" type="password" name="UserPassword" id="password" placeholder="Password"></li>';
			$content .= '<li><button class="AdminSubmitButton" name="userlogin" type="Submit">Login</button></li>';
		
		$content .= '</ul>';
	
	$content .= '</form>
	
	   <!-- End of Form Container-->
	 </div>
	 
	<!--End of Main Wrapper-->
	</div>';
	

   } else {
	   
	   $new = new locations();
	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  


<link href="css/admin_general.css" rel="stylesheet">
<link href="css/general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />
<link rel="stylesheet" href="css/admin_booking.css" />

<script src="js/admin_general.js"></script> 
<script src="js/admin_bookings.js"></script> 



</head>
<body>
  <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 | Sponsor Bookings</h1>
	  	        <div id="MenuIconContainer">';
	
  
	if (isset($_SESSION['admin'])) {
		

		 $content .= '<a href="index"><img class="MenuIcon" src="img/admin/main.png" onmouseover="this.src=';
		 $content .="'img/admin/main_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/main.png';";
		 $content .='" ></a>';
	 
	}

  
  $content .='</div>
	<!--Form container-->
	 <div id="container">';

	if (isset($_SESSION['developer'])) {
		
		$content .= '<form action="controllers/bookings_main.php" method="POST"><input type="submit" id="ExportButton" name="ExportButton" class="BookingSubmitButton" value="Export to xlsx" /></form>';
		$l = new bookings_main();
		$logs = $l->get_logs();
		
		$out = '';
		foreach ($logs as $log) {
			$out .= '<div class="log_p">';
			foreach ($log as $elem){
				$out .='<div class="log_item">'.$elem.'</div>';
			} //forech elem
			$out .= '</div>';
			
		}//foreach logs
		
		$content .= $out;
	    
	   
	 } //if isset agenda_admin 
	 else {
		$content.="<h1 style='text-align:center'>You don't have permission to see this page!</h1>"; 
	 }
	 
	 
	$content .=' </div>
	 
	<!--End of Main Wrapper-->
	</div>
	
  <form name="logoutform" id="LogoutForm" method="post" action="">
  <button name="logout">Logout</button>
  </form><br />';  
  	   
	   
   }

 if(isset($_POST['logout'])){
		   $auth = new siteauth();
		   $auth->logout();
	   }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>HR Tech Europe - New Mediapartner</title>
<?php
echo $content;

?> 
</body>
</html>
