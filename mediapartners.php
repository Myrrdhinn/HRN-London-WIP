    <?php 

		include_once('controllers/aaa.php');
		include_once('controllers/config.php');
		include_once('controllers/mediapartners_main.php');
		include_once('controllers/locations.php');

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="author" content="Develped by: TesseracT - bottyan.tamas@web-developer.hu">
<meta name="developer" content="Develped by: Myrrdhinn - myrrdhinn@gmail.com">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe - Media Partners</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/foundation/foundation.orbit.js"></script>
<script src="js/vendor/modernizr.js"></script>

<!-- Include Bootstrap for SpeakersGrid Modals -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Favicon setting -->
<link rel="shortcut icon" href="favicon.ico">

<!--Include Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,400,700' rel='stylesheet' type='text/css'>
<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- jQUERY libraries -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>

<!-- TinyMCE -->
<script type="text/javascript" src="vendor/tinymce/tinymce.min.js"></script>

<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/mediapartners.css" />
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!--- Mobile Menu dropdown -->
<script src="js/mobile-menu-dropdown.js"></script>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-47508758-1']); /* ID */
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</head>
<body>

<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
 <!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);" href="index"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" >Home</a>
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" href="speakers">Speakers</a>
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" href="agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <span class="DesktopMenuDropdown">Expo
            <ul id="ExpoDropdown">
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);" href="venue"><li class="FirstDropdownItem">Venue</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Logistics']);" href="logistics"><li>Logistics</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" href="hotels"><li>Hotels</li></a>
            </ul>
        </span>
        
        <div class="NavmenuDivider"></div>
        
        <span class="DesktopMenuDropdown" style="display: none;">Partners
            <ul id="PartnersDropdown">
            <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" href="sponsors"><li class="FirstDropdownItem">Sponsors</li></a>
                <a class="ActiveNavmenuItem" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MediaPartners']);" href="mediapartners"><li class="FirstDropdownItem">Media Partners</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'BlogSquad']);" href="blogsquad"><li>Blog Squad</li></a>
            </ul>
        </span>        
        
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="contact">Get in Touch</a> </div>
    <div id="DesktopSocialHeader"> <a onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'Facebook']);" target="_blank" href="https://www.facebook.com/hrtecheu"><img alt="facebook" src="img/header-facebook.png" /></a> <a onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'Twitter']);" target="_blank" href="https://twitter.com/hrtecheurope"> <img alt="twitter" src="img/header-twitter.png"/></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'LinkedIn']);" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img alt="linkedin" src="img/header-linkedin.png"/></a> <a onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'Flickr']);" target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img alt="flickr" src="img/header-flickr.png"/></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'SlideShare']);"  href="http://www.slideshare.net/hrtecheurope"> <img alt="slideshare" src="img/header-slideshare.png"/></a> <a  onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" target="_blank">
        <div id="HeaderGetTicketsButton">GET TICKETS</div>
        </a> </div>
    </nav>

    <!--END Declare the Off canvas menu Wrapper --> 
    <!--Desktop Navigation Menu-->

    
    <!--END DESKTOP Navigation Menu--> 
    <!-- Mobile Navigation Menu-->
    <div id="MobileNavigation"> <img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-mobile-logo.png"> <a onclick="location.href='#top'"  role="button" class="right-off-canvas-toggle smoothScroll"><i class="fa fa-bars"></i></a> </div>
    <nav id="RightsideMobileNavigation" class="right-off-canvas-menu">
      <ul>
        <li> <a href="index" class="MobileNavigationMenuItem">Home</a></li>
        <li> <a href="tickets" >Tickets</a></li>
        <li> <a href="speakers">Speakers</a></li>
        <li> <a href="agenda" >Agenda</a></li>
                  <li id="ExpoMobileGroup">Expo <i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></li>
       	  <div id="ExpoMobileGroupContent">
                <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);" href="venue">Venue</a></li>
                <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Logistics']);" href="logistics">Logistics</a></li>
                <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" href="hotels">Hotels</a></li>
          </div>
          
          <li id="PartnersMobileGroup" style="display: none;">Partners <i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></li>
       	  <div id="PartnersMobileGroupContent">
         		<li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" href="sponsors">Sponsors</a></li>
                <li><a class="ActiveNavmenuItem" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MediaPartners']);" href="mediapartners">Media Partners</a></li>
                <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'BlogSquad']);" href="blogsquad">Blog Squad</a></li>
          </div>
        <li> <a href="contact" >Get in Touch</a></li>
      </ul>
    </nav>
    
    <!-- END Mobile Navigation Menu--> 
    <!--MAIN CONTENT -->
    <div id="MediapartnersHeaderContainer">
      <div id="MediapartnersHeaderInnerContainer">
        <h1>Media Partners</h1>
        <p>A Who's Who of HR software leaders will showcase the best solutions, services and products on the market for you to optimise, enable and unleash your people! </p>
      </div>
    </div>
    <div class="colors-wrapper">
      <div class="colored-stripe red" ></div>
      <div class="colored-stripe yellow" ></div>
      <div class="colored-stripe green" ></div>
      <div class="colored-stripe blue" ></div>
    </div>
    <div style="clear: both;"></div>

    <section id="Mediapartners">
      <?php
		$plus_mediapartner = 0;
		$Sp = new mediapartners_main();
		$content = $Sp->mediapartners();
		
		if (isset($content)) {
			$s_type = -1;
		 foreach ($content as $mediapartner) {
			       $num = 0;
			      foreach ($mediapartner As $set) {
						if (!isset($set)){
				        $mediapartner[$num] = '';
			             }	
						 $num++;		
					}

			 
			 		  /*
		  							    $content[$i][0] =  mediapartners_id
										$content[$i][1] =  mediapartners_url
										$content[$i][2] =  mediapartners_type_id (platinum, gold etc)
										$content[$i][3] =  mediapartners_bio
										$content[$i][4] =  mediapartners_tag
										$content[$i][5] =  mediapartners_link_types
										$content[$i][6] =  mediapartners_link_urls
										$content[$i][7] =  mediapartners_picture
										$content[$i][8] =  mediapartners_name
										$content[$i][9] =  mediapartners_name_id
										$content[$i][10] = mediapartner_type_name
										$content[$i][11] = //mediapartners_id (HTML id tag)
										$content[$i][12] = AlaCarte mediapartner text
										$content[$i][13] = Alacarte or not? :D
									    $content[$i][14] = // alacarte connection id
			 
			 */
			 
		  $output = '';
		  
		  
		 if ($s_type != $mediapartner[2]){
			 if ($s_type > -1) {
				 $output = '</div></section>';
			  }
			  $s_type = $mediapartner[2];

			  $output .= '<section class="MediapartnerSection"><h1>'.$mediapartner[10].'</h1><div class="MediapartnersTypeDiv">';
			  //This way we can give a fix width to the mediapartner block container and we can always position it to center :)
		  }
		  		
				 
  if ($mediapartner[0] != -55){ //if there's no a la carte mediapartner uploaded, the array will come back with mediapartner id -55, so we must chek this first because we don't want to display this!
	  $output .= '<div class="MediapartnerMain" id="'.$mediapartner[11].'"><!-- '.$mediapartner[8].' Mediapartner Grid-->';
  

     $output.= '<a data-toggle="modal" data-target="#'.$mediapartner[4].'" href="#">
      <div class="Mediapartner">';
	  if (isset($mediapartner[7])) {
		  $output .= '<div class="MediapartnerLogo" style="background-image:url(img/mediapartners/'.$mediapartner[7].');">';
	  } else {
				    $output .= '<div class="MediapartnerLogo">';
			  }
         $output .='<div class="MediapartnerLogoHoverInfo">

            <p class="MediapartnerViewProfile">VIEW PROFILE</p>
			<p class="MediapartnerName">'.$mediapartner[8].'</p>
          </div>
        </div>';
              		// If the mediapartner is an A La Carte Mediapartner, print out the mediapartnered product 
             if($mediapartner[13] == 1) {
      			$output .= '<p class="ALaCarte">'.$mediapartner[12].'</p>';
      		}

      $output .= '</div>';

      		
      $output .= '</a>'; 
	  
      $output .= '<!-- end '.$mediapartner[0].' Mediapartner grid --></div> ';
	  
  } //if is it -55 end
               
		
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
		 }
		 echo '</div></section>';
	} 

	   ?>
    </section>
    <!--END MAIN CONTENT--> 
    
    <!-- FOOTER -->
    <footer> 
      <!--GREYFOOTER-->
      <div id="GreyFooterContainer">
        <h1 id="GreyFooterHeader">Contact</h1>
        <div id="LeftGreyFooterItems">
          <div id="FollowUs">
            <h6 class="FooterSectionTitle">Follow Us</h6>
            <div id="FollowUsSocialIcons"> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Facebook']);" target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png" /></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Twitter']);"  href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png"/></a> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'LinkedIn']);"  target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png"/></a> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Flickr']);"  target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img src="img/header-flickr.png"/></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'SlideShare']);"   href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png"/></a> </div>
          </div>
          <div id="HRNEvents">
            <h6 class="FooterSectionTitle">HRN Events</h6>
            <p id="HRNEventsList"> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'LondonSite']);"  href="http://london.hrtecheurope.com" target="_blank">HR Tech Europe London</a><br>
              <a href="http://paris.hrtecheurope.com" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'ParisSite']);"  target="_blank">HR Tech World Congress</a> </p>
          </div>
        </div>
        <div id="RightGreyFooterItems">
          <div id="FooterButtons"> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'InternalForward', 'Contact']);" href="contact">
            <div id="GetInTouchButton" class="FooterButton">Get in Touch</div>
            </a> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'InternalForward', 'Tickets']);" href="tickets">
            <div id="RegisterNowButton" class="FooterButton">Register Now</div>
            </a> </div>
          <div id="GetInTouch">
            <h6 class="FooterSectionTitle">Get in Touch</h6>
            <p id="GeneralEnquiries"> General Enquiries<br>
              <i class="fa fa-phone"></i>+36 1 201 1469<br>
              <i class="fa fa-envelope"></i>hrn@hrneurope.com </p>
          </div>
        </div>
        <div style="clear: both;"></div>
      </div>
      <!--END GREYFOOTER-->
      <div class="colors-wrapper">
        <div class="columns colored-stripe red" ></div>
        <div class="columns colored-stripe yellow" ></div>
        <div class="columns colored-stripe green" ></div>
        <div class="columns colored-stripe blue" ></div>
      </div>
      <!--BLACKFOOTER-->
      <div id="BlackFooterContainer">
        <div id="BlackFooterItems">
          <div id="FooterHRNLogo"><img src="img/footer-hrtogo.png"></div>
          <div id="Copyright">Copyright © 2014 HRN Europe. All Rights Reserved.</div>
          <div id="Privacy">Privacy Policy | Terms and Conditions</div>
        </div>
      </div>
      <!--END BLACKFOOTER--> 
    </footer>
    <!--End FOOTER--> 
    
    <!-- close the off-canvas menu --> 
    <a class="exit-off-canvas"></a> </div>
