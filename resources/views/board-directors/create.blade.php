@extends('layouts.app')

@section('title', 'Create Board Director')

@section('page-title', 'Create Board Director')

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
        grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
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
        box-shadow:0 0 0 4px rgba(56,189,248,0.15);
    }

    textarea.form-control{
        min-height:120px;
        resize:none;
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
        box-shadow:0 12px 30px rgba(14,165,233,0.25);
    }

    .submit-btn:hover{
        transform:translateY(-4px);
    }

    .error-text{
        color:#dc2626;
        font-size:13px;
        margin-top:6px;
    }

</style>

<div class="form-container">

    <div class="form-header">

        <h1>
            Create Board Director
        </h1>

        <p>
            Add a new board member into the system.
        </p>

    </div>

    <form action="{{ route('board-directors.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="form-grid">

            <!-- FULL NAME -->
            <div class="form-group">

                <label>Full Name</label>

                <input type="text"
                       name="full_name"
                       class="form-control"
                       value="{{ old('full_name') }}"
                       required>

                @error('full_name')
                    <span class="error-text">{{ $message }}</span>
                @enderror

            </div>

            <!-- DOB -->
            <div class="form-group">

                <label>Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control"
                       value="{{ old('date_of_birth') }}">

            </div>

            <!-- JOIN DATE -->
            <div class="form-group">

                <label>Date Joined KFHA</label>

                <input type="date"
                       name="date_joined_kfha"
                       class="form-control"
                       value="{{ old('date_joined_kfha') }}">

            </div>

            <!-- TERM FINISH -->
            <div class="form-group">

                <label>Term Finish Date</label>

                <input type="date"
                       name="term_finish_date"
                       class="form-control"
                       value="{{ old('term_finish_date') }}">

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
                        {{ old('gender') == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender') == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                    <option value="Other"
                        {{ old('gender') == 'Other' ? 'selected' : '' }}>
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
                       value="{{ old('board_position') }}">

            </div>

            <!-- OCCUPATION -->
            <div class="form-group">

                <label>Occupation</label>

                <input type="text"
                       name="occupation"
                       class="form-control"
                       value="{{ old('occupation') }}">

            </div>

            <!-- CONTACT -->
            <div class="form-group">

                <label>Contact Number</label>

                <input type="text"
                       name="contact_number"
                       class="form-control"
                       value="{{ old('contact_number') }}">

            </div>

            <!-- EMAIL -->
            <div class="form-group">

                <label>Email Address</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}">

            </div>

            <!-- ADDRESS -->
            <div class="form-group" style="grid-column:1/-1;">

                <label>Home Address</label>

                <textarea name="home_address"
                          class="form-control">{{ old('home_address') }}</textarea>

            </div>

            <!-- FILE -->
            <div class="form-group" style="grid-column:1/-1;">

                <label>Bio Data / Photo</label>

                <input type="file"
                       name="bio_data"
                       class="form-control"
                       accept="image/*,.pdf,.doc,.docx">

            </div>

        </div>

        <button type="submit"
                class="submit-btn">

            Save Board Director

        </button>

    </form>

</div>

@endsection