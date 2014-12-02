<?php 
	function __autoload($class) {
	if (file_exists('controllers/' . $class . '.php'))  {
		include_once ('controllers/' . $class . '.php');
	}
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="author" content="Develped by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe 2014 | Europe's #1 Conference on the Future of HR</title>

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


<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/speakers.css" />

<!-- TESTIMONIALS FADE-IN FADE-OUT -->
<script src="js/testimonials-fadein-fadeout.js"></script>

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Drag & Drop -->
<!-- This needs jquery ui-->
<script src="js/draganddrop.js"></script>

<!-- Include Revoultion Slider -->
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/extralayers.css" media="screen" />
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/settings.css" media="screen" />
<script type="text/javascript" src="vendor/SliderRevolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="vendor/SliderRevolution/js/jquery.themepunch.revolution.min.js"></script>
<style type="text/css"></style>
</head>
<body>
<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
    <!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" href="index"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index" >Home</a>
        <div class="NavmenuDivider"></div>
        <a class="ActiveNavmenuItem" href="speakers">Speakers</a>
        <div class="NavmenuDivider"></div>
        <a href="agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <a href="contact">Get in Touch</a> </div>
      <div id="DesktopSocialHeader"> <a target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png" alt=""></a> <a target="_blank" href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png" alt=""></a> <a target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png" alt=""></a> <a target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157637120744503/"><img src="img/header-flickr.png" alt=""></a> <a target="_blank"  href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png" alt=""></a> <a href="tickets">
        <div id="HeaderGetTicketsButton">GET TICKETS</div>
        </a> </div>
    </nav>
    
    <!--END DESKTOP Navigation Menu--> 
    <!-- Mobile Navigation Menu-->
    <div id="MobileNavigation"> <img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-mobile-logo.png"> <a onclick="location.href='#top'"  role="button" class="right-off-canvas-toggle smoothScroll"><i class="fa fa-bars"></i></a> </div>
    <nav id="RightsideMobileNavigation" class="right-off-canvas-menu">
      <ul>
        <li> <a href="index" class="MobileNavigationMenuItem">Home</a></li>
        <li> <a href="tickets" >Tickets</a></li>
        <li> <a  class="ActiveNavmenuItem" href="speakers">Speakers</a></li>
        <li> <a href="agenda" >Agenda</a></li>
        <li> <a href="contact" >Get in Touch</a></li>
      </ul>
    </nav>
    
    <!-- END Mobile Navigation Menu--> 
    
    <!-- STICKY SOCIAL ICON SIDEBAR
    <div id="StickySocialIconSidebar"> <a href="https://www.facebook.com/hrtecheu" target="_blank">
      <div class="StickySocialIcon StickyFacebookIcon"><i class="fa fa-facebook"></i></div>
      </a> <a href="https://twitter.com/hrtecheurope" target="_blank">
      <div class="StickySocialIcon StickyTwitterIcon"><i class="fa fa-twitter"></i></div>
      </a> <a href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about" target="_blank">
      <div class="StickySocialIcon StickyLinkedinIcon"><i class="fa fa-linkedin"></i></div>
      </a> <a href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/" target="_blank">
      <div class="StickySocialIcon StickyFlickrIcon"><img src="img/StickyFlickrIcon.png" alt=""></div>
      </a> <a href="http://www.slideshare.net/hrtecheurope" target="_blank">
      <div class="StickySocialIcon StickySlideshareIcon"><img src="img/StickySlideshareIcon.png" alt=""></div>
      </a> </div>
     END STICKY SOCIAL ICON SIDEBAR --> 
    
    <!-- SLIDESHOW -->
    
    <div class="tp-banner-container" >
      <div class="tp-banner" >
        <ul>
          <!-- SLIDE  -->
          <li data-transition="fade" data-slotamount="7" data-masterspeed="500"   data-saveperformance="on"  data-title="Rachel Botsman"> 
            <!-- MAIN IMAGE --> 
            <img src="img/slides/rachel-slide.png"  alt="Rachel Botsman" data-lazyload="img/slides/rachel-slide.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
            
          </li>
          <!-- SLIDE  -->
          <li data-transition="fade" data-slotamount="7" data-masterspeed="500"   data-title="Peter Hinssen"> 
            <!-- MAIN IMAGE --> 
            <img src="img/slides/hinsen-slide.png" alt="Peter Hinssen" data-lazyload="img/slides/hinsen-slide.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> </li>
          
          <!-- SLIDE  -->
          <li data-transition="fade" data-slotamount="7" data-masterspeed="500"   data-title="Costas Markides"> 
            <!-- MAIN IMAGE --> 
            <img src="img/slides/costas-slide.png"  alt="3dbg" data-lazyload="img/slides/costas-slide.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
            
          </li>
          <!-- SLIDE  -->
          
        </ul>
        <div class="tp-bannertimer"></div>
      </div>
    </div>
    <script type="text/javascript">

				jQuery(document).ready(function() {
				
								
					jQuery('.tp-banner').show().revolution(
					
					{
						dottedOverlay:"none",
						delay:16000,
						startwidth:1920,
						startheight:405,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"preview1",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						swipe_velocity: 0.7,
						swipe_min_touches: 1,
						swipe_max_touches: 1,
						drag_block_vertical: false,
												
					
												
						keyboardNavigation:"off",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

						spinner:"spinner4",
						
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",
						
						autoHeight:"off",						
						forceFullWidth:"off",						
												
												
							
						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,						
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						
					});
							
					
									
				});	
				
			</script> 
    
    <!-- END REVOLUTION SLIDER --> 
    
    <!-- END SLIDESHOW --> 
      <a href="new.php">
        <div id="HeaderGetTicketsButton">New Speakers</div>
        </a> </div>
    <!--MAIN CONTENT -->
    <h1 id="SpeakerHeadline">Speakers</h1>
    <section id="Speakers"> 
      	<?php
		$speakers = new speakers_main();
		$content = $speakers->speakers();
		  /*
		  
		 				$content[$i][0] = Speaker name
		  				$content[$i][1] = Speaker Title
						$content[$i][2] = Speaker Bio important
						$content[$i][3] = Speaker Bio
						$content[$i][4] = Speaker modal tag
						
						$content[$i][5] = Link type
						$content[$i][6] = Link URL

						$content[$i][7] = Company name
						$content[$i][8] = Company URL
						$content[$i][9] = Company Bio

						$content[$i][10] = Picture name
						$content[$i][11] = Picture URL
						
						
						$content[$i][12] = Agenda Title
						$content[$i][13] = Agenda Starts
						$content[$i][14] = Agenda Ends
						$content[$i][15] = Agebda Abstract
						$content[$i][16] = Agenda Day
						$content[$i][17] = Agenda Location
						$content[$i][18] = Speakers id
		  */
		if (isset($content)) {
		 foreach ($content as $speaker) {
			 
			 if (!isset($speaker[0])){
				 $speaker[0] = '';
			 }
			 if (!isset($speaker[1])){
				 $speaker[1] = '';
			 }

			 if (!isset($speaker[2])){
				 $speaker[2] = '';
			 }
			 if (!isset($speaker[3])){
				 $speaker[3] = '';
			 }

			 if (!isset($speaker[4])){
				 $speaker[4] = '';
			 }
			 
			 if (!isset($speaker[7])){
				 $speaker[7] = '';
			 }

			 if (!isset($speaker[8])){
				 $speaker[8] = '';
			 }
			 if (!isset($speaker[9])){
				 $speaker[9] = '';
			 }
			 
			 if (!isset($speaker[12])){
				 $speaker[12] = '';
			 }
			 
			 if (!isset($speaker[13])){
				 $speaker[13] = '';
			 }

			 if (!isset($speaker[14])){
				 $speaker[14] = '';
			 }
			 if (!isset($speaker[15])){
				 $speaker[15] = '';
			 }
			 
			 if (!isset($speaker[16])){
				 $speaker[16] = '';
			 }
			 if (!isset($speaker[17])){
				 $speaker[17] = '';
			 }
			 
			 if (!isset($speaker[18])){
				 $speaker[18] = '';
			 }
			 
			$output = '<div id="'.$speaker[18].'"><!-- '.$speaker[0].' Speakergrid--> 
      <a data-toggle="modal" data-target="#'.$speaker[4].'" href="#">
      <div class="Speaker">';
	  if (isset($speaker[11])) {
		  $output .= '<div class="SpeakerPhoto" style="background-image:url(img/speakers/'.$speaker[11].');">';
	  } else {
				    $output .= '<div class="SpeakerPhoto">';
			  }
       
         $output .='<div class="EventDetails">
            <p class="EventTitle">'.$speaker[12].'</p>
            <p class="EventDay">DAY '.$speaker[16].'</p>
            <p class="EventLocation">'.$speaker[17].'</p>
            <p class="EventTime">'.$speaker[13].' - '.$speaker[14].'</p>
          </div>
        </div>
        <div class="SpeakerInfo">
          <p class="SpeakerName OswaldText HRNBlue">'.$speaker[0].'</p>
          <p class="SpeakerCompanyName RobotoText">'.$speaker[7].'</p>
        </div>
      </div>
      </a> 
      <!-- end '.$speaker[0].' Speakergrid --></div> ';
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
		 }
	} 

	   ?>
    </section>
    <!--END MAIN CONTENT-->
 
    <div class="colors-wrapper">
      <div class="columns colored-stripe red" ></div>
      <div class="columns colored-stripe blue" ></div>
      <div class="columns colored-stripe yellow" ></div>
      <div class="columns colored-stripe green" ></div>
    </div>
    <!--END NEWSLETTER FORM --> 
    <!--BLACKFOOTER-->
    <div id="blackfooter">
      <div class="row" >
        <div class="large-3 medium-3 small-12 columns" id="follow-us">
          <div id="follow-us-container">
            <p class="blackfooter-element-title">Follow us</p>
            <a href="https://www.facebook.com/hrtecheu" target="_blank">
            <div class="large-3 small-3 column" id="facebook"> </div>
            </a> <a href="https://twitter.com/hrtecheurope" target="_blank">
            <div class="large-3  small-3 column" id="twitter"> </div>
            </a> <a href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about" target="_blank">
            <div class="large-3  small-3 column" id="linkedin"> </div>
            </a> <a href="https://www.flickr.com/photos/71007493@N05/" target="_blank">
            <div class="large-3  small-3 column" id="flickr"> </div>
            </a> </div>
        </div>
        <div class="large-3 medium-3 small-12 columns" id="general-inquiries">
          <div id="general-inquiries-container">
            <p class="blackfooter-element-title">General Inquiries</p>
            <p class="blackfooter-text"><i class="fa fa-phone"></i>+36 1 201 1469<br>
              UK +44 20 34 689 689<br>
              <i class="fa fa-envelope"></i>hrn@hrneurope.com</p>
          </div>
        </div>
        <div class="large-3 medium-3 small-12 columns" id="sponsorship">
          <div id="sponsorship-container">
            <p class="blackfooter-element-title">Sponsorship</p>
            <p class="blackfooter-text"><i class="fa fa-phone"></i>+36 1 201 1469<br>
              UK +44 20 34 689 689<br>
              <i class="fa fa-envelope"></i>sponsor@hrneurope.com</p>
          </div>
        </div>
        <div class="large-3 medium-3 small-12 columns" id="download-brochure">
          <div id="download-brochure-container"> <img src="img/download-divider.png" alt="divider"><br>
            <a href="#" data-reveal-id="DownloadPDFModal" >
            <div id="download-button">Download Brochure</div>
            </a> </div>
          <div id="DownloadPDFModal" class="reveal-modal" data-reveal>
            <h2>Download Brochure</h2>
            <p>Thank you for downloading our brochure! Please fill out the form below to get the download link.</p>
            <form action="http://hrneurope.us4.list-manage.com/subscribe/post?u=c03cb8f11b1f34771fdd1747c&amp;id=acc85bbd71" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate ContactForm" target="_blank" novalidate>
              <div class="row">
                <div class="large-6 column">
                  <input type="text" value="" name="NAME" class="" placeholder="First Name" id="mce-NAME">
                </div>
                <div class="large-6 column">
                  <input type="text" value="" name="NAME" class="" placeholder="Surname" id="mce-LASTNAME">
                </div>
              </div>
              <div class="row">
                <div class="large-12 column">
                  <input type="email" value="" name="EMAIL" class="required email" placeholder="Email Address" id="mce-EMAIL">
                  <input type="text" value="" name="PHONE" class="" placeholder="Phone Number" id="mce-PHONE">
                  <input type="text" value="" name="COMPANY" class="" placeholder="Company" id="mce-COMPANY">
                  <input style="display:none;" type="text" value="DownloadBrochureForm" name="SORUCE" class="" id="mce-SORUCE">
                  <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div>
                  <!-- Robot Trap-->
                  <div style="position: absolute; left: -5000px;">
                    <input type="text" name="b_c03cb8f11b1f34771fdd1747c_acc85bbd71" tabindex="-1" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="large-12 column">
                  <input type="submit" value="Download PDF Brochure" name="subscribe" id="mc-embedded-subscribe" class="button ContactFormSubscribeButton RobotoText">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!--END BLACKFOOTER--> 
    <!--GREYFOOTER-->
    <div id="greyfooter-container">
      <div class="row">
        <div class="large-4 medium-4 small-12 columns" id="footer-hrtech-logo">
          <div id="footer-hrtech-logo-container"> <img src="img/footer-hrtogo.png" alt="hrtech logo"> </div>
        </div>
        <div class="large-4 medium-4 small-12 columns" id="copyright">
          <div id="copyright-container">
            <p class="greyfooter-text">Copyright © 2014 HRN Europe. All Rights Reserved.</p>
          </div>
        </div>
        <div class="large-4 medium-4 small-12 columns" id="terms">
          <div id="terms-container">
            <p class="greyfooter-text">Terms and Conditions</p>
          </div>
        </div>
      </div>
    </div>
    
    <!--END GREYFOOTER--> 
    
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
		  /*
		  
		 				$content[$i][0] = Speaker name
		  				$content[$i][1] = Speaker Title
						$content[$i][2] = Speaker Bio important
						$content[$i][3] = Speaker Bio
						$content[$i][4] = Speaker modal tag
						
						$content[$i][5] = Link type
						$content[$i][6] = Link URL

						$content[$i][7] = Company name
						$content[$i][8] = Company URL
						$content[$i][9] = Company Bio

						$content[$i][10] = Picture name
						$content[$i][11] = Picture URL
		  */
		if (isset($content)) {
		 foreach ($content as $speaker) {
			 if (isset($speaker[6])){
				  $links = explode(';',$speaker[6]);
			      $link_types = explode(';',$speaker[5]);
			 }
			 
			 if (!isset($speaker[0])){
				 $speaker[0] = '';
			 }
			 if (!isset($speaker[1])){
				 $speaker[1] = '';
			 }

			 if (!isset($speaker[2])){
				 $speaker[2] = '';
			 }
			 if (!isset($speaker[3])){
				 $speaker[3] = '';
			 }

			 if (!isset($speaker[4])){
				 $speaker[4] = '';
			 }
			 
			 if (!isset($speaker[7])){
				 $speaker[7] = '';
			 }

			 if (!isset($speaker[8])){
				 $speaker[8] = '';
			 }
			 if (!isset($speaker[9])){
				 $speaker[9] = '';
			 }
			 			 
			$output = '<!-- Peter Hinssen Modal -->
<div class="modal fade" id="'.$speaker[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($speaker[11])) {
		  $output .= '<div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/'.$speaker[11].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
        
       $output .='<div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">'.$speaker[0].'</p>
          <p class="ModalSpeakerJobtitle RobotoText">'.$speaker[1].'</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="'.$speaker[8].'">'.$speaker[7].'</a></p>
          <div class="ModalDivider"></div>';
		  $s = 0;
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				    $output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					   $s++;
			         }

				}
				unset($link_types);
				unset($links);
		  }

          $output .='<p class="ModalSpeakerBio RobotoText"><span class="ModalSpeakerBioHighlight OswaldText">'.$speaker[2].'</span> '.$speaker[3].'</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$speaker[0].' Modal --> ';
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
	}
		}?>


