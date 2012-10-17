<?php require_once('core.php'); ?><!doctype html>
<html>
<head>
    <title>monipay.fr</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$ip = new ipv6;

if ($_GET['v6']) {

    echo '<div class="ip">Compressed IPv6 : ' . $ip->compress_ipv6() . '</div>';
    echo '<div class="reverse">Uncompressed IPv6 : ' . $ip->uncompress_ipv6() . '</div>';

}

if ($ip->is_ipv6()) {

    echo '<div class="ip">' . $ip->get_ip() . '</div>';

} else {

    echo '<div class="ip">' . $_SERVER["REMOTE_ADDR"] . '</div><div class="reverse">' . gethostbyaddr(
        $_SERVER["REMOTE_ADDR"]
    ) . '</div>';

}

?>
</body>
</html>