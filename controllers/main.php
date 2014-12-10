<?php
include_once('config.php');

/*
Known Issues!
   - speakers bio.. there's no actual <br> so speace in the text because real_escape_string
   - when you edit a social link and press enter, the icon won't show up, only the edited link.. this is a side product of the .text function
   
Needed:
  - speaker delete function - it is done :D Now I just need to do the actual delete script for cron :)
  - ability to add social links when you edit the speaker   
*/

 class main extends config {
	 
	 public $speaker_id;	 
	 
   function ekezet_nelkuli($fajlnev) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $fajlnev = strtolower(strtr($fajlnev, $specialis_karekterek));
    $fajlnev = preg_replace("/[^a-z0-9-_\.]/i", '_', trim($fajlnev));
    if (strlen($fajlnev) == 0 || $fajlnev == '.' || $fajlnev == '..') {
    	$fajlnev = 'ervenytelen_nev';
    }
    return $fajlnev;
}

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
	
   //Upload speaker	 
//-----------------------------------------------------	 
  function speaker_upload() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['Speaker']) && $_POST['Speaker'] != ''){
	        //If there's no speaker we don't upload anything :D
			
	// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO speakers SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Speaker']))
				)
			);
		$speaker_id = $this->dbc->insert_id;
		
		$this->speaker_id = $speaker_id;
		
	//	we store the display name sparatly because here we can change it later and store it redundantly
		$this->dbc->query(
				sprintf("INSERT INTO speakers_name SET name = '%s', speakers_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Speaker'])),
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id))
				)
			);
			
	//Insert a speakers status data		
		$this->dbc->query(
				sprintf("INSERT INTO speakers_status SET speakers_status_id = '1', speakers_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id))
				)
			);			
		
		//Insert Personal data
      if (isset($_POST['Tag']) && $_POST['Tag'] != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $_POST['Tag']);
					 
					 $sanitized = htmlspecialchars($databaseContent, ENT_QUOTES);

                       $bio = str_replace(array("\r\n", "\n", "<br />"), array("'szuunet'", "'szuunet'","'szuunet'"), $_POST['SpeakerBio']);
					   $bioImp = str_replace(array("\r\n", "\n", "<br />"), array("'szuunet'", "'szuunet'","'szuunet'"), $_POST['SpeakerBioImp']);
					 
	    $this->dbc->query(
				sprintf("INSERT INTO speakers_personal SET title = '%s', speakers_id = '%s', bio = '%s', bio_important = '%s', tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerTitle'])),
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($bio)),
				  $this->dbc->real_escape_string(htmlspecialchars($bioImp)),
				  $this->dbc->real_escape_string(htmlspecialchars($tag))
				)
			);	
		$data_id = $this->dbc->insert_id;
				
		$this->dbc->query(
				sprintf("INSERT INTO speakers_personal_connection SET speakers_id = '%s', speakers_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);
		}	//isset post_tag end	
		
		//Insert Company Data		
	   if (isset($_POST['CompanyName']) && $_POST['CompanyName'] != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO speakers_company SET company_name = '%s', company_url = '%s', company_bio = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyUrl'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyBio']))
				)
			);	
		$company_id = $this->dbc->insert_id;
		
		
				$this->dbc->query(
				sprintf("INSERT INTO speakers_company_connection SET speakers_id = '%s', speakers_company_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($company_id))
				)
			);	
		}  //isset company name ends
		
	//LINKS	
	      //Twitter
		if ($_POST['SpeakerTwitter'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerTwitter']))
				)
			);	
		}
		
			      //Facebook
		if ($_POST['SpeakerFacebook']  != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerFacebook']))
				)
			);	
		}
			      //Linkedin
		if ($_POST['SpeakerLinkedin'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerLinkedin']))
				)
			);	
		}
			      //Flickr
		if ($_POST['SpeakerFlickr'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerFlickr']))
				)
			);	
		}
			      //Google+
		if ($_POST['SpeakerGoogle'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerGoogle']))
				)
			);	
		}
		
			     //RSS
		if ($_POST['SpeakerRSS'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '6'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerRSS']))
				)
			);	
		}


	  } // isset Speaker end
	
	 }
	 
	 