<!-- Peter Hinssen Modal -->
<div class="modal fade" id="HinssenP" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/HinssenP.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Peter Hinssen</p>
          <p class="ModalSpeakerJobtitle RobotoText">Chairman &amp; Co-Founder</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://nexxworks.be/">nexxworks</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://www.linkedin.com/in/phinssen" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText"><span class="ModalSpeakerBioHighlight OswaldText">Peter is one of Europe’s thought leaders on disruptive innovation. He is obsessed with networks as the most fundamental driver of progress. He wrote about them in ‘The Networks Always Wins’. He speaks passionately about them in his keynotes. And he has founded nexxworks to help organisations survive and leverage them.</span> “Digital is just the start”, says Peter Hinssen, co-founder and chairman of nexxworks. “We are on the eve of a ‘disruptive innovation’ revolution which is powered by networks. Technology has made sure that everything is permanently connected and this has completely transformed our behaviour. And I mean everyone’s behaviour, not just that of the digital natives. That’s because information flows faster in networks and innovation happens faster – and, above all, cheaper – there. Today, every young (wo)man with a great idea and very little start-up capital can disrupt an entire industry. Networks are the reason that our society is evolving from a hierarchy to a meritocracy or that we share more and more with one another, without having to end up with less. This has enormous consequences for companies that need to learn how to function as a network themselves.”</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Peter Hinssen Modal --> 
