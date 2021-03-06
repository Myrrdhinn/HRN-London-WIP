 /* $(function() {
    $('#Sponsors').sortable({
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
            $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"Sponsor_sort", list_order:list_sortable},
                success: function(data) {
                    //finished
                }
            });
        }
    }); // fin sortable
});

*/
var Sponsors = {};
var Mce = {};
function tiny_init(id) {
   
         tinymce.init({
            selector : "#"+id,
            theme : "modern",
			 plugins : "save",
			  toolbar: [
        "save | undo redo | paste | bold italic underline | alignleft aligncenter alignright alignjustify",
		"bullist numlist | outdent indent blockquote"
             ],
             theme_modern_buttons3_add : "save",
             save_enablewhendirty : true,
             save_onsavecallback : "BioSave"
        });
   
}

function tiny_remove(id) {
    tinymce.remove("#"+id);
}


function BioSave() {
	save_data(Mce.first);
	alert('Save Successful!');
}

function save_data(id) {
			//this variable is needed to check if there's a change inside the input box or not
	    var check = 0;  		
		var wat = ''; //this will contain what has changed	
			//get the id of the input box
			
					//get the original tag
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number); 
		
		var sId = $('#'+tag+'_SponsorId').val();
		
		var second = id.substr(tag_number+1,id.length);
		
		var line_number = second.search("-");
		
		var third = second.substr(0, line_number); 
				
		if (second == "NewSocialLinkEdit"){
			  var newlink = $(this).val();
			  if (newlink.length > 0) {
				  var typeid = -1;
				  var newtype = -1;
				  
				  ///We search for the correct link type
				  newtype = newlink.search("twitter");
				  if (newtype > -1) {
					  typeid = 2;
				  } else {
					  newtype = newlink.search("facebook");
					   if (newtype > -1) {
					      typeid = 1;
				      } else {
						newtype = newlink.search("linkedin");
						   if (newtype > -1) {
					          typeid = 3;
				           } else {
							   newtype = newlink.search("flickr");
						       if (newtype > -1) {
					             typeid = 4;
				               } else {
								   newtype = newlink.search("google");
						           if (newtype > -1) {
					                   typeid = 5;
				                    } else {
										newtype = newlink.search("rss");
						                if (newtype > -1) {
					                       typeid = 6;
				                        } else {
									       newtype = newlink.search("@");
						                    if (newtype > -1) {
					                       typeid = 2;
										   temp = newlink;
										   var atnumber = temp.search("@");
										   var handle = temp.substr(atnumber+1,temp.length);
										   newlink = "https://twitter.com/"+handle;
											}
										}
									}
								   
							   }
						   }
					  }
				  }
				  
				  if (typeid > -1){
					  
					  //------------------------------------------------------		
          $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"new_sponsor_link", sId:sId, typeid:typeid, newlink:newlink},
                success: function(data) {
                    //finished
                }
            });
					  
					  
					  
				  } //if typeid > -1 end
				  
				  
			  } //newlink length > 0 end
			
		
		} else  {

			if (third == "AlaCarteText") {
			   var third_number = second.substr(line_number+1, second.length);
	           var third_part = third_number.search("Edit");
		
		       var sAlaCarteConnectionId = second.substr(line_number+1, third_part); //This is the ala_carte_connection id
			   var sAlaCarte = $('#'+tag+'_'+second).val();  

				
			   $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"alacarte_edit", sId:sId, sAlaCarte:sAlaCarte, sAlaCarteConnectionId:sAlaCarteConnectionId},
                success: function(data) {
                    //finished
                }
				
            });
				 location.reload();
				
			}

   ///save the data from the input boxes
   
		//Sponsor data
		var sName = $('#'+tag+'_NameEdit').val();
		//var sTitle = $('#'+tag+'_TitleEdit').val();
		//var sBioImportant = $('#'+tag+'_BioImportantEdit').val();    
		var sBio = $('#'+tag+'_BioEdit').val(); 
		//company data
		//var sCompany = $('#'+tag+'_CompanyEdit').val();
		var sCompanyLink = $('#'+tag+'_CompanyLinkEdit').val();
		
		var httpval = sCompanyLink.search("http");
		var httpsval = sCompanyLink.search("https");
		  if (httpval == -1 && httpsval == -1) {
			  sCompanyLink = "http://"+sCompanyLink;
		  }
		 
		//var sAlaCarteCheckbox = $('#'+tag+'_IsAlaCarte:checked').val();
		
		var rank = $('#'+tag+'_TypeSelect').val();
		
		//Links
		var sTwitter = '';
		var sFlickr = '';
		var sFacebook = '';
		var sLinkedin = '';
		var sGoogle = '';
		var sRss = '';
		
		  // twitter
		if ($('#'+tag+'_twitterEdit').val() != '') {
			sTwitter = $('#'+tag+'_twitterEdit').val();
			if (sTwitter) {
				newtype = sTwitter.search("@");
				  if (newtype > -1) {
						 temp = sTwitter;
						 var atnumber = temp.search("@");
						 var handle = temp.substr(atnumber+1,temp.length);
						 sTwitter = "https://twitter.com/"+handle;
						}
			}
		}
         

		 // facebook 
		if ($('#'+tag+'_facebookEdit').val() != '') {
			sFacebook = $('#'+tag+'_facebookEdit').val();
		}

		 
		  
		// linkedin  
		if ($('#'+tag+'_linkedinEdit').val() != '') {
			 sLinkedin = $('#'+tag+'_linkedinEdit').val();
		}
         

		 // flickr 
	   if ($('#'+tag+'_flickrEdit').val() != '') {
		   sFlickr = $('#'+tag+'_flickrEdit').val();
	   }
		  

		// google+  
		if ($('#'+tag+'_googleEdit').val() != '') {
			 sGoogle = $('#'+tag+'_googleEdit').val();
		}
		 

		  
		 // rss 
	/*	if ($('#'+tag+'_rssEdit').val() != '' ) {
			sRss = $('#'+tag+'_rssEdit').val();
		}
		  */

	
	
	var sNId = $('#'+tag+'_SponsorNameId').val();
	
	//put the data into an array for compare purposes
       var editarray = new Array();
	  editarray['sName'] = sName;
	  //editarray['sTitle'] = sTitle;
	   editarray['sBio'] = sBio;
	 // editarray['sBioImportant'] = sBioImportant;
	  // editarray['sCompany'] = sCompany;
	  editarray['sCompanyLink'] = sCompanyLink;
	   editarray['sTwitter'] = sTwitter;
	  editarray['sFacebook'] = sFacebook;
	  	editarray['sLinkedin'] = sLinkedin;
	  editarray['sFlickr'] = sFlickr;
	   editarray['sGoogle'] = sGoogle;
	  editarray['sRss'] = sRss;
	//  editarray['sAlaCarte'] = sAlaCarteCheckbox;

	     //check if there's a difference between the original inputs (from on click) and these inputs
	 for (var k in Sponsors) {
      if (Sponsors.hasOwnProperty(k)) {
		  if (editarray[k] != Sponsors[k]){
			  check = 1;
		     } //if edit array ends

          } //if Sponsors.has end
      } //for var k end
		 var n = id.search("Edit");
         var res = id.substr(0, n);
		 
		 var divide = res.search("_");
	     var wat = 's'+res.substr(divide+1, n);

      if (check == 1){    //if there is
	    		
				//Send and ajax query to store the modified data to PHP
//------------------------------------------------------
		/*
		                data: {action:"sponsor_edit", sNId:sNId, sId:sId, wat:wat, tag:tag, sName:sName, sTitle:sTitle, sBio:sBio, sBioImportant:sBioImportant, sCompany:sCompany, sCompanyLink:sCompanyLink, sTwitter:sTwitter, sFacebook:sFacebook, sLinkedin:sLinkedin, sFlickr:sFlickr, sGoogle:sGoogle, sRss:sRss},
		*/
		
  		   $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"sponsor_edit", sNId:sNId, sId:sId, wat:wat, tag:tag, sName:sName,  sBio:sBio, sCompanyLink:sCompanyLink, sTwitter:sTwitter, sFacebook:sFacebook, sLinkedin:sLinkedin, sFlickr:sFlickr, sGoogle:sGoogle, sRss:sRss, rank:rank},
                success: function(data) {
                    //finished
                }
            });
		
			
			
	       } //if check == 1 end
	  
	} //if newsocial else end
}

