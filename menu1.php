	 	    <div class="header1">
		 	  <div class="container">	 			
				<div class="logo">
					<h1><a href="index.php">Shop @</a></h1>
				</div>
			
			<div class="navigate">	
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
 <li><a href="Login&Register.php" ><?php echo $_SESSION['name']; ?></a></li>   
<?php 
}
?> 
 <li class="dropdown"><a href="#">Reservation</a>
                <ul class="dropdown2">
                  <li><a href="room.php">Room 1</a></li>
                  <li><a href="room.php">Room 2</a></li>
                  <li><a href="room.php">Single Room</a></li>
                  <li><a href="room.php">Double Room</a></li>
                  <li><a href="room.php">Room 3</a></li>
                </ul>
              </li>             
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
  