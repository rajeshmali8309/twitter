<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Twitter Layout Clone</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow: hidden;
      background-color: #f0f2f5;
    }

    .container {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

    .sidebar {
      width: 250px;
      background-color: #ffffff;
      padding: 20px;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-right: 1px solid #ddd;
      flex-shrink: 0;
      position: fixed;
      left: 0;
      top: 0;
    }

    .sidebar .top {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-top: 30px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      color: #333;
      font-weight: 500;
      font-size: 18px;
      padding: 8px 12px;
      border-radius: 25px;
      transition: background 0.2s, color 0.2s;
    }

    .sidebar a:hover {
      background-color: #f0f0f0;
      color: #1DA1F2;
    }

    .post-btn {
      margin: 20px 0;
      padding: 12px;
      text-align: center;
      font-weight: bold;
      background-color: #e6ecf0;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-size: 16px;
    }

    .user-profile {
      padding: 12px;
      border-top: 1px solid #ddd;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-profile .avatar {
      width: 36px;
      height: 36px;
      background-color: green;
      border-radius: 50%;
      color: white;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .main {
      flex-grow: 1;
      margin: 0 270px 0 250px;
      display: flex;
      flex-direction: column;
    }

    .header {
      position: sticky;
      top: 0;
      background-color: #fff;
      z-index: 10;
      border-bottom: 1px solid #ddd;
      padding: 15px;
      display: flex;
      justify-content: space-around;
      font-weight: bold;
      font-size: 18px;
    }

    .content {
      overflow-y: auto;
      flex-grow: 1;
      padding: 20px 40px;
    }

    .post {
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 20px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .rightbar {
      width: 270px;
      background-color: #ffffff;
      padding: 20px;
      height: 100vh;
      overflow-y: auto;
      border-left: 1px solid #ddd;
      position: fixed;
      right: 0;
      top: 0;
    }

    .rightbar h3 {
      margin-bottom: 20px;
      font-size: 18px;
    }

    .rightbar p {
      margin-bottom: 15px;
      color: #333;
      font-size: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <div class="top">
        <a href="#">🏠 Home</a>
        <a href="#">🔍 Explore</a>
        <a href="#">🔔 Notifications</a>
        <a href="#">✉️ Messages</a>
        <a href="#">🌟 Grok</a>
        <a href="#">👥 Communities</a>
        <a href="#">👤 Profile</a>
        <a href="#">⚙️ More</a>
        <button class="post-btn">Post</button>
      </div>
      <div class="user-profile">
        <div class="avatar">R</div>
        <div>
          <div><strong>Rajesh Kumar</strong></div>
          <div style="color:gray; font-size: 14px;">@RajeshKuma7721</div>
        </div>
      </div>
    </div>

    <div class="main">
      <div class="header">
        <div>For you</div>
        <div>Following</div>
      </div>
      <div class="content">
        <div class="post">🚀 Just launched my new portfolio website! Super excited to share it with the world. #WebDev</div>
        <div class="post">📷 Had a great time exploring the hills this weekend. Nature really is the best therapy!</div>
        <div class="post">🎮 Been playing the new Elden Ring expansion. It's TOUGH but so worth it!</div>
        <div class="post">💼 Just got promoted! Hard work does pay off. Thanks to everyone who supported me.</div>
        <div class="post">📚 Reading "Atomic Habits" again. Highly recommend it for anyone looking to build strong habits.</div>
        <div class="post">🍕 Found a new pizza place in town — absolute heaven! 10/10 would go again.</div>
        <div class="post">🎧 Listening to Lofi while working hits different. Productivity: 200%</div>
        <div class="post">🌟 Life update: Moving to a new city next month! Nervous but excited.</div>
        <div class="post">🖌️ Started learning digital art. Anyone got beginner tips?</div>
        <div class="post">🗳️ Voted today! If you haven't, go out and make your voice heard.</div>
      </div>
    </div>

    <div class="rightbar">
      <input type="text" placeholder="🔍 Search" style="width: 100%; padding: 10px; border-radius: 20px; border: 1px solid #ccc; margin-bottom: 20px;">
      <div style="background: white; border: 1px solid #ccc; border-radius: 12px; padding: 15px; margin-bottom: 20px;">
        <h3 style="font-size: 16px; margin-bottom: 10px;">Subscribe to Premium</h3>
        <p style="font-size: 14px; margin-bottom: 10px;">Subscribe to unlock new features and if eligible, receive a share of revenue.</p>
        <button style="background-color: #1DA1F2; color: white; border: none; padding: 10px 15px; border-radius: 25px; cursor: pointer;">Subscribe</button>
      </div>
      <div style="background: white; border: 1px solid #ccc; border-radius: 12px; padding: 15px;">
        <h3 style="font-size: 16px; margin-bottom: 10px;">What's happening</h3>
        <p><strong>From the Desk of Anthony Pompliano</strong><br><small>LIVE</small></p>
        <p><strong>#KaranVeerMehra</strong><br><small>12K posts</small></p>
        <p><strong>#PahelgamTerroristattack</strong><br><small>64K posts</small></p>
        <p><strong>Owaisi</strong><br><small>18.7K posts</small></p>
      </div>
    </div>
  </div>
</body>
</html>