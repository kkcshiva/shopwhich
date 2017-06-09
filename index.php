<?PHP
include_once('dbfunction.php');
 $obj = new dbfunction();
 $res=$obj->get_all_productes();
?> 
<!DOCTYPE HTML>
<html>
<?php
include("header.php");
?>
<body>
<?php
include("menu.php");
?>	

   <div id="slider" style="height:600px;">
	  <!--<div><img src="images/banner-1.jpg" class="img-responsive" alt="img01"/></div>-->
	  <div><img src="images/slide1_index.png" class="img-responsive" alt="img02"/></div>
	  <div><img src="images/slide2_index.jpg" class="img-responsive" alt="img03"/></div>
	  <div><img src="images/slide3_index.jpg" class="img-responsive" alt="img04"/></div>.

	</div>

   <!-- Ends Header -->
    <!------------ Start Content ---------------->

        <div class="main">        	
         <div class="container">       
		 
	 		 <div class="row grids text-center">

		  <div class="wow fadeInLeft" data-wow-delay="0.4s" id="work" style="    padding: 2%;    padding-top: 0;">   
            <div class="container">   
        	    <div class="row">
				     <div class="col-md-12 about">
					<br/>
					<br/>
			<h3>About Shop Which   </h3> 
			<ul id="general-info">
				<h4 style="color:black">we are on a mission to make fashion discovery around everyone a faster and enjoyable process.<h4>
				<div class="clear"> </div>
				<a href="about.php" title="More" target="_self">More...</a>
			</ul><br/>	        
		 <input type="text" id='searchstore' name='searchstore' placeholder="            Search Store name" onkeyup="search(this.value,'','','')" size="45" border="10" style="border:2px solid #000000;width:450px;height:40px"/><br/>
					 </div>
					 </div>
					 </div>
					 </div>	

					 <div class="row text-center" id='result'></div>
		<div class="row text-center">
		 <div class="col-md-3 col-xs-12 col-sm-4">
					   <div class="view view-tenth">
					      <a href="productesrelated.php?prod=<?php echo base64_encode(Nearby);?>">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/pic1.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new">NearBY</span> </div>
								<div class="mask">
			                        <h2>NearBY</h2>
			                        <h3>Choose the Fashion</h3>
			                         
			                    </div>
			                    </div>
			                  </div>
				            </a> 
				       </div>
				   </div>
				   <div class="col-md-3 col-xs-12 col-sm-4">
					   <div class="view view-tenth">
					      <a href="productesrelated.php?prod=<?php echo base64_encode(Papular);?>">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/pic2.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new">Popular</span> </div>
								<div class="mask">
			                        <h2>Popular</h2>
			                        <h3>Choose the Fashion</h3>
			                         
			                    </div>
			                    </div>
			                  </div>
				            </a> 
				       </div>
				   </div>
				   
				   <?php
				   // $res_data = mysql_fetch_array($res);
				   // print_r($res_data);
				   while ($res_data = mysql_fetch_array($res)) {
//$str = substr($res_data['st_descript'], 0, 100).'...'; 
				   ?>
				 <div class="col-md-3 col-xs-12 col-sm-4">
					<div class="view view-tenth">
					      <a href="productesrelated.php?prod=<?php echo base64_encode($res_data['product_name']) ?>">
						   <div class="inner_content clearfix">
							<div class="product_image">
							
							<?php
// echo $res_data['product_img'];
							if($res_data['img']=='')
							{
								$img='images/women-fashion.jpg';
							}
							else
							{
								$img='datamanager/img/categories/'.$res_data['img'];
							}
							?>
								<img src="<?php echo $img;?>" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new"><?php echo $res_data['product_name']; ?></span> </div>
								<div class="mask" >
			                        <h2><?php echo $res_data['product_name']; ?></h2>
			                        <h3><?php echo $res_data['discription']; ?></h3>
			                        
			                    </div>
			                  	</div>
			                 </div>
				            </a> 
				       </div>
	              </div>
		<?php } ?>
				   </div>
				   </div>
				   
			
				 
				   
          <hr/>
		  	</div>
      
