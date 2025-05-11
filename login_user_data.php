<?php
include 'dbconnection.php';
if(isset($_SESSION['userid'])){
    // find username using user 
    $Data = $_SESSION['userid'];
    $findusername = "SELECT * FROM `twitter_users` WHERE username = '$Data'";
    $result = mysqli_query($conn,$findusername);
    $userDAta = mysqli_fetch_assoc($result);
    $name = $userDAta['name'];
    $firstchar = $name[0];
    $_SESSION['firstchr'] = $firstchar;
}
?>