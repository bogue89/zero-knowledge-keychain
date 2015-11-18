<?php
	
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('functions.php');
include_once('ZKKGenerator.php');

$output = null;//"json"//"xml"//"plain";

if(isset($_GET['output'])) {
	$output = $_GET['output'];
}
$user = [
	'username'=>'bogue89@gmail.com',
	'password'=>"it's secret",
	'seed'=>$_GET['seed']
];
$request = [
	'context' => $_GET['context'],
	'username' => $_GET['username']
];
$password = ZKKGenerator::generatePassword($request, $user['seed']);

if($output == "json"){
	header('Content-type: text/plain');
	exit(json_encode(['user'=>$user,'request'=>$request,'password'=>$password]));
} if($output == "xml"){
	
} else {
	header('Content-type: text/plain');
	exit($password);
}