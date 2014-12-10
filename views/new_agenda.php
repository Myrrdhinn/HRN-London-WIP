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
  
  <!-- css -->
<link rel="stylesheet" href="css/new_speaker.css" />

<script src="js/new_agenda.js"></script>

</head>
<body>
	     <form class= id="agenda" name="agenda" method="post" action="controllers/main.php" enctype="multipart/form-data"><br />
    <div>
    <fieldset>
    <legend>Agenda details</legend>
    <label>Agenda title<input required="required" name="AgendaTitle" type="text" /></label><br />
    <label>Time of Start<input name="AgendaTimeStart" type="text" /></label><br />
    <label>Time of End<input name="AgendaTimeEnd" type="text" /></label><br /><br />
	<label>Is it Highlighted? <input id="Highlighted" name="Highlighted" type="checkbox" value="1" /></label><br /><br />
	<div id="AgendaIcon" style="display: none;">
	<label>Highlighted Agenda Icon<select name="Icons">';
   $content .= $new->get_icons();
   $content .= ' 
    </select></label><br /><br />
	</div>
    <label>Day <select name="Day"> 
    <option value="1">Day 1</option>
    <option value="2">Day 2</option>
    </select></label><br /><br />
    
    <label>Location <select name="Locations">';
   $content .= $new->get_locations();
   $content .= ' 
    </select></label><br /><br />
   <div id="SpeakersDiv">
   <label>Abstract<textarea name="Abstract" cols="25" rows="5"></textarea></label><br /><br />
	<label>Speakers <select name="Speakers[]" multiple>';
  $content .= $new->get_speakers();
     
   $content .=' </select></label><p>In order to select multiple speakers, please hold Ctrl and then click on the speakers</p></div>
     <input name="AgendaSubmit" type="submit" value="Save"/>
   </fieldset>
   </div>
  </form><br /><br />
  <form name="logoutform" id="LogoutForm" method="post" action="">
  <button name="logout">Logout</button>
  <form><br/ ><br />
  
  <br /><a href="index.php?q=speakers">Speakers</a><br />
  <a href="index.php?q=agenda">Agenda</a><br /><br />
  <a href="index.php">New Speaker</a><br /><br />';
  	   
	   
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
