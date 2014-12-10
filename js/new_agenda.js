   $(document).ready(function(){ 
 
		 
		 /// New Agenda icon stuff
		 
		 		//If user clicks the "no picture" checkbox
   $('#Highlighted').on('click', function () {
	   
          // save the button and the select elements in to a variable

 
			var n = $( "#Highlighted:checked" ).length;
			if (n === 1) {
					$('#AgendaIcon').show();
					$('#SpeakersDiv').hide();
	   
			} else {
				//show everything as normal
	            $('#AgendaIcon').hide();
				$('#SpeakersDiv').show();
			}

	     })
		 
	   
   });