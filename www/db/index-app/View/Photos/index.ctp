<?php
ob_start();
$imagedata = file_get_contents($file);
$length = strlen($imagedata);
header('Last-Modified: '.date('r'));
header('Accept-Ranges: bytes');
header('Content-Length: '.$length);
$fsize = filesize($file); 
$path_parts = pathinfo($file); 
$ext = strtolower($path_parts["extension"]);
switch ($ext) { 
      case "gif": $ctype="image/gif"; break; 
      case "png": $ctype="image/png"; break; 
      case "jpeg": $ctype="image/jpeg"; break; 
      case "jpg": $ctype="image/jpg"; break; 

    }
header('Content-Type: ' . $ctype);
print($imagedata);
ob_end_flush();
RequestHandlerComponent::respondAs($ctype);
?>