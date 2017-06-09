<div class="header">
		 	  <div class="container">	 			
				<div class="logo">
					<h1><a href="index.php"><img src="images/shop-logo.png" alt="" /></a></h1>
				</div>				
			<div class="navigation">	
			<div>
            <!--  <label class="mobile_menu" for="mobile_menu">
              <span>Menu</span>
              </label>
              <input id="mobile_menu" type="checkbox">-->
				<ul class="nav">
				<li><a href="index.php" class="active">Home</a></li>
	
               
          <!--  <li class=""><a href="javascript:">what we do </a></li> -->
          <!--  <li class=""><a href="javascript:">Join us </a></li> -->
          <!--  <li class=""><a href="javascript:">Careers</a></li>-->
            <li class=""><a href="about.php">About Us</a></li>
                      
           <li class=""><a href="contact.php">Contact Us</a></li>   

             <?php
if($_SESSION['user_id']=='')
{
?>			  
              <li><a href="login.php" > login</a></li>                  
              <li><a href="register.php" > Register </a></li>                  
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
          </ul>
	    </div>			
	 </div>
     <div class="clearfix"></div>		   
    </div>
   </div>