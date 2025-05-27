<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login | MedWare</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background-color: #f8f8f8;
    }

    .login-container {
        display: flex;
        min-height: 100vh;
        background-color: #f8f8f8;
    }

    .login-image {
        flex: 0.6;
        background-color: #fce7e7;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 0 1rem 0 3rem;
        height: 100vh;
        border-top-right-radius: 500px;
        border-bottom-right-radius: 500px;
    }

    .login-image img {
        max-width: 85%;
        max-height: 90vh;
        object-fit: contain;
    }

    .login-form {
        flex: 1.6;
        background-color: #ffffff;
        padding: 4rem 3rem;
        margin: 2rem 3rem;
        border-radius: 12px;
        max-width: 600px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        align-self: center;
    }

    .login-form h1 {
        font-size: 2.4rem;
        color: #333;
        text-align: center;
        margin-bottom: 2rem;
        font-weight: 700;
    }

    .login-form .brand {
        color: #DC5858;
        font-weight: bold;
    }

    .google-login {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        border-radius: 10px;
        padding: 1rem;
        font-size: 1rem;
        font-weight: bold;
        border: 1px solid #ccc;
        cursor: pointer;
        transition: background-color 0.2s;
        margin-bottom: 1.8rem;
    }

    .google-login:hover {
        background-color: #f1f1f1;
    }

    .google-login img {
        height: 22px;
        margin-right: 10px;
    }

    .or-divider {
        display: flex;
        align-items: center;
        margin: 1.8rem 0;
        color: #aaa;
        font-size: 15px;
    }

    .or-divider::before,
    .or-divider::after {
        content: "";
        flex: 1;
        height: 1px;
        background-color: #ddd;
    }

    .or-divider span {
        margin: 0 12px;
    }

    .input-group {
        margin-bottom: 1.6rem;
    }

    .input-group label {
        display: block;
        font-size: 16px;
        margin-bottom: 0.4rem;
        color: #333;
        font-weight: 600;
    }

    .input-wrapper {
        display: flex;
        align-items: center;
        background-color: #f5f5f5;
        padding: 1rem;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .input-wrapper input {
        flex: 1;
        border: none;
        background: none;
        outline: none;
        font-size: 16px;
        color: #333;
    }

    .input-wrapper img {
        height: 20px;
        margin-right: 12px;
    }

    .validation-error {
        color: #DC5858;
        font-size: 13px;
        margin-top: 6px;
        display: none;
    }

    .forgot-password {
        text-align: right;
        margin-top: -12px;
        margin-bottom: 1rem;
    }

    .forgot-password a {
        font-size: 14px;
        color: #DC5858;
        text-decoration: none;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    .login-button {
        width: 100%;
        padding: 1rem;
        background-color: #DC5858;
        border: none;
        border-radius: 6px;
        color: white;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .login-button:hover {
        background-color: #c74d4d;
    }

    .register-text {
        font-size: 15px;
        margin-top: 1.4rem;
        text-align: center;
    }

    .register-text a {
        color: #DC5858;
        text-decoration: none;
    }

    .register-text a:hover {
        text-decoration: underline;
    }
    </style>
</head>
    <body>
    <div class="login-container">
        <div class="login-image">
        <img src="images/fotologin.png" alt="Login Illustration" />
        </div>

        <div class="login-form">
        <h1>Welcome to <span class="brand">MedWare</span></h1>

        <div class="google-login">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" />
            Login with Google
        </div>

        <div class="or-divider"><span>OR</span></div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
            <label for="email">Email Address *</label>
            <div class="input-wrapper">
                <img src="images/logo-email.png" alt="Email Icon">
                <input type="text" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="validation-error" style="display: block">{{ $message }}</div>
            @enderror
            </div>

            <div class="input-group">
            <label for="password">Password *</label>
            <div class="input-wrapper">
                <img src="images/logo-key.png" alt="Lock Icon">
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            @error('password')
                <div class="validation-error" style="display: block">{{ $message }}</div>
            @enderror
            </div>

            <div class="forgot-password">
            <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>

        <p class="register-text">
            Don’t have an account? <a href="{{ route('register') }}">Register</a>
        </p>

        </div>
    </div>
    </body>
</html>