$(document).ready(function(){
	/*
	<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
	
	
					 var test = $('<button/>',{
                    text: '+',
                     click: function (e) { 
					    
					        e.preventDefault();
		                   	e.stopPropagation(); 
							 $('#AlaCarteDiv').append('<br /><label>A La Carte title<input required="required" name="AlaCarte_'+i+'" type="text" /></label>');
							 $('#CarteVal').val(i);
							 i++;
							 $('#AlaCarteDiv').append(test).end();
							}
                    });
	*/
	    /*-----------------------
	     	if CLICK ON an ELEMENT
	    ------------------------	*/
		
		//Hide the element and show the input field associated with the element + focus the input box
    $('.ClickClick').bind('click', function () {
			   if (Mce.first){
				     tiny_remove(Mce.first);
				     $('#'+Mce.first).blur();
					 $('#'+Mce.first).attr('style', 'display:none');
					 var n = Mce.first.search("Edit");
                     var res = Mce.first.substr(0, n);
	                 $('#'+res).removeAttr("style"); 
				 }
		
		//get the id of the activated element
		var id = $(this).attr('id');
				
			//get the original tag of the Sponsor what's in the database
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number); 
		var wut = id.substr(tag_number+1,id.length);
				
		// Save the content of the unchanged input boxes for later use
		
				//Sponsor data
		Sponsors.sName = $('#'+tag+'_NameEdit').val();
		Sponsors.sTitle = $('#'+tag+'_TitleEdit').val();
		Sponsors.sBioImportant = $('#'+tag+'_BioImportantEdit').val();    
		Sponsors.sBio = $('#'+tag+'_BioEdit').val(); 
		//company data
		Sponsors.sCompany = $('#'+tag+'_CompanyEdit').val();
		Sponsors.sCompanyLink = $('#'+tag+'_CompanyLinkEdit').val();
		
		Sponsors.sAlaCarteCheckbox = $('#'+tag+'_IsAlaCarte:checked').val();
		//Links
		
		  // twitter
		if (($('#'+tag+'_twitterEdit').length > 0)){
          Sponsors.sTwitter = $('#'+tag+'_twitterEdit').val();
          } else {
			 Sponsors.sTwitter = '';
		  }
		 // facebook 
	    if (($('#'+tag+'_facebookEdit').length > 0)){
		  Sponsors.sFacebook = $('#'+tag+'_facebookEdit').val();
		  } else {
			Sponsors.sFacebook = '';
		  }
		// linkedin  
   	    if (($('#'+tag+'_linkedinEdit').length > 0)){
		 Sponsors.sLinkedin = $('#'+tag+'_linkedinkEdit').val();
		  } else {
			Sponsors.sLinkedin = '';
		  }
		  
		 // flickr 
	    if (($('#'+tag+'_flickrEdit').length > 0)){
		Sponsors.sFlickr = $('#'+tag+'_flickrkEdit').val();
		  } else {
			Sponsors.sFlickr = '';
		  } 
		

		// google+  
   	    if (($('#'+tag+'_googleEdit').length > 0)){
		 Sponsors.sGoogle = $('#'+tag+'_googlekEdit').val();
		  } else {
			Sponsors.sGoogle = '';
		  }
		  
		 // rss 
	    if (($('#'+tag+'_rssEdit').length > 0)){
		  Sponsors.sRss = $('#'+tag+'_rsskEdit').val();
		  } else {
			Sponsors.sRss = '';
		  } 

		
		//hide the original text show input field instead
		$(this).attr('style', 'display:none');

	   $('#'+id+'Edit').removeAttr("style");
	   		if (wut == "Bio"){				 
			    var tmce = id+"Edit";
		        tiny_init(tmce);
				Mce.first = tmce;
		     }
			 
			 $('#'+id+'Edit').focus();
		
		
	  

  })
  
      /*-----------------------
	   Changed the SponsorType
	    ------------------------	*/
		
		//Hide the element and show the input field associated with the element + focus the input box
    $('.TypeClick').bind('change', function () {
		
		//get the id of the activated element
		var id = $(this).attr('id');
		
		var rank = $(this).val(); 		
			//get the original tag of the Sponsor what's in the database
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number); 
		
		var sId = $('#'+tag+'_SponsorId').val();
		var sNId = $('#'+tag+'_SponsorNameId').val();

		// Save the content of the unchanged input boxes for later use
		
				//Sponsor data
		var sName = $('#'+tag+'_NameEdit').val();   
		var sBio = $('#'+tag+'_BioEdit').val(); 
		var sCompanyLink = $('#'+tag+'_CompanyLinkEdit').val();
		
		if (rank == 0){
			 var n = $( '#'+tag+'_Highlighted:checked' ).length;
			
			if (n === 1) {
				
				   var db = $('#CarteVal').val();
								 var carte = [];

								for (var i = 1; i <= db; i++) {
                                    carte[i] = $('#AlaCarte_'+i).val();
                                     }
							   
							   if (carte[0] !='') {
								$.ajax({
								  url: 'controllers/main.php',
								  type: 'POST',
								  data: {action:"AddNewAlaCarteEdit", sId:sId, carte:carte},
								  success: function(data) {
								  }
							  });  
							  
							   }//if carte[0]
							   
							   
						$.ajax({
							  url: 'controllers/main.php',
							  type: 'POST',
							  data: {action:"sponsor_type_edit", sId:sId, tag:tag, sBio:sBio, sCompanyLink:sCompanyLink, rank:rank},
							  success: function(data) {
								  //finished
							  }
						  });
						  
					  
					  //hide the original text show input field instead
					  $(this).attr('style', 'display:none');
			  
					 $('#'+id+'Edit').removeAttr("style");
					 $('#'+id+'Edit').focus();   
					   location.reload();
							   
							   
				
			} else {
				var conf = confirm('Are you sure you want to set the sponsor to "Only A La Carte"? If you do, the sponsor will disappear from here!');
		       if (conf == true) {
								 
						$.ajax({
							  url: 'controllers/main.php',
							  type: 'POST',
							  data: {action:"sponsor_type_edit", sId:sId, tag:tag, sBio:sBio, sCompanyLink:sCompanyLink, rank:rank},
							  success: function(data) {
								  //finished
							  }
						  });
						  
					  
					  //hide the original text show input field instead
					  $(this).attr('style', 'display:none');
			  
					 $('#'+id+'Edit').removeAttr("style");
					 $('#'+id+'Edit').focus();   
					   location.reload();

		        } else {//if conf true
				   location.reload();
			             }
			}
		} else {
					
			   $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"sponsor_type_edit", sId:sId, tag:tag, sBio:sBio, sCompanyLink:sCompanyLink, rank:rank},
                success: function(data) {
                    //finished
                }
            });
			
		
		//hide the original text show input field instead
		$(this).attr('style', 'display:none');

	   $('#'+id+'Edit').removeAttr("style");
	   $('#'+id+'Edit').focus();   
         location.reload();
			
		}
		
	

  })
  

  
      	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('.ClickEdit').bind('change', function () {
		  
		$(this).attr('style', 'display:none');
		
		//get the id of the input box
		var id = $(this).attr('id'); 
		
		 // get the value of the input box
	    var val = $('#'+id).val();
		
		//get the original tag
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number); 
		
		//the original element
        var edit_number = id.search("Edit");
        var original = id.substr(0, edit_number); 
		
		//show the original element
	   $('#'+original).removeAttr("style");
	   
	
  })
  
  	/*-----------------------
		 Enter pressed
	------------------------	*/
  	   $('.ClickEdit').keypress(function(event) {
        if (event.keyCode == 13) {
		var id = $(this).attr('id'); 
		 var n = id.search("Edit");
         var res = id.substr(0, n);
		  
          save_data(id); //main save function
		  
		  
//-----------------------------------------------------------	
     //after the ajax query, hide the input box and show the text		
	   $(this).attr('style', 'display:none');
	   $('#'+res).removeAttr("style");
	   $('#'+res).text($(this).val()); //replace the original text value with the inputbox value :)
	   
        } //if enter pressed end
		
    }) //.keypress ends
  
  
  	 /*-----------------------
		Input lost focus
	------------------------	*/
        $('.ClickEdit').bind('focusout', function () {

		$(this).attr('style', 'display:none');
		var id = $(this).attr('id');
        var n = id.search("Edit");
        var res = id.substr(0, n);
	   $('#'+res).removeAttr("style");

  })
  
  /*
    /*-----------------------
		Add New AlaCarte
	------------------------	
        $('#NewAlaCarteSaveButton').bind('click', function (e) {
					e.preventDefault();
		            e.stopPropagation(); 

		var sId = $('#NewAlacarte_SponsorsSelect').val();
	    var sName = $('#NewAlaCarteName').val(); 
		
		  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"AddNewAlaCarte", sId:sId, sName:sName},
                success: function(data) {
                    location.reload();
                }
            });
			

  })
  */
  
  		 /// New Agenda icon stuff
		 
		 $('.Highlighted').on('click', function () {
	     		var id = $(this).attr('id');
						//get the original tag
		        var tag_number = id.search("_");
		        var tag = id.substr(0, tag_number)+"_"; 
 
			var n = $( "#"+id+":checked" ).length;
			
			if (n === 1) {
				 var i = 2;
				 var test = $('<button/>',{
                    text: '+',
                     click: function (e) { 
					    
					        e.preventDefault();
		                   	e.stopPropagation(); 
							 $('#'+tag+'AlaCarteDiv').append('<br /><input required="required" id="AlaCarte_'+i+'" name="AlaCarte_'+i+'" type="text" placeholder="A La Carte title '+i+'" />');
							 $('#CarteVal').val(i);
							 i++;

							 $('#'+tag+'AlaCarteDiv').append(test).end();
							}
                    });
				
				
				  $('#'+tag+'AlaCarteDiv').show();
				  $('#'+tag+'AlaCarteDiv').append('<br /><input required="required" id="AlaCarte_1" name="AlaCarte_1" type="text" placeholder="A La Carte title 1" /><input id="CarteVal" name="CarteVal" type="hidden" value="1"/>');
				  $('#'+tag+'AlaCarteDiv').append(test).end();
				  

							   //disable enter button for this 
						$('#'+tag+'AlaCarteDiv').keypress(function(e){
    
                          if ( e.which == 13 ) {
							   e.preventDefault();
							     var db = $('#CarteVal').val();
								 var carte = [];
								 
                              var sId = $('#'+tag+'SponsorId').val();
							  
								for (var i = 1; i <= db; i++) {
                                    carte[i] = $('#AlaCarte_'+i).val();
									console.log(carte[i]);
                                     }
							   
							   if (carte[0] !='') {
								$.ajax({
								  url: 'controllers/main.php',
								  type: 'POST',
								  data: {action:"AddNewAlaCarteEdit", sId:sId, carte:carte},
								  success: function(data) {
									  location.reload();
								  }
							  });
							  
							   }//if carte[0]
												 
						  }
                      });
						
				 
				  //<input type="button" name="AddAlaCarte" class="AddAlaCarte" value="+"> <br />
				  
				  //$('#AlaCarteDiv input').attr('required', 'required');
	   
			} else {
				
				//show everything as normal
				  $('#'+tag+'AlaCarteDiv').hide();
		          $('#'+tag+'AlaCarteDiv').children().remove();
			}

	     })
		 
		 

  
  
  	 /*-----------------------
		Sponsor Delete
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SponsorDelete').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('sponsordel-sponsor');
		
		var conf = confirm("Are you sure you want to delete this Sponsor?");
		  if (conf == true) {
	  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"sponsor_delete", sId:sId},
                success: function(data) {
					location.reload();
                }
            });
			  
          
           }

  })
  
  
    	 /*-----------------------
		Sponsor Permission edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SponsorPermission').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('sponsorperm-sponsor');

		  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"SponsorsPermissionSession", sId:sId},
                success: function(data) {
                    window.location.replace("sponsors_permission");
                }
            });
       

  })
  
  
      	 /*-----------------------
		Sponsor social link edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SocialLinkEdit').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('socialsedit-sponsor');
		var type = "sponsors";

		  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"SocialEdit", sId:sId, type:type},
                success: function(data) {
                    window.location.replace("social_links_edit");
                }
            });
       

  })
  




});