<?php
session_start();
include_once('dbfunction.php');
$obj = new dbfunction();
$stid=$_POST['storeid'];
$lat=$_SESSION['latitude'];
$lng=$_SESSION['longitude'];
//print_r($_SESSION);
//print_r($_COOKIE);
if($_SESSION['latitude']=='' || $_SESSION['longitude']=='')
{
	session_start();
	
	$_SESSION['latitude']=$_COOKIE['latttitude'];
	$_SESSION['longitude']=$_COOKIE['longitude'];
	$lat=$_SESSION['latitude'];
	$lng=$_SESSION['longitude'];
	//print_r($_SESSION);
}
//echo "lat".$lat."long".$lng;
	$query = "SELECT *,3963.0 * ACOS(SIN(stores.lat*PI()/180 ) * SIN( '$lat'*PI()/180 ) + COS( stores.lat*PI()/180 ) * COS( '$lat'*PI()/180 ) *  COS( ($lng*PI()/180) - (stores.lng*PI()/180) )) AS distance FROM stores WHERE products LIKE '%$stid%'";
	//echo $query;
 //$res = mysql_query($query) or die(mysql_error());		
if($_POST['searchdata']!='')
{
	$storename=$_POST['searchdata'];
	
	$query.= " and st_name LIKE '%$storename%'";
//echo $query;
}
else if($_POST['popular']!='')
{
	$query.= " ORDER BY  (SELECT AVG(rating) FROM `rating` WHERE stores.id=rating.storeid) DESC";

}
else if($_POST['new']!='')
{
	if($_POST['popular']!='')
{
	$query.= ",stores.id desc";
	
}
else{
	$query.= "  ORDER BY stores.id desc";
}

}
else if($_POST['near']!='')
{
		if($_POST['popular']!='' || $_POST['new']!='')
{
	$query.= ",distance ASC";
	
}

else{
	
		$query.= " ORDER BY distance ASC";
}


}
else{
	$query.= "";
}
	
// echo $query;
	
	$res = mysql_query($query) or die(mysql_error());




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
                                <span class="new"><?php echo $res_data['st_name']; ?></span> </div>
								<div class="mask" >
								
			                        <h4>Distance:<?php echo round($res_data['distance'] * 1.609344,2 ).'Kms';?></h4>
			                        <h2><?php echo $res_data['st_name']; ?></h2>
			                        <h3><?php echo $res_data['address']; ?></h3>
			                        <!--<div class="info"><i class="fa fa-search-plus"></i> </div>-->
			                    </div>
			                  	</div>
			                 </div>
				            </a> 
				       </div>
	              </div>
		<?php } ?>
