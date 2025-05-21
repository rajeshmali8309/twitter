<?php
1.CREATE TABLE twitter_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    dob DATETIME,
    join_date DATE,
    profile_picture VARCHAR(255),
    cover_picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

2.CREATE TABLE twitter_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_file VARCHAR(255),
    description VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE
);

3.CREATE TABLE twitters_post_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    post_likes INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES twitter_posts(id) ON DELETE CASCADE
);

4.CREATE TABLE twitter_post_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    comments VARCHAR(1000),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES twitter_posts(id) ON DELETE CASCADE
);

6.CREATE TABLE twitter_post_comments_reply (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    comment_id INT NOT NULL,
    comment_reply VARCHAR(1000) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES twitter_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (comment_id) REFERENCES twitter_post_comments(id) ON DELETE CASCADE
);

7.CREATE TABLE twitter_followers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    followers INT,
    following INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (followers) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (following) REFERENCES twitter_users(id) ON DELETE CASCADE
);

8.CREATE TABLE twitter_notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    sender_id INT NOT NULL,
    post_id INT DEFAULT NULL,
    type ENUM('follow', 'like', 'comment') NOT NULL,
    message VARCHAR(255) NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES twitter_posts(id) ON DELETE CASCADE
);
?>