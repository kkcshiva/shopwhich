<?PHP
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['product']=$actual_link;
 $sotreid=$_GET['prod'];
 $sotreid=base64_decode($sotreid);
 $sotreid=str_replace("%20"," ",$sotreid);
 //echo $sotreid."srsfsd";
include_once('dbfunction.php');
 $obj = new dbfunction();
 
if(isset($_GET['page']))
$offset=$_GET['page'];
else
$offset=0;

 $res=$obj->get_product_storeswith_pages($sotreid,$offset);
 $res2=$obj->get_product_stores($sotreid);
 $resss=$obj->get_all_productes();
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
   <!-- Ends Header -->
    <!------------ Start Content ---------------->
        <div class="main">        	
         <div class="container">          	 
	 		 <div class="row grids text-center">
				<!--<h3 style="font-family:Open Sans Condensed, sans-serif;
	color:#000;
	margin-bottom:15px;
	text-transform:uppercase;
	text-align:center;
	font-size:2em;
	font-weight:700;">Products</h3>-->
	<br>
	 <div class="row">
<?php include("sidemenu.php"); ?>
           
            	<div class="col-md-9">
			<div class="row text-center">
			<div class="col-md-5  pull-right" style="padding-left:0;">
			<div class="col-md-6" style="padding-left:0;">
		  <label style="float:right;padding-top:4px;font-weight:500;">Search by Name : </label> 
		  </div>	
		  <div class="col-md-6"   style="padding-left:0;padding-bottom:1%;">
		  <input type="text" onkeyup="search(this.value,'','','')" id="string" class="form-control"
		   style="float:left;    height: 30px;"/>
</div>
</div>
<div class="col-md-7  pull-right" style="padding-top:4px;padding-right:0;">

<button class="btn btn-info btn-xs" onclick="search('','','popular','')">Popular</button>

<button class="btn btn-info btn-xs" style="margin-right:2px;" onclick="search('','near','','')">Near</button>

<button class="btn btn-info btn-xs" style="margin-right:2px;" onclick="search('','','','new')"> New</button>



</div>
</div>
<br/>
	<div class="row text-center" id='result'>
			
				   
				   
				   <?php
				   while ($res_data = mysql_fetch_array($res)) {
if($res_data['status']==1){
	$state="label-success";
}else{
	$state="label-warning";
}
$str = substr($res_data['st_descript'], 0, 100).'...'; 
				   ?>
				 <div class="col-md-4">
					<div class="view view-tenth">
					      <a href="single.php?id=<?php echo base64_encode($res_data['id']) ?>">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="datamanager/img/stores/<?php echo $res_data['image']; ?>" class="img-responsive" alt=""/>
								<div class="label-product">
                                <span class="new"><?PHP echo $res_data['st_name']; ?></span> </div>
								<div class="mask" >
								
			                        <h4>Distance:<?php echo round($res_data['distance'] * 1.609344,2 ).'Kms';?></h4>
			                        <h2><?PHP echo $res_data['st_name']; ?></h2>
			                        <h3><?PHP echo $res_data['address']; ?></h3>
			                        <!--<div class="info"><i class="fa fa-search-plus"></i> </div>-->
			                    </div>
			                  	</div>
			                 </div>
				            </a> 
				       </div>
	              </div>
		<?php } ?>
				   </div>
				   </div>
				   </div>
<?php
$num_rec_per_page=15;
$total_records = mysql_num_rows($res2); 
$total_pages = ceil($total_records / $num_rec_per_page); 
?>	   
<ul class="pagination">
<?php
for ($i=1; $i<$total_pages; $i++) { 
?>
<li ><a href="productesrelated.php?page=<?php echo $i;?>&prod=<?php echo $_GET['prod'];?>"
style="    border-radius: 0;    background: #EF534E;    color: white;"><?php echo $i;?></a></li>
<?php
}
?>	
</ul>


				 
				   
          <hr>
          <!--
		       <div class="company_logos wow bounceIn" data-wow-delay="0.4s">
		          	<h3>Our Gallery</h3>
		          	 <div class="ocarousel_slider">  
	      				<div class="ocarousel example_photos" data-ocarousel-perscroll="3">
			                <div class="ocarousel_window">
			  
			                   <a href="#" title=""><img src="images/g2.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title=""><img src="images/g3.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title=""><img src="images/g4.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title=""><img src="images/g5.jpg" class="img-responsive" alt="" /></a>
			                    <a href="#" title=""><img src="images/g6.jpg" class="img-responsive" alt="" /></a>
			                   <a href="#" title=""><img src="images/g7.jpg" class="img-responsive" alt="" /></a>
			                  
			                </div>
			               <span>           
			                <a href="#" data-ocarousel-link="left" class="prev"><i class="fa fa-angle-left"></i> </a>
			                <a href="#" data-ocarousel-link="right" class="next"> <i class="fa fa-angle-right"></i></a>
			               </span>
					   </div>
				     </div>      		
              </div>-->
        </div>
	</div>	
		<script>
	function search(string,near,popular,newdt)
{
	// alert('');
	var string2=string;
	if(string2=='')
	{
		var string2=$('#string').val();
	}
	// alert(string);
 $.post("search.php",{'searchdata':string2,'storeid':'<?php echo $sotreid;?>','near':near,'popular':popular,'new':newdt},function(data){
		// alert(data);
	
		$("#result").html(data);
});
 // var stringdata = 'searchdata=' + string2;
  // request = $.ajax({
        // url: "search.php",
        // type: "post",
        // data: string2
    // })
	// request.done(function (response,textStatus){

        // alert(response);
    // });
}
	</script>
<!--Footer Starts-->
<?php
include("footer.php");
?>
</body>
</html>