function personal_data($sTag, $sTitle, $sBio, $sBioImportant, $sId) {
	
	      if (isset($sTag) && $sTag != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $sTag);
	    $this->dbc->query(
				sprintf("INSERT INTO speakers_personal SET title = '%s', speakers_id = '%s', bio = '%s', bio_important = '%s', tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sTitle)),
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBio)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBioImportant)),
				  $this->dbc->real_escape_string(htmlspecialchars($tag))
				)
			);	
		$data_id = $this->dbc->insert_id;
				
		$this->dbc->query(
				sprintf("INSERT INTO speakers_personal_connection SET speakers_id = '%s', speakers_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);
		}	//isset post_tag end				
		
	
}

function company_data($sCompany, $sCompanyLink, $sId) {
		
		
		//Insert Company Data		
	   if (isset($sCompany) && $sCompany != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO speakers_company SET company_name = '%s', company_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sCompany)),
				  $this->dbc->real_escape_string(htmlspecialchars($sCompanyLink))
				)
			);	
		$company_id = $this->dbc->insert_id;
		
		
				$this->dbc->query(
				sprintf("INSERT INTO speakers_company_connection SET speakers_id = '%s', speakers_company_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($company_id))
				)
			);	
		}  //isset company name ends
	
}

 function link_upload($type, $link, $sid) {
	 
	 		$this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sid)),
				  $this->dbc->real_escape_string(htmlspecialchars($link)),
				  $this->dbc->real_escape_string(htmlspecialchars($type))
				)
			);	
	 
 }
	 
	 ///MODIFY SPEAKER
//-----------------------------------------------------	 
  function speaker_edit() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['sName']) && $_POST['sName'] != '' && isset($_POST['sId']) && isset($_POST['sNId']) && isset($_POST['wat'])){
	        //If there's no speaker we don't upload anything :D
			

		$speaker_id = $_POST['sId'];
		
	/*
	//if we update company data
	if ($_POST['wat'] == 'sCompany' || $_POST['wat'] == 'sCompanyLink') { 	
		
		//Insert Company Data		
	   if (isset($_POST['sCompany']) && $_POST['sCompany'] != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO speakers_company SET company_name = '%s', company_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sCompany'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sCompanyLink']))
				)
			);	
		$company_id = $this->dbc->insert_id;
		
		
				$this->dbc->query(
				sprintf("INSERT INTO speakers_company_connection SET speakers_id = '%s', speakers_company_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($company_id))
				)
			);	
		}  //isset company name ends
		
	} //if we update company data end
		*/
		
		
	//LINKS	
	switch ($_POST['wat']) {
		case 'sName':
				$this->dbc->query(
				sprintf("INSERT INTO speakers_name SET name = '%s', speakers_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
			         	)
		        	);				
			break;
		case 'sTitle':
		//Insert Personal data
			$this->personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);
			break;
			
		case 'sBio':
			$this->personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);			
			break;
			
		case 'sBioImportant':
			$this->personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);				
			break;	
				
		case 'sCompany':
			$this->company_data($_POST['sCompany'], $_POST['sCompanyLink'], $_POST['sId']);				
			break;	
			
		case 'sCompanyLink':
			$this->company_data($_POST['sCompany'], $_POST['sCompanyLink'], $_POST['sId']);					
			break;								
			
																	
		case 'stwitter':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sTwitter']))
				)
			);				
			break;
		case 'sfacebook':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFacebook']))
				)
			);			
			break;
		case 'slinkedin':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sLinkedin']))
				)
			);				
			break;
		case 'sflickr':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFlickr']))
				)
			);			
			break;
		case 'sgoogle':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sGoogle']))
				)
			);			
			break;
		case 'srss':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '6'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sRss']))
				)
			);			
			break;									
		default :
			
	}
				

	  } // isset Speaker end
	
	 }
	 

	 //Speaker delete
