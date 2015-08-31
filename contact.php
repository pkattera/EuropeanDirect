<?php
//If the form is submitted
if(isset($_POST['submit'])) {


    $subject = "European Direct Website Message" ;

     //Check to make sure that the name field is not empty
     if(trim($_POST['contactname']) == '') {
          $hasError = true;
     } else {
          $name = trim($_POST['contactname']);
     }

     //Check to make sure sure that a valid email address is submitted
     if(trim($_POST['email']) == '')  {
          $hasError = true;
     } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
          $hasError = true;
     } else {
          $email = trim($_POST['email']);
     }


     //Check to make sure comments were entered
     if(trim($_POST['message']) == '') {
          $hasError = true;
     } else {
          if(function_exists('stripslashes')) {
               $comments = stripslashes(trim($_POST['message']));
          } else {
               $comments = trim($_POST['message']);
          }
     }

     //If there is no error, send the email
     if(!isset($hasError)) {
          $emailTo = 'belliappa@loveandco.co.nz'; //Put your own email address here
          $body = "Name: $name \n\nEmail: $email \n\nComments:\n $comments";
          $headers = "From: {$email} ";

          mail($emailTo, $subject, $body, $headers);
          $emailSent = true;
     }
}
?>



<!DOCTYPE html>
<html lang="en">


<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Contact us</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/screen.css">

  <script src="javascripts/modernizr.foundation.js"></script>




<!-- JQUERY form validation -->
<script src="javascripts/jquery.js"></script>
<script src="javascripts/jquery.validate.pack.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#contactform").validate();
});
</script>

<!-- End JQUERY form validation -->
 
</head> 

<body> 

<div id='layout'>

<header>
  <div class="row">
    <div class="twelve columns">
      <h1><a href="index.html"><img src="images/logo.png" alt="European Direct, New Zealand" title="Click to return to European Direct homepage" /></a></h1>
        <h2>GET YOUR DREAM CAR IMPORTED <span>AND DELIVERED TO NZ</span></h2>
    </div>
  </div>
</header>


	<div id="contact_section" class="form">
			
		<h3 class="contact_us_title" title="Contact us">Contact us</h3>
		<p>For further information or an obligation free quote, please call us on +64 (0) 21 35 35 98 or fill out the form below.</p>
		
<div class="contact_us_form"> <!-- contact us form -->

	<div id="contact-wrapper">

	<?php if(isset($hasError)) { //If errors are found ?>
		<div id='contact_form_error_message'>Please check that you have filled all the fields with valid information.</div>
	<?php } ?>

	<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
	
		<div id='contact_form_success_message'>Thanks for your message. We'll reply to you shortly. </div>
	
	<?php } ?>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']."#contactus"; ?>" id="contactform">
	
	
	   <div>
		    <label for="contactname"><strong>Your name: *</strong></label>
			<input type="text" size="50" name="contactname" id="contactname" value="" class="required" />
		</div>

		<div>
			<label for="email"><strong>Your email: *</strong></label>
			<input type="text" size="50" name="email" id="email" value="" class="required email" />
		</div>

		<div>
			<label for="message"><strong>Message: *</strong></label>
			 <p> e.g. Make, Model and Year of the desired car. Need assistance with finance? Tell us.</p>
			<textarea rows="8" cols="70" name="message" id="message" class="required"></textarea>
		</div>
	    <input class="radius button" type="submit" value="Send message" name="submit" id="apartment_submit_button"/>
	    <a class="cancel" href="index.html">Cancel / Return home</a>
	</form>

	</div>


	</div> <!-- End contact us form -->

</div> <!-- End contact_section -->


    <div id='layout_footer'></div>
  
  </div>

 <div id='footer'>
  <footer>
      <div class="row">
        <div class="twelve columns">
          <ul>
            <li><!-- <img src="images/small_logo.png" alt="European Direct Logo"/> -->European Direct </li>
            <!-- <li><a class="radius button" href="#">CONTACT US</a></li> -->
            <li><img src="images/mail.png" alt="Email address icon"/><a href="mailto:info@europeandirect.co.nz?Subject=Car%20Question">info@europeandirect.co.nz</a></li>
            <li><img src="images/phone.png" alt="Phone icon"/>+64 (0) 21 35 35 98</li>
        </div>
      </div>  
  </footer>
</div>		


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38838553-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>

