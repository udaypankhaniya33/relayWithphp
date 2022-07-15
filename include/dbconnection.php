<?php
date_default_timezone_set("Asia/Kolkata"); 
// ob_start();
session_start();
$serverUsename = "relay_db";
$serverPassword =  'relay_db';
$connection = mysqli_connect("relay-db.cqrogiwnq1mr.me-south-1.rds.amazonaws.com", $serverUsename, $serverPassword) or die("Database Connection Failed.");
if(!$connection)
{
	echo "connection fail";

	///die("Database Connection Failed : " . mysqli_error($connection));

}
else
{

	mysqli_select_db($connection, "relay") or die("Database Selection Failed : " . mysqli_error($connection));

}
?>