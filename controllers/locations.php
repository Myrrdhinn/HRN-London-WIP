<?php 

class locations extends config {
	
public function get_locations() {
		$content = '';
	//Gets all of the locations
	$places = $this->dbc->query(
					sprintf("SELECT id, location FROM agenda_event_location"));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['location'].'</option>';
					}
				}
	return $content;	
}

public function get_order() {
	$i = 0;
			$content = '';
	//Gets all of the speaker order
	$order = $this->dbc->query(
					sprintf("SELECT order_id FROM speakers_order ORDER BY order_id ASC"));	
					if ($order->num_rows > 0) {
					while($data = $order->fetch_assoc()){
						$content .= '<option value="'.$data['order_id'].'">'.$data['order_id'].'</option>';
						if ($data['order_id'] > $i) {
						  $i = $data['order_id'];
						  }
					}
				} 
				         $i++;
						$content .= '<option selected="selected" value="'.$i.'">'.$i.'</option>';
					
	return $content;	
	
}


public function get_speakers() {
	$content = '';
	  $speakers = new speakers_main(); 
	$data = $speakers->speakers();
	if(isset($data)){
	 foreach ($data as $person) {
		 $content .= '<option value="'.$person[18].'">'.$person[0].'</option>';
	 }
	}
	
return $content;
}


public function get_icons() {
			$content = '';
	//Gets all of the locations
	$icons = $this->dbc->query(
					sprintf("SELECT id, icon_type FROM agenda_event_icons"));	
					if ($icons->num_rows > 0) {
					while($data = $icons->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['icon_type'].'</option>';
					}
				}
	return $content;	
	
}

}
?>