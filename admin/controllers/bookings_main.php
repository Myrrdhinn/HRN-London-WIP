<?php 

include_once('aaa.php');
include_once('config.php');

class bookings_main extends config {
	
public function get_logs() {
		$content[0][0] = '';;
	//Gets all of the locations
	$i = 0;
	$places = $this->dbc->query(
					sprintf("SELECT id, first_name, last_name, email, phone, company, title, day, time, sponsor, date FROM sponsors_booking ORDER BY date DESC"));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content[$i][0] = '<div class="Label">Number:</div><div class="ItemValue">'.$data['id'].'</div>';
						$content[$i][1] = '<div class="Label">First Name:</div><div class="ItemValue">'.$data['first_name'].'</div>';
						$content[$i][2] = '<div class="Label">Last Name:</div><div class="ItemValue">'.$data['last_name'].'</div>';
						$content[$i][3] = '<div class="Label">Email:</div><div class="ItemValue">'.$data['email'].'</div>';
						$content[$i][4] = '<div class="Label">Phone Number:</div><div class="ItemValue">'.$data['phone'].'</div>';
						$content[$i][5] = '<div class="Label">Company:</div><div class="ItemValue">'.$data['company'].'</div>';
					    $content[$i][6] = '<div class="Label">Job Title:</div><div class="ItemValue">'.$data['title'].'</div>';
						$content[$i][7] = '<div class="Label">Day:</div><div class="ItemValue">'.$data['day'].'</div>';
						$content[$i][8] = '<div class="Label">Time:</div><div class="ItemValue">'.$data['time'].'</div>';
						$content[$i][9] = '<div class="Label">Sponsor:</div><div class="ItemValue">'.$data['sponsor'].'</div>';
						$content[$i][10] = '<div class="Label">Recorded:</div><div class="ItemValue">'.$data['date'].'</div>';
						$i++;
					}
				}
	return $content;	
}


public function export_logs() {
		$content[0][0] = '';;
	//Gets all of the locations
	$i = 0;
	$places = $this->dbc->query(
					sprintf("SELECT id, first_name, last_name, email, phone, company, title, day, time, sponsor, date FROM sponsors_booking ORDER BY date DESC"));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content[$i][0] = $data['id'];
						$content[$i][1] = $data['first_name'];
						$content[$i][2] = $data['last_name'];
						$content[$i][3] = $data['email'];
						$content[$i][4] = $data['phone'];
						$content[$i][5] = $data['company'];
					    $content[$i][6] = $data['title'];
						$content[$i][7] = $data['day'];
						$content[$i][8] = $data['time'];
						$content[$i][9] = $data['sponsor'];
						$content[$i][10] = $data['date'];
						$i++;
					}
				}
	/** Include the Excel function */
require_once 'vendor/Excel.php';	
}


}

/*///////////// 
Export Bookings
///////////////*/
 

 if(isset($_POST['ExportButton'])){
	$the_main = new bookings_main();
    $the_main->export_logs();


}

?>