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
	
	$content = '</head><body>
	<div style="display:block;"><form method="post" name="login" enctype="multipart/form-data">';
	
		$content .= '<ul class="adatok">';
			
			$content .= '<li><h1>Please, log in!</h1></li>';
			$content .= '<li><p>'.$output.'</p></li>';
			$content .= '<li><label>Username:</label><input type="text" name="UserName" id="loginnev"></li>';
			$content .= '<li><label>Password:</label><input type="password" name="UserPassword" id="password"></li>';
			$content .= '<li><button name="userlogin" type="Submit">Mehet</button></li>';
		
		$content .= '</ul>';
	
	$content .= '</form></div>
	<div>
		<a href="sponsors">Sponsors</a>	
	</div>';
	

   } else {
	   
	   $new = new locations();
	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />
<link rel="stylesheet" href="css/admin_permissions.css" />

<script src="js/sponsors_permissions.js"></script>


</head>
<body>
  <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 | Modify Sponsor Permission</h1>
	  	        <div id="MenuIconContainer">';
	
  
	if (isset($_SESSION['sponsors_admin'])) {
		

		 $content .= '<a href="sponsors"><img class="MenuIcon" src="img/admin/sponsors.png" onmouseover="this.src=';
		 $content .="'img/admin/sponsors_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/sponsors.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['speakers_admin'])) {
		
		 $content .= '<a href="speakers"><img class="MenuIcon" src="img/admin/speakers.png" onmouseover="this.src=';
		 $content .="'img/admin/speakers_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/speakers.png';";
		 $content .='" ></a>';
	 
	}
	
	if (isset($_SESSION['agenda_admin'])) {
		
		 $content .= '<a href="agenda"><img class="MenuIcon" src="img/admin/agenda.png" onmouseover="this.src=';
		 $content .="'img/admin/agenda_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/agenda.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['blogsquad_admin'])) {
		
		 $content .= '<a href="blogsquad"><img class="MenuIcon" src="img/admin/blogsquad.png" onmouseover="this.src=';
		 $content .="'img/admin/blogsquad_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/blogsquad.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['mediapartners_admin'])) {
		
		 $content .= '<a href="mediapartners"><img class="MenuIcon" src="img/admin/mediapartners.png" onmouseover="this.src=';
		 $content .="'img/admin/mediapartners_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/mediapartners.png';";
		 $content .='" ></a>';
	 
	}
  
  $content .='</div>
	<!--Form container-->
	 <div id="container">';
	 
	 
	 	if (isset($_SESSION['sponsors_admin']) && isset($_SESSION['super_admin'])) {
			
		  if (isset($_COOKIE['SponsorsPermission'])){
			  
				$_SESSION['Sponsor_Permission_sId'] = $_COOKIE['SponsorsPermission'];
				unset($_COOKIE['SponsorsPermission']);
				setcookie('SponsorsPermission', null, -1, '/');
			
	       }
		      if (!isset($_SESSION['Sponsor_Permission_sId'])) {
				$_SESSION['Sponsor_Permission_sId'] = -1;  
			  }
		$perm = new permissions();
		$content .= $perm->get_sponsors_permissions($_SESSION['Sponsor_Permission_sId']);
		
	     $content .='<form id="sponsors" name="sponsors" method="post" action="controllers/main.php" enctype="multipart/form-data">
  
                  </form>
    	
  	   <!-- End of Form Container-->';
	   
	 } //if isset agenda_admin 
	 else {
		$content.="<h1 style='text-align:center'>You don't have permission to see this page! Naughty! ;)</h1>"; 
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
  <title>HR Tech Europe - New Sponsor</title>
<?php
echo $content;

?> 
</body>
</html>
