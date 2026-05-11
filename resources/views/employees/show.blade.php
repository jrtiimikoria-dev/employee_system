@extends('layouts.app')

@section('title', 'Employee Details')

@section('page-title', 'Employee Details')

@section('content')

<style>

    .profile-wrapper{

        max-width:1400px;

        margin:auto;
    }

    /* HEADER */

    .profile-header{

        display:flex;

        justify-content:space-between;

        align-items:center;

        flex-wrap:wrap;

        gap:20px;

        margin-bottom:30px;
    }

    .profile-header h1{

        font-size:36px;

        color:#0f172a;

        margin-bottom:10px;
    }

    .profile-header p{

        color:#64748b;
    }

    .header-actions{

        display:flex;

        gap:15px;

        flex-wrap:wrap;
    }

    .edit-btn{

        padding:14px 24px;

        border-radius:14px;

        background:#f59e0b;

        color:white;

        text-decoration:none;

        font-weight:600;

        transition:0.3s;
    }

    .edit-btn:hover{

        transform:translateY(-4px);

        background:#d97706;
    }

    .back-btn{

        padding:14px 24px;

        border-radius:14px;

        background:#e2e8f0;

        color:#334155;

        text-decoration:none;

        font-weight:600;

        transition:0.3s;
    }

    .back-btn:hover{

        background:#cbd5e1;
    }

    /* MAIN GRID */

    .profile-grid{

        display:grid;

        grid-template-columns:350px 1fr;

        gap:30px;
    }

    /* SIDEBAR */

    .profile-sidebar{

        background:white;

        border-radius:28px;

        padding:35px;

        box-shadow:
        0 10px 40px rgba(0,0,0,0.05);

        text-align:center;

        height:fit-content;
    }

    .employee-image{

        width:180px;
        height:180px;

        border-radius:50%;

        object-fit:cover;

        border:6px solid #e0f2fe;

        margin-bottom:25px;
    }

    .employee-name{

        font-size:28px;

        font-weight:700;

        color:#0f172a;

        margin-bottom:10px;
    }

    .employee-position{

        color:#0ea5e9;

        font-size:17px;

        font-weight:600;

        margin-bottom:20px;
    }

    .employee-badge{

        display:inline-block;

        padding:8px 18px;

        border-radius:30px;

        font-size:14px;

        font-weight:600;
    }

    .male{

        background:#dbeafe;

        color:#1d4ed8;
    }

    .female{

        background:#fce7f3;

        color:#be185d;
    }

    .other{

        background:#ede9fe;

        color:#7c3aed;
    }

    /* DETAILS */

    .profile-details{

        background:white;

        border-radius:28px;

        padding:40px;

        box-shadow:
        0 10px 40px rgba(0,0,0,0.05);
    }

    .details-title{

        font-size:28px;

        color:#0f172a;

        margin-bottom:35px;
    }

    .details-grid{

        display:grid;

        grid-template-columns:
        repeat(auto-fit,minmax(280px,1fr));

        gap:25px;
    }

    .detail-card{

        background:#f8fafc;

        border-radius:20px;

        padding:25px;

        transition:0.3s;
    }

    .detail-card:hover{

        transform:translateY(-4px);

        background:white;

        box-shadow:
        0 10px 30px rgba(0,0,0,0.06);
    }

    .detail-label{

        color:#64748b;

        font-size:14px;

        margin-bottom:10px;
    }

    .detail-value{

        color:#0f172a;

        font-size:18px;

        font-weight:600;

        word-break:break-word;
    }

    /* ADDRESS */

    .address-section{

        margin-top:35px;

        background:#f8fafc;

        padding:30px;

        border-radius:22px;
    }

    .address-section h3{

        color:#0f172a;

        margin-bottom:15px;

        font-size:22px;
    }

    .address-section p{

        color:#475569;

        line-height:1.8;
    }

    @media(max-width:992px){

        .profile-grid{

            grid-template-columns:1fr;
        }
    }

    @media(max-width:768px){

        .profile-header{

            flex-direction:column;

            align-items:flex-start;
        }

        .profile-details,
        .profile-sidebar{

            padding:25px;
        }

        .employee-name{

            font-size:24px;
        }

        .details-title{

            font-size:24px;
        }
    }

