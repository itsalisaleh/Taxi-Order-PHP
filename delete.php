<?php
include "DB_Functions.php";
$dbc=connectServer('localhost','root','',0);		
selectDB($dbc,"thedb",0);

$id = $_GET['id'];
$query1 = "DELETE FROM participant WHERE ID ='$id'";
$query = "DELETE FROM travel WHERE ID='$id'";
mysqli_query($dbc,$query1);
mysqli_query($dbc,$query);
echo "<script>window.location.href='mypage.php';</script>";
?>