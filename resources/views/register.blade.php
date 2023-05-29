<!DOCTYPE html>
<html>
<head>
  <title>Register - Hacker News</title>
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

    .register-container {
      width: 600px;
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .register-container h2 {
      margin-bottom: 10px;
      color: #ff6600;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      color: #888;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 95%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .form-group .icon {
      color: #888;
      margin-right: 5px;
    }

    .form-submit {
      text-align: right;
    }

    .form-submit button {
      background-color: #ff5500;
      color: #fff;
      font-size: 16px;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
    }

    .form-submit button:hover {
      background-color: #ff4400;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Create an Account</h2>
    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="username"><i class="fas fa-user icon"></i> Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="email"><i class="fas fa-envelope icon"></i> Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
      </div>
      <div class="form-group">
        <label for="password"><i class="fas fa-lock icon"></i> Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <label for="retype_password"><i class="fas fa-lock icon"></i> Retype Password</label>
        <input type="password" id="retype_password" name="retype_password" placeholder="Enter your retype password" required>
      </div>
      <div class="form-submit">
        <button type="submit">Register</button>
      </div>
    </form>
  </div>
</body>
</html>
