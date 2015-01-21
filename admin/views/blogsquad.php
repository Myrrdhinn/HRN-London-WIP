<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="author" content="Develped by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe - Blogsquad Edit</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/foundation/foundation.orbit.js"></script>
<script src="js/vendor/modernizr.js"></script>

<!-- Include Bootstrap for BlogsquadsGrid Modals -->
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
<link rel="stylesheet" href="css/blogsquad.css" />

<!-- TESTIMONIALS FADE-IN FADE-OUT -->
<script src="js/testimonials-fadein-fadeout.js"></script>

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Drag & Drop -->

<?php 
  if(isset($_SESSION['admin'])) {
	echo '<!-- This needs jquery ui-->
<script src="js/draganddrop_blogsquad.js"></script>
<script src="js/dropzone_main.js"></script>
<link rel="stylesheet" href="css/general.css" /> 
<link rel="stylesheet" href="css/admin_edit_general.css" />
<!-- TinyMCE -->
<script type="text/javascript" src="vendor/tinymce_alt/tinymce.min.js"></script>'; 
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
  <?php 
  if(isset($_SESSION['admin'])) {
	$content ='
    <nav id="MainNavigationMenu">
		        <div id="DesktopMenuContainer"><a id="HeaderLogoLink" href="index.php"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a>';
	
     $content .= '<a href="sponsors"><img class="MenuIcon" src="img/admin/sponsors.png" onmouseover="this.src=';
	 $content .="'img/admin/sponsors_hover.png';";
	 $content .='" onmouseout="this.src=';
	 $content .="'img/admin/sponsors.png';";
	 $content .='" ></a>';
	 
	 $content .= '<a href="speakers"><img class="MenuIcon" src="img/admin/speakers.png" onmouseover="this.src=';
	 $content .="'img/admin/speakers_hover.png';";
	 $content .='" onmouseout="this.src=';
	 $content .="'img/admin/speakers.png';";
	 $content .='" ></a>';
	
	 $content .= '<a href="agenda"><img class="MenuIcon" src="img/admin/agenda.png" onmouseover="this.src=';
	 $content .="'img/admin/agenda_hover.png';";
	 $content .='" onmouseout="this.src=';
	 $content .="'img/admin/agenda.png';";
	 $content .='" ></a>';
	 
	  $content .= '<a href="blogsquad"><img class="MenuIcon" src="img/admin/blogsquad.png" onmouseover="this.src=';
	 $content .="'img/admin/blogsquad_hover.png';";
	 $content .='" onmouseout="this.src=';
	 $content .="'img/admin/blogsquad.png';";
	 $content .='" ></a>';
	 
	 $content .= '<a href="mediapartners"><img class="MenuIcon" src="img/admin/mediapartners.png" onmouseover="this.src=';
	 $content .="'img/admin/mediapartners_hover.png';";
	 $content .='" onmouseout="this.src=';
	 $content .="'img/admin/mediapartners.png';";
	 $content .='" ></a>';
  
  $content .='</div></nav>';
  
  echo $content;
	  
  } else {
	echo '<!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" href="index.php"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index.php" >Home</a>
        <div class="NavmenuDivider"></div>
        <a class="ActiveNavmenuItem" href="speakers">Blogsquads</a>
        <div class="NavmenuDivider"></div>
        <a href="agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <a href="contact">Get in Touch</a> </div>
      <div id="DesktopSocialHeader"> <a target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png"></a> <a target="_blank" href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png"></a> <a target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png"></a> <a target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img src="img/header-flickr.png"></a> <a target="_blank"  href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png"></a> <a href="tickets">
        <div id="HeaderGetTicketsButton">GET TICKETS</div>
        </a> </div>
    </nav>';  
	  
  }
?>
    
    <!--END DESKTOP Navigation Menu--> 
    <!-- Mobile Navigation Menu-->
    <div id="MobileNavigation"> <img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-mobile-logo.png"> <a onclick="location.href='#top'"  role="button" class="right-off-canvas-toggle smoothScroll"><i class="fa fa-bars"></i></a> </div>
    <nav id="RightsideMobileNavigation" class="right-off-canvas-menu">
      <ul>
        <li> <a href="index" class="MobileNavigationMenuItem">Home</a></li>
        <li> <a href="tickets" >Tickets</a></li>
        <li> <a  class="ActiveNavmenuItem" href="speakers">Blogsquads</a></li>
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
    
    <!--MAIN CONTENT -->
    <div id="BlogsquadHeaderContainer">
      <div id="BlogsquadHeaderInnerContainer">
        <h1>Blog Squad</h1>
        <p>Our bloggers provide insight, interviews, news and
opinion on everything HR.</p>
      </div>
    </div>
    <div class="colors-wrapper">
      <div class="colored-stripe red" ></div>
      <div class="colored-stripe yellow" ></div>
      <div class="colored-stripe green" ></div>
      <div class="colored-stripe blue" ></div>
    </div>
    <div style="clear: both;"></div>
    <?php 
  if(isset($_SESSION['admin'])) {
	echo '<a href="new_blogsquad">
        <div class="AdminNavigateButton">New Blog Squad</div>
        </a> </div></div><div id="tinyDiv"></div>';  
  }
?>
    

    <!--MAIN CONTENT -->
    <h1 id="BlogsquadHeadline">Blog Squad</h1>
    <section id="Blogsquads"> 
      	<?php
		$speakers = new blogsquad_main();
		$content = $speakers->blogsquad();
		  /*
		  
		 				$content[$i][0] = Blogsquad name
		  				$content[$i][1] = Blogsquad Title
						$content[$i][2] = Blogsquad Bio important
						$content[$i][3] = Blogsquad Bio
						$content[$i][4] = Blogsquad modal tag
						
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
						$content[$i][18] = Blogsquads id
						$content[$i][19] = speakers name id;
		  */
		if (isset($content)) {
		  foreach ($content as $speaker) {
			     $num = 0;
			 	foreach ($speaker as $set) {
						if (!isset($speaker[$num])){
				        $speaker[$num] = ' ';
			             }	
						 $num++;		
					}
					
			 
			 if (!isset($speaker[13]) || $speaker[13] == ''){
				 $speaker[13] = '';
				 $time = '';
			 } else {
				 $time = ' - ';
			 }
			 
			 if (!isset($speaker[16]) || $speaker[16] == ''){
				 $speaker[16] = '';
				 $day = '';
			 } else {
				 $day =  'DAY '.$speaker[16];
			 }
			 

			 $output = '';
			$output .= '<div id="'.$speaker[18].'"><!-- '.$speaker[0].' Blogsquadgrid-->';
	if(isset($_SESSION['admin'])) {
	    $output .= '<div id="BlogsquadDel_'.$speaker[18].'" class="BlogsquadDelete"><i class="fa fa-trash fa-2x"></i></div>';
		}
     $output.= '<a data-toggle="modal" data-target="#'.$speaker[4].'" href="#">
      <div class="Blogsquad">';
	  if (isset($speaker[11])) {
		  $output .= '<div class="BlogsquadPhoto" style="background-image:url(../img/blogsquad/'.$speaker[11].');">';
	  } else {
				    $output .= '<div class="BlogsquadPhoto">';
			  }
       
         $output .='<div class="EventDetails">
            <p class="ViewProfile">VIEW PROFILE</p>
          </div>
        </div>
        <div class="BlogsquadInfo">
          <p class="BlogsquadName OswaldText HRNBlue">'.$speaker[0].'</p>
          <p class="BlogsquadCompanyName RobotoText">'.$speaker[7].'</p>
        </div>
      </div>
      </a>'; 
	   if(isset($_SESSION['admin'])) {
	
       }
	  
      $output .= '<!-- end '.$speaker[0].' Blogsquadgrid --></div> ';
			
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
		  
		 				$content[$i][0] = Blogsquad name
		  				$content[$i][1] = Blogsquad Title
						$content[$i][2] = Blogsquad Bio important
						$content[$i][3] = Blogsquad Bio
						$content[$i][4] = Blogsquad modal tag
						
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
			 
			     $num = 0;
			 	 foreach ($speaker As $set) {
						if (!isset($set)){
				        $speaker[$num] = '';
			             }	
						 $num++;		
					}
			 
	if(isset($_SESSION['admin'])) {
	 /*
	 --------------------------
	 Admin
	 -------------------
	 */			 
			$output = '<!-- '.$speaker[0].' Modal -->
<div class="modal fade" id="'.$speaker[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
		
			 $output .= ' <form class="dropzone BlogsquadImageForm" name="BlogsquadImageForm" method="post" action="controllers/main.php" enctype="multipart/form-data">';
			$output .='<input name="BlogsquadImageSecret" type="hidden" value="ThisIsASecret">';
			$output .='<input name="BlogsquadImageModifyId" type="hidden" value="'.$speaker[18].'">';
			  if (isset($speaker[11])) {
		  $output .= '<div class="ModalBlogsquadPhoto" style="background-image:url(../img/blogsquad/'.$speaker[11].')"></div>';
	          } else {
				   $output .= '<div class="ModalBlogsquadPhoto" style="background-image:url(img/speakers/drag_and_drop_220.png)"></div>';
			  }
           $output .='</form>';
		   
        
       $output .='<div class="ModalBlogsquadBioContainer">
	   <form class="BlogsquadModalEdit">
	       <input id="'.$speaker[4].'_BlogsquadId" style="display:none;" name="'.$speaker[4].'_BlogsquadId" type="text" value="'.$speaker[18].'">
		   <input id="'.$speaker[4].'_BlogsquadNameId" style="display:none;" name="'.$speaker[4].'_BlogsquadNameId" type="text" value="'.$speaker[19].'">
          <p id="'.$speaker[4].'_Name" class="ClickClick ModalBlogsquadName OswaldText">'.$speaker[0].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_NameEdit" style="display:none;" name="'.$speaker[4].'_NameEdit" type="text" value="'.$speaker[0].'">
          <p id="'.$speaker[4].'_Title" class="ClickClick ModalBlogsquadJobtitle RobotoText">'.$speaker[1].'</p>
		   <input class="ClickEdit" id="'.$speaker[4].'_TitleEdit" style="display:none;" name="'.$speaker[4].'_TitleEdit" type="text" value="'.$speaker[1].'">
          <p id="'.$speaker[4].'_Company" class="ClickClick ModalBlogsquadCompanyLink">'.$speaker[7].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_CompanyEdit" style="display:none;" name="'.$speaker[4].'_CompanyEdit" type="text" value="'.$speaker[7].'">
		  <p id="'.$speaker[4].'_CompanyLink" class="ClickClick ModalBlogsquadCompanyLink">'.$speaker[8].'</p>
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
		
          $output .='<div class="ModalBlogsquadBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ClickClick ModalBlogsquadBioHighlight OswaldText">'.$speaker[2].' </span></div>
		  <textarea class="ClickEdit" id="'.$speaker[4].'_BioImportantEdit" style="display:none;" name="'.$speaker[4].'_BioImportantEdit" >'.$speaker[2].'</textarea>
		  <div id="'.$speaker[4].'_Bio" class="ClickClick ModalBlogsquadBio RobotoText"> '.$speaker[3].'</div>
		  <textarea class="ClickEdit" id="'.$speaker[4].'_BioEdit" style="display:none;" name="'.$speaker[4].'_BioEdit">'.$speaker[3].'</textarea>
		  
		  
		  
		  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$speaker[0].' Modal --> ';
 /// If admin set end
	} else {  
	/*
	 --------------------------
	 Normal user
	 -------------------
	 */		
				$output = '<!-- '.$speaker[0].' Modal -->
<div class="modal fade" id="'.$speaker[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($speaker[11])) {
		  $output .= '<div class="ModalBlogsquadPhoto" style="background-image:url(img/blogsquad/'.$speaker[11].')"></div>';
	          } else {
				   $output .= '<div class="ModalBlogsquadPhoto"></div>';
			  }
       
        
       $output .='<div class="ModalBlogsquadBioContainer">
	   <form class="BlogsquadModalEdit">

          <p id="'.$speaker[4].'_Name" class=" ModalBlogsquadName OswaldText">'.$speaker[0].'</p>

          <p id="'.$speaker[4].'_Title" class="ModalBlogsquadJobtitle RobotoText">'.$speaker[1].'</p>
		
		  <a href="'.$speaker[8].'" id="'.$speaker[4].'_CompanyLink" class="ModalBlogsquadCompanyLink">'.$speaker[7].'</a>
		
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					$output .='<p id="'.$speaker[4].'_'.$types.'" class="SocialIcons"><a><i class="fa fa-'.$types.' "></i></a></p>'; 

					   $s++;
			         }

				}
				unset($link_types);
				unset($links);
		  }

          $output .='<div class="ModalBlogsquadBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ModalBlogsquadBioHighlight OswaldText">'.$speaker[2].' </span></div>
		  
		  <div id="'.$speaker[4].'_Bio" class=" ModalBlogsquadBio RobotoText"> '.$speaker[3].'</div>

		  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$speaker[0].' Modal --> ';	
		
		
	} //normal user end
	
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
	}
		}?>

</body>
</html>