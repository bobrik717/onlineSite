<?php

echo "<pre>";
print_r(11111111111);
echo "</pre>";
die;

ini_set('error_reporting', E_ERROR, E_WARNING);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
require_once 'application/bootstrap.php';
