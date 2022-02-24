<?php
session_start();
$serverName = "localhost";
$userName = "labReport";
$password = "123456";
$dbName = "weblabreport";

$dbConnection = mysqli_connect($serverName, $userName, $password, $dbName);

if($dbConnection){
    
}else{
    print_r($dbConnection)."<br>";
}
?>