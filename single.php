<!DOCTYPE HTML>
<html>
<?php
include("header.php");
?>
<body>
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['product']=$actual_link;
 $sotreiid=$_GET['id']; 
  $sotreid=base64_decode($sotreiid);
include_once('dbfunction.php');
 $obj = new dbfunction();
  $res=$obj->get_single_store($sotreid);
   $resss=$obj->get_all_productes();
   $rateing=$obj->get_all_comments($sotreid);
  $res_data = mysql_fetch_array($res);
  //print_r($res_data);
  if(isset($_POST['comment']))
{
// print_r($_POST);
// echo "jkhfsfh";

$cname=$_POST['cname'];
$cemail=$_POST['cemail'];
$cwebsite=$_POST['cwebsite'];
$rating=$_POST['rating'];
$subject=$_POST['subject'];
$storeeidd=$_POST['storeidd'];
if($cemail=='')
$cemail=$_SESSION['emailid'];
if($cname=='')
$cname=$_SESSION['name'];

if($subject=='')
{
	echo "<script>alert('Please Enter a Comment...');</script>";
}
else{
$qq=$obj->add_comment($cname,$cemail,$cwebsite,$subject,$storeeidd,$rating);
if($qq==1)
{
	
header("Location:single.php?id=$sotreiid");
}
}

}

if(isset($_POST['sendmob']))
{
	// exit;
	if($_POST['custphone']!='' )
	{
		$pid=$sotreid;
		$cname=$_POST['custname'];
		$index=$_POST['custphone'];
		$index2=$res_data['contactno'];
		$message="Thankyou for Contacting us.We will get back to you soon!";
		$message2="A User with Number ".$index." requested an enquiry for your stores via shop@";
		   $link="http://login.rocktosms.com/api/web2sms.php?workingkey=1499313h210b69009aw9f&sender=RUSHME&to=$index&message=$message";
		   $link2="http://login.rocktosms.com/api/web2sms.php?workingkey=1499313h210b69009aw9f&sender=RUSHME&to=$index2&message=$message2";
                     // $homepage = fopen($link,'r');
                // $homepage2 = fopen($link2,'r');
				// echo 'dfb'.$response = file_get_contents($link);
				// header("location:".$link);
				echo "<script>$(document).ready(function(){
			$.get( 'http://login.rocktosms.com/api/web2sms.php',
{workingkey:'1499313h210b69009aw9f',sender:'RUSHME',to:'$index',message:'$message'}, function( data,status ) {

				});});</script>";
				echo "<script>$(document).ready(function(){
			$.get( 'http://login.rocktosms.com/api/web2sms.php',
{workingkey:'1499313h210b69009aw9f',sender:'RUSHME',to:'$index2',message:'$message2'}, function( data ) {
	
				});});</script>";

// if($homepage=="Invalid Mobile Numbers")
// {
 // $status="Not send";

// }
// else
// {
 // $status="send";


$in=mysql_query("insert into `product_enquiry` values('','$pid','$cname','$index','active')") or die(mysql_error());
if($in)
{
	// echo "ssd";
	echo "<script>alert('Your Message sent sucessfully...')</script>";
}
}

	}

 ?>
<?php
include("menu.php");
if($res_data['image']=='')
{
$img='nodata.jpg';
}
else
{
$img=$res_data['image'];
}
?>
<style>
.reservation_banner
 {
   background: url("datamanager/img/stores/<?php echo $img;?>") repeat;

 }
 .reservation_banner
 {
   background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.47)), rgba(0, 0, 0, 0.47)), url("datamanager/img/stores/<?php echo $img;?>");
   background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0.47)), rgba(0, 0, 0, 0.47)), url("datamanager/img/stores/<?php echo $img;?>");
   background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0.47), rgba(0, 0, 0, 0.47)), url("datamanager/img/stores/<?php echo $img;?>");
   background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0.47), rgba(0, 0, 0, 0.47)), url("datamanager/img/stores/<?php echo $img;?>");
   background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.47)), to(rgba(0, 0, 0, 0.47))), url("datamanager/img/stores/<?php echo $img;?>");
   background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.47), rgba(0, 0, 0, 0.47)), url("datamanager/img/stores/<?php echo $img;?>");
 }