<!-- Costas Markides Modal -->
<div class="modal fade" id="MarkidesC" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/MarkidesC.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Costas Markides</p>
          <p class="ModalSpeakerJobtitle RobotoText">Professor of Strategy and Entrepreneurship</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.london.edu/">London Business School</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"></p>
          <p class="ModalSpeakerBio RobotoText"><span class="ModalSpeakerBioHighlight OswaldText">Costas Markides is Professor of Strategy and Entrepreneurship and holds the Robert P. Bauman Chair of Strategic Leadership at the London Business School (University of London).  A native of Cyprus, he received his BA (Distinction) and MA (1984) in Economics from Boston University, and his MBA (1985) and DBA (1990) from the Harvard Business School. </span> <br>
            He serves on the Editorial Boards of several academic journals including the Strategic Management Journal, the Academy of Management Journal, the Academy of Management Perspectives, the Sloan Management Review and the European Management Journal.  He is a member of the Academy of Management and the Strategic Management Society and serves on the Board of Directors of the Strategic Management Society. He was a participant at the World Economic Forum in Davos during 1999-2003 and in 2012-2013.<br>
            <br>
            He has done research and published in the top academic journals on the topics of diversification, strategic innovation, business-model innovation and international acquisitions.  His book: All the Right Moves: A Guide to Crafting Breakthrough Strategy was published by Harvard Business School Press in 2000 and was shortlisted for the Igor Ansoff Strategic Management Award in 2000 as the best strategy book of the past two years.  His next book (with Paul Geroski), entitled Fast Second: How Smart Companies Bypass Radical Innovation to Enter and Dominate New Markets was published in January 2005 and was on the Short List of the Financial Times-Goldman Sachs Management Book of the Year in 2005.  His latest book was entitled: Game-Changing Strategies: How to Create new Market Space in Established Industries by Breaking the Rules and was published by Jossey-Bass in June 2008.  He is currently working on his new book (with Anita McGahan) provisionally entitled: Architects of Change: How ordinary people bring about social change.<br>
            <br>
            His current research interests include the management of business model innovation and the use of innovation and creativity to achieve strategic breakthroughs. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end SAMPLE Modal --> 
