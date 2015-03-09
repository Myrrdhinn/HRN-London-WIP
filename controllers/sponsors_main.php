<?php 
		include_once('main.php');
		
class sponsors_main extends config {
	
	function randomize_sponsors($random, $fix) {
		
	if (isset($fix) && $fix != 0){ 
		$i = 0;
		$db = 0;
		$fixed = array_reverse($fix);
		
		 foreach ($random As $value) {
			 $sad = 0;
                 foreach ($fixed As $data) {
					 if ($data == $value[0]) {
						 $temp[$db] = $value;
						$sad = 1; 
						$db++;
					 }
				 }//forach fixed
				 if ($sad == 0) {
					$output[$i] = $value; 
					$i++;
				 }
		 }//foreach random
		
		 shuffle($output);
		 if(isset($temp)){
		   foreach ($temp As $s) {
			   $output[$i] = $s;
			   $i++;
		   }
		 
		 } //if isset temp
		 $output = array_reverse($output);
		} else {//if isset fixed
             $output = $random;
		   shuffle($output);
		}
		
		 return $output;
	}
	
	
	//This is the function what collets all the sponsors to the content multi dimensional array.
	function sponsors() {
		
$i = 0;	
$sponsorType = -1; //this is needed for the type counter
$db = 0;
$alacartearray[0][0] = 0;
$alaid = 0;
$haveala = 0;

                 $sponsorsMain = $this->dbc->query( // We get the sponsor id-s
		                    sprintf("SELECT id FROM sponsors"));	
					              if ($sponsorsMain->num_rows > 0) {
					                while($ids = $sponsorsMain->fetch_assoc()){
								    	$ok = 0;
									
									  $sponsorsStatus = $this->dbc->query( // We get the sponsor id-s
		                                 sprintf("SELECT status_id FROM sponsors_status WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
										 $this->dbc->real_escape_string($ids['id'])
										  )
										    );	
					                         if ($sponsorsStatus->num_rows > 0) {
					                           while($sStat = $sponsorsStatus->fetch_assoc()){
											    if ($sStat['status_id'] == 1) {
											      $ok = 1;
											     }//if active
											   }//while fetch sStat
											  } // if sponsorStatus
									 
									
									 if ($ok == 1){
										 $filtered[$db][0] = $ids['id'];

									 //Get the sponsors data				   
									    $personal = $this->dbc->query(
											  sprintf("SELECT sponsors_bio, sponsors_url, sponsors_tag, sponsors_rank FROM sponsors_data WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
												  $this->dbc->real_escape_string($ids['id'])
											  )
												 );	
												  if (mysqli_num_rows($personal)) {
												  while($personals = $personal->fetch_assoc()){
													  
													// $b = str_replace(array("'szuunet'"), array("<br />"), $personals['sponsors_bio']);
													  //We need this to display <br /> -s.. cause we used htmlspecial chars aaand sprintf in
													// the upload :D Can't be safe enough :P
													 
													 //$bio = nl2br($b);
													 $bio = htmlspecialchars_decode($personals['sponsors_bio']);
													 
													  $filtered[$db][1] = $personals['sponsors_url'];
													  $filtered[$db][2] = $personals['sponsors_rank'];
													  $filtered[$db][3] = $bio;
													  $filtered[$db][4] = $personals['sponsors_tag'];
													  
												  } //personal fetch assoc end
											  }  //personal num rows if end	
											  
											  				  $filtered[$db][5] = '';
															  $filtered[$db][6] = '';
															  $haveit = ''; //this will contain what links we already displayed
											 		  
											  //Get links		
											   $links = $this->dbc->query(
													  sprintf("SELECT slt.type, sl.link_url FROM sponsors_links as sl, speakers_link_types as slt WHERE sl.sponsors_id = '%s' AND sl.speakers_link_types_id=slt.id ORDER BY sl.date DESC",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														 ///Sooo.. this is the link section
														  if (mysqli_num_rows($links)) {
														  //we define the content 5 and 6 so we can append to them later

															  
															  //we fetch the links from the database
														  while($slinks = $links->fetch_assoc()){
															  $nope = 0; //we need this to decide if we want to add the new to the content variable or not
															  if (isset($haveit) && $haveit != '') { //we check if there's a link or not displayed
																  $isItYes = explode(';',$haveit); //we explode it to get all the displayed links in an array
																  foreach ($isItYes As $yes) { //we go through it
																	  if ($yes == $slinks['type']) { //if the link type from the database is the same as we displayed before...
																		  $nope = 1;  //nope
																	  }
																  }
																  if ($nope == 0) {  // if we don't have this link already displayed, we add it to the content
																	 $filtered[$db][5] .= $slinks['type'].';';
																	 $filtered[$db][6] .= $slinks['link_url'].';';
																	 $haveit .= $slinks['type'].';'; //we also add it to the "displayed" list
																  }
																  
															  } else {  //if there's no list yet :D
																 $filtered[$db][5] .= $slinks['type'].';';
																 $filtered[$db][6] .= $slinks['link_url'].';';
																 $haveit .= $slinks['type'].';';
															  }
									  
														  }
													  }                  
									  
													  
									  
														  //Get image data
											   $pictures = $this->dbc->query(
													  sprintf("SELECT image_url FROM sponsors_image WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														  if (mysqli_num_rows($pictures)) {
														  while($pic = $pictures->fetch_assoc()){
															  //$content[$i][10] = $pic['image_name'];
															  $filtered[$db][7] = $pic['image_url'];
														  
															  
														  }
													  } 
													  
													  											//Get the names					   
										   $name = $this->dbc->query(
													  sprintf("SELECT id, name FROM sponsors_name WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														  if (mysqli_num_rows($name)) {
														  while($sName = $name->fetch_assoc()){
															    $filtered[$db][8] = $sName['name'];
															    $filtered[$db][9] = $sName['id'];
														  } //personal fetch assoc end
													  }  //personal num rows if end
													  
													  
												 $alacarte = $this->dbc->query(
													  sprintf("SELECT alacarte FROM sponsors_data_alacarte WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														  if (mysqli_num_rows($alacarte)) {
														  while($sAlac = $alacarte->fetch_assoc()){
															    $filtered[$db][10] = $sAlac['alacarte'];
														  } //personal fetch assoc end
													  } else {  //personal num rows if end	
													  		   $filtered[$db][10] = 0;
													  }

										
										$db++;
										} //if ok == 1
									} //while ids fetch
								  } //if sponsorsmain numrows

 if(isset($filtered)) {
	//$fixed = [20, 13];
	$fixed[0] = 29;
	$filtered = $this->randomize_sponsors($filtered, $fixed);
 }
$main = new main();
		
		//We get all the sponsor types (like platinum)
		$s_types = $this->dbc->query(
			sprintf("SELECT id, name FROM sponsors_type ORDER BY id"));	
					if ($s_types->num_rows > 0) {
					   while($sponsor_type = $s_types->fetch_assoc()){ //while we fetch the results..
					     if (isset($filtered)) {
					        foreach ($filtered As $data) {
								   if($sponsor_type['id'] == $data[2]){

									    $content[$i][0] = $data[0];  //sponsors_id
										$content[$i][1] = $data[1];  //sponsors_url
										$content[$i][2] = $data[2];  //sponsors_type_id (platinum, gold etc)
										$content[$i][3] = $data[3];  //sponsors_bio
										$content[$i][4] = $data[4];  //sponsors_tag
										$content[$i][5] = $data[5];  //sponsors_link_types
										$content[$i][6] = $data[6];  //sponsors_link_urls
										$content[$i][7] = $data[7];  //sponsors_picture
										$content[$i][8] = $data[8];  //sponsors_name
										$content[$i][9] = $data[9];  //sponsors_name_id
										$content[$i][10] = $sponsor_type['name']; //sponsor_type_name
										$content[$i][11] = $main->ekezet_nelkuli($content[$i][8]).'_'.$content[$i][0]; //sponsors_id (HTML id tag)
										$content[$i][12] = '';
										$content[$i][13] = $data[10];
										
										
										
										//--------------------------------
											 if($data[10] == 1){ //If the current sponsor is also an a la carte one
									            $haveala = 1;
									           $alacartemain = $this->dbc->query(
												 sprintf("SELECT sponsors_ala_carte_id FROM sponsors_ala_carte_connection WHERE sponsors_id = '%s' ORDER BY date DESC",
													$this->dbc->real_escape_string($content[$i][0])
												)
												   );	
													if (mysqli_num_rows($alacartemain)) {
													 while($alac = $alacartemain->fetch_assoc()){
															$alacarte = $this->dbc->query(
															  sprintf("SELECT text FROM sponsors_ala_carte WHERE id = '%s' ORDER BY date DESC LIMIT 0,1",
																  $this->dbc->real_escape_string($alac['sponsors_ala_carte_id'])
															  )
																 );	
																  if (mysqli_num_rows($alacarte)) {
																   while($carte = $alacarte->fetch_assoc()){
																	  
																	  
																	  $alacartearray[$alaid][0] = $data[0];  //sponsors_id
																	  $alacartearray[$alaid][1] = $data[1];  //sponsors_url
																	  $alacartearray[$alaid][2] = 10;  //sponsors_type_id (platinum, gold etc)
																	  $alacartearray[$alaid][3] = $data[3];  //sponsors_bio
																	  $alacartearray[$alaid][4] = $data[4];  //sponsors_tag
																	  $alacartearray[$alaid][5] = $data[5];  //sponsors_link_types
																	  $alacartearray[$alaid][6] = $data[6];  //sponsors_link_urls
																	  $alacartearray[$alaid][7] = $data[7];  //sponsors_picture
																	  $alacartearray[$alaid][8] = $data[8];  //sponsors_name
																	  $alacartearray[$alaid][9] = $data[9];  //sponsors_name_id
																	  $alacartearray[$alaid][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
																	  $alacartearray[$alaid][11] = $main->ekezet_nelkuli($content[$i][8]).'_'.$content[$i][0]; //sponsors_id (HTML id tag)
																	  $alacartearray[$alaid][12] = $carte['text'];
																	  $alacartearray[$alaid][13] = $data[10];
																	  $alacartearray[$alaid][14] = $alac['sponsors_ala_carte_id'];
									  								    $alaid++;	
																	}//while carte
																  } else { //if mysl_num_rows alacarte
 																	   $content[$i][12] = '';
																  }
																  
													  

													  } //while alac
													} //if alacartemain

								   } //if data[10] == 1 (if a la carte sponsor)
										
										//---------------------------------------
										
										
										
									   $i++;
								   } //if sponsor_type
														
							     }//foreach filtered
					   
						 } //if isset filtered
						
					   } // while fetch assoc sponsor_type
					} // if s_types end
					

	
						        foreach ($filtered As $data) {
								   if(0 == $data[2]){

											 if($data[10] == 1){ //If the current sponsor is also an a la carte one
									            $haveala = 1;
									           $alacartemain = $this->dbc->query(
												 sprintf("SELECT sponsors_ala_carte_id FROM sponsors_ala_carte_connection WHERE sponsors_id = '%s' ORDER BY date DESC",
													$this->dbc->real_escape_string($data[0])
												)
												   );	
													if (mysqli_num_rows($alacartemain)) {
													 while($alac = $alacartemain->fetch_assoc()){
															$alacarte = $this->dbc->query(
															  sprintf("SELECT text FROM sponsors_ala_carte WHERE id = '%s' ORDER BY date DESC LIMIT 0,1",
																  $this->dbc->real_escape_string($alac['sponsors_ala_carte_id'])
															  )
																 );	
																  if (mysqli_num_rows($alacarte)) {
																   while($carte = $alacarte->fetch_assoc()){
																	  
																	  
																	  $alacartearray[$alaid][0] = $data[0];  //sponsors_id
																	  $alacartearray[$alaid][1] = $data[1];  //sponsors_url
																	  $alacartearray[$alaid][2] = 10;  //sponsors_type_id (platinum, gold etc)
																	  $alacartearray[$alaid][3] = $data[3];  //sponsors_bio
																	  $alacartearray[$alaid][4] = $data[4];  //sponsors_tag
																	  $alacartearray[$alaid][5] = $data[5];  //sponsors_link_types
																	  $alacartearray[$alaid][6] = $data[6];  //sponsors_link_urls
																	  $alacartearray[$alaid][7] = $data[7];  //sponsors_picture
																	  $alacartearray[$alaid][8] = $data[8];  //sponsors_name
																	  $alacartearray[$alaid][9] = $data[9];  //sponsors_name_id
																	  $alacartearray[$alaid][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
																	  $alacartearray[$alaid][11] = $main->ekezet_nelkuli($data[8]).'_'.$data[8]; //sponsors_id (HTML id tag)
																	  $alacartearray[$alaid][12] = $carte['text'];
																	  $alacartearray[$alaid][13] = $data[10];
																	  $alacartearray[$alaid][14] = $alac['sponsors_ala_carte_id'];
									  								    $alaid++;	
																	}//while carte
																  } else { //if mysl_num_rows alacarte
 																	   $content[$i][12] = '';
																  }
																  
													  

													  } //while alac
													} //if alacartemain

								   } //if data[10] == 1 (if a la carte sponsor)
										
										//---------------------------------------
										
										
									   $i++;
								   } //if sponsor_type
														
							     }//foreach filtered
								 
					
	//----------	
		

			
					if (isset($alacartearray) && $haveala == 1){
						//A La Carte Sponsors	
				      shuffle($alacartearray);
				  
					  foreach ($alacartearray As $data) {
										   
											$content[$i][0] = $data[0];  //sponsors_id
											$content[$i][1] = $data[1];  //sponsors_url
											$content[$i][2] = 999;  //sponsors_type_id (platinum, gold etc)
											$content[$i][3] = $data[3];  //sponsors_bio
											$content[$i][4] = $data[4];  //sponsors_tag
											$content[$i][5] = $data[5];  //sponsors_link_types
											$content[$i][6] = $data[6];  //sponsors_link_urls
											$content[$i][7] = $data[7];  //sponsors_picture
											$content[$i][8] = $data[8];  //sponsors_name
											$content[$i][9] = $data[9];  //sponsors_name_id
											$content[$i][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
											$content[$i][11] = $main->ekezet_nelkuli($content[$i][8]).'_'.$content[$i][0]; //sponsors_id (HTML id tag)
											$content[$i][12] = $data[12];
											$content[$i][13] = $data[13];
											$content[$i][14] = $data[14]; // alacarte connection id
										   $i++;
									
															
									 }//foreach alacarteArray
					} else {
						$content[$i][0] = -55;
						$content[$i][2] = 999;
						$content[$i][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
					}
				
			
				
				
			
			if (isset($content)) {
				return $content;
			}
			
	}
	
	public function sponsor_types($id) {
			$content = '';
	//Gets all of the sponsor types
	$types = $this->dbc->query(
					sprintf("SELECT id, name FROM sponsors_type"));	
					if ($types->num_rows > 0) {
					while($data = $types->fetch_assoc()){
						if ($data['id'] == $id){
							$content .= '<option selected="selected" value="'.$data['id'].'">'.$data['name'].'</option>';
						}else {
						$content .= '<option value="'.$data['id'].'">'.$data['name'].'</option>';	
						}
						
					}
				}
			$content .= '<option value="0">Only A La Carte</option>';
	return $content;	
	
}

function sponsors_list(){
			$content = '';
	//Gets all of the locations
	$sponsors = $this->dbc->query(
					sprintf("SELECT id FROM sponsors"));	
					if ($sponsors->num_rows > 0) {
					while($data = $sponsors->fetch_assoc()){
						
					  $name = $this->dbc->query(
							sprintf("SELECT id, name FROM sponsors_name WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
								$this->dbc->real_escape_string($data['id'])
							)
							   );	
								if (mysqli_num_rows($name)) {
								while($sName = $name->fetch_assoc()){
									$content .= '<option value="'.$data['id'].'">'.$sName['name'].'</option>';
								} //personal fetch assoc end
							}  //personal num rows if end
						
						
					}
				}
	return $content;
 }
 
 
 
   function sanitize($data){
       //$data = htmlentities(strip_tags(trim($data)));
		
		$bad = array("content-type","bcc:","to:","cc:","href","$","SELECT","<",">",";","INSERT INTO","UPDATE","DELETE");
		
		$data = str_replace($bad,"",$data);
		
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
                   '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
                   '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                   '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
    ); 
    $data = preg_replace($search, '', $data); 
        return $data;
    }
 
 
function send_book_sponsor_mail() {
	
	    if(!isset($_POST['fname']) ||
 
        !isset($_POST['lname']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone']) ||
 
        !isset($_POST['company'])) {
			

 
    } else {
	 
     //it's working! :) Just character encoding is not good :(
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
   $email_to = "balazs.pentek@hrneurope.com";
 
    $email_subject = "Book a Sponsor Form submit";
 

 
    $first_name = utf8_decode($_POST['fname']); // required
 
    $last_name = utf8_decode($_POST['lname']); // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['phone']; // not required
 
    //$comments = utf8_decode($_POST['message']); // required
	
	$day = $_POST['day'];
	
	$time = $_POST['time'];
	
	$sponsor = $_POST['sponsor'];
	
	$company = utf8_decode($_POST['company']); // required
 

    $email_message = "Form details below.\n\n";
 
 

 
     
 
    $email_message .= "First Name: ".$this->sanitize($first_name)."\n";
 
    $email_message .= "Last Name: ".$this->sanitize($last_name)."\n";
 
    $email_message .= "Email: ".$this->sanitize($email_from)."\n";
 
    $email_message .= "Telephone: ".$this->sanitize($telephone)."\n";
 
   // $email_message .= "Comments: ".$this->sanitize($comments)."\n";
	
   $email_message .= "Company: ".$this->sanitize($company)."\n";
   
   $email_message .= "Day: ".$this->sanitize($day)."\n";
   
   $email_message .= "Time: ".$this->sanitize($time)."\n";
   
   $email_message .= "Sponsor name: ".$this->sanitize($sponsor)."\n";
 
     
 
     


		// create email headers
 
$headers = 
 
'X-Mailer: PHP/' . phpversion();
 
mail($email_to, $email_subject, $email_message, $headers);


$thanks_text = '<!-- Thank You Header -->
<div id="ThankYouHeaderContainer">
  <div id="ThankYouHeaderInnerContainer">
    <img src="img/thankyou/thankyou.png" alt="Thank You!" />

    <p class="ThanksMessage">Someone from HR Tech Europe or the vendor company will be in touch shortly.</p>
  </div>
</div>
<!-- END Thank You Header -->';
echo $thanks_text;

	}


	
}
 
 
function sponsors_time_list() {
  $day = "10/14/2011";
  
 $output = '';
$startTime = date(strtotime($day." 7:00"));
$endTime = date(strtotime($day." 18:00"));

$timeDiff = round(($endTime - $startTime)/60/60);

$startHour = date("G", $startTime);
$endHour = $startHour + $timeDiff; 
$AmPm = "AM";

for ($i=$startHour; $i <= $endHour; $i++)
{
     for ($j = 0; $j <= 55; $j+=5)
        {
			
                $time = $i.":".str_pad($j, 2, '0', STR_PAD_LEFT);
				
				if (date(strtotime($day." ".$time)) <= $endTime) {
					
					$temp = date("g", strtotime($day." ".$time));
					
					if ($temp == '12') {
						$AmPm = "PM";
					}
					
					$output .='<option value="'.date("g:i", strtotime($day." ".$time)).$AmPm.'">'.date("g:i", strtotime($day." ".$time)).$AmPm.'</option>';
					
				  }

                
        }
}
   return $output;	
} 
 
function modal_display($tag) {
	
	/*
	----------------
	GET THE DATA
	---------------
	*/
	$sId = -1;
	
	$sp_id = $this->dbc->query(
			sprintf("SELECT sponsors_id FROM sponsors_data WHERE sponsors_tag = '%s' ORDER BY date DESC",
			$this->dbc->real_escape_string($tag)
				)
				   );	
					if (mysqli_num_rows($sp_id)) {
					while($sponsors_id = $sp_id->fetch_assoc()){
						
							$stat = $this->dbc->query(
								  sprintf("SELECT status_id FROM sponsors_status WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($sponsors_id['sponsors_id'])
								  )
									 );	
									  if (mysqli_num_rows($stat)) {
									  while($sStatus = $stat->fetch_assoc()){
										  if ($sStatus['status_id'] == 1 || $sStatus['status_id'] == 2){
											  $sId = $sponsors_id['sponsors_id'];
										  }
									  } //personal fetch assoc end
								  }  //personal num rows if end
						
						if ($sId > -1) {
							break;
						}

					} //personal fetch assoc end
				}  //personal num rows if end
	
	
	
	
	
	$i = 0;	
		
		

						
		if ($sId > -1) {	
				   
		$content[$i][0] = $sId;
	//Get the names					   
	 $name = $this->dbc->query(
				sprintf("SELECT id, name FROM sponsors_name WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($sId)
				)
				   );	
					if (mysqli_num_rows($name)) {
					while($sName = $name->fetch_assoc()){
						$content[$i][8] = $sName['name'];
						$content[$i][9] = $sName['id'];
					} //personal fetch assoc end
				}  //personal num rows if end
						   
		//Get the personal data				   
		 $personal = $this->dbc->query(
				sprintf("SELECT sponsors_bio, sponsors_url, sponsors_tag, sponsors_rank FROM sponsors_data WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($sId)
				)
				   );	
					if (mysqli_num_rows($personal)) {
					while($personals = $personal->fetch_assoc()){
						
					   //$b = str_replace(array("'szuunet'"), array("<br />"), $personals['bio']);
					   //$bi = str_replace(array("'szuunet'"), array("<br />"), $personals['bio_important']); //We need this to display <br /> -s.. cause we used htmlspecial chars aaand sprintf in
					                                                                                         // the upload :D Can't be safe enough :P
					   
					   $bio = htmlspecialchars_decode($personals['sponsors_bio']);
					   
						$content[$i][1] = $personals['sponsors_url'];
						$content[$i][2] = $personals['sponsors_rank'];
						$content[$i][3] = $bio;
						$content[$i][4] = $personals['sponsors_tag'];
						
					} //personal fetch assoc end
				}  //personal num rows if end
				
															  $content[$i][5] = '';
															  $content[$i][6] = '';
															  $haveit = ''; //this will contain what links we already displayed
				
								  //Get links		
											   $links = $this->dbc->query(
													  sprintf("SELECT slt.type, sl.link_url FROM sponsors_links as sl, speakers_link_types as slt WHERE sl.sponsors_id = '%s' AND sl.speakers_link_types_id=slt.id ORDER BY sl.date DESC",
														  $this->dbc->real_escape_string($sId)
													  )
														 );	
														 ///Sooo.. this is the link section
														  if (mysqli_num_rows($links)) {
														  //we define the content 5 and 6 so we can append to them later

															  
															  //we fetch the links from the database
														  while($slinks = $links->fetch_assoc()){
															  $nope = 0; //we need this to decide if we want to add the new to the content variable or not
															  if (isset($haveit) && $haveit != '') { //we check if there's a link or not displayed
																  $isItYes = explode(';',$haveit); //we explode it to get all the displayed links in an array
																  foreach ($isItYes As $yes) { //we go through it
																	  if ($yes == $slinks['type']) { //if the link type from the database is the same as we displayed before...
																		  $nope = 1;  //nope
																	  }
																  }
																  if ($nope == 0) {  // if we don't have this link already displayed, we add it to the content
																	 $content[$i][5] .= $slinks['type'].';';
																	 $content[$i][6] .= $slinks['link_url'].';';
																	 $haveit .= $slinks['type'].';'; //we also add it to the "displayed" list
																  }
																  
															  } else {  //if there's no list yet :D
																 $content[$i][5] .= $slinks['type'].';';
																 $content[$i][6] .= $slinks['link_url'].';';
																 $haveit .= $slinks['type'].';';
															  }
									  
														  }
													  }                  
									  
													  
									  
														  //Get image data
											   $pictures = $this->dbc->query(
													  sprintf("SELECT image_url FROM sponsors_image WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
														  $this->dbc->real_escape_string($sId)
													  )
														 );	
														  if (mysqli_num_rows($pictures)) {
														  while($pic = $pictures->fetch_assoc()){
															  //$content[$i][10] = $pic['image_name'];
															  $content[$i][7] = $pic['image_url'];
														  
															  
														  }
													  } 
													               

				
								                
						$i++;
					} //if status = 1

			
	
	
	
  /*
  --------------
  DISPLAY THE DATA
  ---------------
  */

if (isset($content)) {
   foreach ($content as $sponsor) {
			 $go = 1;
			 
			 if (isset($sponsor[6])){ //we break down the links to an array
				  $links = explode(';',$sponsor[6]);
			      $link_types = explode(';',$sponsor[5]);
			 }
			 
			 
			 $num = 0;
			  foreach ($sponsor As $set) {
			      if (!isset($set)){
				        $sponsor[$num] = '';
			        }	
				  $num++;		
			   }
			   
				
				

			 			 		  /*
		  							    $content[$i][0] =  sponsors_id
										$content[$i][1] =  sponsors_url
										$content[$i][2] =  sponsors_type_id (platinum, gold etc)
										$content[$i][3] =  sponsors_bio
										$content[$i][4] =  sponsors_tag
										$content[$i][5] =  sponsors_link_types
										$content[$i][6] =  sponsors_link_urls
										$content[$i][7] =  sponsors_picture
										$content[$i][8] =  sponsors_name
										$content[$i][9] =  sponsors_name_id
										$content[$i][10] = sponsor_type_name
										$content[$i][11] = //sponsors_id (HTML id tag)
										$content[$i][12] = AlaCarte sponsor text
										$content[$i][13] = Alacarte or not? :D
										$content[$i][14] = // alacarte connection id
			 
			 */ 			

 /*------------------------
  Normal user
 -------------------------
 */
					$output = '<!-- '.$sponsor[8].' Modal -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/sponsors/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($sponsor[7])) {
		  $output .= '<div class="ModalSponsorPhoto" style="background-image:url(img/sponsors/'.$sponsor[7].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
	  
	       $output .= '<div class="ModalOriginalContent">';
			  $sponsor_tag = "";
			  $sa = preg_replace('/[^A-Za-z]/', '', $sponsor[8]); // Removes special chars.
			  $sponsor_tag_array = explode(" ",$sa);
			  foreach ($sponsor_tag_array as $comp) {
				  $sponsor_tag .= ucfirst($comp); 
			  }
						
	  			
  			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'SponsorCompanySite', 'ExternalForward', '".$sponsor_tag."']);";
			$google .= '"';
        
       $output .='<div class="ModalSponsorBioContainer">
	   <form class="SponsorModalEdit">
	      
          <p id="'.$sponsor[4].'_Name" style="display:none" class="ModalSponsorName">'.$sponsor[8].'</p>
		

		  <a '.$google.' id="'.$sponsor[4].'_CompanyLink" class="ModalSponsorCompanyLink" target="_blank" href="'.$sponsor[1].'">Visit Company Website <i class="fa fa-angle-double-right"></i></a>
		
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				   if ($links[$s] != ''){
				
			$comp_social = ucfirst($types).'-'.$sponsor_tag;	   
			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'SponsorSocialSite', 'ExternalForward', '".$comp_social."']);";
			$google .= '"';
					   
					   $url_raw = $this->social_link_decode($links[$s]); //this is needed to decode the link from the database
					   
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					$output .='<p id="'.$sponsor[4].'_'.$types.'" class="SocialIcons"><a '.$google.' href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
				   }
					   $s++;
			         }
				}
				unset($link_types);
				unset($links);
		  }	   
		
          $output .='<div id="'.$sponsor[4].'_Bio" class="ModalSponsorBio RobotoText"> '.$sponsor[3].'</div>';
		   $output .= '<div class="GetFormButton" onClick="ShowForm()">Arrange a Meeting</div>';

  $output .='</form>
        </div>

		
		</div>';
	 $output .="	
		<!-- Google Captcha -->
<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>";

		$output .='<!--Sponsors form-->
		<div style="display:none" class="SponsorsFormContainer">
		
      <div id="SponsorsFormInnerContainer"> <a id="book-the-sponsor"></a>
	  <p class="ModalFormText">If you are attending HR Tech Europe, you can schedule an appointment with this vendor at the expo by leaving your details below.</p>
	  <p id="MissingText" style="display:none"></p>
        <!-- BEGINNING of : Book the Sponsor FORM -->
        <form action="" method="POST">
          <div class="row">
            <div class="large-6 columns SponsorFormColumn">
              <input class="SponsorFormInputClass" required="required" placeholder="First Name"  id="first_name" maxlength="40" name="first_name" size="20" type="text" />
              <input class="SponsorFormInputClass" required placeholder="Last Name" id="last_name" maxlength="80" name="last_name" size="20" type="text" />
              <input class="SponsorFormInputClass" required placeholder="Email Address"  id="email" maxlength="80" name="email" size="20" type="text" />
              <select style="display:none;"   id="lead_source" name="lead_source" placeholder="Lead Source">
                <option selected="selected" value="HRTechLondon2015-BookTheSponsor">HRTechLondon2015-BookTheSponsor</option>
              </select>
            </div>
            <div class="large-6 columns SponsorFormColumn">
              <input class="SponsorFormInputClass" required placeholder="Phone Number"  id="phone" maxlength="40" name="phone" size="20" type="text" />
              <input class="SponsorFormInputClass" required placeholder="Company Site"  id="company" maxlength="40" name="company" size="20" type="text" />
              <input class="SponsorFormInputClass" required placeholder="Job Title" id="title" maxlength="40" name="title" size="20" type="text" />
			  <input style="display:none"  id="sponsor_name" maxlength="40" name="sponsor_name" size="20" type="text" value="'.$sponsor[8].'" />
			  
			  
            </div>
          </div>
		  			<div id="SponsorFormTimeContainer"><label class="SponsorFormLabel">Preferred day and time:
					<select id="SponsorDaySelect">
					  <option value="1">Day 1</option>
					  <option value="2">Day 2</option>
					</select>
					 <select id="SponsorTimeSelect" name="SponsorTimeselect">';
			$output .= $this->sponsors_time_list();
			$output .='</select></label>
			 </div>
          <div class="row">
		  <div id="ChaptchaDiv" class="g-recaptcha" data-sitekey="6LdQDgMTAAAAAAf_SEWUQpEvpbcSV3o98_Kvo2S5"></div>
            <div class="large-12 column">
              <div class="SponsorFormSubmitButton" onClick="SponsorFormSubmit(this); _gaq.push([';
			  $output .= "'_trackEvent', 'sponsors', 'FormSubmission', 'InquirySent']);";
			  $output .='">Submit</div>
            </div>
          </div>
        </form>
        <!-- END of : Book the Sponsor FORM --->
      </div>
		</div>
		<!--Sponsors form end-->
      </div>
    </div>
  </div>
<!-- end '.$sponsor[0].' Modal --> ';			
						


		echo $output; 
		 
	}//foreach content ends
		} //if isset content ends

}
	
}

//Get the tag of the sponsor to display it in a modal
 if(isset($_POST['action']) && $_POST['action'] == 'BookSponsorForm' && isset($_POST['email'])){
	$the_main = new sponsors_main();
    $the_main->send_book_sponsor_mail();
}// modal display end


//Get the tag of the sponsor to display it in a modal
 if(isset($_POST['action']) && $_POST['action'] == 'modal_display' && isset($_POST['sTag'])){
	$the_main = new sponsors_main();
    $the_main->modal_display($_POST['sTag']);
}// modal display end
?>	