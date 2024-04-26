<?php
include "DB_Functions.php";
$dbc=connectServer('localhost','root','',0);
selectDB($dbc,"thedb",0);
deletedb($dbc,"thedb");
mysqli_close($dbc);	
?>