<!-- Rachel Botsman Modal -->
<div class="modal fade" id="BotsmanR" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/BotsmanR.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Rachel Botsman</p>
          <p class="ModalSpeakerJobtitle RobotoText">Entrepreneur</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.rachelbotsman.com/">www.rachelbotsman.com</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"></p>
          <p class="ModalSpeakerBio RobotoText"><span class="ModalSpeakerBioHighlight OswaldText">Rachel Botsman is a global thought leader on the power of collaboration through technology to transform the way we live, work and consume. She has inspired a new economy with her influential book What's Mine is Yours: How Collaborative Consumption Is Changing The Way We Live. TIME Magazine recently called Collaborative Consumption one of the '10 Ideas That Will Change The World'. </span> Rachel is the founder of Collaborative Lab, the leading source of expertise for companies and governments that want to embrace the collaborative economy to revolutionize business and society.<br>
            <br>
            Rachel was recently named a 2013 Young Global Leader by the World Economic Forum, which recognises individuals for their commitment to improving the state of the world. In 2014, she was named by Fast Company as one of the ‘Most Creative People in Business,’ Rachel has presented at high profile events including The Clinton Global Initiative, TED, HP, Google, and No.10 Downing Street and was named by Monocle as one of the top 20 speakers in the world to have at your conference.<br>
            <br>
            Her thought leadership and writings have appeared in Harvard Business Review, The Economist, CNN, New York Times, The Guardian, Fast Company and other publications. Rachel has a monthly future tech trends column in the Australian Financial Review and is a contributing editor to WIRED UK.<br>
            <br>
            Rachel was a founding partner in the Collaborative Fund, an early stage investor in disruptive ventures, and a former director at President Clinton's Foundation. She received her BFA (Honors) from the University of Oxford, and undertook her postgraduate studies at Harvard University. Her work has taken her to every continent, except Antarctica.<br>
            <br>
            “The doyenne of the (Collaborative Consumption) movement.” — Wall Street Journal<br>
            <br>
            “Without buying into the shallow potential of the latest fad, be that Twitter or Facebook, Botsman takes a more intelligent long view of how technology will change the terms on which people live and work.” — Monocle<br>
            <br>
            “A Kevin Bacon, or a central figure, in the growing network of collaborative consumption businesses.” — Fast Company<br>
            <br>
            “Her talk at Microsoft Research both provoked and inspired, setting off an active conversation that continues to this day and world-wide within the company.” — Microsoft Research </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Rachel Botsman Modal --> 
