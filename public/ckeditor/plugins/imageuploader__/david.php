<?php
print __FILE__ ."<br>";
$dirHttp = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"] ."";
$dirApp = $_SERVER["PHP_SELF"] ."<br>";
//print $_SERVER["HTTP_REFERER"] ."<br>";
print __DIR__ ."<pre>";
print_r($_SERVER);
print "</pre>";
$foo = "Kell/e/y";

//var_dump(strrpos($foo, '/', 0));
$mycad=substr($dirApp, 0, strrpos($dirApp, '/', 0)+1);
print $dirHttp.$mycad;