</style>

<div class="profile-wrapper">

    <!-- HEADER -->
    <div class="profile-header">

        <div>

            <h1>
                Employee Profile
            </h1>

            <p>
                View detailed employee information and records.
            </p>

        </div>

        <div class="header-actions">
            
            <a href="{{ route('employees.edit', $employee->id) }}"
               class="edit-btn">

                Edit Employee

            </a>
            
            <a href="{{ route('employees.index') }}"
               class="back-btn">

                Back

            </a>

        </div>

    </div>

    <!-- GRID -->
    <div class="profile-grid">

        <!-- SIDEBAR -->
        <div class="profile-sidebar">

            <img
                src="{{ $employee->bio_data
                ? asset('storage/' . $employee->bio_data)
                : 'https://ui-avatars.com/api/?name=' . urlencode($employee->first_name) }}"
                class="employee-image">

            <div class="employee-name">

                {{ $employee->first_name }}
                {{ $employee->last_name }}

            </div>

            <div class="employee-position">

                {{ $employee->position ?? 'No Position' }}

            </div>

            <span class="employee-badge
            {{ strtolower($employee->gender) }}">

                {{ $employee->gender ?? 'N/A' }}

            </span>

        </div>

        <!-- DETAILS -->
        <div class="profile-details">

            <h2 class="details-title">
                Employee Information
            </h2>

            <div class="details-grid">

                <!-- FIRST NAME -->
                <div class="detail-card">

                    <div class="detail-label">
                        First Name
                    </div>

                    <div class="detail-value">
                        {{ $employee->first_name }}
                    </div>

                </div>

                <!-- LAST NAME -->
                <div class="detail-card">

                    <div class="detail-label">
                        Last Name
                    </div>

                    <div class="detail-value">
                        {{ $employee->last_name }}
                    </div>

                </div>

                <!-- DATE OF BIRTH -->
                <div class="detail-card">

                    <div class="detail-label">
                        Date of Birth
                    </div>

                    <div class="detail-value">

                        {{ $employee->date_of_birth ?? 'N/A' }}

                    </div>

                </div>

                <!-- GENDER -->
                <div class="detail-card">

                    <div class="detail-label">
                        Gender
                    </div>

                    <div class="detail-value">

                        {{ $employee->gender ?? 'N/A' }}

                    </div>

                </div>

                <!-- POSITION -->
                <div class="detail-card">

                    <div class="detail-label">
                        Position
                    </div>

                    <div class="detail-value">

                        {{ $employee->position ?? 'N/A' }}

                    </div>

                </div>

                <!-- Division -->
                <div class="detail-card">

                    <h3>Division</h3>

                    <p>
                        {{ $employee->division->name ?? 'N/A' }}
                    </p>

                </div>

                <!-- PHONE -->
                <div class="detail-card">

                    <div class="detail-label">
                        Phone Number
                    </div>

                    <div class="detail-value">

                        {{ $employee->phone_number ?? 'N/A' }}

                    </div>

                </div>

                <!-- EMAIL -->
                <div class="detail-card">

                    <div class="detail-label">
                        Email Address
                    </div>

                    <div class="detail-value">

                        {{ $employee->email ?? 'N/A' }}

                    </div>

                </div>

                <!-- OFFICIAL EMAIL -->
                <div class="detail-card">

                    <div class="detail-label">
                        Official Email
                    </div>

                    <div class="detail-value">

                        {{ $employee->official_email ?? 'N/A' }}

                    </div>

                </div>

            </div>


            <!-- ADDRESS -->
            <div class="address-section">

                <h3>
                    Address
                </h3>

                <p>

                    {{ $employee->address ?? 'No address available.' }}

                </p>

            </div>

        </div>

    </div>

</div>

@endsection