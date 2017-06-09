<?php
include_once('dbfunction.php');
$_SESSION['error']="";
$obj = new dbfunction();
if(isset($_POST['user']))
{
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
$fname1=str_replace('@','',$fname1);
$name1=$fname1.'.'.$path_parts['extension'];
$imgnewFilePath = $name1;
$filpat="images/user/".$imgnewFilePath;
move_uploaded_file($imgfile_tmp,$filpat);
}
else
{
$imgnewFilePath="";
}
$qq=$obj->add_user($name,$email,$password,$imgnewFilePath,$mobno);
if($qq==1)
{///////////
header("Location:index.php");
}
}
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$qq=$obj->checkuserLogin($username,$password);
if($qq!=0){
$get_det=mysql_fetch_array($qq);
$_SESSION['emailid']=$get_det['emailid'];
$_SESSION['name']=$get_det['name'];
$_SESSION['phone']=$get_det['phone'];
$_SESSION['img']=$get_det['img'];
$_SESSION['user_id']=$get_det['user_id'];
header("Location:index.php");
}
else
{
echo $_SESSION['error']="Wrong Credentials Try again...."; 
}
}
include("header.php");
?>
<!DOCTYPE HTML>
<html>
<body>
<?php
include("menu.php");
?>
   <!-- Ends Header -->	 <div class="clearfix"></div>
    <!------------ Start Content ---------------->
	<div class="container">
	
       <div class="main-cont">
		<div class="text">
			<h1>Login or Create a Free Account!</h1>
		</div>
		<p>Lorem iopsum dolor sit amit,consetetur sadipscing eliter,sed diam voluptua.At vero  eso et accusam et justo duo dolores et ea rebum. </p>
			<div class="">
			<form method="post" action="" enctype="multipart/form-data" >
			<div class="col-md-5">
				
					<h2>New Account:</h2>
					<div class="control-group form-group">
						<input type="text"  class="form-control"  placeholder="Username" name="name" required/>
						<div class="clear"> </div>
					</div>
					<div class="control-group form-group">
						<input type="text"  class="form-control" placeholder="Email" name="email" required/>
						<div class="clear"> </div>
					</div>					
					<div class="control-group form-group">
						<input type="password"  class="form-control" placeholder="password" name="password" required/>
						<div class="clear"> </div>
					</div>
					<div class="control-group form-group">
						<input type="text"  class="form-control" placeholder="MobileNo" name="mobno" required/>
						<div class="clear"> </div>
					</div>
					<div class="control-group form-group">
						<input type="file"  class="form-control" placeholder="uplod image" name="image" required/>
						<div class="clear"> </div>
					</div>
<input type="submit" name="user" value="Create Account">
					 <div class="clear"> </div>
				</div>
				</form>
				<div class="col-md-5">
				<h3>Login:</h3>
				<span style="color:red"><?php echo $_SESSION['error'];?></span>
				<form method="post" action="">
					<div class="control-group form-group">
						<input type="text" class="form-control"  placeholder="Username" name="username" required/>
						</div>
						<div class="control-group form-group">
						<input type="password" class="form-control" placeholder="Password" name="password" required/>
						</div>
						<h4><a href="#">I forgot my Password!</a></h4>
						<div class="clear"> </div>
	<input type="submit" name="login" value="Login" >
							
						</form>
					<div class="clear"> </div>
				</div>
			
				<div class="clear"> </div>
					
		</div>
		<div class="clear"> </div>
		</div>	
		
          
	       </div>
        <!--Footer Starts-->
<?php
include("footer.php");
?>
</body>
</html>