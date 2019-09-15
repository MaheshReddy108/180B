<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "EC2mdb2@";
$dbName = "Cricket_Tournament";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn)
{
  die('Could not connect: ' . mysql_error());
}