</style>
   <!-- Ends Header -->
    <!------------ Start Content ---------------->
       <div class="main" style="padding-top:0px;"> 
         <div class="reservation_top">
		 	 <div class="reservation_banner">
<?php if($res_data['st_name']!='') { ?>	<div class="main_title"><?php echo $res_data['st_name'];?></div><?php } ?>	
		<div class="divider"></div>
	 </div><br>
	 <div class="show_product " >
           <div class="container">
             <div class="row">
<?php include("sidemenu.php"); ?>
            	<div class="col-md-9">
						<?php 
						if($sotreid!='')				
												{
						?>
            		<div class="post1">
                        <h3><?php echo $res_data['st_name'];?></h3>
						<p>
							 <span class="adrstxtr" id="fulladdress">
								<i class="fa fa-map-marker"></i>  <?php
if($res_data['address2']!='')
{
								echo $res_data['address2'].','.$res_data['address'];
								$address=$res_data["address2"].','.$res_data["address"];
								
					
						$locationarray2[]=array($address,$res_data["lat"],$res_data["lng"]);
							
					
						  // print_r($locationarray2);
					 
}
else{
$locationarray2[]=array("Hyderabad","17.4947934","78.3996441");
				
echo "Hyderabad";	
}
	  $locationdata=json_encode($locationarray2); 
								?>
								</span>
								<button type="button" class="btn btn-info pull-right" onClick="modalshow();">Get In Touch</button>
					<br/>
					 <?php
					 if($res_data['mobile']!='')
					 {
					 ?>
					<i class="fa fa-mobile"></i>  +(91)-<?php echo $res_data['mobile'];?>
					  <?php
					 }
				
					 if($res_data['contactno']!='')
					 {
					 ?>
					<br/><i class="fa fa-phone"></i>  <?php echo $res_data['contactno'];?>
					  <?php
					 }
					 ?>
					 <br/>
					  <?php
					 if($res_data['owner']!='')
					 {
					 ?>
					<i class="fa fa-user"></i> <b>Owner :</b> <?php echo $res_data['owner'];?>
					  <?php
					 }
					 ?>
					 </p>

			
                    </div>
			
					
						<div class="col-sm-12 paddingR0" style="padding-top:3%;box-shadow: 0px 8px 10px 0px #E4E4E4;
    border: 1px solid #eee;    background: #F9F9F9;">
	<h4 style="    padding-top:4%;font-size:16px;font-weight: 600;    color: #5A5A5A;">About <?php echo ucfirst($res_data['st_name']);?></h4>
	 <p style="    padding-bottom: 2%;"><?php echo $res_data['st_descript'];?></p>

	
					 	 	<?php
					if($res_data['timings']!=''){
						if(count(unserialize($res_data['timings'])) > 0){
							$timing=unserialize($res_data['timings']);
						?>
							<h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;color: #5A5A5A;">
							Timings </h4>
			<p style="    padding-bottom: 2%;">
								From - <?php echo $timing['from'];?> | To - <?php echo $timing['to'];?> 
					</p>
	<?php
												}	
					}
					
						if($res_data['seasonal']!=''){
						?>
							<h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;    color: #5A5A5A;">Seasonal Collection</h4>
			<p style="    padding-bottom: 2%;">
								<?php echo $res_data['seasonal'];?> we are offering a awesome collection according to season.
					</p>
	<?php
												}	
						if($res_data['discounting']!=''){
						?>						
			<h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;    color: #5A5A5A;">Discounting factor</h4>
					<p  style="    padding-bottom: 2%;">
								<?php echo $res_data['discounting'];?> Discounts are available for each product. <?php 
								if($res_data['other']!='')
								echo '-'.$res_data['other'];?>
					</p>
							<?php
												}
						if($res_data['restocking']!=''){
						?>
 <h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;    color: #5A5A5A;">Frequency of restocking</h4>
 <p style="    padding-bottom: 2%;">
				Our Frequency of restocking will be <?php echo $res_data['restocking'];?>
							</p>
						
						
						<?php
												}
												if($res_data['pricerange']!='')
												{
						$range=unserialize($res_data['pricerange']);
						if(count($range)>0){
						?>
 <h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;    color: #5A5A5A;">Range of clothes available</h4>
 <p style="    padding-bottom: 2%;">
								We Provide  wide range of clothes nearly <?php
							
							echo $range['from'].' to '.$range['to'];
								?>
				</p>
<?php
}
}
// }
?>
					
<p>
				 <script src="http://maps.google.com/maps/api/js?key=AIzaSyDOnCkAA7r1Xm9yOuC9N4KjRyGddTtXqik&sensor=false"></script>
				  <h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;color: #5A5A5A;">Locate Us</h4>
  <div id="map" style="width: 100%; height:250px;"></div>
	
     <script>
    // Define your locations: HTML content for the info window, latitude, longitude
	
    var locations = <?php echo $locationdata;?>;
  //  var myData = JSON.parse(locations);
	// alert(locations);
    // Setup the different icons and shadows
    var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';

    var icons = [
      iconURLPrefix + 'red-dot.png',
      iconURLPrefix + 'green-dot.png',
      iconURLPrefix + 'blue-dot.png',
      iconURLPrefix + 'orange-dot.png',
      iconURLPrefix + 'purple-dot.png',
      iconURLPrefix + 'pink-dot.png',      
      iconURLPrefix + 'yellow-dot.png'
    ]
    var iconsLength = icons.length;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(17.4947934, 78.3996441),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
	  scrollwheel:false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_BOTTOM
      }
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 260
    });

    var markers = new Array();
    
    var iconCounter = 0;
    
    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {  
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: icons[iconCounter]
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
		

      })(marker, i));
	  infowindow.setContent(locations[0][0]);
	  infowindow.open(map,marker);
      
      iconCounter++;
      // We only have a limited number of possible icon colors, so we may have to restart the counter
      if(iconCounter >= iconsLength) {
      	iconCounter = 0;
      }
    }

    function autoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      for (var i = 0; i < markers.length; i++) {  
				bounds.extend(markers[i].position);
      }
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
    autoCenter();
  </script> 

  


	</p>	
						
 <h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;    color: #5A5A5A;">Products</h4>
