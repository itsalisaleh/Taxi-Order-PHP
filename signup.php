<?php
	session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>SighUp</title>
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
	width: 400px;
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
	margin-top: 10px;
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


    </style>
</head>
  <body>
    <!-- Body of Form starts -->
  	<div class="container">
      <form method="post" action="signup.php">
        <!--First name-->
    		<div class="box">
          <label for="firstName" class="fl fontLabel"> First Name: </label>
    			<div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
    			<div class="fr">
    					<input type="text" name="firstName" placeholder="First Name"
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--First name-->


        <!--Second name-->
    		<div class="box">
          <label for="secondName" class="fl fontLabel"> Seconed Name: </label>
    			<div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="secondName"
              placeholder="Last Name" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Second name-->


    		<!---Phone No.------>
    		<div class="box">
          <label for="phone" class="fl fontLabel"> Phone No.: </label>
    			<div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="phoneNo" maxlength="10" placeholder="Phone No." class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Phone No.---->


    		<!---Email ID---->
    		<div class="box">
          <label for="email" class="fl fontLabel"> Email ID: </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="email" required name="email" placeholder="Email Id" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Email ID----->


    		<!---Password------>
    		<div class="box">
          <label for="password" class="fl fontLabel"> Password </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="password" placeholder="Password" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Password---->

    		<!---Gender----->
    		<div class="box radio">
          <label for="gender" class="fl fontLabel"> Gender: </label>
    				<input type="radio" name="Gender" value="Male" required> Male &nbsp; &nbsp; &nbsp; &nbsp;
    				<input type="radio" name="Gender" value="Female" required> Female
    		</div>
    		<!---Gender--->


    		<!---Submit Button------>
    		<div class="box" style="background: #23463f">
    				<input type="Submit" name="Submit" class="submit" value="SUBMIT">
    		</div>
			<div class="already">
				<a style="color: #08ffd1" href="login.php">already have account</a>
			</div>
    		<!---Submit Button----->
      </form>
  </div>
  <!--Body of Form ends--->
  </body>
</html>
<?php
    include "DB_Functions.php";
    $dbc=connectServer('localhost','root','',0);		
    selectDB($dbc,"thedb",0);
	if (isset($_POST['Submit'])){
		$fname = $_POST['firstName'];
		$lname = $_POST['secondName'];
		$phone = $_POST['phoneNo'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$sex = $_POST['Gender'];
		$_SESSION["email"] = $email;
		//Check if the email exist
		$sql = "SELECT * FROM accounts WHERE Email='$email'";
		$res = mysqli_query($dbc, $sql);
		if(mysqli_num_rows($res) > 0){
			echo "<script>alert('The email is already exist'); window.location.href='signup.php';</script>";
		  }else{
			$query = "INSERT INTO customer(FirstName,LastName,Email,Phonenumber,Sex) VALUES ('$fname','$lname','$email','$phone','$sex')";
			$query2 = "INSERT INTO accounts(Email,Pass) VALUES ('$email','$pass')";
			executeQuery($dbc, $query);
			executeQuery($dbc, $query2);
			echo "<script>window.location.href='afterlogin.php'</script>";
		  }

	}



?>
