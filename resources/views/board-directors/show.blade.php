@extends('layouts.app')

@section('title', 'Board Director Details')

@section('page-title', 'Board Director Details')

@section('content')

<style>

    .profile-wrapper{
        max-width:1200px;
        margin:auto;
    }

    .profile-card{
        background:white;
        border-radius:28px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,0.05);
    }

    .profile-header{
        background:linear-gradient(
            135deg,
            #0f172a,
            #1e293b
        );
        padding:50px;
        color:white;
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:30px;
        flex-wrap:wrap;
        position:relative;
    }

    .profile-header::before{
        content:'';
        position:absolute;
        width:300px;
        height:300px;
        background:#38bdf8;
        opacity:0.08;
        border-radius:50%;
        top:-120px;
        right:-100px;
    }

    .profile-left{
        display:flex;
        align-items:center;
        gap:30px;
        flex-wrap:wrap;
        position:relative;
        z-index:2;
    }

    .profile-image{
        width:160px;
        height:160px;
        border-radius:24px;
        object-fit:cover;
        border:5px solid rgba(255,255,255,0.15);
        box-shadow:0 10px 25px rgba(0,0,0,0.25);
    }

    .profile-name{
        font-size:40px;
        margin-bottom:12px;
        font-weight:700;
    }

    .profile-position{
        color:#cbd5e1;
        font-size:18px;
        margin-bottom:18px;
    }

    .gender-badge{
        display:inline-block;
        padding:8px 18px;
        border-radius:50px;
        font-size:13px;
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

    .header-buttons{
        display:flex;
        gap:15px;
        flex-wrap:wrap;
        position:relative;
        z-index:2;
    }

    .header-btn{
        padding:14px 24px;
        border-radius:14px;
        text-decoration:none;
        font-weight:600;
        transition:0.3s;
        display:flex;
        align-items:center;
        gap:10px;
    }

    .edit-btn{
        background:#38bdf8;
        color:white;
        box-shadow:0 10px 25px rgba(56,189,248,0.25);
    }

    .back-btn{
        background:rgba(255,255,255,0.08);
        color:white;
        border:1px solid rgba(255,255,255,0.1);
        backdrop-filter:blur(10px);
    }

    .header-btn:hover{
        transform:translateY(-4px);
    }

    .profile-body{
        padding:40px;
    }

    .section-title{
        font-size:24px;
        color:#0f172a;
        margin-bottom:25px;
        font-weight:700;
    }

    .info-grid{
        display:grid;
        grid-template-columns:
        repeat(auto-fit,minmax(280px,1fr));
        gap:25px;
    }

    .info-card{
        background:#f8fafc;
        padding:25px;
        border-radius:20px;
        transition:0.3s;
        border:1px solid #f1f5f9;
    }

    .info-card:hover{
        transform:translateY(-5px);
        box-shadow:0 10px 25px rgba(0,0,0,0.05);
    }

    .info-card h4{
        color:#64748b;
        font-size:14px;
        margin-bottom:10px;
        font-weight:600;
    }

    .info-card p{
        color:#0f172a;
        font-size:16px;
        font-weight:600;
        line-height:1.7;
    }

    .bottom-actions{
        padding:30px 40px;
        border-top:1px solid #e2e8f0;
        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;
        gap:20px;
        background:#f8fafc;
    }

    .bottom-left{
        display:flex;
        gap:15px;
        flex-wrap:wrap;
    }

    .action-btn{
        padding:14px 24px;
        border-radius:14px;
        text-decoration:none;
        font-weight:600;
        transition:0.3s;
        display:flex;
        align-items:center;
        gap:10px;
    }

    .primary-btn{
        background:linear-gradient(
            135deg,
            #0ea5e9,
            #38bdf8
        );
        color:white;
        box-shadow:0 10px 25px rgba(14,165,233,0.25);
    }

    .secondary-btn{
        background:white;
        color:#0f172a;
        border:1px solid #cbd5e1;
    }

    .danger-btn{
        background:#fee2e2;
        color:#dc2626;
        border:1px solid #fecaca;
    }

    .action-btn:hover{
        transform:translateY(-4px);
    }

    @media(max-width:768px){

        .profile-header{
            padding:35px 25px;
        }

        .profile-name{
            font-size:30px;
        }

        .profile-image{
            width:130px;
            height:130px;
        }

        .profile-body{
            padding:25px;
        }

        .bottom-actions{
            padding:25px;
        }

    }

</style>

<div class="profile-wrapper">

    <div class="profile-card">

        <!-- HEADER -->
        <div class="profile-header">

            <div class="profile-left">

                <img
                    src="{{ $boardDirector->bio_data
                    ? asset('storage/' . $boardDirector->bio_data)
                    : 'https://ui-avatars.com/api/?name=' . urlencode($boardDirector->full_name) }}"
                    class="profile-image">

                <div>

                    <h1 class="profile-name">

                        {{ $boardDirector->full_name }}

                    </h1>

                    <p class="profile-position">

                        {{ $boardDirector->board_position ?? 'Board Director' }}

                    </p>

                    <span class="gender-badge {{ strtolower($boardDirector->gender) }}">

                        {{ $boardDirector->gender ?? 'N/A' }}

                    </span>

                </div>

            </div>

            <div class="header-buttons">

                <a href="{{ route('board-directors.edit', $boardDirector->id) }}"
                   class="header-btn edit-btn">

                    ✏️ Edit Profile

                </a>

                <a href="{{ route('board-directors.index') }}"
                   class="header-btn back-btn">

                    ← Go Back

                </a>

            </div>

        </div>

        <!-- BODY -->
        <div class="profile-body">

            <h2 class="section-title">
                Board Director Information
            </h2>

            <div class="info-grid">

                <div class="info-card">
                    <h4>Date of Birth</h4>
                    <p>{{ $boardDirector->date_of_birth ?? 'N/A' }}</p>
                </div>

                <div class="info-card">
                    <h4>Date Joined KFHA</h4>
                    <p>{{ $boardDirector->date_joined_kfha ?? 'N/A' }}</p>
                </div>

                <div class="info-card">
                    <h4>Term Finish Date</h4>
                    <p>{{ $boardDirector->term_finish_date ?? 'N/A' }}</p>
                </div>

                <div class="info-card">
                    <h4>Occupation</h4>
                    <p>{{ $boardDirector->occupation ?? 'N/A' }}</p>
                </div>

                <div class="info-card">
                    <h4>Contact Number</h4>
                    <p>{{ $boardDirector->contact_number ?? 'N/A' }}</p>
                </div>

                <div class="info-card">
                    <h4>Email Address</h4>
                    <p>{{ $boardDirector->email ?? 'N/A' }}</p>
                </div>

                <div class="info-card" style="grid-column:1/-1;">
                    <h4>Home Address</h4>
                    <p>{{ $boardDirector->home_address ?? 'N/A' }}</p>
                </div>

            </div>

        </div>

        <!-- FOOTER ACTIONS -->
        <div class="bottom-actions">

            <div class="bottom-left">

                <a href="{{ route('board-directors.index') }}"
                   class="action-btn secondary-btn">

                    ← Back to Directors

                </a>

                <a href="{{ route('board-directors.edit', $boardDirector->id) }}"
                   class="action-btn primary-btn">

                    ✏️ Edit Director

                </a>

            </div>

            <form action="{{ route('board-directors.destroy', $boardDirector->id) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this board director?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="action-btn danger-btn"
                        style="border:none; cursor:pointer;">

                    🗑 Delete Director

                </button>

            </form>

        </div>

    </div>

</div>

@endsection