<p>
							 <ul style="list-style-type:circle">
									 	<?php $prod=explode(',',$res_data['products']);
										//echo count($prod);
											for($o=0;$o<count($prod);$o++)
											
										{
										?>
									 <li> <?php echo $prod[$o];?></li><br>
								<?php }	?>
							
							 </ul>
							 </p>

		       <?php
			   $offerimgcount='';
							 $offers=unserialize($res_data['offerimg']);
						$countoffer=strlen($offerimgcount) ? count($offers) : 0;

							 if($countoffer>0)
							 {
							 ?>
				       <div class="company_logos wow bounceIn" data-wow-delay="0.4s">
		          	<h3>Our Offers</h3>
		          	 <div class="ocarousel_slider">  
	      				<div class="ocarousel example_photos" data-ocarousel-perscroll="3">
			                <div class="ocarousel_window">
			                <?php
						
										//echo count($prod);
											for($f=0;$f<count($offers);$f++){
							?>
			                   <a href="#" title=""><img src="./datamanager/img/stores/<?php echo $offers[$f];?>"
							   class="img-responsive" alt="" style="width:200px;height:150px;"/></a>
			              <?php
}
							?>
			         
			                </div>
			               <span>           
			                <a href="#" data-ocarousel-link="left" class="prev"><i class="fa fa-angle-left"></i> </a>
			                <a href="#" data-ocarousel-link="right" class="next"> <i class="fa fa-angle-right"></i></a>
			               </span>
					   </div>
				     </div>      		
              </div>
          <?php
}
							?>
		<div class="col-sm-12">
			<div class="comments-area">
		  <h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;color: #5A5A5A;">Add New Comment</h4>
						
		  		     
							
							<form method="post" action="">
							<input id="" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars=5 
    data-symbol="&#xe006;" data-default-caption="{rating} stars" data-star-captions="{}" name="rating">
							