<!-- David Wilson Modal -->
<div class="modal fade" id="WilsonD" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/WilsonD.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">David Wilson</p>
          <p class="ModalSpeakerJobtitle RobotoText">Founder &amp; Managing Director</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.elearnity.com">Elearnity</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="http://www.twitter.com/dwil23" target="_blank"><i class="fa fa-twitter "></i></a><a href="https://www.linkedin.com/in/dwil23" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText"><span class="ModalSpeakerBioHighlight OswaldText">David Wilson is founder and Managing Director of Elearnity, Europe’s leading independent learning and talent analyst. A major commentator on the learning and talent technology industry since its inception, David is a strategic advisor to many major corporate and supplier organisations.</span> David personally leads Elearnity’s Talent research and corporate advisory agenda, and is the author of over 140 research papers and articles on learning and talent technology and innovation, as well as being a leading speaker at major conferences in the UK and Europe.
            With his extensive market knowledge and detailed insight of corporate projects and experiences, David continues to influence the thinking of many of the companies and vendors operating in the market today.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end David Wilson Modal --> 
<!-- Johnny Campbell Modal -->
<div class="modal fade" id="CampbellJ" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/CampbellJ.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Johnny Campbell</p>
          <p class="ModalSpeakerJobtitle RobotoText">Chief Executive Officer</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.socialtalent.co/resources/?page_id=259/">Social Talent</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://www.facebook.com/socialtalent" target="_blank"><i class="fa fa-facebook "></i></a><a href="http://www.twitter.com/socialtalent " target="_blank"><i class="fa fa-twitter "></i></a><a href="http://www.linkedin.com/in/johnnycampbell " target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Johnny is on a mission to turn every recruiter in the world into a "Black Belt in Internet Recruitment", what he describes as the "Chartered Accountancy" of the otherwise professional-less Recruitment sector. Having founded a recruitment agency in the middle of the world's worst recession, Johnny knows from forced experience just how powerful a method of candidate acquisition the web can be. He now runs Social Talent, a company that provides organisations with a scaleable, online learning solution that allows them to roll out his "Black Belt" programme in a consistent, measurable way that still allows each individual user to receive a personalised training journey. He is a regular conference speaker on social media in recruitment, and as CEO of Social Talent, is primarily preoccupied in chasing global domination</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Johnny Campbell Modal --> 
<!-- Jason Averbook Modal -->
<div class="modal fade" id="AverbookJ" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/AverbookJ.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Jason Averbook</p>
          <p class="ModalSpeakerJobtitle RobotoText"></p>
          <p class="ModalSpeakerCompanyName"></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/jasonaverbook" target="_blank"><i class="fa fa-twitter "></i></a><a href="http://www.linkedin.com/in/jasonaverbook" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText"><span class="ModalSpeakerBioHighlight OswaldText">Jason has been named as one of the 10 World's Most Powerful HR Technology Experts.</span>Jason is recognized as one of the top thought leaders in the space of HR and workforce technology and currently holds an executive position with Appirio—one of the fastest growing cloud powered firms in the world. Prior to Appirio, Jason was the chief executive officer of the company he co-founded Knowledge Infusion and held senior positions at both PeopleSoft and Ceridian Corporation.<br>
            Thus far, he has gained 20 years of invaluable experience helping organizations resolve common business problems through the use of technology solutions. As once said about Jason, &#39;He just gets it and can put it into language that we get.&#39;<br>
            <br>
            Jason has been a contributor to Inc., Businessweek, Fortune, The Wall Street Journal, Forbes, CIO Magazine, HR Executive Online, Talent Management Magazine, NPR, SHRM, IHRIM and other well-known publications.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Jason Averbook Modal --> 
<!-- Armin Trost Modal -->
<div class="modal fade" id="TrostA" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/TrostA.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Armin Trost</p>
          <p class="ModalSpeakerJobtitle RobotoText">Professor Dean of MBA Studies</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://en.hs-furtwangen.de/study-programmes/faculty/hfu-business-school.html">HFU Business School Furtwangen</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="http://de.linkedin.com/in/armintrost" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">I am a Professor for Human Resource Management at the Business School of the Furtwangen University (Black Forest) in Germany. My main focus is on talent management and employer branding. Previously, I was a professor at the University of Würzburg. Furthermore, at SAP I was responsible for recruiting worldwide for several years. As partner and co-owner of Promerit AG, since 2006, I advise companies of various sizes and industries successfully on strategic issues concerning human resource management. I'm not only known as the author of numerous specialized articles and books, but also as a trend-setting speaker at well-known conferences. The leading trade magazine in Germany, HR Magazine, has named me as one of the 40 leading minds in HR once again in 2013.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Armin Trost Modal --> 
