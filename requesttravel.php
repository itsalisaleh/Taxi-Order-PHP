<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request travel</title>
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
	<a href="booking.php" class="homebutton">home</a>
	
    <!-- Body of Form starts -->
  	<div class="container">
      <form method="post" action="requesttravel.php">
      		 <!------------------------------------------ -->
    		<div class="box">
          <label for="First-name" class="fl fontLabel"> First name</label>
    			
    			<div class="fr">
    					<input type="text" name="first-name" placeholder="First name"
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		

			<!------------------------------------------ -->
       
    		<div class="box">
          <label for="last name" class="fl fontLabel"> Last name </label>
    			
    			<div class="fr">
    					<input type="text" required name="last-name"
              placeholder="Last name" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
			<!------------------------------------------ -->
    		<div class="box">
          <label for="phone" class="fl fontLabel"> Phone.No</label>
    			
    			<div class="fr">
    					<input type="text" required   placeholder="Phone.No" class="textBox" name="phone-no">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!------------------------------------------ -->

    		<div class="box">
          <label for="Email" class="fl fontLabel"> Email </label>
    			
    			<div class="fr">
    					<input type="email" required name="email" placeholder="Email"  class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!------------------------------------------ -->
			<div class="box">
          <label for="sex" class="fl fontLabel"> Sex </label>
    			
    			<div class="fr">
    					<input type="radio" required name="sex" value="Male" >Male &nbsp; &nbsp; &nbsp;
						<input type="radio" required name="sex" value="Female" >Female &nbsp; &nbsp; &nbsp;
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!------------------------------------------ -->
			<div class="box">
          <label for="seats" class="fl fontLabel"> Seats </label>
    			
    			<div class="fr">
    					<input type="number" name="free-seats" placeholder="seats" max="5" min="1"
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
	
			<!------------------------------------------ -->
    		<div class="box" style="background: #23463f">
    				<input type="Submit" name="Submit" class="submit" value="request">
    		</div>
			
    		
      </form>
  </div>
    
</body>
</html>
<?php
include "DB_Functions.php";
    $dbc=connectServer('localhost','root','',0);		
    selectDB($dbc,"thedb",0);
    $id = $_SESSION['id'];
    $query = "SELECT * FROM travel WHERE ID='$id'";
    $res = mysqli_query($dbc, $query);
    
    while($row = mysqli_fetch_array($res)){
        $tsex = $row["Sex"];
        $tseat = $row["FreeSeats"];
        $tsmoking = $row["Smoking"];
        $tstufff = $row["Stufff"];
        
    } 
	if (isset($_POST['Submit'])){
        
		$email = $_POST['email'];
		$fn = $_POST['first-name'];
		$ln = $_POST['last-name'];
		$phone = $_POST['phone-no'];
		$seats = $_POST['free-seats'];
		$sex = $_POST['sex'];
		$smoking = $_POST['smoking'];
		$stufff = $_POST['stufff'];
        if(strcmp($tseat,$seats) >= 0 ){
            if(strcmp($tstufff,$stufff) >= 0){
                if(strcmp($tsmoking,$smoking) >= 0){
                    if(strcmp($tsex,$sex) <= 0){
                        $query = "INSERT INTO participant VALUES('$id','$fn','$ln','$sex','$phone','$email')";
                        executeQuery($dbc, $query);
                        $query = "UPDATE travel SET FreeSeats = FreeSeats-'$seats' WHERE ID='$id'";
                        executeQuery($dbc, $query);
                        echo "<script>alert('You get the ride !'); window.location.href='booking.php';</script>";
                    }
                    else {
                        echo "<script>alert('wrong sex'); window.location.href='requesttravel.php';</script>";
                    }
                }
                else {
                    echo "<script>alert('No smoking'); window.location.href='requesttravel.php';</script>";
                }
            }
            else {
                echo "<script>alert('No available stuf'); window.location.href='requesttravel.php';</script>";
            }
        }
        else {
            echo "<script>alert('No available seats'); window.location.href='requesttravel.php';</script>";
        }
    
    }
   
    
		?>