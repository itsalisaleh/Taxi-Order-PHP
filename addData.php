<?php
include "DB_Functions.php";
//connect to server
$dbc=connectServer('localhost','root','',1);		
//Select DB 
selectDB($dbc,"thedb",1);

$query = "INSERT INTO customer VALUES ('Ali','saleh','saleh@d.c','0304','Male')";
executeQuery($dbc, $query);
$query = "INSERT INTO customer VALUES ('hadi','dhaywi','hadi@d.c','0304','Male')";
executeQuery($dbc, $query);
$query = "INSERT INTO accounts(Email,Pass) VALUES ('saleh@d.c','pool')";
executeQuery($dbc, $query);
$query = "INSERT INTO accounts(Email,Pass) VALUES ('hadi@d.c','pool')";
executeQuery($dbc, $query);
$query = "INSERT INTO travel(Email,Stufff,Price,Fromm,Too,Timess,Datee,Sex,Smoking,FreeSeats,Descriptionn)
 VALUES ('saleh@d.c','No','12','baalbek','jnoub','01:55','2022-7-12','Male','No','2','no description')";
executeQuery($dbc, $query);
$query = "INSERT INTO travel(Email,Stufff,Price,Fromm,Too,Timess,Datee,Sex,Smoking,FreeSeats,Descriptionn)
 VALUES ('saleh@d.c','No','12','zahle','beirut','12:10','2022-12-10','Male','No','2','no description')";
executeQuery($dbc, $query);
$query = "INSERT INTO travel(Email,Stufff,Price,Fromm,Too,Timess,Datee,Sex,Smoking,FreeSeats,Descriptionn)
 VALUES ('hadi@d.c','No','12','jnoub','saida','9:30','2021-4-23','Female','No','1','no description')";
executeQuery($dbc, $query);
$query = "INSERT INTO participant(ID,Email,FirstName,LastName,Sex,phone) VALUES ('1','saleh@d.c','ahmad','hijazi','Male','221')";
executeQuery($dbc, $query);
$query = "INSERT INTO participant(ID,Email,FirstName,LastName,Sex,phone) VALUES ('2','hadi@d.c','hadi','hijazi','Male','221')";
executeQuery($dbc, $query);
$query = "INSERT INTO participant(ID,Email,FirstName,LastName,Sex,phone) VALUES ('2','saleh@d.c','nadin','hijazi','Female','221')";
executeQuery($dbc, $query);
$query = "INSERT INTO participant(ID,Email,FirstName,LastName,Sex,phone) VALUES ('2','saleh@d.c','ali','saleh','Male','221')";
executeQuery($dbc, $query);
$query = "INSERT INTO participant(ID,Email,FirstName,LastName,Sex,phone) VALUES ('3','hadi@d.c','ali','saleh','Male','221')";
executeQuery($dbc, $query);

?>