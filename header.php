<head>
<?php
error_reporting(0);
session_start();
?>
<link rel="icon" type="image/ico" href="images/shop-logo.png"/> 
<title>Shop Local</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/indicators.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/modernizr.custom.js" type="text/javascript"></script>
<script src="js/jquery.openCarousel.js" type="text/javascript"></script>
<script src="js/fwslider.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<?php
// include("findcurrent.php");
// echo '<script>
// window.onload=function getLocation() {
    // if (navigator.geolocation) {
        // navigator.geolocation.getCurrentPosition(showPosition);
    // } else { 
        // x.innerHTML = "Geolocation is not supported by this browser.";
    // }
	// }
// function showPosition(position) {
// document.cookie="latttitude=" + position.coords.latitude;
// document.cookie="longitude=" + position.coords.longitude;
// alert(document.cookie);
// }
// </script>';

echo '<script>
var latLong;
$.getJSON("http://ipinfo.io", function(ipinfo){
   
    latLong = ipinfo.loc.split(",");
	document.cookie="latttitude="+latLong[0];
document.cookie="longitude=" + latLong[1];
	

});
</script>';

$_SESSION['latitude']=$_COOKIE['latttitude'];
$_SESSION['longitude']=$_COOKIE['longitude'];

?>
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

<style>
.main{

   min-height: 90vh;
       padding-top: 60px;
}
</style>
</head>