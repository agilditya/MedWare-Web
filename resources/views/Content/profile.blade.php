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
      background-color: #f8f9fa;
    }

    .profile-container {
      max-width: 800px;
      margin: 50px auto;
      padding: 30px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .profile-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .profile-header h1 {
      color: #e85d5d;
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    .profile-info {
      margin-bottom: 30px;
    }

    .info-group {
      margin-bottom: 20px;
    }

    .info-group label {
      font-weight: 600;
      color: #555;
      margin-bottom: 5px;
    }

    .info-group p {
      font-size: 1.1rem;
      color: #333;
      margin: 0;
      padding: 10px;
      background: #f8f9fa;
      border-radius: 8px;
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      justify-content: center;
      margin-top: 30px;
    }

    .btn-edit {
      background-color: #e85d5d;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: background-color 0.3s;
    }

    .btn-edit:hover {
      background-color: #d34242;
      color: white;
    }

    .btn-logout {
      background-color: #6c757d;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: background-color 0.3s;
    }

    .btn-logout:hover {
      background-color: #5a6268;
      color: white;
    }

    .nav-link {
      color: #e85d5d;
      text-decoration: none;
      font-weight: 500;
    }

    .nav-link:hover {
      color: #d34242;
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <div class="profile-header">
      <h1>Profile</h1>
      <a href="{{ route('Content/dashboard') }}" class="nav-link">← Back to Dashboard</a>
    </div>

    <div class="profile-info">
      <div class="info-group">
        <label>Name</label>
        <p>{{ Auth::user()->name }}</p>
      </div>
      <div class="info-group">
        <label>Email</label>
        <p>{{ Auth::user()->email }}</p>
      </div>
      <div class="info-group">
        <label>Role</label>
        <p>{{ ucfirst(Auth::user()->role) }}</p>
      </div>
    </div>

    <div class="action-buttons">
      <a href="{{ route('profile.edit') }}" class="btn btn-edit">Edit Profile</a>
      <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-logout">Logout</button>
      </form>
    </div>
  </div>
</body>
</html>