///---------------------------------------------------------------
function speaker_delete(){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO speakers_status SET speakers_id = '%s', speakers_status_id = '0'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
				)
			);
	
}	 

	 
	 //Set Speaker Order
//------------------------------------------------------	 
   function speaker_order($speaker_id) {
	     if(isset($_POST['Order'])){
			  if(isset($speaker_id)) {
			$i = 0;
			$ord = 0;	  
				  		//Get links		
		 $speaker = $this->dbc->query(
				sprintf("SELECT id, order_id, speakers_id FROM speakers_order ORDER BY date DESC"));	
					if (mysqli_num_rows($speaker)) {
					   while($data = $speaker->fetch_assoc()){
						   if ($data['order_id'] == $_POST['Order']) {
							   $i = 1;
							   $ord = $data['order_id'];
							   $id = $data['id'];
						   }
						   
						  if ($i == 1) {
							  $ord++;
							  
							  $this->dbc->query(
								  sprintf("UPDATE speakers_order SET order_id = '%s' WHERE speakers_id = '%s'",
									$this->dbc->real_escape_string(htmlspecialchars($ord)),
									$this->dbc->real_escape_string(htmlspecialchars($data['speakers_id']))
								  )
							  );
							  
						  }
						
					}
						
				   } //num_rows_speaker                 
				  
			$this->dbc->query(
				sprintf("INSERT INTO speakers_order SET speakers_id = '%s', order_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Order']))
				)
			);	
	}  //isset speaker_id
			 
			 
		 }//isset post order
   }
	 
	///Speaker rearrange 
//----------------------------------------------------------------	
   function speaker_arrange() {
	  if (isset($_POST['list_order'])) { 
		// get the list of items id separated by cama (,)
	$list_order = $_POST['list_order'];
	// convert the string list to an array
	$list = explode(',' , $list_order);
	$i = 0 ;
	foreach($list as $id) {

		 $this->dbc->query(
			  sprintf("UPDATE speakers_order SET order_id = '%s' WHERE speakers_id = '%s'",
				$this->dbc->real_escape_string(htmlspecialchars($i)),
				$this->dbc->real_escape_string(htmlspecialchars($id))
			  )
		 );
		       $i++ ;
			
      } //foreach end
	  } //if isset listorder
	}
	
	 //Upload Avatar
//------------------------------------------------------------		 
	function avatar_upload($avatar) {
		if ($avatar == 1) {
			$gender = "AvatarM.jpg";
		} else {
			$gender = "AvatarF.jpg";
		}
		
		 $this->dbc->query(
				sprintf("INSERT INTO speakers_image SET speakers_id = '%s', image_name = '%s', image_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($this->speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($gender)),
				  $this->dbc->real_escape_string(htmlspecialchars($gender))
				)
			);
		
	}
	 
	 //File Upload
//------------------------------------------------------------	 
   function file_upload($path) {
	
// $uploaddir: az a mappa, ahova a fájlokat feltöltöm
	$uploaddir = $path;
	// Létezik-e uploads mappa? Ha nem, hozzuk létre
	if (!is_dir($uploaddir)) {
		mkdir($uploaddir);
	}
	
	
	  //Kép fájl ellenőrző
  foreach ($_FILES as $file) {
    if ($file['tmp_name'] > '') {
	  $exp = explode(".",
            strtolower($file['name']));
    }
  }

	
	// $uploadfile: az a fájlnév, ami majd megjelenik a szerveren
	$uploadfile = $this->ekezet_nelkuli(basename($_FILES['file']['name']));

	// $uploadpath: a feltöltött fájl relatív elérési útja
	$uploadpath = $uploaddir . '/' . $uploadfile;
	
	$counter = 2;
	while (is_file($uploadpath)) {
		$uploadfile = $this->ekezet_nelkuli(basename($_FILES['file']['name']));
		$f = $this->fileinfo($uploadfile);
		if (strlen($f['extension']) == 0) {
			// ha nincs kiterjesztés
			$uploadfile . '_' . $counter;
		} else {
			// ha van kiterjesztés
			//$uploadfile = $f['filename'] . '_' . $counter . '.' . $f['extension'];
			// A pathinfo() kiváltja a saját fileinfo() függvényemet
			$uploadfile = pathinfo($uploadfile, PATHINFO_FILENAME) . '_' . $counter . '.' . pathinfo($uploadfile, PATHINFO_EXTENSION);
		}
		$uploadpath = $uploaddir . '/' . $uploadfile;
		$counter++;
	}

	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) {
      $valasz = 'The picture has been uploaded! :)';

	}
	
	
	$filename = explode('.',$uploadfile);
	
			if ($uploadfile) {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_image SET speakers_id = '%s', image_name = '%s', image_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($this->speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($filename[0])),
				  $this->dbc->real_escape_string(htmlspecialchars($uploadfile))
				)
			);
				
		}
			
	 
	 }
	
