<?php	                                       			
$server = "localhost";
$dbuser = "root";
$dbpw = "";
$db = "finall";
$con = mysqli_connect($server,$dbuser,$dbpw,$db);


if(!$con){
die('Opa, MySQL neiet!');
}

mysqli_set_charset($con,"utf8");
?>