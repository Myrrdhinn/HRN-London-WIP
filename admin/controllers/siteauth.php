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
						   
						   setcookie("Moo", $pass['id'], time()+3600*8);
						   
						   $_SESSION['user_id'] = $pass['id'];
						   
						   include_once ('controllers/rank.php');
						   
						  $rank = $this->dbc->query(
								  sprintf("SELECT rank_id FROM users_rank_connection WHERE users_id = '%s' ORDER BY date DESC",
									  $this->dbc->real_escape_string($pass['id'])
								  )
									 );	
									  if (mysqli_num_rows($rank)) {
										  while($uRank = $rank->fetch_assoc()){
											  if ($uRank['rank_id'] == 1) {
												 $_SESSION['developer'] = true; 
											  }
											 $permission = ranking($uRank['rank_id']);
											 
											   if (isset($permission)) {
												   foreach ($permission as $perm) {
													   switch ($perm) {
														  case "super":
															 $_SESSION['super_admin'] = true;
															  break;
														  case "agenda":
															 $_SESSION['agenda_admin'] = true;
															  break;
														  case "sponsors":
														     $_SESSION['sponsors_admin'] = true;
															  break;
														  case "speakers":
															   $_SESSION['speakers_admin'] = true;
															  break;
														  case "mediapartners":
															   $_SESSION['mediapartners_admin'] = true;
															  break;
														  case "blogsquad":
															   $_SESSION['blogsquad_admin'] = true;
															  break;
													  }//switch perm
																											 
												   }//foreach permission
											   }//if isset permission

										  } //uRank fetch assoc end
								     }  //rank num rows if end
									  
						  $out =  '<p class="LoginResponse"><i class="fa fa-check"></i> Logged in. You will be redirected to the administration page in 3 seconds.</p>';
						  
						  //// Options for login
						  
						      //// basic
						   $page = $_SERVER['PHP_SELF'];
						   $sec = "3";
						   
						   $sponsors = array(7,5,8,11);
						   $speakers = array();
						   $mediapartners = array(10);
						   $blogsquad = array(9);
						
					
						   if(in_array($pass['id'],$sponsors) == true) {
							   $page = "http://london.hrtecheurope.com/admin/sponsors";
						   }elseif (in_array($pass['id'],$speakers) == true) {
							   $page = "http://london.hrtecheurope.com/admin/speakers";
						  }elseif (in_array($pass['id'],$mediapartners) == true) {
							   $page = "http://london.hrtecheurope.com/admin/mediapartners";
						  }elseif (in_array($pass['id'],$blogsquad) == true) {
							  $page = "http://london.hrtecheurope.com/admin/blogsquad";
						  }
						   
					
						 /*  
						   if(in_array($pass['id'],$sponsors) == true) {
							   $page = "final_new/admin/sponsors";
						   }elseif (in_array($pass['id'],$speakers) == true) {
							   $page = "final_new/admin/speakers";
						  }elseif (in_array($pass['id'],$mediapartners) == true) {
							   $page = "final_new/admin/mediapartners";
						  }elseif (in_array($pass['id'],$blogsquad) == true) {
							  $page = "final_new/admin/blogsquad";
						  }
						   */
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

	unset($_COOKIE['Moo']);
	setcookie('Moo', '', time()-300);
	
	$page = $_SERVER['PHP_SELF'];
	$sec = "0.1";
	header("Refresh: $sec; url=$page");
	
}



}
?>