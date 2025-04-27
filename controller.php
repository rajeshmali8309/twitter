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


// check email exits...
if(isset($_REQUEST['mailexits'])){
    $Emaildata = trim(isset($_POST['email']) ? $_POST['email'] : "");

    $emailcheck = "SELECT * FROM useraccount WHERE email = '$Emaildata'";
    $resultemail = mysqli_query($conn,$emailcheck);
    if($resultemail->num_rows>0){
        echo json_encode([
            'status'=>'failed'
        ]);
    }else{
        echo json_encode([
            'status'=>'success'
        ]);
    }
}

// check username exits...
if(isset($_REQUEST['usernameexits'])){
    $usernamedata = trim(isset($_POST['username']) ? $_POST['username'] : "");

    $usercheck = "SELECT * FROM useraccount WHERE username = '$usernamedata'";
    $resultuser = mysqli_query($conn,$usercheck);
    if($resultuser->num_rows>0){
        echo json_encode([
            'status'=>'failed'
        ]);
    }else{
        echo json_encode([
            'status'=>'success'
        ]);
    }
}

// login operation on ajax request
if (isset($_REQUEST['userlogin'])) {
    $loginData = trim(isset($_POST['login']) ? $_POST['login'] : "");
    $password = trim(isset($_POST['password']) ? $_POST['password'] : "");

    // Check if loginData is email or username
    $login_query = "SELECT * FROM useraccount WHERE (email = '$loginData' OR username = '$loginData') AND password = '$password'";
    $login_result = mysqli_query($conn, $login_query);

    if ($login_result && mysqli_num_rows($login_result) > 0) {
        $user = mysqli_fetch_assoc($login_result);
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful!',
            'userdata' => $user
        ]);
    } else {
        echo json_encode([
            'status' => 'failed',
            'message' => 'Invalid username/email or password!'
        ]);
    }
}
?>