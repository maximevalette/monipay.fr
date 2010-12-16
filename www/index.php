<?php 

$curl = false;
if (preg_match("/(curl|wget)/i",$_SERVER['HTTP_USER_AGENT'])) $curl = true;

class ipv6 
{ 

function is_ipv6($ip = "") 
{ 
  if ($ip == "") 
  { 
     $ip = ipv6::get_ip(); 
  } 
  if (substr_count($ip,":") > 0 && substr_count($ip,".") == 0){ 
   return true; 
  } else { 
   return false; 
  } 
} 

/* 
* Detect if an IP is IPv4 
* 
* @param ip adresse ip א tester 
* @return true / false 
*/ 
function is_ipv4($ip = "") 
{ 
  return !ipv6::is_ipv6($ip); 
} 

/* 
* return user IP 
* 
* @return IP 
*/ 
function get_ip() 
{ 
  return  getenv ("REMOTE_ADDR"); 
} 

/* 
* Uncompress an IPv6 address 
* 
* @param ip adresse IP IPv6 א dיcompresser 
* @return ip adresse IP IPv6 dיcompressי 
*/ 
function uncompress_ipv6($ip ="") 
{ 
  if ($ip == "") 
  { 
   $ip = ipv6::get_ip(); 
  } 
  if(strstr($ip,"::" )) 
  { 
   $e = explode(":", $ip); 
   $s = 8-sizeof($e)+1; 
   foreach($e as $key=>$val) 
   { 
    if ($val == "") 
    { 
     for($i==0;$i<=$s;$i++) 
     $newip[] = 0; 
    } else { 
     $newip[] = $val; 
    } 
   } 
   $ip = implode(":", $newip); 
  } 
  return $ip; 
} 

/* 
* Compress an IPv6 address 
* 
* @param ip adresse IP IPv6 א compresser 
* @return ip adresse IP IPv6 compressי 
*/ 
function compress_ipv6($ip ="") 
{ 
  if ($ip == "") 
  { 
   $ip = ipv6::get_ip(); 
  } 
  if(!strstr($ip,"::" )) 
  { 
   $e = explode(":", $ip); 
   $zeros = array(0); 
   $result = array_intersect ($e, $zeros ); 
   if (sizeof($result) >= 6) 
   { 
    if ($e[0]==0) {$newip[] = "";} 
    foreach($e as $key=>$val) 
    { 
     if ($val !=="0") 
     { 
      $newip[] = $val; 
     } 
    } 
    $ip = implode("::", $newip); 
   } 
  } 
  return $ip; 
} 
} 

if (!$curl) {

?>

<html>
<head>
<title>monipay.fr</title>
<style>
	.ip {
		margin-left: auto;
		margin-right: auto;
		width: 600px;
		text-align: center;
		font-size: 100px;
	}
	.reverse {
		margin-left: auto;
		margin-right: auto;
		width: 600px;
		text-align: center;
		font-size: 30px;
	}
</style>
</head>
<body>
<?php

if ($_GET['v6']) {
	echo " IPv6 compression : ".ipv6::compress_ipv6(ipv6::get_ip())." "; 
	echo "IPv6 Uncompression : ".ipv6::uncompress_ipv6(ipv6::get_ip());
}

if (ipv6::is_ipv6()) {

	echo '<div class="ip">'.ipv6::get_ip().'</div>';	

} else {

	echo '<div class="ip">'.$_SERVER["REMOTE_ADDR"].'</div><div class="reverse">'.gethostbyaddr($_SERVER["REMOTE_ADDR"]).'</div>';

}

?>
</body>
</html>
<?php

} else {

	echo $_SERVER["REMOTE_ADDR"].' / '.gethostbyaddr($_SERVER["REMOTE_ADDR"]);

}

?>