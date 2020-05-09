<?php
/*
==name == 
==source = 

*/

//*** Database configuration  */
$dbHost    = "localhost";
$dbUsername  = "root";
$dbPassword   = "";
$dbName       = "dynamic_country_state_dropdown";

//** create database connection */
$dbconnect     = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//** Check connection */
if($dbconnect->connect_error){
    die("Connection failed: " . $dbconnect->connect_error);
}

?>