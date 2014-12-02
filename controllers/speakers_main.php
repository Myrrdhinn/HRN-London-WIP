<?php 

class speakers_main extends config {
	
	function speakers() {
$i = 0;	

	//Gets all of the speakers names
	$names = $this->dbc->query(
			sprintf("SELECT s.id, s.name, so.speakers_id FROM speakers as s, speakers_order as so WHERE s.id=so.speakers_id ORDER BY so.order_id"));	
					if ($names->num_rows > 0) {
					while($data = $names->fetch_assoc()){
						   $content[$i][0] = $data['name'];
						   $content[$i][18] = $data['speakers_id'];
		//Get the personal data				   
		 $personal = $this->dbc->query(
				sprintf("SELECT title, bio_important, bio, tag  FROM speakers_personal WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
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
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
					if (mysqli_num_rows($links)) {
						$content[$i][5] = '';
						$content[$i][6] = '';
					while($slinks = $links->fetch_assoc()){
						$content[$i][5] .= $slinks['type'].';';
						$content[$i][6] .= $slinks['link_url'].';';
						
					}
				}                  

				
						//Get company info	
		 $company = $this->dbc->query(
				sprintf("SELECT sc.company_name, sc.company_url, sc.company_bio FROM speakers_company as sc, speakers_company_connection as scc WHERE scc.speakers_id = '%s' AND scc.speakers_company_id=sc.id ORDER BY scc.date LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
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
				    $this->dbc->real_escape_string($data['id'])
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
				    $this->dbc->real_escape_string($data['id'])
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
					}  //Names fetch assoc end
				} // if num rows end	
			
			if (isset($content)) {
				return $content;
			}
			
	}
}
?>	