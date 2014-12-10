

$(document).ready(function(){
	
  	 /*-----------------------
		Speaker Delete
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('#Agenda').change(function () {
		$('#Speakers option').removeAttr('selected');
		var id = $('#Agenda').val();
		
		          $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
				dataType: "json",
                data: {action:"agenda_edit", id:id},
                success: function(data) {
					
                 $('[name="AgendaTitle"]').val(data[6]);
				 $('[name="AgendaTimeStart"]').val(data[1]);
				 $('[name="AgendaTimeEnd"]').val(data[2]);
				 $('[name="Abstract"]').val(data[4]);
				 
				 /// Set location
			  $("#Locations option").filter(function() {
				  //may want to use $.trim in here
				  return $(this).text() == data[5]; 
			  }).prop('selected', true);
					
					
				var day = "Day "+data[3];

				/// day selection
			  $("#Day option").filter(function() {
				  //may want to use $.trim in here
				  return $(this).text() == day;  
			  }).prop('selected', true);
				
				
				//Speakers
				 if (data[10] != ''){

					$.each(data[10].split(";"), function(i,e){
						$("#Speakers option[value='" + e + "']").prop("selected", true);
					});
				 }
				 
                }
            });
			

  })
  


});