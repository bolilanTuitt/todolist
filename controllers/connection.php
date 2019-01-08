<?php


$host = "db4free.net";
$username = "bolilanjeraldine";
$password = "yellowaddict";
$dbname = "todoappdb";

//establish connection to our database
$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
	die('Connection Failed: ' . mysql_error($conn) );
}
echo ' ';




?>