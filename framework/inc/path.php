<?php

if(array_key_exists('path', $_GET)) {
    $path = $_GET['path'];
}

if(!isset($path)) {
    $path = "index";
}
$path = str_replace("/", "-", $path);

if(endsWith($path, "-")) {
    $path = substr($path, 0, -1);
}