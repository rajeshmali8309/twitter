<?php
include 'dbconnection.php';

// insert operation on ajax request
if (isset($_REQUEST['newuserinsert'])) {
    $Name = trim(isset($_POST['name']) ? $_POST['name'] : "");
    $Username = trim(isset($_POST['username']) ? $_POST['username'] : "");
    $Password = trim(isset($_POST['password']) ? $_POST['password'] : "");
    $Email = trim(isset($_POST['email']) ? $_POST['email'] : "");
    $Dob = isset($_POST['dob']) ? $_POST['dob'] : "";
  
    $new_user_insert_query = "INSERT INTO `useraccount`(`name`, `username`, `password`, `email`, `dob`) VALUES ('$Name','$Username','$Password','$Email','$Dob')";
    $new_user_insert_result = mysqli_query($conn, $new_user_insert_query);
    if ($new_user_insert_result) {
         echo "insert success";
    }else{
        echo "insert failed...!";
    }
}
?>