<!-- Nick Holley Modal -->
<div class="modal fade" id="HolleyN" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/HolleyN.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Nick Holley</p>
          <p class="ModalSpeakerJobtitle RobotoText">Director</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.henley.ac.uk">Henley Business School</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://www.linkedin.com/in/nickholley" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Nick has been involved in creating and managing large scale organisational change, leadership and people development programmes and performance and talent management processes and systems but his real expertise lies in embedding them in day to day operations. Most organisations have great strategies but fail to deliver them. Nick understands the theory but combines this with a proven ability to deliver and sustain them in highly complex organisations.<br>
            <br>
            As Director of Henley Business School’s HR Centre of Excellence Nick has worked with organisations including Barclays, BAT, B&Q, Bestseller, BT, Cadbury Schweppes, Canon, Centrica, Daimler, Danone, GSK, Imperial, Inchcape, KPMG, Microsoft, Ministry of Justice, Nationwide, Nestle, NHS, Oracle, Oxfam, Panasonic, RBS, Royal Mail, Sainsburys, Shell, Siemens, Smiths, Travelport, Unilever Vodafone and Willmott Dixon to advance current thinking around HR.  He has recently carried out research on employee engagement, HR careers, HR in the recession and recovery, HR leadership, HR organizational models and talent management.  He is programme director for the Advanced HR Business Partner Programme.<br>
            <br>
            Nick is also a consulting partner of Dave Ulrich’s RBL Group, a faculty member of Duke CE (ranked by the FT the number one provider of executive education) and a member of the editorial advisory panel of Personnel Today for whom he judged their HR Awards in 2007-10.  He was voted the 5th most influential thinker in HR by Human Resource Magazine in 2010.  Nick holds an M.A. from Cambridge University and an MBA from London Business School.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Nick Holley Modal --> 
<!-- Euan Semple Modal -->
<div class="modal fade" id="SempleE" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/SempleE.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Euan Semple</p>
          <p class="ModalSpeakerJobtitle RobotoText">World of Work Authority</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://euansemple.com">EuanSemple.com</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="http://uk.linkedin.com/in/euansemple" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Euan Semple is a social media evangelist and is one of the few people in the world who can turn the complex world of social networking into something we can all understand. And, at the same time, learn how to get the most from it. This world is changing fast, but he makes sense of it because he understands that the core basics remain the same: community, learning, interaction. He is a master story-teller who offers a host of practical tales about how this new world can work for humans. Assuming, you are one.<br>
            <br>
            12 years ago, while working as senior director for the BBC, he was one of the first to introduce what have since become known as social media tools into a large, successful organisation. He has subsequently had six years of unparalleled experience working with organisations such as BP, The World Bank and NATO to help them try to do the same.<br>
            <br>
            Euan is quite simply an inspirational speaker and one of the few people who makes the world of social networking and technology approaches to innovation, knowledge and community accessible to anyone. He is highly connected to the most influential movers and shakers. He is one of the few senior directors in the world who has direct experience of how to make social media work inside a large complex organisation. He is author of this year’s bestselling book: Organisation’s Don’t Tweet, People Do. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Euan Semple Modal --> 
<!-- Victoria Sorzano Modal -->
<div class="modal fade" id="SorzanoV" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/SorzanoV.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Victoria Sorzano</p>
          <p class="ModalSpeakerJobtitle RobotoText">Interactive editor, Future Media</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://digitalwitchnorth.com">BBC</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/vicsorzano" target="_blank"><i class="fa fa-twitter "></i></a><a href="http://www.linkedin.com/pub/victoria-sorzano/15/687/187" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Victoria Sorzano is a digital media professional specialising in content curation and creative projects. In 2013 she launched bespoke BBC content on Connected Red Button and she continues to oversee delivery of the BBC’s broadcast and connected Red Button service, used by 15m people a week. Victoria previously played a key role launching three BBC homepages, Sky’s digital text service and Sky Active’s interactive TV channels. She speaks and blogs on women in digital media and is founder of the BBC Women in Technology network. She has appeared on television and radio in the UK and US and is a former radio presenter. Victoria has also written and edited best-selling books for Dorling Kindersley publishers.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Victoria Sorzano Modal --> 
<!-- Matt Gallop Modal -->
<div class="modal fade" id="GallopM" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/GallopM.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Matt Gallop</p>
          <p class="ModalSpeakerJobtitle RobotoText">Associate Producer BBC Learning</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.bbc.co.uk/iwonder">BBC</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/MattGallop" target="_blank"><i class="fa fa-twitter "></i></a><a href="http://www.linkedin.com/pub/matt-gallop/31/86a/199" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Matt has worked in the education and events sector for many years, spending 5 years teaching in secondary schools in the UK. Since joining the BBC in 2008 he has worked on many projects, highlights of which include producing a live schools broadcast with Brian Cox as part of Stargazing LIVE! and introducing the BBC Science Zone to the annual Cheltenham Science Festival. He is interested in how new technology can be used to enhance learning and works with Howard Baker as part of the BBC Learning Innovations team. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Matt Gallop Modal --> 
