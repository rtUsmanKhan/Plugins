<?php
//phpinfo();
/*ldap_set_option($con, LDAP_OPT_PROTOCOL_VERSION, 3);


$ldaphost = "127.0.0.1";  // your ldap servers
$ldapport = '389';                 // your ldap server's port number

$ldapconn = ldap_connect($ldaphost, $ldapport)
          or die("Could not connect to $ldaphost");
echo $ldapconn. " Connection Info -> ".ldap_error($ldapconn);echo "<br>";
$debug = true;

$ldapuser = 'cn=admin ,dc=test ,dc=com'; $ldappass='123';
if ($debug) {
  ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
}

//echo "Trying to bind with $ldapuser - $ldappass";echo "<br>";

$ldapbind = ldap_bind($ldapconn, $ldapuser, '123');
echo $ldapconn."--".$ldapbind;
if (!$ldapbind) {
echo "Unable to bind to server $ldaphost";echo "<br>";
echo "OpenLdap error messages: " . ldap_error($ldapconn) . "\n";
}
else
{
	echo "else";
}
$result = @ldap_search($ldapconn, 'ou=users,dc=test,dc=com', '(cn=test)', array("cn", 'userPrincipleName'));
echo $result;
echo $ldapconn;
 $info = ldap_get_entries($ldapconn, $result);

print_r($info);
for ($i=0;$i<5;$i++)
{
  if($i==2)
   {
	continue;
	echo "ok";
   }
  if ($i!=2) {
	echo "==";echo "<br>";
     }
}*/
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();

$device_details =   "<strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."";

print_r($device_details);

//echo("<br /><br /><br />".$_SERVER['HTTP_USER_AGENT']."");
?>
