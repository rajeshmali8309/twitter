<?php 
session_start();
if(isset($_SESSION["userid"])){ ?>
<html lang="en">
<head>
    <?php
    // include file of head section items 
    include 'layout/header.php';
    ?>
    <link rel="stylesheet" href="editstyle.css">
    <title>Profile/ X</title>
</head>
<body>
    <div class="pagecontainer">
    <?php
        // include file of left-sidebar 
        include 'layout/left-sidebar.php';
        ?>

        <div class="center-main" style="margin: 0 497px 0 280px;">
            <div class="profile-center-header">
                <div class="profile-head"><span id="">Rajesh Kumar <br> <span class="profile-post-all-count">0 posts</span></span></div>

                <div class="search-box" style="margin-left: 670px;">
                  <input type="text" placeholder="🔍︎ Search" id="search">
                </div>
            </div>

            <div class="center-content" style="padding-top: 56px;">
                <div class="user-profile-show">
                    <div class="profile-cover-picture">
                        <img src="image/bg_cover.jpg" alt="No backgroung Cover" width="100%" height="100%">
                    </div>
                </div>
                <div class="post" id="profile-dp-show">
                    <!-- <img src="image/dp.jpg" id="profile-dp-show" alt=""> -->
                    <span>R</span>
                     <button id="edit-profile-btn">Edit profile</button>
                     <div class="user-profile-info">
                        <h3>Rajesh Kumar</h3>
                        <p>@RajeshKuma7721</p>
                        <p><i class="fa-solid fa-calendar-days"></i> Joined April 2025</p>
                        <p><b>3</b> Following&nbsp&nbsp <b>1</b> Followers</p>
                     </div>
                </div>
                <div class="profile-links-btn">
                    <a id="Posts" class="profile-links-active">Posts</a>
                    <a id="Replies">Replies</a>
                    <a id="Highlights">Highlights</a>
                    <a id="Articles">Articles</a>
                    <a id="Media">Media</a>
                    <a id="Likes">Likes</a>
                </div>

                <!-- show post data -->
                <div class="post" id="showPostData" style="padding: 0"></div>
                <!-- End show post data -->
            </div>
        </div>

        <div class="rightbar">
            <div class="might-like">
                <h3>You might like</h3>
                <!-- you might like show 3 user using limit -->
                <div class="users-might">
                    <!-- <div><img src="image/dp.jpg" width="50"></div> -->
                    <div class="profile-avatar"><span>R</span></div>
                    <div style="margin-left: 10px;">
                        <div style="color:black; font-size: 18px;"><strong>Ravi Mali</strong></div>
                        <div style="color: rgb(95, 94, 94);; font-size: 15px;">@Ravikumar8979</div>
                    </div>
                    <div class="might-follow-users">
                        <a href="">Follow</a>
                    </div>
                </div>              
            </div>

            <?php
                // include file of right-footer 
                include 'layout/footer.php';
            ?>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="edit-profile-modal" class="modal-overlay">
    <div class="edit-profile-modal-content">
        <span class="close-modal" id="close-edit-profile">&times;</span>
        <h2>Edit profile</h2>

        <form id="edit-profile-form">
        <div class="edit-profile-imgs">
            <div class="cover-upload">
            <!-- <img src="image/bg_cover.jpg" alt="Cover" class="cover-img-preview" /> in label -->
            <label for="cover-photo"></label>
            <input type="file" id="cover-photo" hidden />
            </div>

            <div class="dp-upload">
            <!-- <span class="dp-circle">R</span> in label -->
            <label for="dp-photo"></label>
            <input type="file" id="dp-photo" hidden />
            </div>
        </div>

        <input type="text" placeholder="Name" maxlength="50" />
        <textarea placeholder="Bio (max 160 characters)" maxlength="160"></textarea>
        <input type="text" placeholder="Location" maxlength="100" />
        <input type="text" placeholder="Website" maxlength="100" />
        <button type="submit">Save</button>
        </form>
    </div>
    </div>


</body>
<script>
    $(document).ready(function () {
        $("#profile").addClass("sidebar-activepage");

        // start profile page fetch Data using ajax
        var profilepageVal = "Posts"
        profilepageData(profilepageVal);

        function profilepageData(getId) {
            $("#Posts").removeClass("profile-links-active");
            $("#Replies").removeClass("profile-links-active");
            $("#Highlights").removeClass("profile-links-active");
            $("#Articles").removeClass("profile-links-active");
            $("#Media").removeClass("profile-links-active");
            $("#Likes").removeClass("profile-links-active");
            if(!getId== ''){
                $("#"+getId).addClass("profile-links-active");

                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "Profilepage": getId
                    },
                    success : function(response){
                        $("#showPostData").html(response);
                    }
                });
            }
        }

        $("#Posts").click(function(){
            var PostsID = $(this).attr("id");
            profilepageData(PostsID);
        });

        $("#Replies").click(function(){
            var RepliesID = $(this).attr("id");
            profilepageData(RepliesID);
        });

        $("#Highlights").click(function(){
            var HighlightsID = $(this).attr("id");
            profilepageData(HighlightsID);
        });

        $("#Articles").click(function(){
            var ArticlesID = $(this).attr("id");
            profilepageData(ArticlesID);
        });

        $("#Media").click(function(){
            var MediaID = $(this).attr("id");
            profilepageData(MediaID);
        });

        $("#Likes").click(function(){
            var LikesID = $(this).attr("id");
            profilepageData(LikesID);
        });

        $("#edit-profile-btn").click(function(){
            $("#edit-profile-modal").fadeIn();
        });

        $("#close-edit-profile").click(function(){
            $("#edit-profile-modal").fadeOut();
        });

        // Disable outside click
        $(document).on('click', function(event) {
            if (!$(event.target).closest(".edit-profile-modal-content, #edit-profile-btn").length) {
            event.stopPropagation();
            }
        });
});
</script>
</html>
<?php }else{
    header("location:signup.php");
}
?>