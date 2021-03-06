<?php 

class agenda_main extends config {
	
	function no_ekezet($fajlnev) {
	    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'E'=>'e', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f','amp;'=>'and', '"'=>' ', "'"=>' ', 'quot'=>' ', "?"=>'');
    $fajlnev = strtolower(strtr($fajlnev, $specialis_karekterek));
    $fajlnev = preg_replace("/[^a-z0-9-_\.]/i", '-', trim($fajlnev));
      if (substr($fajlnev, -1) == '-') {
		  $fajlnev = substr($fajlnev, 0, strlen($fajlnev)-1);
	  }
	 $double_check =  array("----" => "-", "---" => "-", "--" => "-");
	 
	  $fajlnev = strtr($fajlnev, $double_check);
	  $fajlnev = strtr($fajlnev, $double_check);
	    if ($fajlnev[0] == '-') {
		  $fajlnev = substr($fajlnev, 1);
	   } 

    return $fajlnev;
	
}


	function agenda($day, $location) {
		$i = 0;
		$check[0] = -1;
		$output = '';


//Get the Moderator

			  //Check if the session is already exists
			  $GetModeratorId = $this->dbc->query(
				sprintf("SELECT agenda_event_id FROM agenda_event_moderator WHERE agenda_event_day = '%s' AND agenda_location_id = '%s' ORDER BY date DESC LIMIT 0,1",
							$this->dbc->real_escape_string(htmlspecialchars($day)),
							$this->dbc->real_escape_string(htmlspecialchars($location))
				)
				   );	
					if (mysqli_num_rows($GetModeratorId)) {
						//if we find an existing session
					   while($moderatorId = $GetModeratorId->fetch_assoc()){
						   
						   	
						$agendas[0] = $moderatorId['agenda_event_id'];
						$aId['id'] = $moderatorId['agenda_event_id'];
									//Get the agenda data
												   
					//get speakers
					$speakers = $this->session_speaker($agendas[0]);  	  
								  
				//Agenda title						  
						$agendatitle = $this->dbc->query(
								  sprintf("SELECT agenda_name FROM agenda_event_title WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendatitle)) {
									  while($title = $agendatitle->fetch_assoc()){
										  $agendas[6] = $title['agenda_name'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  
										//Agenda title						  
						$agendatag = $this->dbc->query(
								  sprintf("SELECT agenda_tag FROM agenda_event_tag WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendatag)) {
									  while($tag = $agendatag->fetch_assoc()){
										  $agendas[9] = $tag['agenda_tag'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  				  
										  
										  
					$agendaicon = $this->dbc->query(
								  sprintf("SELECT aei.icon_type FROM agenda_event_icons as aei, agenda_event_icon_connection as aeic WHERE aeic.agenda_event_id = '%s' AND aeic.agenda_event_icon_id=aei.id ORDER BY aeic.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendaicon)) {
									  while($Icons = $agendaicon->fetch_assoc()){
										  $agendas[8] = $Icons['icon_type'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  										  	   

					   } //personal fetch assoc end
					   
				   }
				   
				

if (isset($agendas)) {
	$class = '';
	switch ($location) {
    case 1:
	   if ($day == 1){
		   $class = 'MainStageOneMod';
	   } else {
		   $class = 'MainStageTwoMod';
	   }
        
        break;
    case 2:
        $class = 'HRShareMod'; 
        break;
    case 3:
       $class = 'FutureOfWorkMod';
        break;
    case 4:
       $class = 'HRTechMod';
        break;
    case 5:
       $class = 'CompensationMod';
        break;
    case 6:
       $class = 'CloudTechMod';
        break;
    case 7:
       $class = 'HRAnalyticsMod';
        break;
    case 8:
       $class = 'TalentAndRecruitmentMod';
        break;
    case 9:
       $class = 'SocialCollaborationMod';
        break;
    case 10:
       $class = 'LabsMod';
        break;
    case 11:
       $class = 'Labs2Mod';
        break;
    case 12:
       $class = 'UserAdoptionMod';
        break;
    case 13:
       $class = 'ProductDemoMod';
        break;
}
	
	$speaker[0] = '';
	if (isset($speakers[0][0])) {
				foreach ($speakers As $spk) {
					$speaker[0] = $spk[4];
		     }
				
		}
	
		$long = '';
		$name = $this->no_ekezet($agendas[6]);
		
		if (strlen($agendas[6]) > 77) {
			$long = ' LongSessionTitle';
		}
		
		$google = 'onClick="_gaq.push([';
						$google .= "'_trackEvent', 'AgendaSpeakers', 'InternalForward', '".$speaker[0]."']);";
						$google .= '"';
		
		 $extraclass = '';  
		 $icon = '<i class="agenda-icon fa fa-user"></i>';
		 $link = '';
		 $break = '<div class="SessionTitle'.$long.'">'.$agendas[6].'</div>'.$icon;
	
   $output .='<!-- '.$agendas[6].' -->
	   <div class="Session '.$class.'">'.$link.' 
		<div class="SessionHeader'.$extraclass.' SpeakerModalOpen" '.$google.' data-speakertag="'.$speaker[0].'">
			<div class="SessionTime"></div>';

			 $output .= $break;
			 $output .='</div>';
		$output .=' 
		</div>
	<!--END '.$agendas[6].' --> ';

}
	


/*
1 - Main Stage

2 - HR Shared Services & Payroll

3 - Future of Workforce Learning

4 - HR Technology

5 - Compensation & Benefits

6 - Cloud Technology

7 - HR Analytics & Reporting

8 - Talent & Recruitment Technology

9 - Social Collaboration

10 - Labs & Executive Briefings

11 - Round Table

12 - User Adoption

13 - Product Demo
*/
		
		
	 $agenda_locations_d1 = array('1'=>'Main Stage', '2'=>'Room 1', '3'=>'Room 2+3', '4'=>'Room 14', '8'=>'Room 15+16', '9'=>'Room 17', '10'=>'Room 6', '11'=>'Room 5', '5'=>'Room 1', "6"=>'Room 2+3', '7'=>'Room 14', '12'=>'Room 13', '13'=>'Room 4');
	 $agenda_locations_d2 = array('1'=>'Main Stage', '2'=>'Room 1', '3'=>'Room 2+3', '4'=>'Room 14', '8'=>'Room 15+16', '9'=>'Room 17', '10'=>'Room 6', '11'=>'Room 13', '5'=>'Room 1', "6"=>'Room 2+3', '7'=>'Room 14');
				
				//Get the names					   
	 $agendaId = $this->dbc->query(
				sprintf("SELECT ae.id, aed.time_start FROM agenda_event as ae, agenda_event_connection as aec, agenda_event_data as aed WHERE aed.day = '%s' AND aed.location_id= '%s' AND aed.id=aec.agenda_event_data_id AND ae.id=aec.agenda_event_id ORDER BY STR_TO_DATE(aed.time_start, '%%h:%%i%%p') ASC",
				    $this->dbc->real_escape_string($day),
					$this->dbc->real_escape_string($location)
				)
				   );	
					if (mysqli_num_rows($agendaId)) {
					while($aId = $agendaId->fetch_assoc()){
							$nope = 1;
										//Agenda title						  
						$agendaStatus = $this->dbc->query(
								  sprintf("SELECT status_id FROM agenda_event_status WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendaStatus)) {
									  while($status = $agendaStatus->fetch_assoc()){
										   if ($status['status_id'] == 1) {
											   $nope = 0;
										   }
										  
									  } //$agendaStatus while end
								  }  //$agendaStatus  numrows end
								  
								  
								  						
					    
							//We need to run a foreach on the check array to check if we already displayed the current agenda or not
							//this is because we store multiple versions of the agenda (because of editable data)
					    foreach ($check As $c) {
								if ($c == $aId['id']){
									$nope = 1;
								}
									}
					
					
						if ($nope == 0) { //if we haven't displayed it yet
						
						
							$check[$i] = $aId['id']; //add the agenda to the check array
						$content[$i][0] = $aId['id'];
									//Get the agenda data
												   
						   $agendaData = $this->dbc->query(
								  sprintf("SELECT aed.time_start, aed.time_end, aed.day, aed.abstract, ael.id, aed.highlighted FROM agenda_event_data as aed, agenda_event_location as ael, agenda_event_connection as aec WHERE aec.agenda_event_id = '%s' AND aec.agenda_event_data_id=aed.id AND ael.id=aed.location_id ORDER BY aec.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendaData)) {
									  while($data = $agendaData->fetch_assoc()){
										 
										 $abstract = htmlspecialchars_decode($data['abstract']);
										  
										  $content[$i][1] = $data['time_start'];
										  $content[$i][2] = $data['time_end'];
										  $content[$i][3] = $data['day'];
										  $content[$i][4] = $abstract;
										  
										  if ($data['day'] == 1) {
											  $content[$i][5] = strtr($data['id'], $agenda_locations_d1);
										  }
										  elseif ($data['day'] == 2) {
											  $content[$i][5] = strtr($data['id'], $agenda_locations_d2);
										  }
										  
										  //$content[$i][5] = $data['id'];
										  $content[$i][7] = $data['highlighted'];
										  
									  } //data fetch assoc end
								  }  //data num rows if end
								  
								  
				//Agenda title						  
						$agendatitle = $this->dbc->query(
								  sprintf("SELECT agenda_name FROM agenda_event_title WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendatitle)) {
									  while($title = $agendatitle->fetch_assoc()){
										  $content[$i][6] = $title['agenda_name'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  
										//Agenda title						  
						$agendatag = $this->dbc->query(
								  sprintf("SELECT agenda_tag FROM agenda_event_tag WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendatag)) {
									  while($tag = $agendatag->fetch_assoc()){
										  $content[$i][9] = $tag['agenda_tag'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  				  
										  
										  
					$agendaicon = $this->dbc->query(
								  sprintf("SELECT aei.icon_type FROM agenda_event_icons as aei, agenda_event_icon_connection as aeic WHERE aeic.agenda_event_id = '%s' AND aeic.agenda_event_icon_id=aei.id ORDER BY aeic.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($aId['id'])
								  )
									 );	
									  if (mysqli_num_rows($agendaicon)) {
									  while($Icons = $agendaicon->fetch_assoc()){
										  $content[$i][8] = $Icons['icon_type'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  										  
						
						
						$i++;
						} //if check < agenda id
					} //aId fetch assoc end
				}  //agendaId num rows if end
		
			if (isset($content)) {
				
				
				foreach ($content As $agendas) {
						
						/*
						  $agendas[0] = agenda id
						  $agendas[1] = time_start
						  $agendas[2] = time_end
						  $agendas[3] = day
						  $agendas[4] = abstract
						  $agendas[5] = location
						  $agendas[6] = agenda title
						  $content[$i][7] = $data['highlighted'];
						   $content[$i][8] = $Icons['icon_type'];
						   $content[$i][9] = $tag['agenda_tag'];
						*/
						
				$time = explode(':',$agendas[1]);
				$time_AM = strpos($agendas[1],'AM');
				$time_PM = strpos($agendas[1],'PM');
				
				if ($time_AM > 0) {
				   $time[0] .= 'AM';	
				}
				
			    if ($time_PM > 0) {
				   $time[0] .= 'PM';	
				}
				
				
				
					switch ($time[0]) {
						case '6AM':
							$class = 'SixAM';
							break;
						case '7AM':
							$class = 'SevenAM';
							break;
						
						case '8AM':
							$class = 'EightAM';
							break;
						case '9AM':
							$class = 'NineAM';
							break;
						case '10AM':
							$class = 'TenAM';
							break;
						case '11AM':
							$class = 'ElevenAM';
							break;
						case '12PM':
							$class = 'TwelvePM';
							break;
						case '1PM':
							$class = 'OnePM';
							break;
						case '2PM':
							$class = 'TwoPM';
							break;
						case '3PM':
							$class = 'ThreePM';
							break;
						case '4PM':
							$class = 'FourPM';
							break;
						case '5PM':
							$class = 'FivePM';
							break;
						case '6PM':
							$class = 'SixPM';
							break;
						default :
							$class = '';
					}	
					
					$i = 0;
					
					
					if(!isset($agendas[6])){
							$agendas[6] = '';
						}
					
					if(!isset($agendas[8])){
							$agendas[8] = '';
						}	
						
					 $speakers = $this->session_speaker($agendas[0]);
					 if (isset($speakers[0][0])) {
						   $s = 1;
					 } else {
						 $s = 0;
					 }
					
					$long = '';
					$name = $this->no_ekezet($agendas[6]);
					
					if (strlen($agendas[6]) > 77) {
						$long = ' LongSessionTitle';
					}
					
					
					
					if ($agendas[7] == 1 || $agendas[4] == '' && $s == 0) {
									if($agendas[4] == '' && $s == 0) {
                                         $class .= '';
										$extraclass = ''; 
										$icon = ''; 
										
						if(!isset($agendas[9])) {
							$agendas[9] = $this->no_ekezet($agendas[6]);
						}
						$google = 'onClick="_gaq.push([';
						$google .= "'_trackEvent', 'AgendaStreamInfo', 'OpenCollapsiblePanel', '".$agendas[9]."']);";
						$google .= '"';
						
						$link = '<a '.$google.' id="'.$agendas[9].'" name="'.$agendas[9].'"></a>';
						
										
									} else {
										$extraclass = ' NonCollapsibleSession';  
										 $class .= ' HighlightedSession';
										    $link = '';
									}
									if ($agendas[7] == 1) {
										$extraclass = ' NonCollapsibleSession';  
										 $class .= ' HighlightedSession';
										 $icon = '<i class="icon-'.$agendas[8].'-icon agenda-icon"></i>';
										    $link = '';
									}
									
							 
						   
							
 							$break = '<div class="SessionTitle'.$long.'">'.$agendas[6].'</div>'.$icon;
						  
						
					} else {
						if(!isset($agendas[9])) {
							$agendas[9] = $this->no_ekezet($agendas[6]);
						}
						$google = 'onClick="_gaq.push([';
						$google .= "'_trackEvent', 'AgendaStreamInfo', 'OpenCollapsiblePanel', '".$agendas[9]."']);";
						$google .= '"';
						
						$link = '<a '.$google.' id="'.$agendas[9].'" name="'.$agendas[9].'"></a>';
						$extraclass = '';
						$break = '<div class="SessionTitle'.$long.'">'.$agendas[6].' <i class="icon-next-icon"></i> </div>';

					}
				
						
       $output .='<!-- '.$agendas[6].' -->
	   
	   <div class="Session '.$class.'">'.$link.' 
		<div class="SessionHeader'.$extraclass.'">
			<div class="SessionTime">'.$agendas[1].'</div>';

			 $output .= $break;
			 $output .='</div>';
			
		
	if (($agendas[7] != 1) && ($agendas[4] !== '' || $s == 1)) {	
		 $output .= '<div class="SessionContent">';
			 $output .='<div class="SessionAbstract">'.$agendas[4].'</div>';
			
			   
			if (isset($speakers[0][0])) {
				$speaker_num = count($speakers);
				$speaker_pos = 1;
				foreach ($speakers As $speaker) {
					
						$google = 'onClick="_gaq.push([';
						$google .= "'_trackEvent', 'AgendaSpeakers', 'InternalForward', '".$speaker[4]."']);";
						$google .= '"';
				
			$output .='<div class="SpeakerinfoContainer">
				 <a '.$google.' data-speakertag="'.$speaker[4].'" class="SpeakerModalOpen">
				<div class="SpeakerContainer">
					
					<div class="SpeakerDetails">
						<img src="img/speakers/'.$speaker[11].'">
						<p>							
						<span class="SessionSpeakerName">'.$speaker[0].'</span><br>
						<span class="SessionJobtitle">'.$speaker[1].'</span><br>
						<span class="SessionCompanyName">'.$speaker[7].'</span>
						</p>
					</div>';
					if ($speaker_pos == $speaker_num) {
						$output .='<div class="LocationDetails">
						<span class="SessionStageName"><i class="fa fa-map-marker "></i>'.$agendas[5].'</span><br>
						<span class="SessionStageHour"><i class="fa fa-clock-o "></i>'.$agendas[1].' to '.$agendas[2].'</span>
				   </div>';
					}
					$speaker_pos++;
               $output .='
				</div>
				</a>
				</div>';
				}
				$output .='</div>';
			} else {
				$output .='</div>';
			}
				
			}
			
			
			

			
		$output .=' 
		</div>
	<!--END '.$agendas[6].' --> ';
						
					
			}
			return $output;
				
				
				
				
				
				//return $content;
			}
		
	} //agenda ends
	

function session_speaker($id) {
		$i = 0;
		$check[0] = -1;
	//Gets all of the speakers names
	$names = $this->dbc->query(
			sprintf("SELECT speakers_id FROM agenda_event_speakers_connection WHERE agenda_event_id = '%s' AND status='1' ORDER BY date",
			         $this->dbc->real_escape_string($id)
					 )
		               	);	
					if ($names->num_rows > 0) {
					while($data = $names->fetch_assoc()){
						
						$status = 0;
						
						
						$nope = 0;
							//We need to run a foreach on the check array to check if we already displayed the current agenda or not
							//this is because we store multiple versions of the agenda (because of editable data)
					    foreach ($check As $c) {
								if ($c == $data['speakers_id']){
									$nope = 1;
								}
									}
					
					
						if ($nope == 0) { //if we haven't displayed it yet
				              $check[$i] = $data['speakers_id'];
		$content[$i][18] = $data['speakers_id'];
	//Get the names					   
	 $name = $this->dbc->query(
				sprintf("SELECT id, name FROM speakers_name WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
					if (mysqli_num_rows($name)) {
					while($sName = $name->fetch_assoc()){
						$content[$i][0] = $sName['name'];
						$content[$i][19] = $sName['id'];
					} //personal fetch assoc end
				}  //personal num rows if end
						   
		//Get the personal data				   
		 $personal = $this->dbc->query(
				sprintf("SELECT title, bio_important, bio, tag  FROM speakers_personal WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
					if (mysqli_num_rows($personal)) {
					while($personals = $personal->fetch_assoc()){
						$content[$i][1] = $personals['title'];
						$content[$i][2] = $personals['bio_important'];
						$content[$i][3] = $personals['bio'];
						$content[$i][4] = $personals['tag'];
						
					} //personal fetch assoc end
				}  //personal num rows if end
				
		//Get links		
		 $links = $this->dbc->query(
				sprintf("SELECT slt.type, sl.link_url FROM speakers_links as sl, speakers_link_types as slt WHERE sl.speakers_id = '%s' AND sl.speakers_link_types_id=slt.id ORDER BY sl.date DESC",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
				   ///Sooo.. this is the link section
					if (mysqli_num_rows($links)) {
					//we define the content 5 and 6 so we can append to them later
						$content[$i][5] = '';
						$content[$i][6] = '';
						$haveit = ''; //this will contain what links we already displayed
						
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

				
						//Get company info	
		 $company = $this->dbc->query(
				sprintf("SELECT sc.company_name, sc.company_url, sc.company_bio FROM speakers_company as sc, speakers_company_connection as scc WHERE scc.speakers_id = '%s' AND scc.speakers_company_id=sc.id ORDER BY scc.date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
					if (mysqli_num_rows($company)) {
					while($comp = $company->fetch_assoc()){
						$content[$i][7] = $comp['company_name'];
						$content[$i][8] = $comp['company_url'];
						$content[$i][9] = $comp['company_bio'];
						
					}
				}                  

					//Get image data
		 $pictures = $this->dbc->query(
				sprintf("SELECT image_name, image_url FROM speakers_image WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
					if (mysqli_num_rows($pictures)) {
					while($pic = $pictures->fetch_assoc()){
						$content[$i][10] = $pic['image_name'];
						$content[$i][11] = $pic['image_url'];
					
						
					}
				}                  


				//Get Agenda data

										//Get image data
		 $agendas = $this->dbc->query(
				sprintf("SELECT ae.name, aed.time_start, aed.time_end, aed.abstract, aed.day, ael.location FROM agenda_event as ae, agenda_event_connection as aec, agenda_event_data as aed, agenda_event_location as ael, agenda_event_speakers_connection as aesc WHERE aesc.speakers_id = '%s' AND aesc.agenda_event_id=ae.id AND ae.id=aec.agenda_event_id AND aec.agenda_event_data_id=aed.id AND aed.location_id=ael.id  ORDER BY aesc.date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
					if (mysqli_num_rows($pictures)) {
					while($agenda = $agendas->fetch_assoc()){
						$content[$i][12] = $agenda['name'];
						$content[$i][13] = $agenda['time_start'];
						$content[$i][14] = $agenda['time_end'];
						$content[$i][15] = $agenda['abstract'];
						$content[$i][16] = $agenda['day'];
						$content[$i][17] = $agenda['location'];
					
						
					}
				}                  
						$i++;
						} //if nope is 0  :D
					}  //Names fetch assoc end
				} // if num rows end	
			
			if (isset($content)) {
				return $content;
			}
	
	
}

}
?>	