<?php
$query_following = "SELECT 
    u.id AS user_id,
    u.name,
    u.username,
    u.profile_picture,
    p.id AS post_id,
    p.post_file,
    p.description,
    p.created_at
FROM twitter_followers tf
JOIN twitter_users u ON tf.followers = u.id
JOIN twitter_posts p ON p.user_id = u.id
WHERE tf.following = $userId
ORDER BY RAND()";

$for_you = "SELECT 
    u.id AS user_id,
    u.name,
    u.username,
    u.profile_picture,
    p.id AS post_id,
    p.post_file,
    p.description,
    p.created_at
FROM twitter_posts p
JOIN twitter_users u ON p.user_id = u.id
ORDER BY RAND()";
?>