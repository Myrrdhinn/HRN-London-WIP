<?php
 abstract class config{
    protected $host ="";
    protected $user = ""; 
    protected $password = "";
    protected $db="";
    protected $dbc;
    
    function __construct() {
        $con = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        
        if(mysqli_errno($con)){
            echo"sum error";
            
        }
        else{
           $this->dbc = $con; // assign $con to $dbc
           $this->dbc->query('SET NAMES utf8');
        }
    }
	
	
   function debugging() {
	$ladybug = '';
	
    $error = error_get_last();
	if (isset($error) && $error['message'] !=''){
		
		  foreach ($error As $bug) {
		     $ladybug .= $bug;	

		       }
			   
			   $file = 'errors/error.txt';
			    //file_put_contents($file, $hiba, FILE_APPEND);

	     file_put_contents($file, $ladybug, FILE_APPEND);
   
	}

}
	
}


?>