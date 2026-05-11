<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Employee Management System
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="icon"
      type="image/png"
      href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgFKIXdKXE8qJNfTs3WjImLwcKWc4BeTR6tQ&s">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            background:#0f172a;
            overflow-x:hidden;
        }

        a{
            text-decoration:none;
        }

        /* TOP NAVBAR */

        .top-navbar{

            background:#020617;

            padding:12px 60px;

            display:flex;

            justify-content:flex-end;

            align-items:center;

            gap:20px;
        }

        .top-navbar a{

            color:#94a3b8;

            font-size:18px;

            transition:0.3s;
        }

        .top-navbar a:hover{

            color:#38bdf8;

            transform:translateY(-3px);
        }

        /* MAIN NAVBAR */

        .navbar{

            width:100%;

            padding:20px 60px;

            display:flex;

            justify-content:space-between;

            align-items:center;

            position:relative;

            z-index:1000;

            backdrop-filter:blur(14px);

            background:rgba(15,23,42,0.75);

            border-bottom:1px solid rgba(255,255,255,0.08);
        }
        .logo-wrapper{
            display:flex;
            flex-direction:column;
        }

        .logo{

            color:white;

            font-size:30px;

            font-weight:700;

            letter-spacing:1px;
        }

        .logo span{
            color:#38bdf8;
        }

        .logo-tagline{

            color:#94a3b8;

            font-size:12px;

            margin-top:3px;
        }

        .login-btn{

            padding:13px 28px;

            border-radius:14px;

            background:#38bdf8;

            color:white;

            font-weight:600;

            position:relative;

            overflow:hidden;

            transition:0.3s;

            box-shadow:0 12px 30px rgba(56,189,248,0.35);
        }

        .login-btn::before{

            content:'';

            position:absolute;

            top:0;
            left:-100%;

            width:100%;
            height:100%;

            background:
            linear-gradient(
                120deg,
                transparent,
                rgba(255,255,255,0.35),
                transparent
            );

            transition:0.7s;
        }

        .login-btn:hover::before{
            left:100%;
        }

        .login-btn:hover{

            background:#0ea5e9;

            transform:translateY(-4px);
        }

        /* HERO */

        .hero{

            min-height:100vh;

            display:flex;

            align-items:center;

            justify-content:center;

            padding:180px 60px 100px;

            position:relative;

            overflow:hidden;

            background:
            linear-gradient(
                rgba(2,6,23,0.82),
                rgba(15,23,42,0.9)
            ),

            url('https://sexualwellbeing.org.nz/media/kk4o2ckz/kiribati-report-600x360.jpg?width=1200&height=630');

            background-size:cover;
            background-position:center;
        }

        .hero::before{

            content:'';

            position:absolute;

            width:500px;
            height:500px;

            background:#38bdf8;

            filter:blur(180px);

            opacity:0.15;

            top:-100px;
            right:-100px;

            border-radius:50%;
        }

        .hero::after{

            content:'';

            position:absolute;

            width:400px;
            height:400px;

            background:#7c3aed;

            filter:blur(180px);

            opacity:0.14;

            bottom:-120px;
            left:-120px;

            border-radius:50%;
        }

        .hero-content{

            max-width:900px;

            text-align:center;

            position:relative;

            z-index:5;

            animation:fadeUp 1s ease;
        }

        .hero-subtitle{

            display:inline-block;

            padding:10px 18px;

            background:rgba(56,189,248,0.12);

            border:1px solid rgba(56,189,248,0.25);

            border-radius:50px;

            color:#38bdf8;

            font-size:14px;

            margin-bottom:25px;
        }

        .hero h1{

            color:white;

            font-size:72px;

            line-height:1.1;

            margin-bottom:25px;

            font-weight:700;
        }

        .hero h1 span{
            color:#38bdf8;
        }

        .hero p{

            color:#cbd5e1;

            font-size:20px;

            line-height:1.9;

            margin-bottom:40px;
        }

        .hero-buttons{

            display:flex;

            justify-content:center;

            gap:20px;

            flex-wrap:wrap;
        }

        .primary-btn{

            padding:16px 34px;

            border-radius:14px;

            background:#38bdf8;

            color:white;

            font-weight:600;

            position:relative;

            overflow:hidden;

            transition:0.3s;

            box-shadow:0 12px 30px rgba(56,189,248,0.35);
        }

        .primary-btn::before{

            content:'';

            position:absolute;

            top:0;
            left:-100%;

            width:100%;
            height:100%;

            background:
            linear-gradient(
                120deg,
                transparent,
                rgba(255,255,255,0.35),
                transparent
            );

            transition:0.7s;
        }

        .primary-btn:hover::before{
            left:100%;
        }

        .primary-btn:hover{

            background:#0ea5e9;

            transform:translateY(-4px);
        }

        .secondary-btn{

            padding:16px 34px;

            border-radius:14px;

            background:rgba(255,255,255,0.08);

            border:1px solid rgba(255,255,255,0.1);

            color:white;

            font-weight:600;

            backdrop-filter:blur(10px);

            transition:0.3s;
        }

        .secondary-btn:hover{

            background:rgba(255,255,255,0.14);

            transform:translateY(-4px);
        }

        /* STATS */

        .stats{

            margin-top:-80px;

            padding:0 60px;

            position:relative;

            z-index:20;
        }

        .stats-container{

            max-width:1200px;

            margin:auto;

            display:grid;

            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));

            gap:25px;
        }

        .stat-card{

            background:rgba(15,23,42,0.75);

            backdrop-filter:blur(14px);

            border:1px solid rgba(255,255,255,0.08);

            padding:35px;

            border-radius:24px;

            text-align:center;

            transition:0.3s;
        }

        .stat-card:hover{

            transform:translateY(-10px);

            border-color:#38bdf8;

            box-shadow:0 20px 40px rgba(56,189,248,0.12);
        }

        .stat-card h2{

            color:#38bdf8;

            font-size:42px;

            margin-bottom:10px;
        }

        .stat-card p{
            color:#cbd5e1;
        }

        /* DIVIDER */

        .divider{

            height:120px;

            background:
            linear-gradient(
                to bottom right,
                transparent 49%,
                #f8fafc 50%
            );
        }

        /* FEATURES */

        .features{

            padding:120px 60px;

            background:#f8fafc;
        }

        .section-title{

            text-align:center;

            margin-bottom:70px;
        }

        .section-title h2{

            font-size:48px;

            color:#0f172a;

            margin-bottom:20px;
        }

        .section-title p{

            max-width:700px;

            margin:auto;

            color:#64748b;

            line-height:1.8;
        }

        .feature-grid{

            max-width:1200px;

            margin:auto;

            display:grid;

            grid-template-columns:repeat(auto-fit,minmax(300px,1fr));

            gap:30px;
        }

        .feature-card{

            background:white;

            padding:40px;

            border-radius:24px;

            transition:0.3s;

            box-shadow:0 10px 30px rgba(0,0,0,0.05);

            opacity:0;

            animation:fadeCard 0.8s ease forwards;
        }

        .feature-card:nth-child(2){
            animation-delay:0.2s;
        }

        .feature-card:nth-child(3){
            animation-delay:0.4s;
        }

        .feature-card:hover{

            transform:translateY(-10px);

            box-shadow:0 20px 40px rgba(56,189,248,0.15);
        }

        .feature-icon{

            width:70px;
            height:70px;

            border-radius:18px;

            background:#e0f2fe;

            display:flex;

            align-items:center;
            justify-content:center;

            margin-bottom:25px;

            color:#0284c7;

            font-size:28px;
        }

        .feature-card h3{

            margin-bottom:18px;

            color:#0f172a;

            font-size:24px;
        }

        .feature-card p{

            color:#64748b;

            line-height:1.8;
        }

        /* FOOTER */

        footer{

            background:#020617;

            padding:35px;

            text-align:center;

            color:#94a3b8;
        }

        /* ANIMATIONS */

        @keyframes fadeUp{

            from{
                opacity:0;
                transform:translateY(40px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        @keyframes fadeCard{

            from{
                opacity:0;
                transform:translateY(30px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        /* RESPONSIVE */

        @media(max-width:992px){

            .hero h1{
                font-size:54px;
            }

            .navbar,
            .top-navbar,
            .hero,
            .features,
            .stats{
                padding-left:25px;
                padding-right:25px;
            }
        }

        @media(max-width:768px){

            .hero{
                padding-top:220px;
            }

            .hero h1{
                font-size:42px;
            }

            .hero p{
                font-size:17px;
            }

            .navbar{
                top:44px;
            }

            .section-title h2{
                font-size:36px;
            }
        }

    </style>

</head>
<body>

    <!-- TOP NAVBAR -->
    <div class="top-navbar">

        <a href="#">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="#">
            <i class="fab fa-instagram"></i>
        </a>

        <a href="#">
            <i class="fab fa-youtube"></i>
        </a>

    </div>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo-wrapper">

            <div style="
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    gap:12px;
                    margin-bottom:15px;
                ">

                    <!-- KFHA LOGO -->
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgFKIXdKXE8qJNfTs3WjImLwcKWc4BeTR6tQ&s"
                        alt="KFHA Logo"
                        style="
                            width:70px;
                            height:70px;
                            object-fit:contain;
                            background:white;
                            padding:4px;
                            border-radius:12px;
                        "
                    >

                    <!-- IPPF LOGO -->
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHNXZOzkTAvYvbK7FAM89DVuU7kqh17Sg7wg&s"
                        alt="IPPF Logo"
                        style="
                            width:70px;
                            height:70px;
                            object-fit:contain;
                            background:white;
                            padding:4px;
                            border-radius:12px;
                        "
                    >

                </div>

        </div>

        <a href="/login" class="login-btn">
            Login
        </a>

    </nav>

    <!-- HERO -->
    <section class="hero">

        <div class="hero-content">

            

            <div class="hero-buttons">

                <a href="/login"
                   class="primary-btn">

                    Access Dashboard

                </a>

                <a href="#features"
                   class="secondary-btn">

                    Explore Features

                </a>

            </div>

        </div>

    </section>

    <!-- STATS -->
    <section class="stats">

        <div class="stats-container">

            <div class="stat-card">
                <h2>20</h2>
                <p>Total Employees</p>
            </div>

            <div class="stat-card">
                <h2>10</h2>
                <p>Board of Directors</p>
            </div>

            <div class="stat-card">
                <h2>7</h2>
                <p>Ongoing Project</p>
            </div>

            <div class="stat-card">
                <h2>10,000+</h2>
                <p>People we reached</p>
            </div>

        </div>

    </section>

    <!-- DIVIDER -->
    <div class="divider"></div>

    <!-- FEATURES -->
    <section class="features"
             id="features">

        <div class="section-title">

            <h2>
                Powerful Business Features
            </h2>

            <p>

                Everything your business needs to efficiently
                manage workforce operations in one secure platform.

            </p>

        </div>

        <div class="feature-grid">

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>

                <h3>
                    Employee Management
                </h3>

                <p>

                    Manage employee records, departments,
                    positions, and workforce information.

                </p>

            </div>

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <h3>
                    Analytics & Reports
                </h3>

                <p>

                    Generate business reports and gain
                    workforce insights with smart analytics.

                </p>

            </div>

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>

                <h3>
                    Attendance Tracking
                </h3>

                <p>

                    Monitor attendance, schedules,
                    and workforce activity in real-time.

                </p>

            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer>

        © {{ date('Y') }}
        Employee Management System.
        All Rights Reserved.

    </footer>

</body>
</html>