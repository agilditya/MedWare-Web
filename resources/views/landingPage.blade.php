<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MedWare</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background-color: #f8f8f8;
        color: #333;
    }

    nav {
        background: #ffffff;
        padding: 20px 0;
        border-bottom: 1px solid #eee;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 40px;
    }

    .wrapper {
        width: 80%;
        margin: auto;
    }

    .logo a {
        font-size: 40px;
        font-weight: bold;
        color: #e85d5d;
        text-decoration: none;
    }

    .menu a {
        color: #e85d5d;
        text-decoration: none;
        font-size: 20px;
        font-weight: normal;
    }

    .menu ul {
        list-style: none;
        float: right;
    }

    .menu ul li {
        display: inline;
    }

    .menu ul li a {
        color: #e85d5d;
        text-decoration: none;
        font-size: 16px;
    }   

    #definition {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #ffe3e3;
        padding: 60px;
        border-radius: 20px;
        margin: 40px 0;
    }

    .text-content h2 {
        font-size: 50px;
        color: #e85d5d;
    }

    .text-content p {
        font-size: 20px;
        color: #666;
        margin: 10px 0;
    }

    .btn {
        display: inline-block;
        background-color: #fff;
        color: #e85d5d;
        padding: 10px 20px;
        text-decoration: none;
            border-radius: 5px;
        margin-top: 10px;
    }

    .images img {
        width: 650px;
        margin-left: 20px;
    }

    #features {
        text-align: center;
        margin: 50px 0;
    }

    .features-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    #features h1 {
        font-size: 45px;
        font-weight: bold;
        color: #DC5858;
        line-height: 1.2;
        text-align: left;
        margin-right: 40px;
    }

    .feature-container {
        display: flex;
        gap: 20px;
    }

    .feature-box {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 250px;
        transition: transform 0.3s;
    }

    .feature-box:hover {
        transform: scale(1.05);
    }

    .feature-box img {
        width: 100px;
    }

    .feature-box p {
        color: #DC5858;
        margin-top: 10px;
        font-weight: bold;
        font-size: 18px;
    }

    #steps {
        background-color: #f9f9f9;
        padding: 40px 0;
        text-align: center;
    }

    #steps h2 {
        font-size: 36px;
        font-weight: bold;
        color: #DC5858;
        margin-bottom: 40px;
        position: relative;
    }

    #steps h2::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%);
        width: 80%;
        height: 2px;
        background-color: #DC5858;
        z-index: -1;
    }

    .step-container {
        display: flex;
        justify-content: space-around;
        gap: 20px;
        margin-top: 40px;
    }

    .step-box {
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 250px;
        position: relative;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .step-box:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .step-label {
        background-color: #DC5858;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 16px;
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
    }

    .step-box img {
        width: 80px;
        margin: 20px 0;
    }

    #contact {
        background-color: #F48080;
        color: #ffffff;
        text-align: center;
        padding: 60px 0;
        width: 100vw;
        margin: 0;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }

    #contact h2 {
        color: #ffffff;
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 30px;
        letter-spacing: 1px;
    }

    .contact-email {
        display: inline-block;
        background-color: #ffffff;
        color: #DE6262;
        padding: 15px 40px;
        border-radius: 40px;
        font-weight: bold;
        font-size: 18px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .contact-email p {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    footer {
        background-color: #ffffff;
        padding: 20px 0;
        text-align: center;
        border-top: 1px solid #eee;
    }

    .footer-content {
        margin: 20px 0;
    }

    .footer-logo {
        font-size: 20px;
        color: #e85d5d;
        font-weight: bold;
    }

    .social-icons {
        display: inline-flex;
        margin-top: 15px;
    }

    .social-icons a img {
        width: 24px;
        margin: 0 10px;
    }
    </style>
</head>
<body>
    <nav>
    <div class="navbar">
        <div class="logo">
            <a href="#">MedWare</a>
        </div>
        <div class="menu">
            <a href="{{ route('login') }}">Log In</a>
        </div>
    </div>
    </nav>

    <div class="wrapper">
    <section id="definition">
        <div class="text-content">
        <h2>OPTIMIZE YOUR MEDICAL STOCK WITH US</h2>
        <p>Serves as a digital ledger for keeping track of all medical supplies, from medications to medical equipment.</p>
        <a href="{{ route('login') }}" class="btn">Try it free</a>
        </div>
        <div class="images">
        <img src="images/foto_definisi.png" alt="Medic illustration">
        </div>
    </section>

    <section id="features">
        <div class="features-wrapper">
        <h1>WHY WE ARE BETTER THAN OTHERS</h1>
        <div class="feature-container">
            <div class="feature-box">
            <img src="images/fitur1.png" alt="Feature 1">
            <p>Specialized for Medical Industry</p>
            </div>
            <div class="feature-box">
            <img src="images/fitur2.png" alt="Feature 2">
            <p>Customizable inventory information reports</p>
            </div>
            <div class="feature-box">
            <img src="images/fitur3.png" alt="Feature 3">
            <p>Comprehensive and User-Friendly Features</p>
            </div>
        </div>
        </div>
    </section>

    <section id="steps">
        <h2>STEP</h2>
        <div class="step-container">
            <div class="step-box">
            <div class="step-label">Create Account</div>
            <img src="images/create_acc.png" alt="Create Account">
            <p>Login if you already have an account</p>
        </div>
        <div class="step-box">
            <div class="step-label">Add Your Products</div>
            <img src="images/add_your.png" alt="Add Products">
            <p>You need to add your Products in the Product section</p>
        </div>
        <div class="step-box">
            <div class="step-label">Recording Sales</div>
            <img src="images/recording_sales.png" alt="Recording Sales">
            <p>You can start recording your sales or checking immediately</p>
        </div>
        </div>
    </section>

    <section id="contact">
        <h2>CONTACT US!</h2>
        <div class="contact-email">
        <p>medware@gmail.com</p>
        </div>
    </section>
    </div>

    <footer>
    <div class="footer-content">
        <div class="footer-logo">MedWare</div>
        <p>Jl. Telekomunikasi No. 1, Bandung</p>
    </div>
    </footer>
</body>
</html>
