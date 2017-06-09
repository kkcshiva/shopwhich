<?php

			   
// $ip = '71.34.177.144';
    echo $ip=$_SERVER['REMOTE_ADDR'];
//echo  $response=@file_get_contents( 'http://www.netip.de/search?query='.$ip );
 ?>
<html>
<head>
 <title>What is my IP address?</title>
</head>
<body>
<?php
 echo "lll".$pipaddress = getenv('HTTP_X_FORWARDED_FOR')."yyy";
    if (getenv('HTTP_X_FORWARDED_FOR')) {
        $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
        $ipaddress = getenv('REMOTE_ADDR');
echo "Your Proxy IP address is : ".$pipaddress. "(via $ipaddress)" ;
    } else {
        $ipaddress = getenv('REMOTE_ADDR');
        echo "Your IP address is : $ipaddress";
    }
?>
</body>
</html> 