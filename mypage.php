<?php
    session_start();
    $email = $_SESSION["email"];
    include "DB_Functions.php";
    $dbc=connectServer('localhost','root','',0);		
    selectDB($dbc,"thedb",0);
    $sql = "SELECT * FROM travel WHERE Email='$email' ";
    $res = mysqli_query($dbc,$sql);
?> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My ride</title>
  <style>
    body{
  background-size: cover;
  background-color:#6abadeba;

}
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 500px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
    .styled-table th,
    .styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.logout {
  margin-left: 80%;
  color: black;
}
.delete {
    display: block;
    width: 40px;
    height: 15px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    line-height: 12px;
}
  
  </style>
</head>
<body>
  <a href="logout.php" class="logout">Logout</a>
  <a href="afterlogin.php" style="color:black">Home</a>
  <table class="styled-table" id="myTable">
    <thead>
          <tr>
              <th>ID</th>
              <th>From</th>
              <th>To</th>
              <th>Date</th>
              <th>Time</th>
              <th>FreeSeats</th>
              <th>Price</th>
              <th>Sex</th>
              <th>Stuf</th>
              <th>Smoke</th>
              <th>Description</th>
              
          </tr>
      </thead>
      <tbody>
         <?php
         if(mysqli_num_rows($res) > 0){
          echo "<h4>Your Ride !</h4>";
            while($row = mysqli_fetch_array($res)){
            ?>
                <tr>
                  <td><?php echo $row["ID"]; ?></td>
                  <td><?php echo $row["Fromm"]; ?></td>
                  <td><?php echo $row["Too"]; ?></td>
                  <td><?php echo $row["Datee"]; ?></td>
                  <td><?php echo $row["Timess"]; ?></td>
                  <td><?php echo $row["FreeSeats"]; ?></td>
                  <td><?php echo $row["Price"]; ?></td>
                  <td><?php echo $row["Sex"]; ?></td>
                  <td><?php echo $row["Stufff"]; ?></td>
                  <td><?php echo $row["Smoking"]; ?></td>
                  <td><?php echo $row["Descriptionn"]; ?></td>
                  <td><a class="delete" href="delete.php?id=<?=$row['ID'];?>">Delete</a></td>
                  <td><a class="delete" href="mypage.php?id=<?=$row['ID'];?>">Details</a></td>
                  </tr>
                  <?php }}
                  else {
                      echo "<h4>You dont have any Ride !</h4>";
                  }?>
            
      </tbody>
  </table>
  <script>
    function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);
}
    </script>
    <?php
    if (isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT * FROM participant WHERE ID='$id'";
      $res=mysqli_query($dbc,$query);
      ?>
        <table class="styled-table" id="myTable">
    <thead>
          <tr>
              <th>ID</th>
              <th>FirtsName</th>
              <th>LastName</th>
              <th>Sex</th>
              <th>Phone</th>
              <th>Email</th>
          </tr>
      </thead>
      <tbody>
         <?php
         if(mysqli_num_rows($res) > 0){
          echo "<h4>The participant of your Ride</h4>";
            while($row = mysqli_fetch_array($res)){
            ?>
                <tr>
                  <td><?php echo $row["ID"]; ?></td>
                  <td><?php echo $row["FirstName"]; ?></td>
                  <td><?php echo $row["LastName"]; ?></td>
                  <td><?php echo $row["Sex"]; ?></td>
                  <td><?php echo $row["Phone"]; ?></td>
                  <td><?php echo $row["Email"]; ?></td>
                  </tr>
                  <?php }}
                  else {
                      echo "<h4>You dont have any participant !</h4>";
                  }?>
            
      </tbody>
  </table>
    <?php
    }
    
      ?>
    </body>
</html>

