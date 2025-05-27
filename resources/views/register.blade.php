<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register | MedWare</title>
    <style>
    /* Masukkan CSS milikmu di sini — sudah disesuaikan */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        background: #fff;
        min-height: 100vh;
        position: relative;
    }

    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        position: relative;
        z-index: 1;
    }

    .register-form {
        background: white;
        padding: 4rem;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
        position: relative;
    }

    .register-form::before {
        content: "";
        position: absolute;
        top: -20px;
        left: -20px;
        width: 40px;
        height: 40px;
        border: 3px solid #eadada;
        background-color: #eadada;
        border-radius: 50%;
    }

    h2 {
        text-align: center;
        font-size: 2.2rem;
        margin-bottom: 0.5rem;
    }

    p {
        text-align: center;
        margin-bottom: 2rem;
        font-size: 1rem;
        color: #555;
    }

    p a {
        color: #dc5858;
        text-decoration: none;
        font-weight: bold;
    }

    .input-group {
        margin-bottom: 1.8rem;
    }

    .input-group label {
        display: block;
        margin-bottom: 0.4rem;
        font-size: 1rem;
        font-weight: 600;
    }

    .input-group input {
        width: 100%;
        padding: 1rem 1.2rem;
        border: 1.5px solid #dc5858;
        border-radius: 8px;
        font-size: 1.05rem;
        outline: none;
    }

    .input-group small {
        font-size: 0.85rem;
        color: #777;
    }

    .error-message,
    .validation-error {
        font-size: 0.9rem;
        color: #dc5858;
        margin-top: 5px;
    }

    .sign-up-button {
        width: 100%;
        padding: 1rem;
        font-size: 1.1rem;
        background-color: #dc5858;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .sign-up-button:hover {
        background-color: #c74d4d;
    }

    .register-background {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 340px;
        background-color: #eadada;
        border-top-left-radius: 70% 100%;
        border-top-right-radius: 70% 100%;
        z-index: 0;
    }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-form">
        <h2>Create an account</h2>
        <p>Already have account?  <a href="{{ route('login') }}">Log In</a></p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter username" value="{{ old('username') }}">
            @error('username')
                <div class="validation-error">{{ $message }}</div>
            @enderror
            </div>

            <div class="input-group">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" placeholder="Enter your email address" value="{{ old('email') }}">
            @error('email')
                <div class="validation-error">{{ $message }}</div>
            @enderror
            </div>

            <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter password">
            <small>Use 8 or more characters with a mix of letters and numbers</small>
            @error('password')
                <div class="validation-error">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="sign-up-button">Sign Up</button>
        </form>
        </div>
    </div>

    <div class="register-background"></div>
</body>
</html>
