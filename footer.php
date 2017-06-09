<?php 
require_once ('google-login-api/index.php');
require 'Instagram/instagram.class.php';
require 'Instagram/instagram.config.php';
  $loginUrl = $instagram->getLoginUrl();
  ?>
<!--Footer Starts-->
        <div class="footer">
         <div class="container">   	 
           	 <div class="footer_top">
           	 <div class="row">
			         	<div class="col-md-3 col-sm-3">
            	<h4>news letter subscribe</h4>
                <p>Allow customers to subscribe it your MailChimp or Campaign Monitor mailling list(s) via a widget or by opting in during 
checkout.</p>
            </div>
            <div class="col-md-2 col-sm-2">
            	<h4>my account</h4>
                <ul>
                                 	<li><a href="about.php">About Us</a></li>
                    <li><a href="javascript:">What We Do</a></li>
                   
                </ul>
            </div>
          <!--  <div class="col-md-2 col-sm-2">
            	<h4>our services</h4>
                <ul>
                <!---
                	<li><a href="">shipping & return</a></li>
                    <li><a href="">secure shipping</a></li>
                    <li><a href="">affiliates</a></li>
                    <li><a href="">careers</a></li>
                    <li><a href="javascript:">faq's</a></li>
					<li><a href="blog/index.php">Blog</a></li>
                </ul>
            </div> -->
            
            <div class="col-md-3 col-sm-3">
            	<h4>contact information</h4>
                <ul>

                <li>8/3/8/120 & 121,<br>
 Near swapna theater,<br />Kattedan,hyderabad 500077, <br>Telangana state,India.<br/>
 phone: 7093600961</li>
</ul>


            </div>
            
            
            <div class="col-md-2 col-sm-2">
            	<h4>Connect Us :</h4>
                <div class="float-rgt" style="float:left">
                	<ul class="list-unstyled list-inline list-social-icons" style="margin-top:0px">

					<a class="login" href=<?php echo  $authUrl; ?>><img src="google-login-api/images/Google.PNG" /></a>
	<a class="login" href=<?php echo  $loginUrl; ?>><img src="Instagram/Instagram.PNG" /></a>
	<a href="Facebook/fbconfig.php" onMouseOver="window.status=' '; return true;"><img src="Facebook/fbpic.png" /></a></div>

                   <!-- <li>
                        <a href="Facebook/fbconfig.php"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>-->
                </ul>
                </div>
            </div>
            
			 
			 </div>
			 </div>
              <div class="footer_bottom">
		           <div class="copy_right">
						<p>Copyright &copy; Shop local 2016. All rights reserved.</p>
				   </div>
				   <div class="footer_nav">
				   	 <ul>
				   	 	<li><a href="index.php">Home</a> | </li>
		
						<li><a href="login_register.php">Login & Register</a> | </li>
						<li><a href="about.php">About Us</a> | </li>
				   	 	<li><a href="contact.php">Contact Us</a></li>
				   	 </ul>
				    </div>
				  <div class="clearfix"></div>
				</div>
		   </div>
   </div>
   <script>
   $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 9000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

</script>