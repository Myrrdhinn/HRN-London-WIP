/*Randomize sponsors :)*/
$(document).ready(function(){
	
		  	 /*-----------------------
		Open the modal
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SpeakerModalOpen').bind('click', function () {
		
		
		  //get the current speaker id
		//var sId = $(this).data("speakerid");
		var sTag = $(this).data("sponsortag");
		$('#EmptyModal').html('');
		
		        $.ajax({
                url: 'controllers/sponsors_main.php',
                type: 'POST',
                data: {action:"modal_display", sTag:sTag},
                success: function(data) {
                    $('#EmptyModal').html(data);
                }
            });
		
		
       $('#EmptyModal').modal('show');
	  

  })
	
	
	
			  	 /*-----------------------
		Form submit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('#BookTheSponsorButton').bind('click', function (e) {
		


		
       
	  

  })
	
	
	
	
});



function ShowForm() {
	
	     $(".ModalOriginalContent").fadeOut();
		 $(".SponsorsFormContainer").fadeIn();
}

	
function SponsorFormSubmit() {
			var response = $('#g-recaptcha-response').val();
			var fname = $('#first_name').val();
			var lname = $('#last_name').val();
			var email = $('#email').val();
			var phone = $('#phone').val();
			var company = $('#company').val();
			var title = $('#title').val();
			
			var message = $('#description').val(); 
		    var time = $('#SponsorTimeSelect').val();
			var day = $('#SponsorDaySelect').val();
			
			var sponsor = $('#sponsor_name').val();
			
			if ((typeof fname != "undefined") && fname != '' && (typeof lname != "undefined") && lname != '' &&  (typeof email != "undefined") && email != '' && (typeof phone != "undefined") && phone != '') {
				
						
						$.ajax({
						url: 'controllers/main.php',
						type: 'POST',
						data: {action:"SponsorChaptchaCheck", response:response, fname:fname, lname:lname, email:email, phone:phone, company:company, title:title, message:message, time:time, day:day, sponsor:sponsor},
						success: function(data) {
							if (data != "error"){
								//if the chaptcha is correct
								/////
								$(".SponsorsFormContainer").html(data);
		
									
									   setTimeout(function () {
											  $('#EmptyModal').modal('hide');
										}, 10000); //will call the function after 6 secs.
									
									
		
											
								/////
							} else {//if data != error end
							
							    $('#first_name').css("border","1px solid #cccccc");
								$('#last_name').css("border","1px solid #cccccc");
								$('#email').css("border","1px solid #cccccc");
								$('#phone').css("border","1px solid #cccccc");
							
							    $("#MissingText").html('Please, solve the CAPTCHA!');
							
							}// if data == error
							
							
						}
					});
					
			
			} else {//if type stuff end
			    //if stuff is missing
				$("#MissingText").html('Please, fill out the missing fields!');
				$("#MissingText").fadeIn();
				
			    if (typeof fname == "undefined" || fname == '') {
					$('#first_name').css("border","1px solid #9B1515");
				} else {
					$('#first_name').css("border","1px solid #cccccc");
				}
	
	
				if (typeof lname == "undefined" || lname == '') {
					$('#last_name').css("border","1px solid #9B1515");
				} else {
					$('#last_name').css("border","1px solid #cccccc");
				}
	
	
			    if (typeof email == "undefined" || email == '') {
					$('#email').css("border","1px solid #9B1515");
				} else {
					$('#email').css("border","1px solid #cccccc");
				}
	
	
				if (typeof phone == "undefined" || phone == '') {
					$('#phone').css("border","1px solid #9B1515");
				} else {
					$('#phone').css("border","1px solid #cccccc");
				}

			} //if stuff is missing else end
	
}