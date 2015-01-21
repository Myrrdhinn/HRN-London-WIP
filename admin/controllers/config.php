<?php
 abstract class config extends aaa{

	protected $dbc;
	protected $host = aaa::HR_HOST;
    protected $user = aaa::HR_USER; 
    protected $password = aaa::HR_PASSWORD;
    protected $database = aaa::HR_DATABASE;
    
  public function __construct() {
        $con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        
        if(mysqli_errno($con)){
            echo"sum error";
            
        }
        else{
           $this->dbc = $con; // assign $con to $dbc
           $this->dbc->query('SET NAMES utf8');
		    if(isset($_SESSION['admin'])){
			    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
		   }
		  
        }
    }

	
	
 /*  public function debugging($error) {
	$ladybug = '';
	if (isset($error) && $error['message'] !=''){
		
		  foreach ($error As $bug) {
		     $ladybug .= $bug;	

		       }
			   
			   $file = 'errors/error.txt';
			    //file_put_contents($file, $hiba, FILE_APPEND);

	     file_put_contents($file, $ladybug);
   
	}

}*/
	
}


?>