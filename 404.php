<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Viral Ads Media</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
            text-align: center;
            animation: fadeIn 1s ease-out;
        }

        .container {
            width: 100%;
            max-width: 800px;
            padding: 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: slideUp 1s ease-out forwards;
        }

        header {
            margin-bottom: 20px;
        }

        .logo {
            width: 180px;
            margin: 0 auto;
            display: block;
            animation: bounceIn 2s ease;
        }

        .error-content h1 {
            font-size: 40px;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .error-content p {
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 25px;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .btn {
            text-decoration: none;
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 30px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .homepage {
            background-color: #1abc9c;
        }

        .services {
            background-color: #e74c3c;
        }

        .btn:hover {
            background-color: #16a085;
            transform: scale(1.1);
        }

        .illustration {
            margin-top: 30px;
        }

        .illustration img {
            width: 150px;
            animation: floatIn 2s ease-in-out infinite;
        }

        footer {
            margin-top: 30px;
            font-size: 14px;
            color: #7f8c8d;
        }

        footer ul {
            list-style: none;
            margin: 15px 0;
        }

        footer ul li {
            display: inline;
            margin: 0 10px;
        }

        footer a {
            text-decoration: none;
            color: #7f8c8d;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #2c3e50;
        }

        footer .social-icons a {
            margin: 0 10px;
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes bounceIn {
            from { transform: scale(0.5); opacity: 0; }
            50% { transform: scale(1.2); }
            to { transform: scale(1); opacity: 1; }
        }

        @keyframes floatIn {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .cta-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn {
                padding: 12px 25px;
                font-size: 14px;
            }

            .illustration img {
                width: 120px;
            }
        }

        @media (max-width: 480px) {
            .error-content h1 {
                font-size: 28px;
            }

            .error-content p {
                font-size: 14px;
            }

            footer {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="https://www.viraladsmedia.com/assets/imgs/logo/main-logo-white%20-h.png" alt="Viral Ads Media" class="logo">
        </header>
        <main class="error-content">
            <h1>Oops! Looks like you've found a wrong turn...</h1>
            <p>Don't worry, we'll help you get back on track.</p>
            <div class="cta-buttons">
                <a href="/" class="btn homepage">Return to Homepage</a>
                <a href="/services" class="btn services">Explore Our Services</a>
            </div>
        </main>
        <div class="illustration">
            <img src="https://img.freepik.com/premium-vector/cartoon-confuse-man-vector-illustration_851674-45948.jpg" 
            alt="Confused character">
        </div>
        <footer>
            <ul>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/privacy-policy">Privacy Policy</a></li>
            </ul>
            <div class="social-icons">
                <a href="https://www.linkedin.com" target="_blank">LinkedIn</a>
                <a href="https://www.instagram.com" target="_blank">Instagram</a>
                <a href="https://www.twitter.com" target="_blank">Twitter</a>
            </div>
            <p>We’re better at creating viral content than we are at finding lost pages!</p>
        </footer>
    </div>
</body>
</html>
