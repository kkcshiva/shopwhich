<?PHP
include_once('dbfunction.php');
 $obj = new dbfunction();
 $res=$obj->get_all_productes();
?> 
<!DOCTYPE HTML>
<html>
<head> 
<title>Home : Shop @</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300:700' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/modernizr.custom.js" type="text/javascript"></script>
<script src="js/jquery.openCarousel.js" type="text/javascript"></script>
<script src="js/fwslider.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	    $('#slider').fwslider({
	        auto:     true,  //auto start
	        speed:    300,   //transition speed
	        pause:    4000,  //pause duration
	        panels:   5,     //number of image panels
	        width:    1680,
	        height:   500,
	        nav:      true   //show navigation
	    });
	});
	</script>		
 <!---- animated-css ---->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
	<script>
		$(function() {
	    var button = $('#loginButton');
	    var box = $('#loginBox');
	    var form = $('#loginForm');
	    button.removeAttr('href');
	    button.mouseup(function(login) {
	        box.toggle();
	        button.toggleClass('active');
	    });
	    form.mouseup(function() { 
	        return false;
	    });
	    $(this).mouseup(function(login) {
	        if(!($(login.target).parent('#loginButton').length > 0)) {
	            button.removeClass('active');
	            box.hide();
	        }
	    });
	});
   </script>
   <!----font-Awesome----->
<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<body>
   <!-- Header -->
	 	    <div class="header">
		 	  <div class="container">	 			
				<div class="logo">
					<h1><a href="index.php">Shop @</a></h1>
				</div>				
			<div class="navigation">	
			<div>
              <label class="mobile_menu" for="mobile_menu">
              <span>Menu</span>
              </label>
              <input id="mobile_menu" type="checkbox">
				<ul class="nav">
              <li><a href="index.php" class="active">Home</a></li>                  
             <?php
