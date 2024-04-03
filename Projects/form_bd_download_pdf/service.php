<?php

require_once __DIR__ . "/Config/Connection.php";

//print_r($_POST);

$path =  __DIR__ . '/class/' . $_GET["class"] . ".php";
 
//print_r($_POST);

require_once $path;

call_user_func_array(array($_GET["class"], $_GET["method"]), [$_POST]);


//$index = __DIR__ . "/index.php";



