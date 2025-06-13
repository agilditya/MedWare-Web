<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .edit-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .edit-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .edit-header h1 {
            color: #e85d5d;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #e85d5d;
            box-shadow: 0 0 0 0.2rem rgba(232, 93, 93, 0.25);
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn-save {
            background-color: #e85d5d;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .btn-save:hover {
            background-color: #d34242;
            color: white;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .btn-cancel:hover {
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

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="edit-header">
            <h1>Edit Profile</h1>
            <a href="{{ route('profile') }}" class="nav-link">← Back to Profile</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>

            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
                <small class="text-muted">Leave blank if you don't want to change password</small>
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn btn-save">Save Changes</button>
                <a href="{{ route('profile') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html> 