<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f6f6ef;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 90vh;
    }

    .login-container {
      width: 350px;
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #ff6600;
    }

    .login-container .input-group {
      margin-bottom: 20px;
      position: relative;
    }

    .login-container .input-group label {
      display: block;
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 5px;
      color: #888;
    }

    .login-container .input-group input {
      padding: 8px 10px;
      width: 95%;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ddd;
    }

    .login-container .input-group .icon {
      position: absolute;
      top: 12px;
      left: 10px;
      color: #888;
    }

    .login-container .input-group .icon i {
      font-size: 18px;
    }

    .login-container .input-group .btn {
      background-color: #ff6600;
      color: #fff;
      font-size: 16px;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 30%;
    }

    .login-container .input-group .btn:hover {
      background-color: #ff5500;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <div class="input-group">
      <label for="username">Username</label>
      <input type="text" id="username" >
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password">
    </div>
    <div class="input-group">
      <button class="btn">Login</button>
    </div>
  </div>
</body>
</html>
