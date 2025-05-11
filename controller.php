<?php
include 'dbconnection.php';
session_start();

// insert operation on ajax request
if (isset($_REQUEST['newuserinsert'])) {
    $Username = trim(isset($_POST['username']) ? $_POST['username'] : "");
    $Name = trim(isset($_POST['name']) ? $_POST['name'] : "");
    $Email = trim(isset($_POST['email']) ? $_POST['email'] : "");
    $Password = trim(isset($_POST['password']) ? $_POST['password'] : "");
    $Dob = isset($_POST['dob']) ? $_POST['dob'] : "";
    $Join_date = date("Y/m/d");

    $new_user_insert_query = "INSERT INTO `twitter_users`(`username`, `name`, `email`, `password`, `dob`, `join_date`) VALUES ('$Username','$Name','$Email','$Password','$Dob','$Join_date')";
    $new_user_insert_result = mysqli_query($conn, $new_user_insert_query);
    if ($new_user_insert_result) {
        $_SESSION["userid"] = $Username;
         header("location:index.php");
    }
}


// check email exits...
if(isset($_REQUEST['mailexits'])){
    $Emaildata = trim(isset($_POST['email']) ? $_POST['email'] : "");

    $emailcheck = "SELECT * FROM twitter_users WHERE email = '$Emaildata'";
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

    $usercheck = "SELECT * FROM twitter_users WHERE username = '$usernamedata'";
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
if (isset($_REQUEST['loginuser'])) {
    $loginData = trim(isset($_POST['userid']) ? $_POST['userid'] : "");
    $password = trim(isset($_POST['userpass']) ? $_POST['userpass'] : "");

    // find username using user email
    $findusername = "SELECT * FROM `twitter_users` WHERE email = '$loginData';";
    $result = mysqli_query($conn,$findusername);
    $userDAta = mysqli_fetch_assoc($result);
    if($userDAta){
        $username = $userDAta['username'];
    }else{
        $username = $loginData;
    }

    // Check if loginData is email or username
    $login_query = "SELECT * FROM twitter_users WHERE (email = '$loginData' OR username = '$loginData') AND password = '$password'";
    $login_result = mysqli_query($conn, $login_query);

    if ($login_result && mysqli_num_rows($login_result) > 0) {
        $user = mysqli_fetch_assoc($login_result);
        $_SESSION["userid"] = $username;
        echo json_encode([
            'status' => 'success',
        ]);
    } else {
        echo json_encode([
            'status' => 'failed',
        ]);
    }
}

// Following Data
if (isset($_REQUEST['following_data'])) {
    ?>
        <div class="post">
            <div class="input-post">
                <div class="profile-dp"><span><?php echo $_SESSION['firstchr']?></span></div>
                <div class="happening-input">
                    <input type="text" id="post_input" name="input_post" value="" placeholder="Whats's happening?">
                </div>
            </div>

            <div class="post-options">
                <label for="image"><span class="image"><img src="image/gallery.png" width="20"></span></label>
                <input type="file" name="image" accept="image/*" id="image">
                <span class="extra-input"><img src="image/gif.png" width="25"></span>
                <span class="extra-input"><img src="image/grok.png" width="25"></span>
                <span class="extra-input"><img src="image/polling.png" width="20"></span>
                <span class="extra-input"><img src="image/emoji.png" width="20"></span>
                <span class="extra-input"><img src="image/schedule.png" width="20"></span>
                <span class="extra-input"><img src="image/location.png" width="20"></span>
                <button>Post</button>
            </div>
        </div>

        <div class="post">Following Data show </div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
    <?php
}

// Foryou Data
if (isset($_REQUEST['foryou_data'])) {
    ?>
        <div class="post">
            <div class="input-post">
                <div class="profile-dp"><span><?php echo $_SESSION['firstchr']?></span></div>
                <div class="happening-input">
                    <input type="text" id="post_input" name="input_post" value="" placeholder="Whats's happening?">
                </div>
            </div>

            <div class="post-options">
                <label for="image"><span class="image"><img src="image/gallery.png" width="20"></span></label>
                <input type="file" name="image" accept="image/*" id="image">
                <span class="extra-input"><img src="image/gif.png" width="25"></span>
                <span class="extra-input"><img src="image/grok.png" width="25"></span>
                <span class="extra-input"><img src="image/polling.png" width="20"></span>
                <span class="extra-input"><img src="image/emoji.png" width="20"></span>
                <span class="extra-input"><img src="image/schedule.png" width="20"></span>
                <span class="extra-input"><img src="image/location.png" width="20"></span>
                <button>Post</button>
            </div>
        </div>

        <div class="post">For you Data show </div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
    <?php
}

// profile all pages fetch Dynamic Data using ajax request
if (isset($_REQUEST['Profilepage'])) {
    // fetch login userData
    include 'login_user_data.php';

    $page = isset($_REQUEST['Profilepage']) ? $_REQUEST['Profilepage'] : "";
    if($page === 'Posts' || $page === 'Replies'){
        ?>
        <div class="user-post-details">
            <div class="post-information">
                <span><?php echo $_SESSION['firstchr']?></span>
                <p><b style="color:black;"><?php echo $userDAta['name']?> </b> @<?php echo $_SESSION['userid']?> <b>33m</b></p>
                <button type="button" class="post-delete" value="" style="border: none; background-color: white;"><i class="fa-solid fa-ellipsis"></i></button>
            </div>

            <div class="post-information">
                <div>
                    <p class="post-discription"> Rajesh mali new post Rajesh mali new post Rajesh mali new post Rajesh mali new post Rajesh mali new post</p>
                </div>
            </div>

            <div class="post-img">
                <img src="image/united-states.png" alt="No post file" width="100%" height="600px">
            </div>

            <div class="post-reactions">
                <a class="comment-post"><i class="fa-regular fa-comment"></i></a>
                <a class="like-post"><i class="fa-regular fa-heart"></i></a>
                <a><i class="fa-solid fa-repeat"></i></a>
                <a><i class="fa-solid fa-chart-simple"></i></a>
            </div>

            <div class="profile-post-popup">
                <p><span class="close-post-dlt"><i class="fa-solid fa-xmark"></span></i></p>
                <a style="color:red;"> <img src="image/delete_icon.png" width="15"> Delete</a>
                <a class="post-none-actions">Edit</a>
                <a class="post-none-actions">Pin to your profile</a>
                <a class="post-none-actions">Highlights on your profile</a>
                <a class="post-none-actions">Save</a>
                <a class="post-none-actions">Share</a>
            </div>
        </div>
        <?php    
    }

    // for highlight
    if($page === 'Highlights'){
        ?>
        <div class="highlight-show-Data">
            <h3>No any highlight on your profile</h3>
        </div>
        <?php
    }

    // for Articles
    if($page === 'Articles'){
        ?>
        <div class="highlight-show-Data">
            <h3>No any Articles on your profile</h3>
        </div>
        <?php
    }

    // for Likes
    if($page === 'Likes'){
        ?>
        <div class="highlight-show-Data">
            <h3>You don’t have any likes yet</h3>
            <p>Tap the heart on any post to show it some love. When you do, it’ll show up here.</p>
        </div>
        <?php
    }

    // for Media
    if($page === 'Media'){
        ?>
        <div>
            <img src="image/dp.jpg" width="32.7%">
            <img src="image/delete_icon.png" width="32.7%">
            <img src="image/google_logo.png" width="32.7%">
            <img src="image/logo.svg" width="32.7%">
            <img src="image/emoji.png" width="32.7%">
            <img src="image/like.jpg" width="32.7%">
            <img src="image/location.png" width="32.7%">
        </div>
        <?php
    }
}


// user profile Update operation on ajax request
if (isset($_REQUEST['user_update'])) {
    $userID = trim(isset($_POST['userid']) ? $_POST['userid'] : "");
    $Name = trim(isset($_POST['name']) ? $_POST['name'] : "");
    $Username = trim(isset($_POST['username']) ? $_POST['username'] : "");
    $Email = trim(isset($_POST['email']) ? $_POST['email'] : "");
    $Dob = isset($_POST['dob']) ? $_POST['dob'] : "";
    $Bio = trim(isset($_POST['bio']) ? $_POST['bio'] : "");
    $profile_pic = '';
    $profile_banner = '';

    // update for profile pic
    if(empty($_FILES['profile_pic']['name'])){
        $profile_pic = isset($_POST['profile_picture']) ? $_POST['profile_picture'] : "";
    }else{
        // old profile_picture unlink after select new profile_picture
        $imgquery = "SELECT profile_picture FROM `twitter_users` WHERE `id`=$userID";
        $result = mysqli_query($conn, $imgquery);
        $imgrow = mysqli_fetch_assoc($result);
        if($imgrow){
            $imagePath = $imgrow['profile_picture'];// find profile_picture from database 
            $imageFullPath = 'profile_pic/' . $imagePath;

            if (file_exists($imageFullPath)) { // unlink image from profile_pic folder
                unlink($imageFullPath);
            }
        } // end unlink

        $targetDir = 'profile_pic/';
        if(!is_dir($targetDir))
        {
            $targetDir = mkdir($targetDir, 0777, true);
        }    
        $profile_pic = time() . '.' . pathinfo($_FILES["profile_pic"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$profile_pic;
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$targetFile);
    }


    // update for profile banner
    if(empty($_FILES['profile_banner']['name'])){
        $profile_banner = isset($_POST['profile_cover']) ? $_POST['profile_cover'] : "";
    }else{
        // old profile_banner unlink after select new profile_banner
        $imgquery = "SELECT cover_picture FROM `twitter_users` WHERE `id` = $userID";
        $result = mysqli_query($conn, $imgquery);
        $imgrow = mysqli_fetch_assoc($result);
        if($imgrow){
            $imagePath = $imgrow['cover_picture'];// find profile_picture from database 
            $imageFullPath = 'profile_banner/' . $imagePath;

            if (file_exists($imageFullPath)) { // unlink image from profile_banner folder
                unlink($imageFullPath);
            }
        } // end unlink

        $targetDir = 'profile_banner/';
        if(!is_dir($targetDir))
        {
            $targetDir = mkdir($targetDir, 0777, true);
        }    
        $profile_banner = time() . '.' . pathinfo($_FILES["profile_banner"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$profile_banner;
        move_uploaded_file($_FILES["profile_banner"]["tmp_name"],$targetFile);
    }

    $sql = "UPDATE `twitter_users` SET `username`='$Username',`name`='$Name',`email`='$Email',`dob`='$Dob',
       `bio`='$Bio',`profile_picture`='$profile_pic',`cover_picture`='$profile_banner' WHERE `id`=$userID";
    
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION["userid"] = $Username;
        echo "update successfull";
    }else{
        echo "update failed";
    }
}
?>