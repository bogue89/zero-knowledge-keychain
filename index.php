<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    
    include_once('functions.php');
    include_once('ZKKSecurity.php');


    echo ZKKSecurity::hash('whatever you want to use as key');
?>