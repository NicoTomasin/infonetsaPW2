<?php
    $folderPath = dirname($_SERVER['SCRIPT_NAME']);
    $urlPath = $_SERVER['REQUEST_URI'];
    $len = strlen($folderPath);
    $url = substr($urlPath , $len);

    define('URL', $url);