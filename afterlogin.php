<?php
    session_start();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Page</title>
	<link rel="shortcut icon" href="images/icon.png"/>
	<style>
		* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;

    
    
}
body {
    background-image: url('images/cover.jpg');
    background-size: cover;
    
}

li,a {
    font-weight: 500;
    font-size: 16px;
    color: #edf0f1;
    text-decoration: none;
}
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 10%;
}
.logo{
    cursor: pointer;
}
.nav_links {
    list-style: none;
}
.nav_links li {
    display: inline-block;
    padding: 0px 20px;
}
.nav_links li a:hover {
    color: #0088a9;
}
.webname {
    font-size: x-large;
    font-family: serif; color:white;
   
}
.search {
    text-align: center;
    margin-top: 17%;

}
.date {
	
	background:#6abadeba url('images/c-icon.png');
	background-size:25px;
	background-repeat:no-repeat;
	background-position:100%;
	border:none;
	outline:none;
	height:40px;
	font-size:15px;
	font-weight:999;
	border-radius: 15px ;
}
input[type="date"]::-webkit-inner-spin-button,
input[type="date"]::-webkit-calendar-picker-indicator {
	color: rgba(0, 0, 0, 0);
    opacity: 1;
    display: block;
    background: url('images/c-icon.png') no-repeat;
    width: 10px;
    height: 20px;
    border-width: thin;
}
.leaving, .going, .number {
	background:white;
	background-position:100%;
	border-color:#6abadeba;
	border-radius: 15px ;
	outline:none;
	height:35px;
	font-size:20px;
	font-weight:500;
	font-family: Monospace;
	
}
 .search-box {
	background:#6abadeba;
	height:30px;
	width:60px;
	border-radius: 15px ;
	font-weight:700;
 }

	</style>
</head>
<body>
	
	<header>
		<a href="booking.php" class="webname">Khedni Ma3ak</a>
		<nav class="nav">
			<ul class="nav_links">
                <li><a href="addride.php">Publish a ride</a></li>
                <li><a href="mypage.php">My page</a></li>
                <li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="search">
		<form action="view.php" methode="post">
			<input type="text" placeholder="leaving From.." class="leaving" >
			<input type="text" placeholder="Going To.." class="going">
			<input type="date" class="date">
			<input type="number" min="1" max="5" class="number">
			<input type="submit" name="search" value="Search" class="search-box">
            
		</form>
	</div>
	
</body>
</html>
