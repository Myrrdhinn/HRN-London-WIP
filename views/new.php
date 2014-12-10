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
		<a href="index.php?q=speakers">Speakers</a>	
	</div>';
	

   } else {
	   
	   $new = new locations();
	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
  <!-- Dropzone -->
<script src="js/dropzone.js"></script>
<link rel="stylesheet" href="css/dropzone.css" />
<link rel="stylesheet" href="css/new_speaker.css" />

</head>
<body>
	     <form class="dropzone" id="speakers" name="speakers" method="post" action="controllers/main.php" enctype="multipart/form-data"><br />
    <div>
  <script src="js/dropzone_options.js"></script>
  
    <label>Speaker name<input required="required" name="Speaker" id="SpeakerName" type="text" /></label><br />
    <label>Speaker title<input name="SpeakerTitle" type="text" /></label><br />
    <label>Speaker bio important<textarea name="SpeakerBioImp" cols="" rows=""></textarea></label><br />
    <label>Speaker bio<textarea name="SpeakerBio" cols="" rows=""></textarea></label><br />
    <label>Speaker tag<input required="required" name="Tag" id="Tag" type="text" /></label><br />
    <label>Speaker Twitter<input name="SpeakerTwitter" type="text" /></label><br />
    <label>Speaker Facebook<input name="SpeakerFacebook" type="text" /></label><br />
    <label>Speaker Linkedin<input name="SpeakerLinkedin" type="text" /></label><br />
    <label>Speaker Flickr<input name="SpeakerFlickr" type="text" /></label><br />
    <label>Speaker Google+<input name="SpeakerGoogle" type="text" /></label><br />
    <label>Speaker RSS<input name="SpeakerRSS" type="text" /></label><br /> <br /> <br />
	<label>There\'s no picture available<input type="checkbox" name="NoPicture" id="NoPicture" /></label> <br /> <br />
	<div id="AvatarHelp"></div>
    <label>Order <select name="Order">';
	 $content .= $new->get_order();
   
    $content .=' 
    </select></label><br /> <br />
    <fieldset>
    <legend>Company detalis</legend>
    <label>Company name<input required="required" name="CompanyName" type="text" /></label><br />
    <label>Company url<input name="CompanyUrl" type="text" /></label><br />
    <label>Company bio<textarea name="CompanyBio" cols="" rows=""></textarea></label><br />
    </fieldset><br />';
	
  /* 
    //Agenda upload but it's not needed now so.. :( 
    $content .= '<fieldset>
    <legend>Agenda details</legend>
    <label>Agenda title<input required="required" name="AgendaTitle" type="text" /></label><br />
    <label>Time of Start<input name="AgendaTimeStart" type="text" /></label><br />
    <label>Time of End<input name="AgendaTimeEnd" type="text" /></label><br />
    <label>Day <select name="Day"> 
    <option value="1">Day 1</option>
    <option value="2">Day 2</option>
    </select></label><br /><br />
    <label>Abstract<textarea name="Abstract" cols="25" rows="5"></textarea></label><br />
    <label>Location <select name="Locations">';
   $content .= $new->get_locations();
   $content .= ' 
    </select></label>
    </fieldset>*/
	
 $content .= '
	<input hidden="hidden" type="file" name="file" />
    </div>
  </form><br /><br /><br />
  <form name="logoutform" id="LogoutForm" method="post" action="">
  <button name="logout">Logout</button>
  <form><br />
  
  <br /><a href="index.php?q=speakers">Speakers</a><br />
  <a href="index.php?q=agenda">Agenda</a><br /><br />
  <a href="index.php?q=new_agenda">New Agenda</a><br /><br />';
  	   
	   
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
  <title>Teszt</title>
<?php
echo $content;

?> 
</body>
</html>
