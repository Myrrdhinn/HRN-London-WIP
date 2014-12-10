<?php 
session_start();


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}



function __autoload($class) {
	if (file_exists('controllers/' . $class . '.php'))  {
		include_once ('controllers/' . $class . '.php');
	}
}

$url_parts = array('defaultclass', 'index');

if (isset($_GET['q'])) {
	$url_parts = explode('/', $_GET['q']);
	foreach ($url_parts as $key => $value) {
		if (strlen($value) == 0) {
			unset($url_parts[$key]);
		}
	}
	
	if (count($url_parts) == 0) {
		$url_parts[] = 'defaultclass';
	}
	if (count($url_parts) == 1) {
		$url_parts[] = 'index';
	} 
	   if (count($url_parts) == 2) {
			     if (!isset($url_parts[1])) {
				$url_parts[1] = 'index';
			    }
		      }	
        }

		    $controller = $url_parts[0];
			$hoho = 'controllers/' . $controller. '.php';
			if (!file_exists($hoho)) {
             $controller = 'error'; 
			}
			$c = new $controller();
			
	   
if (method_exists($c,$url_parts[1])) {
    $c->set_url_parts($url_parts);
	$c->$url_parts[1]();
} 


?>