if($_SESSION['user_id']=='')
{
?>			  
              <li><a href="Login&Register.php" >login&Register </a></li>                  
<?php
}
else
{
?>
 <li><a href="" ><?php echo $_SESSION['name']; ?></a></li>   
  <li><a href="Logout.php" ><?php echo "Logout"; ?></a></li> 
<?php 
}
?>                 
              <!---<li class="dropdown"><a href="#">Reservation</a>
                <ul class="dropdown2">
                  <li><a href="room.php">Room 1</a></li>
                  <li><a href="room.php">Room 2</a></li>
                  <li><a href="room.php">Single Room</a></li>
                  <li><a href="room.php">Double Room</a></li>
                  <li><a href="room.php">Room 3</a></li>
                </ul>
              </li> --------------->            
              <li class="dropdown"><a href="about.php">About</a></li>
           </li>           
           <li class="dropdown"><a href="#">Blog</a>
           	  <ul>
	           	  <li><a href="blog.php">Blog 1</a></li>
	              <li><a href="blog.php">Blog 2</a></li>
	          </ul>
            </li>        
          </ul>
	    </div>			
	 </div>
     <div class="clearfix"></div>		   
    </div>
   </div>	
   <div id="slider">
	  <div><img src="images/2.jpg" class="img-responsive" alt="img01"/></div>
	  <div><img src="images/1.jpg" class="img-responsive" alt="img02"/></div>
	  <div><img src="images/2.jpg" class="img-responsive" alt="img03"/></div>
	  <div><img src="images/1.jpg" class="img-responsive" alt="img04"/></div>
	</div>
  </div>
   <!-- Ends Header -->
    <!------------ Start Content ---------------->
        <div class="main">        	
         <div class="container">          	 
	 		 <div class="row grids text-center">
				<h3 style="font-family:Open Sans Condensed, sans-serif;
	color:#000;
	margin-bottom:15px;
	text-transform:uppercase;
	text-align:center;
	font-size:2em;
	font-weight:700;">Popular Stores</h3>
	<br>
			<div class="row room_grids text-center">
				 <div class="col-md-4">
					<div class="view view-tenth">
					      <a href="productesrelated.php?prod=Nearby">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/pic1.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new">Shopper's Stop</span> </div>
								<div class="mask" >
			                        <h2>Apparels for All</h2>
			                        <h3>Choose the Fashion that Suits Your Attitude...</h3>
			                        <div class="info"><i class="fa fa-search-plus"></i> </div>
			                    </div>
			                  	</div>
			                 </div>
				            </a> 
				       </div>
	              </div>
				  
				    <div class="col-md-4">
					  <div class="view view-tenth">
					      <a href="productesrelated.php?prod=Nearby">
						   <div class="inner_content clearfix">
							 <div class="product_image">
								<img src="images/pic3.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new">Metro</span> </div>
								  <div class="mask">
			                        <h2>The All In One Shoppee</h2>
			                        <h3>Get Anything you Want with Wast Range of Options</h3>
			                         <div class="info"><i class="fa fa-search-plus"></i> </div>
			                    </div>
			                  	</div>
			                   </div>
				            </a> 
				       </div>
		            </div>
					
				    <div class="col-md-4">
					   <div class="view view-tenth">
					      <a href="productesrelated.php?prod=Nearby">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/pic2.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new">NearBY</span> </div>
								<div class="mask">
			                        <h2>The All In One for All</h2>
			                        <h3>Choose the Fashion you Want with Wast Range of Options</h3>
			                         <div class="info"><i class="fa fa-search-plus"></i> </div>
			                    </div>
			                    </div>
			                  </div>
				            </a> 
				       </div>
				   </div>
				   <div class="col-md-4">
					   <div class="view view-tenth">
					      <a href="productesrelated.php?prod=Papular">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/pic2.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new">papular</span> </div>
								<div class="mask">
			                        <h2>The All In One for All</h2>
			                        <h3>Choose the Fashion you Want with Wast Range of Options</h3>
			                         <div class="info"><i class="fa fa-search-plus"></i> </div>
			                    </div>
			                    </div>
			                  </div>
				            </a> 
				       </div>
				   </div></div>
				   
				   <div class="row room_grids text-center">
				   <?php
				   // $res_data = mysql_fetch_array($res);
				   // print_r($res_data);
				   while ($res_data = mysql_fetch_array($res)) {
//$str = substr($res_data['st_descript'], 0, 100).'...'; 
				   ?>
				 <div class="col-md-4">
					<div class="view view-tenth">
					      <a href="productesrelated.php?prod=<?php echo $res_data['product_name'] ?>">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/pic2.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new"><?php echo $res_data['product_name']; ?></span> </div>
								<div class="mask" >
			                        <h2><?php echo $res_data['product_name']; ?></h2>
			                        <h3><?php echo $res_data['discription']; ?></h3>
			                        <div class="info"><i class="fa fa-search-plus"></i> </div>
			                    </div>
			                  	</div>
			                 </div>
				            </a> 
				       </div>
	              </div>
		<?php } ?>
				   </div>
				   
			
				 
				   
          <hr>
          <div class="content-bottom wow fadeInLeft" data-wow-delay="0.4s" id="work">   
            <div class="container">   
        	    <div class="row">
				     <div class="col-md-8">
				     	 <div class="welcome_desc">
				       		<h3>Visitor Experienced</h3>
				            <div class="course_demo">
					          <ul id="flexiselDemo3">	
								<li><img src="images/v1.jpg" class="img-responsive" /><div class="desc">
									<h3>Lorem Ipsum</h3>
									<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
								</div></li>
								<li><img src="images/v2.jpg" class="img-responsive" /><div class="desc">
									<h3>Lorem Ipsum</h3>
									<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
								</div></li>
								<li><img src="images/v3.jpg" class="img-responsive" /><div class="desc">
									<h3>Lorem Ipsum</h3>
									<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
								</div></li>
								<li><img src="images/v4.jpg" class="img-responsive" /><div class="desc">
									<h3>Lorem Ipsum</h3>
									<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
								</div></li>
								<li><img src="images/v5.jpg" class="img-responsive" /><div class="desc">
									<h3>Lorem Ipsum</h3>
									<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
								</div></li>		    	  	       	   	    	
							</ul>
				<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo3").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 2
			    		}
			    	}
			    });
			    
			});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	            </div>
	       </div>
		</div>
		 <div class="col-md-4 middle_right">
			<h3>Info</h3>
			<ul id="general-info">
				<li><i class="fa fa-clock-o"> </i>Check-in: 14:00; Check-out: 12:00</li>
				<li><i class="fa fa-globe"> </i>Free Wi-Fi Internet in Rooms</li>
				<li><i class="fa fa-cutlery"> </i>In Room Dining Available from <br>06:00pm to 10:30pm</li>
				<li><i class="fa fa-truck"> </i>Local Self Parking: $20-$25 per night</li>
				<li><i class="fa fa-picture-o"> </i>Walking Distance to Wall Street, Battery Park and Brooklyn Bridge</li>
			</ul>	        
		  </div>
		 </div>
		</div>
		</div>
		       <div class="company_logos wow bounceIn" data-wow-delay="0.4s">
		          	<h3>Our Gallery</h3>
		          	 <div class="ocarousel_slider">  
	      				<div class="ocarousel example_photos" data-ocarousel-perscroll="3">
			                <div class="ocarousel_window">
			                   <a href="#" title="Hp"> <img src="images/g1.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title="Bosch"><img src="images/g2.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title="El pso"><img src="images/g3.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title="Print X Press"><img src="images/g4.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title="Arcelo mittal"><img src="images/g5.jpg" class="img-responsive" alt="" /></a>
			                    <a href="#" title="Goldware IT Services"><img src="images/g6.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title="Lucent Technologies"><img src="images/g7.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title="ge"><img src="images/g8.jpg" class="img-responsive" alt="" /></a>
			                </div>
			               <span>           
			                <a href="#" data-ocarousel-link="left" class="prev"><i class="fa fa-angle-left"></i> </a>
			                <a href="#" data-ocarousel-link="right" class="next"> <i class="fa fa-angle-right"></i></a>
			               </span>
					   </div>
				     </div>      		
              </div>
        </div>
		
<!--Footer Starts-->
        <div class="footer">
         <div class="container">   	 
           	 <div class="footer_top"></div>
              <div class="footer_bottom">
		           <div class="copy_right">
						<p>&copy; 2013 All Rights Reseverd | Shop @</p>
				   </div>
				   <div class="footer_nav">
				   	 <ul>
				   	 	<li><a href="#">Terms of use</a></li>
				   	 	<li><a href="#">Privacy Policy</a></li>
				   	 	<li><a href="contact.php">Contact</a></li>
				   	 </ul>
				    </div>
				  <div class="clearfix"></div>
				</div>
		   </div>
   </div>
</body>
</html>