<!-- Fiona Leteney Modal -->
<div class="modal fade" id="LeteneyF" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/LeteneyF.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Fiona Leteney</p>
          <p class="ModalSpeakerJobtitle RobotoText">Global Learning Technology Services Manager </p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.bupa.com">Bupa</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/fionaleteney" target="_blank"><i class="fa fa-twitter "></i></a><a href="http://uk.linkedin.com/pub/fiona-leteney/0/636/39b" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">With over 15 years' experience in the e-learning industry Fiona is passionate about Learning Technologies. Currently, Fiona is the Global Learning Technology Services Manager at Bupa. Her purpose is to operate, develop and enhance Bupa’s global learning technology service in line with its learning and development priorities. She provides subject matter expertise on learning technology solutions while leading the facilitation of global learning technology changes, upgrades and implementations. Before working at Bupa, Fiona created e-learning strategies and implemented Learning Management Systems for numerous multinationals, government departments, academic institutions and small businesses. Fiona has written a regular column on e-learning standards for 'e-learning age' magazine since 2005.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Fiona Leteney Modal --> 
<!-- Lori Sawyer Jenson Modal -->
<div class="modal fade" id="SawyerJensonL" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/SawyerJensonL.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Lori Sawyer Jenson</p>
          <p class="ModalSpeakerJobtitle RobotoText">Head of HR Excellence &amp; Tranformation</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.arlafoods.com">Arla Foods Amba</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://www.linkedin.com/pub/lori-sawyer-jenson/1/10/ab7" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Lori has worked in the service delivery and HR Transformation environments for nearly 20 years. She has spent most of her career in global roles, and has primarily worked out of Europe, supporting a number of multi-national HR implementations. Lori has worked in the outsourcing industry as Head of HR Service Delivery for a number of clients, as well as being responsible for consulting and Client Services for large-scale client implementations. In addition, Lori has also supported and led internal HR transformations, including her current role at Arla Foods, where she is the Head of HR Excellence & Transformation. Lori’s background gives her a unique understanding of the complexities of an HR transformation both from the internal customer’s perspective, as well as from the vendor’s perspective and what it requires to sucessfully support a customer’s HR transformation. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Lori Sawyer Jenson Modal --> 
<!-- Lee Bryant Modal -->
<div class="modal fade" id="BryantL" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/BryantL.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Lee Bryant</p>
          <p class="ModalSpeakerJobtitle RobotoText">Director</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.postshift.com">POST*SHIFT</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/leebryant" target="_blank"><i class="fa fa-twitter "></i></a><a href="https://uk.linkedin.com/in/leebryant/" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Lee Bryant is passionate about using social technology to put humans front and centre of the way we do things in the Twenty-First Century. He has been playing with words and computers since the age of 10, but it was in the mid-1990s, whilst working in international politics and diplomacy, that he discovered the immense power of the internet to influence and orchestrate change. He believes social networks, not bureaucracies, are the organising principle of the current era, and is excited about further exploring new forms of highly connected organisations. After running a web agency focused on knowledge sharing for 6 years, he co-founded Headshift in 2002 to investigate new uses for social technology inside companies and organisations, which was acquired by Dachis Group in 2009. In 2013, he co-founded a new company, POST*SHIFT, dedicated to exploring the intersection between new social technologies and new thinking on organisational structure and culture. An accomplished speaker, Lee has delivered many keynotes, workshops and talks around the world at conferences, events and private corporate events.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Lee Bryant Modal --> 
<!-- Barbara Becker Modal -->
<div class="modal fade" id="BeckerB" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/BeckerB.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Barbara Becker</p>
          <p class="ModalSpeakerJobtitle RobotoText">Chief Human Resources Officer (CHRO)</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://careers.barry-callebaut.com/">Barry Callebaut AG</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="http://ch.linkedin.com/pub/barbara-koch-becker/68/545/439" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText"></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Barbara Becker Modal --> 
<!-- Paul Thomas Modal -->
<div class="modal fade" id="ThomasP" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/ThomasP.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Paul Thomas</p>
          <p class="ModalSpeakerJobtitle RobotoText">Senior Manager Digital Comunications and Social Media</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.grant-thornton.co.uk">Grant Thornton UK LLP</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/tallpaul75" target="_blank"><i class="fa fa-twitter "></i></a><a href="http://uk.linkedin.com/in/paulsthomas" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Paul is an online communications specialist currently working on Grant Thornton UK LLP’s digital and social media strategy, looking at the role of social media both inside and outside of the organisation. He has a keen interest in all aspects of communications, but a passion for challenging the way we work and the tools we use along the way. This has led to a broader consultancy role within Grant Thornton, helping individuals, teams and even clients explore the possibilities presented by an increasingly online world.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Paul Thomas Modal --> 
<!-- Joachim Heinz Modal -->
<div class="modal fade" id="HeinzJ" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/HeinzJ.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Joachim Heinz</p>
          <p class="ModalSpeakerJobtitle RobotoText">Lead Team Social Business</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.bosch.com">Bosch</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/joachimheinz" target="_blank"><i class="fa fa-twitter "></i></a><a href="http://de.linkedin.com/in/joachimheinz" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Since 2012 Joachim is part of the lead team for the strategic social business program at Bosch, a global manufacturing company with 280.000 associates and +280 plants. The #socbiz experiences of Joachim are based on a 13year daily usage and multiple implementations in different companies. Joachim invites you to follow him <a href="https://twitter.com/joachimheinz" target="_blank">@joachimheinz</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Joachim Heinz Modal --> 
