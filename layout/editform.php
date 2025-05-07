<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      background-color: #e6ecf0;
      font-family: Arial, sans-serif;
    }
    .overlay {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
    }
    .modal {
      width: 500px;
      background-color: #fff;
      border-radius: 16px;
      overflow-y: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      position: relative;
    }
    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px;
      border-bottom: 1px solid #ccc;
    }
    .modal-header h2 {
      margin: 0;
      font-size: 18px;
    }
    .save-btn {
      background-color: #1d9bf0;
      color: white;
      border: none;
      padding: 6px 16px;
      border-radius: 20px;
      font-weight: bold;
      cursor: pointer;
    }
    .banner {
      height: 150px;
      background-color: #ccc;
      position: relative;
      cursor: pointer;
    }
    .banner input {
      display: none;
    }
    .banner .icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 24px;
    }
    .profile-pic {
      width: 80px;
      height: 80px;
      background-color: #4caf50;
      border-radius: 50%;
      border: 4px solid white;
      margin: -40px 0 10px 20px;
      position: relative;
      cursor: pointer;
    }
    .profile-pic input {
      display: none;
    }
    .profile-pic .icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 18px;
      color: white;
    }
    .form-group {
      padding: 0 20px 16px;
    }
    .form-group input, .form-group textarea {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
    }
    .char-count {
      text-align: right;
      font-size: 12px;
      color: gray;
      margin-top: 4px;
    }
  </style>
</head>
<body>

<div class="overlay">
  <div class="modal">
    <div class="modal-header">
      <h2>Edit profile</h2>
      <button class="save-btn">Save</button>
    </div>

    <div class="banner" onclick="document.getElementById('banner-upload').click();">
      <span class="icon">📷</span>
      <input type="file" id="banner-upload">
    </div>

    <div class="profile-pic" onclick="document.getElementById('profile-upload').click();">
      <span class="icon">📷</span>
      <input type="file" id="profile-upload">
    </div>

    <div class="form-group">
      <label>Name</label>
      <input type="text" value="Rajesh Kumar">
    </div>

    <div class="form-group">
      <label>Bio</label>
      <textarea id="bio" maxlength="160" rows="3" oninput="updateCharCount()"></textarea>
      <div class="char-count" id="charCount">0 / 160</div>
    </div>

    <div class="form-group">
      <label>Location</label>
      <input type="text">
    </div>

    <div class="form-group">
      <label>Website</label>
      <input type="text">
    </div>
  </div>
</div>

<script>
  function updateCharCount() {
    const bio = document.getElementById('bio');
    const count = document.getElementById('charCount');
    count.textContent = `${bio.value.length} / 160`;
  }
</script>

</body>
</html>
