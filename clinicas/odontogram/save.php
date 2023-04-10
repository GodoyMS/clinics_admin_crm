<?php

$raw = file_get_contents('php://input'); //string
//	var_dump($raw); die();
$raw = rawurldecode($raw);
$raw = substr($raw, strpos($raw, "=")+1);
$r=mt_rand();
//Need to remove the stuff at the beginning of the string
$ext=substr($raw, 11, 10); 
$ext=stristr($ext, ';', true); 
$sda = substr($raw, strpos($raw, ",")+1);
$sda = base64_decode($sda);
$name = "odontogram-$r.";

//file_put_contents('txts/'.$name.'txt',$raw);
$filename='images/'.$name.$ext;
file_put_contents($filename, $sda);

$success=true;
echo json_encode(compact('success','filename'));
