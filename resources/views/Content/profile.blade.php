<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #e6b8b8;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      background: white;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .container h2 {
      margin-bottom: 20px;
    }

    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: #ddd;
      position: relative;
      margin-bottom: 20px;
    }

    .edit-icon {
      position: absolute;
      bottom: 5px;
      right: 5px;
      background: #e05252;
      color: white;
      padding: 5px;
      border-radius: 50%;
      font-size: 12px;
      cursor: pointer;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #e05252;
      border-radius: 5px;
    }

    .button-row {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }

    .btn {
      padding: 10px 25px;
      border: none;
      border-radius: 5px;
      color: white;
      background-color: #e05252;
      cursor: pointer;
      font-weight: 500;
    }

    .btn.logout {
      background-color: #888;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Profile</h2>
  
  <div class="profile-pic">
    <div class="edit-icon">✏️</div>
  </div>

  <form action="{{ route('profile.update') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="ApotekSejahtera21" readonly>
    </div>

    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" value="sejahtera21@gmail.com" readonly>
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" placeholder="Enter your address" value="" readonly>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" id="password" value="abc****" readonly>
    </div>

    <div class="button-row">
      <button type="button" class="btn" onclick="enableEdit()">Edit</button>
      <a href="{{ route('logout') }}" class="btn logout">Log Out</a>
    </div>
  </form>
</div>

<script>
  function enableEdit() {
    document.querySelectorAll('input').forEach(el => el.removeAttribute('readonly'));
    document.getElementById('password').value = '';
    document.getElementById('password').setAttribute('type', 'password');
  }
</script>

</body>
</html>
