<?php
include_once('aaa.php');
include_once('config.php');


 class main extends config {
	 
/*
**************************
Basic functions
**************************
*/
	 //strip strings from special characters
   function ekezet_nelkuli($fajlnev) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $fajlnev = strtolower(strtr($fajlnev, $specialis_karekterek));
    $fajlnev = preg_replace("/[^a-z0-9-_\.]/i", '_', trim($fajlnev));
    if (strlen($fajlnev) == 0 || $fajlnev == '.' || $fajlnev == '..') {
    	$fajlnev = 'ervenytelen_nev';
    }
    return $fajlnev;
}

		//get info of a file
  function fileinfo($filename) {
	$file = array('filename' => '', 'extension' => '');
	// $pos: az utolsó . karakter pozíciója, vagy FALSE
	$pos = strrpos($filename, '.');
	if ($pos === false) {
		$file['filename'] = $filename;
	} else {
		// itt a $pos egy számot tartalmaz
		$file['filename']  = substr($filename, 0, $pos);
		$file['extension'] = substr($filename, $pos + 1);
	}
	return $file;	
}
	 
	
	
	 //Add sponsor booking to the database
///---------------------------------------------------------------
function sponsor_booking($sponsor, $fname, $lname, $email, $phone, $company, $title, $day, $time){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO sponsors_booking SET first_name = '%s', last_name = '%s', email = '%s', phone = '%s', company = '%s', title = '%s', day = '%s', time = '%s', sponsor = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($fname)),
				  $this->dbc->real_escape_string(htmlspecialchars($lname)),
				  $this->dbc->real_escape_string(htmlspecialchars($email)),
				  $this->dbc->real_escape_string(htmlspecialchars($phone)),
				  $this->dbc->real_escape_string(htmlspecialchars($company)),
				  $this->dbc->real_escape_string(htmlspecialchars($title)),
				  $this->dbc->real_escape_string(htmlspecialchars($day)),
				  $this->dbc->real_escape_string(htmlspecialchars($time)),
				  $this->dbc->real_escape_string(htmlspecialchars($sponsor))
				)
			);
			
			$thanks_text = '<!-- Thank You Header -->
<div id="ThankYouHeaderContainer">
  <div id="ThankYouHeaderInnerContainer">
    <img src="img/thankyou/thankyou.png" alt="Thank You!" />

    <p class="ThanksMessage">Someone from HR Tech Europe or the vendor company will be in touch shortly.</p>
  </div>
</div>
<!-- END Thank You Header -->';
return $thanks_text;
	
}	 

function google_chaptcha($response) {
	require_once "chaptcha/recaptchalib.php";


$secret = "6LdQDgMTAAAAANEl2IhCI2DE4j9LNKl3f4WHCtCj";

// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;

$reCaptcha = new ReCaptcha($secret);

    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $response
    );
	

	

if ($resp != null && $resp->success) {
    return "yay";
} else {
	return "error";
}

}


	 
 }
    
	//Google Chaptcha 
 if(isset($_POST['action']) && $_POST['action'] == 'SponsorChaptchaCheck' && isset($_POST['response']) && isset($_POST['sponsor']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['fname']) && isset($_POST['lname'])){
	$the_main = new main();
	
        $report[0] = $the_main->google_chaptcha($_POST['response']);
	if ($report[0] == "yay"){
	    $report[1] = $the_main->sponsor_booking($_POST['sponsor'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone'], $_POST['company'], $_POST['title'], $_POST['day'], $_POST['time']);  
		echo $report[1];
	} else {
		echo $report[0];
	}
   
    

}//Chaptcha check
	

?>
