<?php
include "DB_Functions.php";
//connect to server
$dbc=connectServer('localhost','root','',1);		
//Select DB 
selectDB($dbc,"thedb",1);
//Create table


$query1 = 'CREATE TABLE customer (FirstName varchar(20) NOT NULL,
                                  LastName varchar(20) NOT NULL,
                                  Email varchar(20)  PRIMARY KEY,
                                  Phonenumber int NOT NULL,
                                  Sex varchar(30) NOT NULL
                                   )';
createTable($dbc,$query1,"customer");

$query = 'CREATE TABLE accounts (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                Email varchar(30) ,
                                Pass varchar(30) NOT NULL,
                                FOREIGN KEY (Email) REFERENCES customer(Email)
                                 ) ';
createTable($dbc,$query,"accounts");


$query1 = 'CREATE TABLE travel (   ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                   Fromm varchar(20) NOT NULL,  
                                   Too varchar(20) NOT NULL,
                                   Price INT NOT NULL,
                                   Datee date NOT NULL,
                                   Timess time NOT NULL, 
                                   Email varchar(30) NOT NULL,
                                   Sex varchar(30) NOT NULL,
                                   FreeSeats INT NOT NULL,
                                   Smoking varchar(3) NOT NULL,
                                   Stufff varchar(20) NOT NULL,
                                   Descriptionn varchar(90),
                                   FOREIGN KEY (Email) REFERENCES customer(Email)
                                   )';
createTable($dbc,$query1,"travel");

$query1 = 'CREATE TABLE participant (ID INT,
                                    FirstName varchar(20) NOT NULL,  
                                    LastName varchar(20) NOT NULL,
                                    Sex varchar(20) NOT NULL,
                                    Phone varchar(30) NOT NULL,
                                    Email varchar(30) NOT NULL,
                                    FOREIGN KEY (ID) REFERENCES travel(ID)
                                    
                                   )';
createTable($dbc,$query1,"participant");


mysqli_close($dbc); // Close the connection.
?>
