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
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Drag & Drop -->

<?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['blogsquad_admin'])) {
	echo '<!-- This needs jquery ui-->
<script src="js/admin_blogsquad_edit.js"></script>
<script src="js/admin_dropzone_main.js"></script>
<script src="js/admin_general.js"></script> 
<link rel="stylesheet" href="css/general.css" /> 
<link rel="stylesheet" href="css/admin_general.css" /> 
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
  	 $speakers = new blogsquad_main();
  if(isset($_SESSION['admin']) && isset($_SESSION['blogsquad_admin'])) {

	$content ='
    <nav id="MainNavigationMenu">
		        <div id="DesktopMenuContainer"><a id="HeaderLogoLink" href="index.php"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a>';
	
  
	if (isset($_SESSION['sponsors_admin'])) {
		

		 $content .= '<a href="sponsors"><img class="MenuIcon" src="img/admin/sponsors.png" onmouseover="this.src=';
		 $content .="'img/admin/sponsors_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/sponsors.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['speakers_admin'])) {
		
		 $content .= '<a href="speakers"><img class="MenuIcon" src="img/admin/speakers.png" onmouseover="this.src=';
		 $content .="'img/admin/speakers_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/speakers.png';";
		 $content .='" ></a>';
	 
	}
	
	if (isset($_SESSION['agenda_admin'])) {
		
		 $content .= '<a href="agenda"><img class="MenuIcon" src="img/admin/agenda.png" onmouseover="this.src=';
		 $content .="'img/admin/agenda_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/agenda.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['blogsquad_admin'])) {
		
		 $content .= '<a href="blogsquad"><img class="MenuIcon" src="img/admin/blogsquad.png" onmouseover="this.src=';
		 $content .="'img/admin/blogsquad_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/blogsquad.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['mediapartners_admin'])) {
		
		 $content .= '<a href="mediapartners"><img class="MenuIcon" src="img/admin/mediapartners.png" onmouseover="this.src=';
		 $content .="'img/admin/mediapartners_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/mediapartners.png';";
		 $content .='" ></a>';
	 
	}
  
  $content .='</div>';
  $content .='<div id="ResponseDiv">';
  
  			if (isset($_COOKIE['ResponseCookie'])){
				$content .= $speakers->response_generator($_COOKIE['ResponseCookie']);
				unset($_COOKIE['ResponseCookie']);
                setcookie('ResponseCookie', null, -1, '/');
			}
  
   $content .='</div>';
  $content .='</nav>';
  
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
  if(isset($_SESSION['admin']) && isset($_SESSION['blogsquad_admin'])) {
	echo '<a href="new_blogsquad">
        <div class="AdminNavigateButton">New Blogger</div>
        </a> </div><div id="tinyDiv"></div>';  
  }
?>
    

    <!--MAIN CONTENT -->
    <h1 id="BlogsquadHeadline">Blog Squad</h1>
    <section id="Blogsquads"> 
      	<?php
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
					    $content[$i][21] .= Blog Title .'|';
					    $content[$i][22] .= Blog Url  .'|';
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
	if(isset($_SESSION['admin']) && isset($_SESSION['blogsquad_admin'])) {
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
	   if(isset($_SESSION['admin']) && isset($_SESSION['blogsquad_admin'])) {
	
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
					    $content[$i][21] .= Blog Title .'|';
					    $content[$i][22] .= Blog Url  .'|';
						$content[$i][23] .= Blog id  .'|';
		  */
		if (isset($content)) {
		 foreach ($content as $speaker) {
			 if (isset($speaker[6])){
				  $links = explode(';',$speaker[6]);
			      $link_types = explode(';',$speaker[5]);
			 }
			 
			 if (isset($speaker[21]) && isset($speaker[22]) && isset($speaker[23])){
				  $blog_title = explode('|',$speaker[21]);
			      $blog_url = explode('|',$speaker[22]);
				  $blog_id = explode('|',$speaker[23]);
			 }
			 
			     $num = 0;
			 	 foreach ($speaker As $set) {
						if (!isset($set)){
				        $speaker[$num] = '';
			             }	
						 $num++;		
					}
			 
	if(isset($_SESSION['admin']) && isset($_SESSION['blogsquad_admin'])) {
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
		   
        
       $output .='<div class="ModalBlogsquadBioContainer">';
	   
	   $output .='<div class="ResponseContainer" style="display:none"></div>';
	   
	   $output .='<form class="BlogsquadModalEdit">
	       <input id="'.$speaker[4].'_BlogsquadId" style="display:none;" name="'.$speaker[4].'_BlogsquadId" type="text" value="'.$speaker[18].'">
		   <input id="'.$speaker[4].'_BlogsquadNameId" style="display:none;" name="'.$speaker[4].'_BlogsquadNameId" type="text" value="'.$speaker[19].'">
          <p id="'.$speaker[4].'_Name" class="ClickClick ModalBlogsquadName OswaldText">'.$speaker[0].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_NameEdit" style="display:none;" name="'.$speaker[4].'_NameEdit" type="text" value="'.$speaker[0].'">';
		  
		   if (!isset($speaker[1]) || $speaker[1] == '' || $speaker[1] == ' '){
			  $placeholder = 'Type the title here';
		  } else {
			  $placeholder = "";
		  }
		  
         $output .=' <p id="'.$speaker[4].'_Title" class="ClickClick ModalBlogsquadJobtitle RobotoText">'.$placeholder.$speaker[1].'</p>
		   <input class="ClickEdit" id="'.$speaker[4].'_TitleEdit" style="display:none;" name="'.$speaker[4].'_TitleEdit" type="text" value="'.$speaker[1].'">
          <p id="'.$speaker[4].'_Company" class="ClickClick ModalBlogsquadCompanyLink">'.$speaker[7].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_CompanyEdit" style="display:none;" name="'.$speaker[4].'_CompanyEdit" type="text" value="'.$speaker[7].'">';
		  
		  if (!isset($speaker[8]) || $speaker[8] == '' || $speaker[8] == ' '){
			  $placeholder = 'Type the company link here';
		  } else {
			  $placeholder = "";
		  }
		  
		  $output .='<p id="'.$speaker[4].'_CompanyLink" class="ClickClick ModalBlogsquadCompanyLink">'.$placeholder.$speaker[8].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_CompanyLinkEdit" style="display:none;" name="'.$speaker[4].'_CompanyLinkEdit" type="text" value="'.$speaker[8].'">';
		  
		  
		  	 if (isset($blog_title) && isset($blog_url)){
				 $blognum = 0;
				 
			 foreach ($blog_title As $titles) {
			   if ($titles) {
				   
		    $output .='<p id="'.$speaker[4].'_BlogTitle'.$blog_id[$blognum].'" class="ClickClick ModalBlogsquadCompanyLink">'.$titles.'</p>
		<input class="ClickEdit" id="'.$speaker[4].'_BlogTitle'.$blog_id[$blognum].'Edit" style="display:none;" name="'.$speaker[4].'_BlogTitleEdit'.$blog_id[$blognum].'" type="text" value="'.$titles.'">';
		if (!isset($blog_url[$blognum]) || $blog_url[$blognum] == '' || $blog_url[$blognum] == ' '){
			  $placeholder = 'Type the blog link here';
		  } else {
			  $placeholder = "";
		  }
		
		   $output .='<p id="'.$speaker[4].'_BlogURL'.$blog_id[$blognum].'" class="ClickClick ModalBlogsquadCompanyLink">'.$placeholder.$blog_url[$blognum].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_BlogURL'.$blog_id[$blognum].'Edit" style="display:none;" name="'.$speaker[4].'_BlogURLEdit'.$blog_id[$blognum].'" type="text" value="'.$blog_url[$blognum].'">';
				   
				   $blognum++;
				   
			         }

				}
				unset($blog_title);
				unset($blog_url);
		  }
		  
		  $output.='<br /><label>Add new blog(s)<input class="Highlighted" id="'.$speaker[4].'_Highlighted" name="Highlighted" type="checkbox" value="1" /></label><br />
          <div id="'.$speaker[4].'_BlogDiv" style="display: none;"></div>';
		  
         $output .='<div class="ModalDivider"></div>';		  
			
			 $output .='<p><span data-socialsedit-blogsquad="'.$speaker[18].'" class="SocialLinkEdit"><i class="fa fa-comment fa-2x"></i>Social Links</span></p>';
			 
		  if (!isset($speaker[2]) || $speaker[2] == '' || $speaker[2] == ' '){
			  $placeholder = 'Type the highlighted bio here';
		  } else {
			  $placeholder = "";
		  }
		
          $output .='<div class="ModalBlogsquadBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ClickClick ModalBlogsquadBioHighlight OswaldText">'.$placeholder.$speaker[2].' </span></div>
		  <textarea class="ClickEdit" id="'.$speaker[4].'_BioImportantEdit" style="display:none;" name="'.$speaker[4].'_BioImportantEdit" >'.$speaker[2].'</textarea>';
		  
		   if (!isset($speaker[3]) || $speaker[3] == '' || $speaker[3] == ' '){
			  $placeholder = 'Type the bio here';
		  } else {
			  $placeholder = "";
		  }
		  
		  $output .='<div id="'.$speaker[4].'_Bio" class="ClickClick ModalBlogsquadBio RobotoText"> '.$placeholder.$speaker[3].'</div>
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
					
		           $url_raw = $speakers->social_link_decode($links[$s]); //this is needed to decode the link from the database
							
				   $output .='<p class="SocialIcons"><a href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					//$output .='<p id="'.$speaker[4].'_'.$types.'" class="SocialIcons"><a><i class="fa fa-'.$types.' "></i></a></p>'; 

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