<input type="hidden" value="" name="userid">
									<input type="hidden" value="<?php echo $sotreid;?>" name="storeidd">	
										<div class="row">
						
								<!--
				<div class="col-md-5">														
<label>Name</label>
									<input type="text" value="" name="cname" class="form-control" 
									style="    border: 1px solid #ccc;background: #FFFFFF;width:100%">
									</div>
										<div class="col-md-5">
							<label>Email</label>
									<input type="text" value="" name="cemail" class="form-control" 
									style="    border: 1px solid #ccc;background: #FFFFFF;width:100%">
									</div>-->
								<!--<p>
									<label>Rating</label>
									<span>*</span>
									<input type="text" value="" name="rating">
								</p>
								<p>
									<label>Website (optional)</label>
									<input type="text" value="" name="cwebsite">
								</p>-->
								</div>
								<div class="row">
						
								<p>
									<label>Enter Your Comment</label>
									<span style="color:#e4411b;	position: absolute;	left: 4px;top: 30px;">*</span>
									<textarea name="subject" class="form-control"></textarea>
								</p>
								<p>
						
								<input type="submit" title="Submit Comment"  name="comment" 
								class="btn btn-info pull-right " target="_self" value="Submit Comment">
									
								</p></div>
							</form>
					  </div>
		<br/>
		</div>
		<div class="clear"> </div>
		<div class="col-md-12">
		<?php
		if(mysql_num_rows($rateing))
		{
		?>
					  <h4 style="border-top:1px solid #eee;    padding-top:4%;font-size:16px;font-weight: 600;color: #5A5A5A;">Reviews & Ratings</h4>
						
	<?php 
	$i=0;
	   while ($rateing_data = mysql_fetch_array($rateing)) {
		   $i++;
		   if($i<=5)
		   {
		?>
		<div class="comment_box">
		
			<div class="col-sm-1 col-md-1"><img src="images/profile-pic.png" alt="profile"/></div>
			<div class="col-sm-8 col-md-8"><?php echo $rateing_data['cname']; ?>
			<br/>
				<?php echo $rateing_data['message']; ?>
			</div>
			<div class="col-sm-3 col-md-3 text-right">
		<input id="" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars=5 
    data-symbol="&#xe006;" data-default-caption="{rating} stars" data-star-captions="{}" value="<?php echo $rateing_data['rating']; ?>" readonly>	
			</div>
			<div class="clear"> </div>
		</div>
		
		
			<?php
			}
	   }
			?>
			</div>
				<?php }
}
				else
				{
				?>
				No data found...
						<?php }?>
		</div>
		
	<div class="clear"> </div>
                    
               
            	
            </div>
            </div>
            </div>
           </div>
	     </div>
       </div>
	   <br/>
<?php
include("footer.php");
?>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Get In Touch</h4>
      </div>
      <div class="modal-body">
        <p>
		<form action="" method="post">
    <div class="col-md-12">
					<label>Enter Name</label>
		 <input class="input-xlarge focused form-control" id="" name="custname" type="text" />
				</div>
    <div class="col-md-12">
		<label>Enter Mobile Number</label>
		 <input class="input-xlarge focused form-control" id="" name="custphone" type="text"/>
	
		</div>
 <br/>  <br/> 
		  <button type="submit" class="btn btn-info" name="sendmob" style="margin-top:2%;" >Send</button>&nbsp;&nbsp;
		</form>
		 <br/>     
		</p>
      </div>
   
    </div>

  </div>
</div>

<script>
function modalshow()
{
	$("#myModal").modal();
}
</script>
</div>


<link rel="stylesheet" href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>

<script src="js/star-rating.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg',
              showClear: false
           });
           
        $('#btn-rating-input').on('click', function() {
            $('#rating-input').rating('refresh', {
                showClear:true, 
                disabled:true
            });
        });
        
        
        $('.btn-danger').on('click', function() {
            $("#kartik").rating('destroy');
        });
        
        $('.btn-success').on('click', function() {
            $("#kartik").rating('create');
        });
        
        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });
        
        
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script>
</body>