<!-- Daiga Ergle Modal -->
<div class="modal fade" id="ErgleD" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/ErgleD.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Daiga Ergle</p>
          <p class="ModalSpeakerJobtitle RobotoText">Senior Vice President Human Resources</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.airbaltic.com">airBaltic Corporation</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://twitter.com/daigaergle" target="_blank"><i class="fa fa-twitter "></i></a><a href="https://www.linkedin.com/profile/view?id=8261982&trk=nav_responsive_tab_profile" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Since 2010 – Senior Vice President Human Resources for airBaltic Corporation (airline industry). In paralell, since 2011 – HR Consultant for Coaliton Rewards (coaliton loyalty marketing company, owner of awards winning PINS brand). Since 2008 – HRM professor in MBA programme at Riga Business School. Prior experience in Executive Search, HR Consulting, Human Resources Management. Currently pursuing doctoral studies at University of Latvia, faculty of Economics.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Daiga Ergle Modal --> 
<!-- Dana Leeson Modal 
<div class="modal fade" id="LeesonD" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
          <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/LeesonD.jpg)"></div>
            <div class="ModalSpeakerBioContainer">
            <p class="ModalSpeakerName OswaldText">Dana Leeson</p>
            <p class="ModalSpeakerJobtitle RobotoText"></p>
            <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www..com"></a></p>
            <div class="ModalDivider"></div>
            <p class="SocialIcons"></p> 
        <p class="ModalSpeakerBio RobotoText"></p>
            </div>
      </div>
    </div>
  </div>
</div>  
<!-- end Dana Leeson Modal --> 
<!-- Baris Findik Modal -->
<div class="modal fade" id="FindikB" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/AvatarM.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Baris Findik</p>
          <p class="ModalSpeakerJobtitle RobotoText">Information &amp; Communications Technologies, Enterprise Solutions Director</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.turkcell.com.tr">Turkcell</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://www.linkedin.com/pub/bar%C4%B1%C5%9F-f%C4%B1nd%C4%B1k/28/ab9/52b" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText"></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Baris Findik Modal --> 
<!-- Tulay Cerit Modal -->
<div class="modal fade" id="CeritT" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/CeritT.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Tulay Cerit</p>
          <p class="ModalSpeakerJobtitle RobotoText">HR Center of Excellence Director</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.turkcell.com.tr">Turkcell</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://www.linkedin.com/in/tulaycerit" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText"></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Tulay Cerit Modal --> 
<!-- David Flaherty Modal -->
<div class="modal fade" id="FlahertyD" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/FlahertyD.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">David Flaherty</p>
          <p class="ModalSpeakerJobtitle RobotoText">VP, Global Total Rewards, HRIS and People Analytics</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.aes.com">The AES Corporation</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="http://www.linkedin.com/profile/view?id=21346053&authType=NAME_SEARCH&authToken=qRbA&locale=en_US&srchid=213460531396173793921&srchindex=1&srchtotal=1&trk=vsrp_people_res_name&trkInfo=VSRPsearchId%3A213460531396173793921%2CVSRPtargetId%3A21346053%2CVSRPcmpt%3Aprimary" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText">Dave Flaherty joined AES in November 2011 as Head of Executive Compensation. He currently serves as VP, Global Total Rewards, HRIS and People Analytics, which includes executive compensation, employee compensation, benefits, HR systems and HR data analytics. His focus is on compensation and benefit plan alignment, re-engineering HR systems and processes, and understanding the drivers underlying people’s behavior. Prior to joining AES, Dave spent 13 years with Towers Watson (formerly Towers Perrin) in the firm’s executive compensation practice. During this time, Dave advised Compensation Committees and executive management on a range of executive and employee compensation issues. He was appointed a Principal of Towers Perrin in 2009. Dave graduated from Carleton College in Northfield, MN with a B.A. in Economics.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end David Flaherty Modal --> 
<!-- Oliver Kasper Modal -->
<div class="modal fade" id="KasperO" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>
        <div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/KasperO.jpg)"></div>
        <div class="ModalSpeakerBioContainer">
          <p class="ModalSpeakerName OswaldText">Oliver Kasper</p>
          <p class="ModalSpeakerJobtitle RobotoText">Head HR Systems Program</p>
          <p class="ModalSpeakerCompanyName"><a class="ModalSpeakerCompanyLink" target="_blank" href="http://www.swarovski.com">SWAROVSKI CORPORATION AG</a></p>
          <div class="ModalDivider"></div>
          <p class="SocialIcons"><a href="https://www.linkedin.com/profile/view?id=10004200&authType=NAME_SEARCH&authToken=Br5q&locale=en_US&srchid=100042001414441141115&srchindex=1&srchtotal=7&trk=vsrp_people_res_name&trkInfo=VSRPsearchId%3A100042001414441141115%2CVSRPtargetId%3A10004200%2CVSRPcmpt%3Aprimary" target="_blank"><i class="fa fa-linkedin "></i></a></p>
          <p class="ModalSpeakerBio RobotoText"></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Oliver Kasper Modal --> 
<!-- END MODALS -->

</body>
</html>
