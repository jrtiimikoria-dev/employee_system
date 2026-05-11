<!DOCTYPE html>
<html lang="en">
<head>

    <!-- DataTables CSS -->
    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet"
    href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <!-- JSZip -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Employee Management System')
    </title>

      <link rel="icon"
      type="image/png"
      href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgFKIXdKXE8qJNfTs3WjImLwcKWc4BeTR6tQ&s">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
        }

        a {
            text-decoration: none;
        }

        /* Layout */

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {

            width: 260px;

            background: #0f172a;

            color: white;

            padding: 30px 20px;

            position: fixed;

            height: 100vh;

            overflow-y: auto;
        }

        .sidebar-logo {

            text-align: center;

            margin-bottom: 40px;
        }

        .sidebar-logo h2 {
            font-size: 24px;
            color: #38bdf8;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sidebar-menu a {

            color: #cbd5e1;

            padding: 14px 16px;

            border-radius: 12px;

            transition: 0.3s;

            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-menu a:hover {

            background: #1e293b;

            color: white;

            transform: translateX(5px);
        }

        .sidebar-menu .active {

            background: #38bdf8;

            color: white;
        }

        /* Main */

        .main {

            margin-left: 260px;

            width: calc(100% - 260px);

            display: flex;
            flex-direction: column;
        }

        /* Header */

        .topbar {

            background: white;

            padding: 20px 30px;

            display: flex;

            justify-content: space-between;
            align-items: center;

            box-shadow: 0 2px 10px rgba(0,0,0,0.05);

            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .topbar-left h1 {
            font-size: 24px;
            color: #0f172a;
        }

        .topbar-left p {
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }

        .topbar-right {

            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile {

            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-avatar {

            width: 45px;
            height: 45px;

            border-radius: 50%;

            background: #38bdf8;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: bold;
        }

        .profile-info h4 {
            font-size: 15px;
        }

        .profile-info p {
            font-size: 13px;
            color: #64748b;
        }

        /* Content */

        .content {
            padding: 30px;
            flex: 1;
        }

        /* Logout */

        .logout-btn {

            width: 100%;

            margin-top: 30px;

            background: #ef4444;

            border: none;

            color: white;

            padding: 14px;

            border-radius: 12px;

            cursor: pointer;

            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        /* Mobile */

        @media(max-width: 900px) {

            .sidebar {
                width: 80px;
                padding: 20px 10px;
            }

            .sidebar-logo h2,
            .sidebar-menu span {
                display: none;
            }

            .main {
                margin-left: 80px;
                width: calc(100% - 80px);
            }
        }

        @media(max-width: 700px) {

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .content {
                padding: 20px;
            }
        }

    </style>

</head>
<body>

<div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="sidebar-logo">

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

                <h2 style="
                    color:#38bdf8;
                    font-size:22px;
                    font-weight:700;
                    text-align:center;
                ">
                    KFHA EMS
                </h2>

            </div>

        <div class="sidebar-menu">

            <a href="/dashboard" class="active">
                📊 <span>Dashboard</span>
            </a>

            <a href="{{ route('employees.index') }}">
                👨‍💼 <span>Employees</span>
            </a>

            <a href="{{ route('employees.index') }}">
                🏢 <span>Divisions</span>
            </a>

            <a href="{{ route('board-directors.index') }}">
                👨‍💼 <span>Board Directors</span>
            </a>

            

            <a href="#">
                📈 <span>Reports</span>
            </a>

            <a href="#">
                ⚙️ <span>Settings</span>
            </a>

        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="logout-btn">

                Logout

            </button>

        </form>

    </aside>

    <!-- Main -->
    <div class="main">

        <!-- Topbar -->
        <header class="topbar">

            <div class="topbar-left">

                <h1>
                    @yield('page-title', 'Dashboard')
                </h1>

                <p>
                    Employee Management System
                </p>

            </div>

            <div class="topbar-right">

                @auth

<div class="profile">

    <div class="profile-avatar">

        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

    </div>

    <div class="profile-info">

        <h4>
            {{ auth()->user()->name }}
        </h4>

        <p>
            Administrator
        </p>

    </div>

</div>

@endauth

            </div>

        </header>

        <!-- Content -->
        <main class="content">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>