/************************************************************	 
	     AGENDA
************************************************************	


   Agenda upload 
--------------------------------------------------------------*/
	 function agenda_upload($SpeakerAgenda) {
	  if(isset($_POST['AgendaTitle'])){
	 
	 if(!isset($_POST['Agenda'])) {
		 $this->dbc->query(
				sprintf("INSERT INTO agenda_event SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTitle']))
				)
			);
		$agenda_id = $this->dbc->insert_id;
		 
	  }else {
		  $agenda_id = $_POST['Agenda'];
	  }
	 	
		
		$this->dbc->query(
				sprintf("INSERT INTO agenda_event_title SET agenda_name = '%s', agenda_event_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTitle'])),
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
				)
			);
			
			if(isset($_POST['Highlighted'])) {
				$check = 1;
			} else {
				$check = 0;
			}
	    $this->dbc->query(
				sprintf("INSERT INTO agenda_event_data SET time_start = '%s', time_end = '%s', day = '%s', abstract = '%s', location_id = '%s', highlighted = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeStart'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeEnd'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Day'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Abstract'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Locations'])),
				  $this->dbc->real_escape_string(htmlspecialchars($check))
				)
			);	
		$data_id = $this->dbc->insert_id;
		
		
		  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_connection SET agenda_event_id = '%s', agenda_event_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);	

       if(isset($_POST['Icons'])) {
		   	  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_icon_connection SET agenda_event_id = '%s', agenda_event_icon_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Icons']))
				)
			);	
	   }

	if(isset($SpeakerAgenda) && $SpeakerAgenda[0] != '') {
		foreach ($SpeakerAgenda As $person) {
			$this->dbc->query(
				sprintf("INSERT INTO agenda_event_speakers_connection SET speakers_id = '%s', agenda_event_id = '%s', status = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($person)),
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
				)
			);	
		}
		

	}  //isset speaker_id
 } //isset agendaTitle
	 }	
	
  function edit_agenda($agenda_id) {
	$i = 0;

												   
						   $agendaData = $this->dbc->query(
								  sprintf("SELECT aed.time_start, aed.time_end, aed.day, aed.abstract, ael.location, aed.highlighted FROM agenda_event_data as aed, agenda_event_location as ael, agenda_event_connection as aec WHERE aec.agenda_event_id = '%s' AND aec.agenda_event_data_id=aed.id AND ael.id=aed.location_id ORDER BY aec.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendaData)) {
									  while($data = $agendaData->fetch_assoc()){
										  $content[1] = $data['time_start'];
										  $content[2] = $data['time_end'];
										  $content[3] = $data['day'];
										  $content[4] = $data['abstract'];
										  $content[5] = $data['location'];
										  $content[7] = $data['highlighted'];
										  
									  } //data fetch assoc end
								  }  //data num rows if end
								  
								  
				//Agenda title						  
						$agendatitle = $this->dbc->query(
								  sprintf("SELECT agenda_name FROM agenda_event_title WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendatitle)) {
									  while($title = $agendatitle->fetch_assoc()){
										  $content[6] = $title['agenda_name'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  
										  
					$agendaicon = $this->dbc->query(
								  sprintf("SELECT aei.icon_type FROM agenda_event_icons as aei, agenda_event_icon_connection as aeic WHERE aeic.agenda_event_id = '%s' AND aeic.agenda_event_icon_id=aei.id ORDER BY aeic.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendaicon)) {
									  while($Icons = $agendaicon->fetch_assoc()){
										  $content[8] = $Icons['icon_type'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  										  
						
						$agenda_speakers = $this->agenda_edit_speakers($agenda_id);
						
						if (isset($agenda_speakers[0])) {
							$content[9] = '';
							$content[10]= '';
							foreach ($agenda_speakers[0] As $sid) {
								$content[9] .= $sid.';';
							}
							
							foreach ($agenda_speakers[1] As $sname) {
								$content[10] .= $sname.';';
							}
							

						} else {
							$content[9] = '';
							$content[10]= '';
						}
						
		
			if (isset($content)) {
				return $content;
			}
  }	
	

function agenda_edit_speakers($id) {
	//Gets all of the speakers names
	$i = 0;
	$content[0][0] = '';
	$names = $this->dbc->query(
			sprintf("SELECT speakers_id FROM agenda_event_speakers_connection WHERE agenda_event_id = '%s' AND status='1' ORDER BY date",
			         $this->dbc->real_escape_string($id)
					 )
		               	);	
					if ($names->num_rows > 0) {
					while($data = $names->fetch_assoc()){
						
						$status = 0;
				   
	//Get the names					   
	 $name = $this->dbc->query(
				sprintf("SELECT id, name FROM speakers_name WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
					if (mysqli_num_rows($name)) {
					while($sName = $name->fetch_assoc()){
						$content[0][$i] = $sName['name'];
						$content[1][$i] = $data['speakers_id'];
						$i++;
					} //personal fetch assoc end
				}  //personal num rows if end
			   
			}
					
		} else {
		  $content = '';
		}
		
		if (isset($content)) {
			return $content;
		}
		
}
	
	 
 }
 




/*///////////// 
Add new speaker
///////////////*/

 if(isset($_POST['SpeakerSubmit']) && (is_uploaded_file($_FILES['file']['tmp_name']) || isset($_POST['Gender']) ) ){
	$the_main = new main();
   $the_main->speaker_upload();
   //$the_main->agenda_upload($the_main->speaker_id);
   if (isset($_POST['Gender'])) {
	   $the_main->avatar_upload($_POST['Gender']);
   }
   if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	   $uploadpath = '../img/speakers';
       $the_main->file_upload($uploadpath);
   }
 
   $the_main->speaker_order($the_main->speaker_id);
    header('Location:../index.php?q=speakers');
   
     
}// post speaker end

/*///////////// 
Add new agenda
///////////////*/

if (isset($_POST['AgendaSubmit'])) {
	$the_main = new main();
	
	if (isset($_POST['Speakers'])) {
		$speakers = $_POST['Speakers'];
	} else {
	 $speakers[0] = '';	
	}

	$the_main->agenda_upload($speakers);
	header('Location:../index.php?q=agenda');
}

 
/*///////////// 
Modify Speaker Order
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_sort' && isset($_POST['list_order'])){
	$the_main = new main();
    $the_main->speaker_arrange();

}// modify order end

/*///////////// 
Upload new social link
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'new_link' && isset($_POST['typeid']) && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->link_upload($_POST['typeid'], $_POST['newlink'], $_POST['sId']);

}// modify order end

 

/*///////////// 
Edit Speakers
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_edit' && isset($_POST['sName'])){
	$the_main = new main();
    $the_main->speaker_edit();

}// edit speakers
 
 
 
/*///////////// 
Speaker Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->speaker_delete();

}// delete speakers
  
/*///////////// 
Agenda edit change
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'agenda_edit' && isset($_POST['id'])){
	 $asd = '';
	$the_main = new main();
    $data = $the_main->edit_agenda($_POST['id']);
	
	/*	foreach ($data As $d) {
			foreach ($d As $k) {
				$asd .= $k.';';
			}
			
		}
		echo $asd;*/
		
		echo json_encode($data);
}// edit speakers




?>