</div>
<!-- GO TOP SCROLL --> 
<a href="#" class="GoTopButton smoothScroll"><img id="GoTopImg" src="img/gotop/gotop.png" alt="Go top"></a> 
<!-- END GO TOP SCROLL --> 

<!--Foundation Scripts --> 

<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation({
        orbit: {
          timer_speed: 4000,
          next_on_click: false
        }
        });
</script> 
<!--End Foundation Scripts --> 
<script type="text/javascript">
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


</script> 

	   
	<!--Form Scripts --> 
<script type='text/javascript' src='http://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='PHONE';ftypes[2]='text';fnames[3]='COMPANY';ftypes[3]='text';fnames[4]='SORUCE';ftypes[4]='text';fnames[5]='MSG';ftypes[5]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<script type="text/javascript">
$(function() {
  $('form').submit(function(){
    $.post('http://hrneurope.us4.list-manage.com/subscribe/post?u=c03cb8f11b1f34771fdd1747c&amp;id=acc85bbd71', function() {
      window.location = 'http://loondon.hrtecheurope.com/thankyou';
    });
    return false;
  });
});
</script>





<!-- MODAL OPEN FROM EXTERNAL LINK --> 
<script type="text/javascript">
 $(document).ready(function() {
  if(window.location.href.indexOf('#HinssenP') != -1) {
    $('#HinssenP').modal('show');
  }
});
</script> 
<!-- END MODAL OPEN FROM EXTERNAL LINK --> 

