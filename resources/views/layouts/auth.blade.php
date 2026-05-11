<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

     <link rel="icon"
      type="image/png"
      href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGmgD6mPls2qyIaErd1aJ6RPpHNQp4UM0ZcyOmOFttEQ&s">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {

            min-height: 100vh;

            background:
                linear-gradient(
                    rgba(15,23,42,0.75),
                    rgba(15,23,42,0.85)
                ),
                url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=2070');

            background-size: cover;
            background-position: center;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        .auth-card {

            width: 100%;
            max-width: 430px;

            padding: 40px;

            border-radius: 25px;

            background: rgba(255,255,255,0.08);

            backdrop-filter: blur(20px);

            border: 1px solid rgba(255,255,255,0.15);

            box-shadow: 0 10px 40px rgba(0,0,0,0.25);

            animation: fadeIn 0.7s ease;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.2);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }

        .auth-header h1 {
            margin-bottom: 10px;
            font-size: 30px;
        }

        .auth-header p {
            color: #cbd5e1;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: white;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {

            width: 100%;

            padding: 14px;

            border-radius: 12px;

            border: 1px solid rgba(255,255,255,0.2);

            background: rgba(255,255,255,0.08);

            color: white;

            font-size: 15px;

            transition: 0.3s;
        }

        .form-control::placeholder {
            color: #cbd5e1;
        }

        .form-control:focus {

            outline: none;

            border-color: #38bdf8;

            box-shadow: 0 0 0 4px rgba(56,189,248,0.2);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {

            position: absolute;

            top: 50%;
            right: 15px;

            transform: translateY(-50%);

            cursor: pointer;

            color: #cbd5e1;

            font-size: 13px;
        }

        .remember-row {

            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;

            color: white;

            font-size: 14px;
        }

        .remember-row a {
            color: #38bdf8;
            text-decoration: none;
        }

        .btn-login {

            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 12px;

            background: #38bdf8;

            color: white;

            font-size: 15px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }

        .btn-login:hover {
            background: #0ea5e9;
            transform: translateY(-2px);
        }

        .error-box {

            background: rgba(239,68,68,0.15);

            border: 1px solid rgba(239,68,68,0.25);

            color: #fecaca;

            padding: 12px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        .back-home {
            text-align: center;
            margin-top: 25px;
        }

        .back-home a {
            color: #38bdf8;
            text-decoration: none;
            font-size: 14px;
        }

        @keyframes fadeIn {

            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media(max-width: 500px) {

            .auth-card {
                padding: 30px 25px;
            }

            .auth-header h1 {
                font-size: 24px;
            }
        }

    </style>

</head>
<body>

    @yield('content')

<script>

    function togglePassword() {

        const password =
            document.getElementById('password');

        if(password.type === 'password') {

            password.type = 'text';

        } else {

            password.type = 'password';
        }
    }

</script>

</body>
</html>