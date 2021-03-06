<?php

if (preg_match("/(curl|wget)/i", $_SERVER['HTTP_USER_AGENT'])) {
    die($_SERVER["REMOTE_ADDR"] . ' / ' . gethostbyaddr($_SERVER["REMOTE_ADDR"]));
}

class ipv6
{

    function is_ipv6($ip = "")
    {
        if ($ip == "") {
            $ip = ipv6::get_ip();
        }
        if (substr_count($ip, ":") > 0 && substr_count($ip, ".") == 0) {
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
        return getenv("REMOTE_ADDR");
    }

    /*
    * Uncompress an IPv6 address
    *
    * @param ip adresse IP IPv6 א dיcompresser
    * @return ip adresse IP IPv6 dיcompressי
    */
    function uncompress_ipv6($ip = "")
    {
        if ($ip == "") {
            $ip = ipv6::get_ip();
        }
        if (strstr($ip, "::")) {
            $e = explode(":", $ip);
            $s = 8 - sizeof($e) + 1;
            $newip = array();
            foreach ($e as $key => $val) {
                if ($val == "") {
                    for ($i = 0; $i <= $s; $i++) {
                        $newip[] = 0;
                    }
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
    function compress_ipv6($ip = "")
    {
        if ($ip == "") {
            $ip = ipv6::get_ip();
        }
        if (!strstr($ip, "::")) {
            $e = explode(":", $ip);
            $zeros = array(0);
            $result = array_intersect($e, $zeros);
            $newip = array();
            if (sizeof($result) >= 6) {
                if ($e[0] == 0) {
                    $newip[] = "";
                }
                foreach ($e as $key => $val) {
                    if ($val !== "0") {
                        $newip[] = $val;
                    }
                }
                $ip = implode("::", $newip);
            }
        }

        return $ip;
    }

}