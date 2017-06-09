<?php
include_once('dbfunction.php');
 $obj = new dbfunction();
if(isset($_POST['user']))
{
// print_r($_POST);
// echo "jkhfsfh";

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$mobno=$_POST['mobno'];
$time=round(microtime(true) * 1000);
$img_name=$_FILES['image']['name'];
$imgfile_tmp=$_FILES["image"]["tmp_name"];

if($img_name!="")
{
  $filename=$time.'_'.$img_name;
$path_parts = pathinfo($filename);
   $fname1=str_replace(' ','',$path_parts['filename']);
  // echo $fname1;
    $fname1=str_replace('@','',$fname1);
    $name1=$fname1.'.'.$path_parts['extension'];
   $imgnewFilePath = $name1;
	 // echo $newFilePath;
	 //print_r($file_tmp);
	 //echo $file_tmp;
	$filpat="images/user/".$imgnewFilePath;
move_uploaded_file($imgfile_tmp,$filpat);

}
else 
{
$imgnewFilePath="";
}
//echo "dsfsdfsd".$imgnewFilePath ;

$qq=$obj->add_user($name,$email,$password,$imgnewFilePath,$mobno);
if($qq==1)
{
///////////
header("Location:index.php");
}
}
if(isset($_POST['login']))
{
// print_r($_POST);
// echo "jkhfsfh";
$username=$_POST['username'];
 $password=$_POST['password'];
$qq=$obj->checkuserLogin($username,$password);
if(count($qq)>0)
{
$get_det=mysql_fetch_array($qq);
	//print_r($get_det);
 $_SESSION['emailid']=$get_det['emailid'];
$_SESSION['name']=$get_det['name'];
	$_SESSION['phone']=$get_det['phone'];	
	$_SESSION['img']=$get_det['img'];	
	$_SESSION['user_id']=$get_det['user_id'];
header("Location:index.php");
}
// header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href=".//css/style1.css" rel='stylesheet' type='text/css' />
		<link href=".//css/nav.css" rel="stylesheet" type="text/css" media="all"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
		<!--//webfonts-->
</head>
<body>
<!-- Header -->
	 	    <div class="header1">
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
				<li><a href="" class="">My Credits</a></li>      
             <?php
if($_SESSION['user_id']=='')
{
?>			  
              <li><a href="Login&Register.php" >login & Register </a></li>                  
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
            <li class=""><a href="about.php">About Us</a></li>
                      
           <li class=""><a href="#">Contact Us</a></li>        
          </ul>
	    </div>			
	 </div>
     <div class="clearfix"></div>		   
    </div>
   </div>	
   </div>
   
	<div class="main">
		<div class="header" >
			<h1>Login or Create a Free Account!</h1>
		</div>
		<p>Lorem iopsum dolor sit amit,consetetur sadipscing eliter,sed diam voluptua.At vero  eso et accusam et justo duo dolores et ea rebum. </p>
			<form method="post" action="" enctype="multipart/form-data" >
				<ul class="left-form">
					<h2>New Account:</h2>
					<li>
						<input type="text"   placeholder="Username" name="name" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text"   placeholder="Email" name="email" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password"   placeholder="password" name="password" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password"   placeholder="password" name="cpassword" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> <li>
						<input type="text"   placeholder="MobileNo" name="mobno"required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="file"   placeholder="uplod image" name="image" />
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<!--<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Please inform me of upcoming  w3layouts, Promotions and news</label>
					----><input type="submit" name="user" value="Create Account">
						</form>
						<div class="clear"> </div>
				</ul>
				<form method="post" action="">
				<ul class="right-form">
					<h3>Login:</h3>
					<div>
						<li><input type="text"  placeholder="Username" name="username" required/></li>
						<li> <input type="password"  placeholder="Password" name="password" required/></li>
						<h4>I forgot my Password!</h4>
							<input type="submit" name="login" value="Login" >
					</div>
					<div class="clear"> </div>
				</ul>
				</form>
				<div class="clear"> </div>
					
		
			
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br><br>
		<!--Footer Starts-->
        <div class="footer">
         <div class="container">   	 
           	 <div class="footer_top"></div>
              <div class="footer_bottom">
		           <div class="copy_right">
						<p>&copy; 2016 All Rights Reseverd | Shop @</p>
				   </div>
				   <div class="footer_nav">
				   	 <ul>
				   	 	<li><a href="#">Home</a></li>
				   	 	<li><a href="#">My Credits</a></li>
						<li><a href="#">Login & Register</a></li>
						<li><a href="#">About Us</a></li>
				   	 	<li><a href="contact.php">Contact Us</a></li>
				   	 </ul>
				    </div>
				  <div class="clearfix"></div>
				</div>
		   </div>
   </div>
</body>
</php>