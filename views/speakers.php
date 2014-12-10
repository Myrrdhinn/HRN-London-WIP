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

<?php 
  if(isset($_SESSION['admin'])) {
	echo '<!-- This needs jquery ui-->
<script src="js/draganddrop.js"></script>';  
  }
?>


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
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" href="index"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index.php" >Home</a>
        <div class="NavmenuDivider"></div>
        <a class="ActiveNavmenuItem" href="index.php?q=speakers">Speakers</a>
        <div class="NavmenuDivider"></div>
        <a href="index.php?q=agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <a href="index.php?q=contact">Get in Touch</a> </div>
      <div id="DesktopSocialHeader"> <a target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png" alt=""></a> <a target="_blank" href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png" alt=""></a> <a target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png" alt=""></a> <a target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157637120744503/"><img src="img/header-flickr.png" alt=""></a> <a target="_blank"  href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png" alt=""></a> <a href="index.php?q=tickets">
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
      <a href="index.php">
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
						$content[$i][19] = speakers name id;
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
				 $time = '';
			 } else {
				 $time = ' - ';
			 }

			 if (!isset($speaker[14])){
				 $speaker[14] = '';
			 }
			 if (!isset($speaker[15])){
				 $speaker[15] = '';
			 }
			 
			 if (!isset($speaker[16])){
				 $speaker[16] = '';
				 $day = '';
			 } else {
				 $day =  'DAY '.$speaker[16];
			 }
			 
			 if (!isset($speaker[17])){
				 $speaker[17] = '';
			 }
			 
			 if (!isset($speaker[18])){
				 $speaker[18] = '';
			 }
			 $output = '';
			$output .= '<div id="'.$speaker[18].'"><!-- '.$speaker[0].' Speakergrid-->';
			$output .= '<div id="SpeakerDel_'.$speaker[18].'" class="SpeakerDelete">X</div>';
     $output.= '<a data-toggle="modal" data-target="#'.$speaker[4].'" href="#">
      <div class="Speaker">';
	  if (isset($speaker[11])) {
		  $output .= '<div class="SpeakerPhoto" style="background-image:url(img/speakers/'.$speaker[11].');">';
	  } else {
				    $output .= '<div class="SpeakerPhoto">';
			  }
       
         $output .='<div class="EventDetails">
            <p class="EventTitle">'.$speaker[12].'</p>
            <p class="EventDay">'.$day.'</p>
            <p class="EventLocation">'.$speaker[17].'</p>
            <p class="EventTime">'.$speaker[13].$time.$speaker[14].'</p>
          </div>
        </div>
        <div class="SpeakerInfo">
          <p class="SpeakerName OswaldText HRNBlue">'.$speaker[0].'</p>
          <p class="SpeakerCompanyName RobotoText">'.$speaker[7].'</p>
        </div>
      </div>
      </a>'; 
	   if(isset($_SESSION['admin'])) {
	
       }
	  
      $output .= '<!-- end '.$speaker[0].' Speakergrid --></div> ';
			
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
			 			 
			$output = '<!-- '.$speaker[0].' Modal -->
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
	   <form class="SpeakerModalEdit">
	       <input id="'.$speaker[4].'_SpeakerId" style="display:none;" name="'.$speaker[4].'_SpeakerId" type="text" value="'.$speaker[18].'">
		   <input id="'.$speaker[4].'_SpeakerNameId" style="display:none;" name="'.$speaker[4].'_SpeakerNameId" type="text" value="'.$speaker[19].'">
          <p id="'.$speaker[4].'_Name" class="ClickClick ModalSpeakerName OswaldText">'.$speaker[0].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_NameEdit" style="display:none;" name="'.$speaker[4].'_NameEdit" type="text" value="'.$speaker[0].'">
          <p id="'.$speaker[4].'_Title" class="ClickClick ModalSpeakerJobtitle RobotoText">'.$speaker[1].'</p>
		   <input class="ClickEdit" id="'.$speaker[4].'_TitleEdit" style="display:none;" name="'.$speaker[4].'_TitleEdit" type="text" value="'.$speaker[1].'">
          <p id="'.$speaker[4].'_Company" class="ClickClick ModalSpeakerCompanyLink">'.$speaker[7].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_CompanyEdit" style="display:none;" name="'.$speaker[4].'_CompanyEdit" type="text" value="'.$speaker[7].'">
		  <p id="'.$speaker[4].'_CompanyLink" class="ClickClick ModalSpeakerCompanyLink">'.$speaker[8].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_CompanyLinkEdit" style="display:none;" name="'.$speaker[4].'_CompanyLinkEdit" type="text" value="'.$speaker[8].'">
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					$output .='<p id="'.$speaker[4].'_'.$types.'" class="ClickClick SocialIcons"><a><i class="fa fa-'.$types.' "></i></a></p>'; 
					$output .=' <input class="ClickEdit" id="'.$speaker[4].'_'.$types.'Edit" style="display:none;" name="'.$speaker[4].'_'.$types.'Edit" type="text" value="'.$links[$s].'">';
					   $s++;
			         }

				}
				unset($link_types);
				unset($links);
		  }

		$output .='<p id="'.$speaker[4].'_NewSocialLink" class="ClickClick SocialIcons"><a><i class="fa"></i></a></p>'; 
	    $output .=' <input class="ClickEdit" id="'.$speaker[4].'_NewSocialLinkEdit" style="display:none;" name="'.$speaker[4].'_NewSocialLinkEdit" type="text" value="">';
		
          $output .='<p class="ModalSpeakerBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ClickClick ModalSpeakerBioHighlight OswaldText">'.$speaker[2].' </span></p>
		  <textarea class="ClickEdit" id="'.$speaker[4].'_BioImportantEdit" style="display:none;" name="'.$speaker[4].'_BioImportantEdit" >'.$speaker[2].'</textarea>
		  <p id="'.$speaker[4].'_Bio" class="ClickClick ModalSpeakerBio RobotoText"> '.$speaker[3].'</p>
		  <textarea class="ClickEdit" id="'.$speaker[4].'_BioEdit" style="display:none;" name="'.$speaker[4].'_BioEdit">'.$speaker[3].'</textarea>
		  
		  
		  
		  </form>
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

</body>
</html>
