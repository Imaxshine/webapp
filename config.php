<?php
$host = "localhost";
$servername = 'root';
$password = "";
$DBname = "webapp";
$conn = new mysqli($host,$servername,$password,$DBname);
if($conn->connect_error)
{
    die('Failed to make connection. ' . $conn->connect_error);
}else{
    // print 'Connection successfully';
}