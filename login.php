<?php
    session_start();
?>
<!DOCTYPE html>    
<html>    
<head>    
    <title>Login</title>    
    <style>
        body  
{  
    margin: 0;  
    padding: 0;  
    background-color:#6abadeba;  
    font-family: 'Arial';  
}  
.login{  
        width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 20 0 0 450px;  
        padding: 80px;  
        background: #23463f;  
        border-radius: 15px ;  
          
}  
h2{  
    text-align: center;  
    color: #277582;  
    padding: 20px;  
}  
label{  
    color: #08ffd1;  
    font-size: 17px;  
}  
#email{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
}  
#Pass{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
      
} 
#sub{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 17px;  
    padding-left: 7px;  
    color: white; 
    background: #6abadeba; 
  
  
}  
span{  
    color: white;  
    font-size: 17px;  
}  
a{  
    float: right;  
    background-color: grey;  
}  
    </style>  
</head>    
<body>    
    <h2>Login Page</h2><br>    
    <div class="login">    
    <form id="login" method="post" action="login.php">    
        <label><b>Your Email    
        </b>    
        </label>    
        <input type="email" name="email" id="email" placeholder="Email">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="Pass" id="Pass" placeholder="Password">    
        <br><br>    
        <input type="Submit" name="Submit" id="sub" value="Log In Here">
    </form>   
         <div class="already">
			<a style="color: #08ffd1" " href="signup.php">don't have account? Signup</a>
         </div>  
</div>    
</body>    
</html>
<?php 
    include "DB_Functions.php";
    $dbc=connectServer('localhost','root','',0);		
    selectDB($dbc,"thedb",0);
    if (isset($_POST['Submit'])){
        $email = $_POST['email'];
        $pass = $_POST['Pass'];
        $sql = "SELECT * FROM accounts WHERE Email = '$email' and Pass = '$pass'";
        $result = mysqli_query($dbc, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){
            $_SESSION["email"] = $email;  
            echo "<script>window.location.href='afterlogin.php'</script>"; 
        }  
        else{  
            echo "<script>alert('Email or Password Wrong'); window.location.href='login.php';</script>";
        }     
        
    }

?>