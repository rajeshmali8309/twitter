<?php
$loginUserData = null;
$otherUsers = [];
$profile_username = "";

while ($user = mysqli_fetch_assoc($following_result)) {
    if ($user['id'] == $loginUserid) {
        $loginUserData = $user;
    } else {
        $otherUsers[] = $user;
    }
}

// Show login user at top
if ($loginUserData) {
    $firstChar = strtoupper(substr($loginUserData['name'], 0, 1)); ?>
    <div class="user-item">
        <?php if (!empty($loginUserData['profile_picture'])) { ?>
            <a href="profile.php" style="color: black; text-decoration: none;">
                <img src="profile_pic/<?php echo $loginUserData['profile_picture']; ?>" class="user-dp-img" alt="User DP">
            </a>
        <?php } else { ?>
            <a href="profile.php" style="color: black; text-decoration: none;">
                <span class="user-dp"><?php echo $firstChar; ?></span>
            </a>
        <?php } ?>
        <div class="user-info">
            <div class="user-name"><a href="profile.php" style="color: black; text-decoration: none;"><?php echo $loginUserData['name']; ?></a></div>
            <div class="user-username"><a href="profile.php" style="color: black; text-decoration: none;">@<?php echo $loginUserData['username']; ?></a></div>
        </div>
    </div>
<?php
}

// Show other users
foreach ($otherUsers as $user) {
    $firstChar = strtoupper(substr($user['name'], 0, 1));

    // Relationship check
    $iFollowQuery = mysqli_query($conn, "SELECT 1 FROM twitter_followers WHERE followers = '{$user['id']}' AND following = '{$loginUserid}'");
    $theyFollowQuery = mysqli_query($conn, "SELECT 1 FROM twitter_followers WHERE followers = '{$loginUserid}' AND following = '{$user['id']}'");

    $iFollow = mysqli_num_rows($iFollowQuery) > 0;
    $theyFollow = mysqli_num_rows($theyFollowQuery) > 0;

    if ($iFollow) {
        $buttonLabel = "Following";
        $buttonClass = "following";
    } elseif ($theyFollow) {
        $buttonLabel = "Follow Back";
        $buttonClass = "follow-back";
    } else {
        $buttonLabel = "Follow";
        $buttonClass = "";
    }
    ?>
    <div class="user-item">
        <?php if (!empty($user['profile_picture'])) { ?>
            <a href="other_user_profile.php?username=<?php echo $user['username']; ?>" style="color: black; text-decoration: none;">
                <img src="profile_pic/<?php echo $user['profile_picture']; ?>" class="user-dp-img" alt="User DP">
            </a>
        <?php } else { ?>
            <a href="other_user_profile.php?username=<?php echo $user['username']; ?>" style="color: black; text-decoration: none;">
                <span class="user-dp"><?php echo $firstChar; ?></span>
            </a>
        <?php } ?>
        <div class="user-info">
            <div class="user-name"><a href="other_user_profile.php?username=<?php echo $user['username']; ?>" style="color: black; text-decoration: none;"><?php echo $user['name']; ?></a></div>
            <div class="user-username"><a href="other_user_profile.php?username=<?php echo $user['username']; ?>" style="color: black; text-decoration: none;">@<?php echo $user['username']; ?></a></div>
        </div>
        <button class="follow-btn-list <?= $buttonClass ?>" data-user-id="<?= $user['id']; ?>">
            <?= $buttonLabel ?>
        </button>
    </div>
<?php }
?>
