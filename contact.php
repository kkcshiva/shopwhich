<?php
include_once('dbfunction.php');
$_SESSION['error']="";
$baseurl='http://shopatdrate.rushforme.com/';
 $obj = new dbfunction();
if(isset($_POST['getintouch']))
{
// print_r($_POST);
// echo "jkhfsfh";

$name=$_POST['name'];
$email=$_POST['email'];
$des=$_POST['des'];
//$mobno=$_POST['mobno'];

$qq=$obj->add_getintouch($name,$email,$des);
if($qq==1)
{
$to='info@shopatdrate.com';
$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>AdarshaCaterers</title>
</head><body style='margin:0px;'>
<table width='600' border='0' align='center' bgcolor='#FFFFFF'     style='background-color: #eee;' cellpadding='0px' cellspacing='0px'>
  <tr><th style='border:#E0E0E0 solid 1px; padding:0px;'>

  <table width='' border='0' cellpadding='0px' cellspacing='0px'>
  <tr>
  <th align='center' valign='top' style='padding:0px;'></th>
  <th align='center' valign='top' style='padding:0px;'>
  <img src='".$baseurl."images/shop-logo.png' border='0' style='width: 150%;margin-left:100%;'/></th>
  </tr> 
  </table>
<table width='600' border='0' align='center' bgcolor='#FFFFFF'     style='background-color: #eee;' cellpadding='0px' cellspacing='0px'>
  <tr><th style='border:#E0E0E0 solid 1px; padding:0px;'>
	<table width='' border='0' cellpadding='0px' cellspacing='0px'>
  <tr>
 

  <tr>
    <td>&nbsp;</td>
  </tr>  <tr>    <td>&nbsp;</td>
  </tr>  <tr>    <td>&nbsp;</td>
  </tr>  <tr>    <td style='font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#2f2f2f; font-weight:500;
	text-align:left; padding:0px 10px;'>Dear User,<br />
	<p>Please click the following Data<br/></p></td></tr> 
	  </table>
	
	<table width='' border='0' align='center' bgcolor='#FFFFFF'     style='background-color: #eee;' cellpadding='0px' cellspacing='0px'>
   <tr>  <td> Name&nbsp;</td><td>:</td><td>&nbsp;".$name."&nbsp;</td>
  </tr> <tr> <td>   Email Id&nbsp;</td><td>:</td><td>&nbsp;".$email."&nbsp;</td>
   </tr><tr> <td>   Description: &nbsp;</td><td>:</td><td>&nbsp;".$des."&nbsp;</td>
   </tr>
  <tr>    <td>&nbsp;</td>
  </tr>
</table>
</th>  </tr></table></body>
</html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: info@shopatdrate.com' . "\r\n";
$mail_sent =mail($to,"Enquiry Details",$message,$headers);

if($mail_sent)
{
 unset($_SESSION);
echo "<script>alert('Mail Sent Successfully')</script>";
	$mssg="A link has been sent to your mail.Please follow instructions as per the mail...";
}
else
{
	$mssg="Something went wrong please try again latter!";

}
}
///////////
header("Location:index.php");
}
?>
<!DOCTYPE HTML>
<html>
<?php
include_once('dbfunction.php');
include("header.php");
?>
<body>
 <?php
include("menu.php");
?>
	
   <!-- Ends Header -->
    <!------------ Start Content ---------------->
       <div class="main"> 
         <div class="reservation_top">
           <div class="container">
		    <!--<div class="con_reservation_banner">
		<div class="main_title">Contact</div>
		<div class="divider"></div>
	 </div>-->
	 <br>
             <div class="row">
            	<div class="col-md-12">
            		<div class="contact_left">
            			<h3>Contact Info</h3>
<iframe class="map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7617.795019228503!2d78.43514594572162!3d17.32049350226048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcbbd7a95555555%3A0x816d9ebaee17b69e!2sKattedan%2C+Hyderabad!5e0!3m2!1sen!2sin!4v1475220281762" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe><br /><small><a href="https://www.google.com/maps/embed/v1/place?q=Hyderabad,+Telangana,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"> </a></small>
						<div class="col-md-5 ">
						<address class="address">
                                  <p>8/3/8/120 & 121,<br>
Near swapna theater, <br>
Kattedan, hyderabad 500077,<br> Telangana state, India.</p>
                    <dl>
				

                        <dt></dt>
                        <dd><b>Mobile no:</b><span> Keshav Maniyar-7093600961</span></dd>
                        <dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> Ronak Jain-9491958321</span></dd>
                
                        <dd><b>E-mail:</b>&nbsp;<a href="javascript:">thedoven@gmail.com</a></dd>
                    </dl>
                </address>
            		</div>
   	<div class="col-md-5 ">
            		<h3>Get in touch</h3>
            		<div class="contact-form">
							<form method="post" action="">
								<div class="control-group form-group">
		<input type="text" name="name" class="form-control"  value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
						<div class="clear"> </div>
					</div>
								<div class="control-group form-group ">
								<input type="text" class="form-control" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" name="email" >
								
					</div>
					<div class="control-group form-group ">
<textarea value="Message" placeholder="Message" class="form-control" onfocus="this.value= '';" onblur="if (this.value == '') {this.value = 'Message';}" style="width:500px;height:150px" name="des" ></textarea>
								<div class="clear"> </div>
					</div>  
								<input type='submit' class="btn btn-primary btn2 btn-normal btn-inline " target="_self" value='send' name='getintouch'>
								<div class="clearfix"></div>
							</form>
						</div>
            	</div>
            		</div>
            
				<?php
	// echo $IP = $_SERVER['REMOTE_ADDR']; 
// echo "<br>".$_SERVER['HTTP_HOST'];
// echo "<br>".$_SERVER['SERVER_NAME'];	// Obtains the IP address
// echo "<br>".$computerName = gethostbyaddr($IP); 

	?>
         
            </div>
            </div>
           </div>
	     </div>
       </div>
<?php
include("footer.php");
?>
</body>
</html>

