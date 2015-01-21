<?php 

class test extends config {
	
       //upload links to somewhere :)
 function sps($id) {
	 
	// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO speakers SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($id))
				)
			);
	 
 }
 


}
 if(isset($_POST['Speaker'])){
	$the_main = new test();
   $the_main->sps($_POST['Speaker']);

}// post speaker end

?>