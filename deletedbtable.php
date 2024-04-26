<?php
include "DB_Functions.php";
$dbc=connectServer('localhost','root','',0);
selectDB($dbc,"thedb",0);
deleteTable($dbc,"participant");
deleteTable($dbc,"travel");
deleteTable($dbc,"accounts");
deleteTable($dbc,"customer");

mysqli_close($dbc);	
?>