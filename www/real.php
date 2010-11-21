<?php

function getClientIp() {

	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		
		$IP = $_SERVER['HTTP_X_FORWARDED_FOR'];

	} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
	
		$IP = $_SERVER['HTTP_CLIENT_IP'];   
		
    } else {

		$IP = $_SERVER['REMOTE_ADDR'];
	
	}
	
	preg_match_all("/^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})/",$IP,$r);
	$IP = $r[0][0];

	return $IP;

}

echo '<font style="font-size: 50px;">'.getClientIp().'</font>';

?>