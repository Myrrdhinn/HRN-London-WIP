<?php
 abstract class config{
    protected $host ="";
    protected $user = ""; 
    protected $password = "";
    protected $db="";
    protected $dbc;
    
	protected $url_parts;	
	
    
  public function __construct() {
        $con = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        
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

	public function set_url_parts($url_parts) {
		$this->url_parts = $url_parts;
	}
	
    public function addView($path) {
		$this->views[] = $path;
		foreach ($this->views as $view) {
			include_once $view;
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