<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
$host = "nuskkyrsgmn5rw8c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$port = "3306";
$username = "fa6rh2h53fi75c3w";
$user_pass = "ywriuxizmg199v7g";
$database_in_use = "x87fwmcgk6fcmfkn";


$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

?>
