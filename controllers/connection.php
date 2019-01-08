<?php


$host = "localhost";
$username = "root";
$password = "";
$dbname = "todo_app_db";

//establish connection to our database
$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
	die('Connection Failed: ' . mysql_error($conn) );
}
echo ' ';




?>