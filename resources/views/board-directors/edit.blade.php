@extends('layouts.app')

@section('title', 'Edit Board Director')

@section('page-title', 'Edit Board Director')

@section('content')

<style>

    .form-container{
        max-width:1200px;
        margin:auto;
        background:white;
        padding:40px;
        border-radius:24px;
        box-shadow:0 10px 30px rgba(0,0,0,0.05);
    }

    .form-header{
        margin-bottom:35px;
    }

    .form-header h1{
        font-size:34px;
        color:#0f172a;
        margin-bottom:10px;
    }

    .form-header p{
        color:#64748b;
    }

    .form-grid{
        display:grid;
        grid-template-columns:
        repeat(auto-fit,minmax(300px,1fr));
        gap:25px;
    }

    .form-group{
        display:flex;
        flex-direction:column;
    }

    .form-group label{
        margin-bottom:10px;
        font-weight:600;
        color:#334155;
    }

    .form-control{
        padding:14px 16px;
        border-radius:14px;
        border:1px solid #cbd5e1;
        outline:none;
        transition:0.3s;
        font-size:14px;
        width:100%;
    }

    .form-control:focus{
        border-color:#38bdf8;
        box-shadow:
        0 0 0 4px rgba(56,189,248,0.15);
    }

    textarea.form-control{
        min-height:120px;
        resize:none;
    }

    .preview-image{
        width:140px;
        height:140px;
        border-radius:20px;
        object-fit:cover;
        border:4px solid #e0f2fe;
        margin-top:15px;
    }

    .submit-btn{
        margin-top:35px;
        background:linear-gradient(
            135deg,
            #0ea5e9,
            #38bdf8
        );
        color:white;
        border:none;
        padding:16px 28px;
        border-radius:16px;
        cursor:pointer;
        font-weight:600;
        transition:0.3s;
        box-shadow:
        0 12px 30px rgba(14,165,233,0.25);
    }

    .submit-btn:hover{
        transform:translateY(-4px);
    }

    .current-photo{
        margin-top:10px;
    }

    .current-photo p{
        color:#64748b;
        margin-bottom:10px;
        font-size:14px;
    }

</style>

<div class="form-container">

    <div class="form-header">

        <h1>
            Edit Board Director
        </h1>

        <p>
            Update board member information.
        </p>

    </div>

    @if($errors->any())

        <div style="
            background:#fee2e2;
            color:#991b1b;
            padding:15px;
            border-radius:12px;
            margin-bottom:25px;
        ">

            <ul style="padding-left:20px;">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('board-directors.update', $boardDirector->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <!-- FULL NAME -->
            <div class="form-group">

                <label>Full Name</label>

                <input type="text"
                       name="full_name"
                       class="form-control"
                       value="{{ old('full_name', $boardDirector->full_name) }}"
                       required>

            </div>

            <!-- DATE OF BIRTH -->
            <div class="form-group">

                <label>Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control"
                       value="{{ old('date_of_birth', $boardDirector->date_of_birth) }}">

            </div>

            <!-- DATE JOINED -->
            <div class="form-group">

                <label>Date Joined KFHA</label>

                <input type="date"
                       name="date_joined_kfha"
                       class="form-control"
                       value="{{ old('date_joined_kfha', $boardDirector->date_joined_kfha) }}">

            </div>

            <!-- TERM FINISH -->
            <div class="form-group">

                <label>Term Finish Date</label>

                <input type="date"
                       name="term_finish_date"
                       class="form-control"
                       value="{{ old('term_finish_date', $boardDirector->term_finish_date) }}">

            </div>

            <!-- GENDER -->
            <div class="form-group">

                <label>Gender</label>

                <select name="gender"
                        class="form-control">

                    <option value="">
                        Select Gender
                    </option>

                    <option value="Male"
                        {{ $boardDirector->gender == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ $boardDirector->gender == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                    <option value="Other"
                        {{ $boardDirector->gender == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>

                </select>

            </div>

            <!-- POSITION -->
            <div class="form-group">

                <label>Board Position</label>

                <input type="text"
                       name="board_position"
                       class="form-control"
                       value="{{ old('board_position', $boardDirector->board_position) }}">

            </div>

            <!-- OCCUPATION -->
            <div class="form-group">

                <label>Occupation</label>

                <input type="text"
                       name="occupation"
                       class="form-control"
                       value="{{ old('occupation', $boardDirector->occupation) }}">

            </div>

            <!-- CONTACT -->
            <div class="form-group">

                <label>Contact Number</label>

                <input type="text"
                       name="contact_number"
                       class="form-control"
                       value="{{ old('contact_number', $boardDirector->contact_number) }}">

            </div>

            <!-- EMAIL -->
            <div class="form-group">

                <label>Email Address</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $boardDirector->email) }}">

            </div>

            <!-- ADDRESS -->
            <div class="form-group"
                 style="grid-column:1/-1;">

                <label>Home Address</label>

                <textarea name="home_address"
                          class="form-control">{{ old('home_address', $boardDirector->home_address) }}</textarea>

            </div>

            <!-- FILE -->
            <div class="form-group"
                 style="grid-column:1/-1;">

                <label>Bio Data / Photo</label>

                <input type="file"
                       name="bio_data"
                       class="form-control"
                       accept="image/*,.pdf,.doc,.docx">

                @if($boardDirector->bio_data)

                    <div class="current-photo">

                        <p>
                            Current File
                        </p>

                        <img
                            src="{{ asset('storage/' . $boardDirector->bio_data) }}"
                            class="preview-image">

                    </div>

                @endif

            </div>

        </div>

        <button type="submit"
                class="submit-btn">

            Update Board Director

        </button>

    </form>

</div>

@endsection