</div>



				 

        
					   <div class="container testmonials-bg" >  		
							<div class="wow fadeInLeft" data-wow-delay="0.4s" id="work">   
            <div class="container">   
        	    <div class="row">
				     <div class="col-md-12 about">
				     	 <div class="">
				   
				            <div class="course_demo">
		            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                             <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class=""><img class="img-responsive" src="images/testi-3.jpg" alt=""/></li>
                                <li data-target="#quote-carousel" data-slide-to="1" class=""><img class="img-responsive" src="images/testi-2.jpg" alt=""/></li>
                                <li class="active" data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="images/testi-1.jpg" alt=""/></li>
                                <li data-target="#quote-carousel" data-slide-to="3" class=""><img class="img-responsive" src="images/testi-5.jpg" alt=""/></li>
                                <li data-target="#quote-carousel" data-slide-to="4" class=""><img class="img-responsive" src="images/testi-4.jpg" alt=""/></li>
                                <div class="clear"></div>
                            </ol>
								<div class="clear"></div>
                            <!-- Carousel Slides / Quotes -->
                           		<div class="carousel-inner text-center">

                                <!-- Quote 1 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">

                                                <p>
										My work got easy, that's the exactly what I needed, now I can focus more on my business, it was a great experience to locate stores in a short time
										</p>
                                                <small>Deepthi Ladda (fashion designer)</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 2 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">

                                                <p>
										My personal recommendation is to use shop Local for your shopping needs.Excellent site to locate<br/> the sites near your location.</p>
                                                <small>Payal Tapadia (Artist)</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 3 -->
                                <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">

                                                <p>
												Express logistics services to be expanded to 4+ cities 
									here are hundreds of options available to chose from..... must visit for shopping needs  </p>
                                                <small>Shikha Singh (fashion designer)</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 4 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">

                                                <p>
											Wonderful experience, can locate many shops near you, very useful site.It was a great experience <br/>to locate stores in a short time</p>
                                                <small>Anandi (Enterprenuer)</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 5 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">

                                                <p>
											Being a designer I used to waste my time in searching fro the shopping sites near my location to cater to my needs, thank god for shopat, helping in locating stores in my locality</p>
                                                 <small>Ankitha (fashion designer)</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                            
                            <!-- Carousel Buttons Next/Prev -->
                            <!--<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>-->
                        </div>
               		
	


	</div>
	       </div>
		</div>
		
		 </div>
		</div>
		</div>
		 
        </div>

	
		<div class="container" style="width:100%;">
		<div class="col-md-12">
		
        	   <div class="col-md-offset-1 col-md-4 ">
            	<div class="contact-information clearfix">
            	<div class="icon"><img src="images/icons-support.png"></div>
                <h4>
                	<p>Customer support</p>
                    <span> +91-9640878401 <span>
                </h4>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-4 ">
            <div class="contact-information clearfix">
            	<div class="icon"><img src="images/icons-mail.png"></div>
                <h4>
                	<p>Email support</p>
                     <span class="yellow-clr">thedoven@gmail.com</span>
                </h4>
                </div>
            </div>
         <div class="col-md-offset-1 col-md-4 ">
            <div class="contact-information clearfix">
            	<div class="icon"><img src="images/icons-mobile.png"></div>
                <h4>
                	<p>Mobile and email updates</p>
                     <span class="blue-clr">keep logon</span>
                </h4>
                </div>
            </div>
        </div>
        </div>
       

<!-- timers -->      
<!--<div class="timers-container">
	<div class="container">
    	<div class="row">
        	<div class="col-md-2 col-sm-2 text-center red-clr" id="counter">
            	<div class="prod-top count">52</div>
        		<div class="prod-text">Active Customers</div>
            </div>
            <div class="col-md-2 col-sm-2 text-center red-clr" id="counter">
            	<div class="prod-top count">500</div>
        		<div class="prod-text">Online users</div>
            </div>
            <div class="col-md-2 col-sm-2 text-center red-clr" id="counter">
            	<div class="prod-top count">250</div>
        		<div class="prod-text">Registerd users</div>
            </div>
            <div class="col-md-2 col-sm-2 text-center red-clr" id="counter">
            	<div class="prod-top count">120</div>
        		<div class="prod-text">Registerd clients</div>
            </div>
            <div class="col-md-2 col-sm-2 text-center red-clr" id="counter">
            	<div class="prod-top count">24</div>
        		<div class="prod-text">Employees</div>
            </div>
            <div class="col-md-2 col-sm-2 text-center red-clr" id="counter">
            	<div class="prod-top count">1670</div>
        		<div class="prod-text">Goods delivered</div>
            </div>
        </div>
    </div>
</div>      -->
<!-- timers end-->       
		<script>
	function search(string,near,popular,newdt)
{
	// alert('');
	var string2=string;
	//alert(string);
	if(string2!='')
	{
		var string2=$('#searchstore').val();
		$.post("search.php",{'searchdata':string2,'storeid':'<?php echo $sotreid;?>','near':near,'popular':popular,'new':newdt},function(data)
		{	
			$("#result").html(data);
		});
	}
	else
	{
		$("#result").html('');
	}
	// alert(string);

 
}
	</script>        
 
 <?php
include("footer.php");
?>
</body>
</html>

