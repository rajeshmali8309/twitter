<?php 
session_start();
if(isset($_SESSION["userid"])){
    unset($_SESSION['userid']);
    unset($_SESSION['firstchr']);
    header("location:signup.php");
}
?>