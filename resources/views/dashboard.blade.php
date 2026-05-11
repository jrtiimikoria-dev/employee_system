@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<style>
    .dashboard-header {
        background: linear-gradient(to right, #0f172a, #1e293b);
        color: white;
        padding: 40px;
        border-radius: 20px;
        margin-bottom: 30px;
    }

    .dashboard-header h1 {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .dashboard-header p {
        color: #cbd5e1;
        font-size: 16px;
    }

    /* Cards */
    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background: white;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        color: #64748b;
        margin-bottom: 15px;
        font-size: 16px;
    }

    .card p {
        font-size: 34px;
        font-weight: bold;
        color: #0f172a;
    }

    /* Table */
    .table-section {
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .table-section h2 {
        margin-bottom: 20px;
        color: #0f172a;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 16px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    table th {
        background: #f8fafc;
    }

    .status {
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: bold;
    }

    .active {
        background: #dcfce7;
        color: #166534;
    }

    .inactive {
        background: #fee2e2;
        color: #991b1b;
    }

    @media(max-width:768px) {

        .dashboard-header {
            padding: 30px 20px;
        }

        .dashboard-header h1 {
            font-size: 28px;
        }

        table {
            font-size: 14px;
        }
    }
</style>

<!-- Header -->
<div class="dashboard-header">

    <h1>
        Welcome, {{ auth()->user()->name }}
    </h1>

    <p>
        Employee Management System Dashboard Overview
    </p>

</div>

<!-- Statistic Cards -->
<div class="dashboard-cards">

    <div class="card">
        <h3>Total Employees</h3>
        <p>{{ $employees->count() }}</p>
    </div>

    <div class="card">
        <h3>Division</h3>
        <p> {{ $totalDivisions }}</p>
    </div>

    <div class="card">
        <h3>Total Board Directors</h3>
        <p>{{ $totalBoardDirectors }}</p>
    </div>

    <div class="card">
        <h3>Youth Volunteers</h3>
        <p>20</p>
    </div>

</div>

<!-- DASHBOARD SECTION -->
<div class="table-section">

    <style>

        .dashboard-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(350px,1fr));
            gap:25px;
            margin-top:30px;
        }

        .dashboard-card{
            background:white;
            padding:25px;
            border-radius:22px;
            box-shadow:0 10px 25px rgba(0,0,0,0.05);
        }

        .dashboard-card h3{
            margin-bottom:20px;
            color:#0f172a;
            font-size:20px;
        }

        .chart-box{
            position:relative;
            height:320px;
        }

        .map-frame{
            width:500%;
            height:350px;
            border:none;
            border-radius:18px;
        }

        .map-card{
    grid-column:1/-1;
}

    .map-container{
        width:100%;
        height:350px;
        border-radius:20px;
        overflow:hidden;
        margin-top:15px;
    }

    .map-container iframe{
        width:100%;
        height:100%;
        border:none;
    }

    </style>

    <!-- CHART GRID -->
    <div class="dashboard-grid">

        <!-- BAR CHART -->
        <div class="dashboard-card">

            <h3>
                Employees Per Division
            </h3>

            <div class="chart-box">
                <canvas id="barChart"></canvas>
            </div>

        </div>

        <!-- PIE CHART -->
        <div class="dashboard-card">

            <h3>
                Employee Gender Distribution
            </h3>

            <div class="chart-box">
                <canvas id="pieChart"></canvas>
            </div>

        </div>

        <!-- LINE CHART -->
        <div class="dashboard-card">

            <h3>
                Yearly Employee Growth
            </h3>

            <div class="chart-box">
                <canvas id="lineChart"></canvas>
            </div>

        </div>

        <!-- MAP -->
        <div class="dashboard-card">

            <h3>
                Organization Location
            </h3>

            <div class="map-container">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.731014799727!2d173.01857837396315!3d1.337663061616992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x65647b3dedbaa30b%3A0x5a38c3c9234fe5f0!2sKiribati%20Family%20Health%20Association%20(KFHA)!5e0!3m2!1sen!2ski!4v1778391772740!5m2!1sen!2ski" 
                    width="600" 
                    height="450" 
                    tyle="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>

        </div>

    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    /*
    |--------------------------------------------------------------------------
    | BAR CHART
    |--------------------------------------------------------------------------
    */

    const barCtx = document.getElementById('barChart');

    new Chart(barCtx, {

        type: 'bar',

        data: {

            labels: [
                'Account',
                'Clinic',
                'ICT',
                'Youth',
                'Admin'
            ],

            datasets: [{

                label: 'Employees',

                data: [
                    7,
                    5,
                    3,
                    2,
                    3
                ],

                borderWidth: 1

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

    /*
    |--------------------------------------------------------------------------
    | PIE CHART
    |--------------------------------------------------------------------------
    */

    const pieCtx = document.getElementById('pieChart');

    new Chart(pieCtx, {

        type: 'pie',

        data: {

            labels: [
                'Male',
                'Female',
                'Other'
            ],

            datasets: [{

                data: [
                    10,
                    9,
                    1
                ]

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

    /*
    |--------------------------------------------------------------------------
    | LINE CHART
    |--------------------------------------------------------------------------
    */

    const lineCtx = document.getElementById('lineChart');

    new Chart(lineCtx, {

        type: 'line',

        data: {

            labels: [
                '2023',
                '2024',
                '2025',
                '2026'
                
            ],

            datasets: [{

                label: 'Employees',

                data: [
                    15,
                    13,
                    17,
                    20
                ],

                fill: false,

                tension: 0.4

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

</script>

@endsection