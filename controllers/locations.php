<?php 

class locations extends config {
	
public function get_locations() {
		$content = '';
	//Gets all of the speakers
	$places = $this->dbc->query(
					sprintf("SELECT id, location FROM agenda_event_location"));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['location'].'</option>';
					}
				}
	echo $content;	
}

public function get_order() {
	$i = 0;
			$content = '';
	//Gets all of the speakers
	$order = $this->dbc->query(
					sprintf("SELECT order_id FROM speakers_order ORDER BY order_id ASC"));	
					if ($order->num_rows > 0) {
					while($data = $order->fetch_assoc()){
						$content .= '<option value="'.$data['order_id'].'">'.$data['order_id'].'</option>';
						$i++;
					}
				} 
						$content .= '<option selected="selected" value="'.$i.'">'.$i.'</option>';
					
	echo $content;	
	
}

}
?>