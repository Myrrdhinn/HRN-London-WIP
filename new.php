<?php function __autoload($class) {
	if (file_exists('controllers/' . $class . '.php'))  {
		include_once ('controllers/' . $class . '.php');
	}
}

$new = new locations();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Teszt</title>

<!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
  <!-- Dropzone -->
<script src="js/dropzone.js"></script>
<link rel="stylesheet" href="css/dropzone.css" />
<link rel="stylesheet" href="css/new_speaker.css" />

</head>

<body>
  <form class="dropzone" id="speakers" name="speakers" method="post" action="controllers/main.php" enctype="multipart/form-data"><br />
    <div>
    <script>
  // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.speakers = {
    init: function() {
      this.on("addedfile", function(file) {

        // Create the remove button
        var SubmitButton = Dropzone.createElement('<input name="SpeakerSubmit" type="submit" value="Save"/>');


        // Capture the Dropzone instance as closure.
        var _this = this;

        // Listen to the click event
        $('#speakers').on("submit", function(e) {
          // Make sure the button click doesn't submit the form:
          // Remove the file preview.
		    e.preventDefault();
            e.stopPropagation();
          _this.processQueue();
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
		  
		    setTimeout(function () {
        document.location.href="speakers.php"; //will redirect to speakers
            }, 2000); //will call the function after 2 secs.
		   
        });

        // Add the button to the form
       document.getElementById("speakers").appendChild(SubmitButton);
      });
    }
  };
</script>
  
    <label>Speaker name<input required="required" name="Speaker" type="text" /></label><br />
    <label>Speaker title<input name="SpeakerTitle" type="text" /></label><br />
    <label>Speaker bio important<textarea name="SpeakerBioImp" cols="" rows=""></textarea></label><br />
    <label>Speaker bio<textarea name="SpeakerBio" cols="" rows=""></textarea></label><br />
    <label>Speaker tag<input required="required" name="Tag" type="text" /></label><br />
    <label>Speaker Twitter<input name="SpeakerTwitter" type="text" /></label><br />
    <label>Speaker Facebook<input name="SpeakerFacebook" type="text" /></label><br />
    <label>Speaker Linkedin<input name="SpeakerLinkedin" type="text" /></label><br />
    <label>Speaker Flickr<input name="SpeakerFlickr" type="text" /></label><br />
    <label>Speaker Google+<input name="SpeakerGoogle" type="text" /></label><br />
    <label>Speaker RSS<input name="SpeakerRSS" type="text" /></label><br /> <br /> <br />
    <label>Order <select name="Order"> <?php $new->get_order();?></select></label><br /> <br />
    <fieldset>
    <legend>Company detalis</legend>
    <label>Company name<input required="required" name="CompanyName" type="text" /></label><br />
    <label>Company url<input name="CompanyUrl" type="text" /></label><br />
    <label>Company bio<textarea name="CompanyBio" cols="" rows=""></textarea></label><br />
    </fieldset><br />
    <fieldset>
    <legend>Agenda details</legend>
    <label>Agenda title<input required="required" name="AgendaTitle" type="text" /></label><br />
    <label>Time of Start<input name="AgendaTimeStart" type="text" /></label><br />
    <label>Time of End<input name="AgendaTimeEnd" type="text" /></label><br />
    <label>Day <select name="Day"> 
    <option value="1">Day 1</option>
    <option value="2">Day 2</option>
    </select></label><br /><br />
    <label>Abstract<textarea name="Abstract" cols="25" rows="5"></textarea></label><br />
    <label>Location <select name="Locations"> <?php $new->get_locations();?></select></label>
    </fieldset>
   
    
    	<!-- MAX_FILE_SIZE értéknek meg kell előznie a fájl input mezőt -->
	<input hidden="hidden" type="file" name="file" />
    </div>
  </form>
  
  
</body>
</html>
