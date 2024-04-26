<?php
    session_start();
    $_SESSION['id'] = $_GET['id'];
   echo "<script>window.location.href='requesttravel.php';</script>";
?>