<!-- MODALS -->

<?php

if (isset($content)) {
   foreach ($content as $mediapartner) {
			 $go = 1;
			 
			 if (isset($mediapartner[6])){ //we break down the links to an array
				  $links = explode(';',$mediapartner[6]);
			      $link_types = explode(';',$mediapartner[5]);
			 }
			 
			 
			 $num = 0;
			  foreach ($mediapartner As $set) {
			      if (!isset($set)){
				        $mediapartner[$num] = '';
			        }	
				  $num++;		
			   }
			   
			   //We check if we already printed this modal or not. If we do, we won't print it agian.
			 if(isset($displayed)) {
				 $i = 0;
				   foreach ($displayed As $value) {
						if ($value == $mediapartner[0]){
							 $go = 0;
						 } //if value = mediapartner
						$i++;
					  }//forech displayed
					  
					if ($go == 1){
						$displayed[$i] = $mediapartner[0];
						$i++;
					}
			
			 }else { //if isset displayed
				$displayed[0] =  $mediapartner[0];
			 }//else
				
				

			 			 		  /*
		  							    $content[$i][0] =  mediapartners_id
										$content[$i][1] =  mediapartners_url
										$content[$i][2] =  mediapartners_type_id (platinum, gold etc)
										$content[$i][3] =  mediapartners_bio
										$content[$i][4] =  mediapartners_tag
										$content[$i][5] =  mediapartners_link_types
										$content[$i][6] =  mediapartners_link_urls
										$content[$i][7] =  mediapartners_picture
										$content[$i][8] =  mediapartners_name
										$content[$i][9] =  mediapartners_name_id
										$content[$i][10] = mediapartner_type_name
										$content[$i][11] = //mediapartners_id (HTML id tag)
										$content[$i][12] = AlaCarte mediapartner text
										$content[$i][13] = Alacarte or not? :D
										$content[$i][14] = // alacarte connection id
			 
			 */
if ($mediapartner[0] != -55 && $go == 1){	//if we already displayed the modal or the modal don't contain data then we don't print it out		 			

 /*------------------------
  Normal user
 -------------------------
 */
					$output = '<!-- '.$mediapartner[8].' Modal -->
<div class="modal fade" id="'.$mediapartner[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($mediapartner[7])) {
		  $output .= '<div class="ModalMediapartnerPhoto" style="background-image:url(img/mediapartners/'.$mediapartner[7].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
        
       $output .='<div class="ModalMediapartnerBioContainer">
	   <form class="MediapartnerModalEdit">
	      
          <p id="'.$mediapartner[4].'_Name" class="ClickClick ModalMediapartnerName">'.$mediapartner[8].'</p>
		

		  <a id="'.$mediapartner[4].'_CompanyLink" class="ClickClick ModalMediapartnerCompanyLink" target="_blank" href="'.$mediapartner[1].'">Visit Company Website <i class="fa fa-angle-double-right"></i></a>
		
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				   if ($links[$s] != ''){
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					$output .='<p id="'.$mediapartner[4].'_'.$types.'" class="ClickClick SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
				   }
					   $s++;
			         }
				}
				unset($link_types);
				unset($links);
		  }	   
		
          $output .='<div id="'.$mediapartner[4].'_Bio" class="ClickClick ModalMediapartnerBio RobotoText"> '.$mediapartner[3].'</div>';

  $output .='</form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$mediapartner[0].' Modal --> ';			
						
						 


} //if mediapartner[0] != -55

		echo $output; 
		 
	}//foreach content ends
		} //if isset content ends
?>

<!-- Start of Async HubSpot Analytics Code --> 
<script type="text/javascript">
    (function(d,s,i,r) {
      if (d.getElementById(i)){return;}
      var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
      n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/412210.js';
      e.parentNode.insertBefore(n, e);
    })(document,"script","hs-analytics",300000);
  </script> 
<!-- End of Async HubSpot Analytics Code -->
	
</body>
</html>