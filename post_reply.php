<?php 
session_start();
if(isset($_SESSION["userid"])){ ?>
<html lang="en">
<head>
    <?php
    // include file of head section items 
    include 'layout/header.php';
    ?>
    <title>Notifications / X</title>
    <style>
        .rightbar{
            margin-right: 58px;
            right: -17px;
        }
        .post {
            width: 648px;
        }

        .user-post-details {
            margin-left: 75px;
        }

        .post-reactions a {
            margin-left: 30px;
        }
    </style>
</head>
<body>
    <div class="pagecontainer">
        <?php
        // include file of left-sidebar 
        include 'layout/left-sidebar.php';
        ?>

        <div class="center-main">
            <div class="center-header" style="width: 45.3%; border-bottom: none;">
                <div id="Notifications">
                    <span style="font-size: 22px; color: black;">Post</span>
                </div>

                <?php
                    include 'layout/search_bar.php'; 
                ?>
            </div>

            <div class="center-content" id="notifications_data" style="padding: 68px 0px;">
                <div class="user-post-details">
                    <div class="post-information">
                        <?php if (empty($userDAta['profile_picture'])) { ?>
                            <span>R</span>
                        <?php } else {
                        ?> <img src="profile_pic/1747460315.jpg" alt="no file"><?php
                                                                                                        } ?>
                        <p><b style="color:black;">User Name </b> @rajesh0000 <b class="user-post-time">33m</b></p>
                    </div>

                    <div class="post-information">
                        <div>
                            <p class="post-discription">This is a post discription</p>
                        </div>
                    </div>

                    <?php
                    // $myfile = $post['post_file'];
                    // if (!empty($myfile)) {
                    //     $ext = explode(".", $myfile);
                    //     if (strtolower(end($ext)) == "mp4") {
                    ?>
                            <!-- <div class="post-img">
                                <video width="100%" height="600px" type="video/mp4" alt="No post file" controls>
                                    <source src="posts/video?>" type="video/mp4">
                                </video>
                            </div> -->
                        <?php
                        // } else {
                        ?>
                            <div class="post-img">
                                <img src="posts/1747144498.jpg" alt="No post file" width="97%" height="450px">
                            </div>
                        <?php
                        // } ?>

                    <?php
                    //  }
                    ?>

                    <div class="post-reactions">
                        <a class="comment-post">
                            <i class="fa-regular fa-comment"> 
                                <span class="comment-count"> 2</span>
                            </i>
                        </a>
                    </div>
                </div>
                
                <div class="user-post-details" style="margin-left: 120px;">
                    <div class="comment-information">
                        <!-- <span>U</span> -->
                        <img src="profile_pic/1747139116.jpg" alt="no file">                                                                                                    
                        <p><b style="color:black;">User Name</b> @username <b class="user-post-time">22m</b></p>
                    </div>

                    <div class="post-information">
                        <div>
                            <p class="comment-show-discription">this is my comment this is my comment this is my comment this is my comment this is my comment this is my comment this is my comment this is my comment this is my comment this is my comment </p>
                        </div>
                    </div>

                    <div class="commentshow-reactions">
                        <a class="like-post">
                            <i class="fa-regular fa-heart">
                                <span class="like-count"> 2</span>
                            </i>
                        </a>

                        <a class="comment-post">
                            <i class="fa-regular fa-comment"> <span class="comment-count"> 3</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rightbar">
            <?php 
              include 'layout/right_footer.php'; 
            ?>
        </div>
    </div>
    <?php include 'layout/post_model.php'; ?>
</body>
<script>
   
</script>
</html>
<?php 
}else{
    header("location:signup.php");
}
?>