<?php
include_once('config.php');

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
		$this->dbc->query(
				sprintf("INSERT INTO speakers SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Speaker']))
				)
			);
		$speaker_id = $this->dbc->insert_id;
		
		$this->speaker_id = $speaker_id;
		
		//Insert Personal data
      if (isset($_POST['Tag']) && $_POST['Tag'] != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $_POST['Tag']);
	    $this->dbc->query(
				sprintf("INSERT INTO speakers_personal SET title = '%s', speakers_id = '%s', bio = '%s', bio_important = '%s', tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerTitle'])),
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerBio'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerBioImp'])),
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
	 
	 ///AGENDA
///---------------------------------------------------------------
	 function agenda_upload($speaker_id) {
	  if(isset($_POST['AgendaTitle'])){
	 
	 
	 	$this->dbc->query(
				sprintf("INSERT INTO agenda_event SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTitle']))
				)
			);
		$agenda_id = $this->dbc->insert_id;
			
	    $this->dbc->query(
				sprintf("INSERT INTO agenda_event_data SET time_start = '%s', time_end = '%s', day = '%s', abstract = '%s', location_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeStart'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeEnd'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Day'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Abstract'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Locations']))
				)
			);	
		$data_id = $this->dbc->insert_id;
		
		
		  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_connection SET agenda_event_id = '%s', agenda_event_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);	


	if(isset($speaker_id)) {
			$this->dbc->query(
				sprintf("INSERT INTO agenda_event_speakers_connection SET speakers_id = '%s', agenda_event_id = '%s', status = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
				)
			);	
	}  //isset speaker_id
 } //isset agendaTitle
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
		
      }
		
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
	 
 }
 

/*///////////// 
Add new speaker
///////////////*/

 if(isset($_POST['SpeakerSubmit']) && is_uploaded_file($_FILES['file']['tmp_name'])){
	$the_main = new main();
   $the_main->speaker_upload();
   $the_main->agenda_upload($the_main->speaker_id);
   $uploadpath = '../img/speakers';
   $the_main->file_upload($uploadpath); 
   $the_main->speaker_order($the_main->speaker_id);
   
   $the_main->debugging();  
}// post speaker end
 
/*///////////// 
Modify Order
///////////////*/

 if($_POST['action'] == 'speaker_sort' && isset($_POST['list_order'])){
	$the_main = new main();
    $the_main->speaker_arrange();
  
}// post speaker end
 
 


?>
