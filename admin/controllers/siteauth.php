<?php 

//session id lejárat fél órára :)

class siteauth extends config {
	
function rip_tags($string) { 
    
    // ----- remove HTML TAGs ----- 
    $string = preg_replace ('/<[^>]*>/', ' ', $string); 
    
    // ----- remove control characters ----- 
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
    
    // ----- remove multiple spaces ----- 
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    
    return $string; 

}	

public function login($username, $password) {
	include_once ('controllers/PasswordHash.php');
	   
		$user = str_replace(array("'", "-", ";", "#"), array(" ", " ", " "," "),$username);
		$user_pass = $this->rip_tags($password);
		
		 $correct_pass = $this->dbc->query(
				sprintf("SELECT id, password, email  FROM users WHERE username = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($user)
				)
				   );	
					if (mysqli_num_rows($correct_pass)) {
				        $pass = $correct_pass->fetch_assoc();
						$compare = validate_password($user_pass, $pass['password']);
						if ($compare == 1) {
							if (!isset($_SESSION)){
								session_start();
							}
						   
						   $_SESSION['admin'] = true;
						  $out =  '<p class="LoginResponse"><i class="fa fa-check"></i> Logged in. You will be redirected to the administration page in 3 seconds.</p>';
						  
						   $page = $_SERVER['PHP_SELF'];
                          $sec = "3";
                          header("Refresh:".$sec."; url=".$page);
						   return $out;
						   
						 
						} else {
							$out = '<p class="LoginResponse"><i class="fa fa-times"></i> Incorrect username or password</p>';
							return $out;
						}
				
				} else { //personal num rows if end 
				$out = '<p class="LoginResponse"><i class="fa fa-times"></i> Incorrect username or password</p>';
							return $out;
				}
			
}

public function logout() {
	
	
	session_unset();
	session_destroy();
	
	$page = $_SERVER['PHP_SELF'];
	$sec = "0.1";
	header("Refresh: $sec; url=$page");
	
}



}
?>