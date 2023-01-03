<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$dbhost='localhost';
$dbusername='root';
$dbpass= '';
$dbname='demo';
 
/* Attempt to connect to MySQL database */
$mysqli= mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>