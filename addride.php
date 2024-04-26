<?php
	session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ride</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
	padding: 0;
	margin: 0;
}
body{
  background-size: cover;
  background-color:#6abadeba;

}

.container{
	background: #23463f; /* #2d3e3f*/ 
	width: 430px;
	height: 400px;
	padding-bottom: 20px;
	position: absolute;
	top:50%;
	left: 50%;
	transform: translate(-50%, -50%);
	margin: auto;
    padding: 70px 50px 20px 50px;
	border-radius: 15px ;  
}


.fl{
	float: left;
  width: 110px;
  line-height: 35px;
}

.fontLabel{
  color: #08ffd1;
}

.fr{
	float: right;
}

.clr{
	clear: both;
}

.box{
	width: 360px;
	height: 35px;
	margin-top: 5px;
	font-family: verdana;
	font-size: 12px;
}

.textBox{
	height: 35px;
	width: 190px;
	border: none;
  padding-left: 20px;
}

.new{
  float: left;
}

.iconBox{
	height: 40px;
	width: 50px;
	line-height: 38px;
	text-align: center;
  /*background: #2d3e3f*/
}

.radio{
	color: #08ffd1;
	/*background: #2d3e3f;*/
	line-height: 38px;
}


.submit{
	float: right;
	border: none;
	color: white;
	width: 110px;
	height: 35px;
	background: #6abadeba;
	text-transform: uppercase;
  cursor: pointer;
}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */

}
.homebutton {
	color:black;
	margin-left:80%; 
}

    </style>
</head>
  <body>
	<a href="afterlogin.php" class="homebutton">home</a>
	
    <!-- Body of Form starts -->
  	<div class="container">
      <form method="post" action="addride.php">
      		 <!------------------------------------------ -->
    		<div class="box">
          <label for="From" class="fl fontLabel"> From: </label>
    			
    			<div class="fr">
    					<input type="text" name="from" placeholder="From.."
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		

			<!------------------------------------------ -->
       
    		<div class="box">
          <label for="To" class="fl fontLabel"> TO: </label>
    			
    			<div class="fr">
    					<input type="text" required name="to"
              placeholder="TO.." class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
			<!------------------------------------------ -->
    		<div class="box">
          <label for="datetime" class="fl fontLabel"> date & time</label>
    			
    			<div class="fr">
    					<input type="datetime-local" required  maxlength="10" placeholder="date & time" class="textBox" name="datetime">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!------------------------------------------ -->

    		<div class="box">
          <label for="freeseats" class="fl fontLabel"> Free Seats </label>
    			
    			<div class="fr">
    					<input type="number" required name="free-seats" placeholder="number of seats" min="1" max="5" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!------------------------------------------ -->
			<div class="box">
          <label for="sex" class="fl fontLabel"> Sex </label>
    			
    			<div class="fr">
    					<input type="radio" required name="sex" value="Male" >Male &nbsp; &nbsp; &nbsp;
						<input type="radio" required name="sex" value="Female" >Female &nbsp; &nbsp; &nbsp;
						<input type="radio" required name="sex" value="Both" >Both
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!------------------------------------------ -->
			<div class="box">
          <label for="price" class="fl fontLabel"> Price </label>
    			
    			<div class="fr">
    					<input type="text" name="price" placeholder="in $"
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!------------------------------------------ -->
			<div class="box">
          <label for="smoking" class="fl fontLabel"> Smoking ? </label>
    			
    			<div class="fr">
    					<input type="radio" name="smoking" value="Yes"  required>Yes &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
						<input type="radio" name="smoking" value="No"  required>No
    			</div>
    			<div class="clr"></div>
    		</div>
			<!------------------------------------------ -->
			<div class="box">
          <label for="stufff" class="fl fontLabel"> place for stuff </label>
    			
    			<div class="fr">
    					<input type="radio" name="stufff" value="Yes" required>Yes &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
						<input type="radio" name="stufff" required value="No">No
    			</div>
    			<div class="clr"></div>
    		</div>
			<!------------------------------------------ -->
			<div class="box">
          <label for="des" class="fl fontLabel"> Description</label>
    			
    			<div class="fr">
    					<input type="text" name="des"  placeholder="anything ?"
              class="textBox" autofocus="on">
    			</div>
    			<div class="clr"></div>
    		</div>
			<!------------------------------------------ -->
    		<div class="box" style="background: #23463f">
    				<input type="Submit" name="Submit" class="submit" value="ADD">
    		</div>
			
    		
      </form>
  </div>
    
</body>
</html>
<?php
include "DB_Functions.php";
    $dbc=connectServer('localhost','root','',0);		
    selectDB($dbc,"thedb",0);
	if (isset($_POST['Submit'])){
		$email = $_SESSION["email"];
		$from = $_POST['from'];
		$to = $_POST['to'];
		$price = $_POST['price'];
		$freeseats = $_POST['free-seats'];
		$sex = $_POST['sex'];
		$smoking = $_POST['smoking'];
		$stufff = $_POST['stufff'];
		$description = $_POST['des'];
		$date=explode('T',$_POST['datetime'])[0];
		$time=explode('T',$_POST['datetime'])[1];
		
		$query = "INSERT INTO travel(Email,Fromm,Too,Datee,Timess,Price,FreeSeats,Sex,Smoking,Stufff,Descriptionn)
		 VALUES ('$email','$from','$to','$date','$time','$price','$freeseats','$sex','$smoking','$stufff','$description')";
		executeQuery($dbc, $query);
	}
		?>