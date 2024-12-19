<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payroll System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #ff8c00, #ff6347);
            color: #333;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 2rem;
            width: 100%;
            box-sizing: border-box;
        }

        .welcome-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            width: 90%;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            transition: transform 0.3s ease-in-out;
        }

        .welcome-card:hover {
            transform: translateY(-5px);
        }

        .welcome-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .welcome-card h1 {
            font-size: 2rem;
            margin: 0;
            color: #ff6347;
        }

        .auth-buttons {
            display: flex;
            flex-direction: row;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            width: 100%;
            margin-bottom: 2rem;
        }

        .auth-buttons a {
            display: inline-block;
            padding: 1rem 2.5rem;
            background-color: #ff6347;
            color: white;
            font-size: 1.2rem;
            border-radius: 30px;
            text-decoration: none;
            text-align: center;
            max-width: 220px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .auth-buttons a:hover {
            background-color: #ff4500;
            transform: scale(1.05);
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
            margin-top: 2.5rem;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 2.5rem;
            flex: 1 1 calc(33.333% - 2rem);
            max-width: calc(33.333% - 2rem);
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: #ff6347;
        }

        .card p {
            font-size: 1.1rem;
            margin: 0;
            color: #555;
        }

        .card[data-icon]::before {
            content: attr(data-icon);
            font-family: 'FontAwesome';
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 5rem;
            color: rgba(0, 0, 0, 0.1);
            opacity: 0.3;
        }

        footer {
            text-align: center;
            padding: 1.5rem;
            background-color: #f3f4f6;
            width: 100%;
            margin-top: 3rem;
            border-top: 2px solid #ddd;
        }

        footer span {
            font-size: 1rem;
            color: #777;
        }

        footer a {
            color: #ff6347;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(50% - 1rem);
                max-width: calc(50% - 1rem);
            }
        }

        @media (max-width: 480px) {
            .card {
                flex: 1 1 100%;
                max-width: 100%;
            }

            .auth-buttons a {
                font-size: 1rem;
                padding: 1rem 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Welcome Card -->
        <div class="welcome-card">
            <img src="https://www.learnsoftbeliotechsolutions.co.ke/img/logo.png" alt="Logo">
            <h1>Welcome to our Payroll ERP System.</h1>
        </div>

        <!-- Authentication Buttons -->
        <div class="auth-buttons">
            @if (Route::has('login'))
             @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
            @endif
        </div>

        <!-- Feature Cards -->
        <div class="cards">
            <div class="card" data-icon="&#128101;">
                <h2>Employee Management</h2>
                <p>Manage employee details and roles.</p>
            </div>
            <div class="card" data-icon="&#128202;">
                <h2>Department Management</h2>
                <p>Organize employees into departments.</p>
            </div>
            <div class="card" data-icon="&#128200;">
                <h2>Documentations & Attendances</h2>
                <p>Track employee attendance and documentation.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <span>&copy; {{ date('Y') }} <a href="https://www.learnsoftbeliotechsolutions.co.ke/">Learnsoft Beliotech Solutions</a> All Rights Reserved.</span>
        <span>Version 1.1.0</span>
    </footer>
</body>
</html>
