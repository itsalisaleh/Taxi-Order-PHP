<?php
include "DB_Functions.php";
//connect to server
$dbc=connectServer('localhost','root','',1);
//create data base
createDB($dbc,"thedb");
mysqli_close($dbc); // Close the connection.
?>
