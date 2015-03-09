

$(document).ready(function(){
    
     /*-----------------------
		Export to Xlsx
	------------------------	*/
        $('ExportButton').bind('click', function (e) {
	
		  $.ajax({
                url: 'controllers/bookings_main.php',
                type: 'POST',
                data: {action:"SponsorBookingDownload"}
            });
	

  })
  
      




});