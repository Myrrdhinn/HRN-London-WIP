<?php 

class agenda_edit extends config {
	   function index() {
	   	$this->addView('views/agenda_edit.php');
   }


function agenda_list() {
			$content = '';
	//Gets all of the locations
	$agenda = $this->dbc->query(
					sprintf("SELECT id FROM agenda_event"));	
					if ($agenda->num_rows > 0) {
					while($ag = $agenda->fetch_assoc()){
						 $agendatitle = $this->dbc->query(
							sprintf("SELECT agenda_name FROM agenda_event_title WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
								$this->dbc->real_escape_string($ag['id'])
							)
							   );	
								if (mysqli_num_rows($agendatitle)) {
								while($title = $agendatitle->fetch_assoc()){
									$content .= '<option value="'.$ag['id'].'">'.$title['agenda_name'].'</option>';
									
								} //agenda while end
							}  //agenda numrows end
								
						
						
					}
				}
	return $content;	
	
		
}

}

?>