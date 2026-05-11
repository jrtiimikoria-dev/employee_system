@extends('layouts.app')

@section('title', 'Edit Employee')

@section('page-title', 'Edit Employee')

@section('content')

<style>

    .edit-wrapper{

        max-width:1200px;

        margin:auto;
    }

    .edit-header{

        margin-bottom:30px;
    }

    .edit-header h1{

        font-size:36px;

        color:#0f172a;

        margin-bottom:10px;
    }

    .edit-header p{

        color:#64748b;
    }

    /* FORM */

    .edit-form{

        background:white;

        padding:40px;

        border-radius:30px;

        box-shadow:
        0 10px 40px rgba(0,0,0,0.05);
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

    .form-group input,
    .form-group select,
    .form-group textarea{

        padding:14px 16px;

        border-radius:14px;

        border:1px solid #cbd5e1;

        outline:none;

        font-size:15px;

        transition:0.3s;

        background:#f8fafc;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus{

        border-color:#38bdf8;

        background:white;

        box-shadow:
        0 0 0 4px rgba(56,189,248,0.15);
    }

    textarea{

        min-height:120px;

        resize:none;
    }

    .full-width{

        grid-column:1/-1;
    }

    /* IMAGE */

    .image-section{

        display:flex;

        align-items:center;

        gap:25px;

        margin-top:15px;

        flex-wrap:wrap;
    }

    .employee-image{

        width:130px;
        height:130px;

        border-radius:20px;

        object-fit:cover;

        border:5px solid #e0f2fe;

        background:#f1f5f9;
    }

    /* BUTTONS */

    .form-buttons{

        margin-top:35px;

        display:flex;

        gap:18px;

        flex-wrap:wrap;
    }

    .update-btn{

        background:
        linear-gradient(
            135deg,
            #0ea5e9,
            #38bdf8
        );

        color:white;

        border:none;

        padding:15px 30px;

        border-radius:16px;

        font-size:15px;

        font-weight:600;

        cursor:pointer;

        transition:0.3s;

        box-shadow:
        0 12px 30px rgba(14,165,233,0.25);
    }

    .update-btn:hover{

        transform:translateY(-4px);

        box-shadow:
        0 18px 40px rgba(14,165,233,0.35);
    }

    .cancel-btn{

        background:#e2e8f0;

        color:#334155;

        padding:15px 28px;

        border-radius:16px;

        text-decoration:none;

        font-weight:600;

        transition:0.3s;
    }

    .cancel-btn:hover{

        background:#cbd5e1;
    }

    /* ERRORS */

    .error-message{

        color:#dc2626;

        font-size:14px;

        margin-top:8px;
    }

    @media(max-width:768px){

        .edit-form{

            padding:25px;
        }

        .edit-header h1{

            font-size:28px;
        }
    }

</style>

<div class="edit-wrapper">

    <!-- HEADER -->
    <div class="edit-header">

        <h1>
            Edit Employee
        </h1>

        <p>
            Update employee information and records.
        </p>

    </div>

    <!-- FORM -->
    <form action="{{ route('employees.update', $employee->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="edit-form">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <!-- FIRST NAME -->
            <div class="form-group">

                <label>
                    First Name
                </label>

                <input type="text"
                       name="first_name"
                       value="{{ old('first_name', $employee->first_name) }}">

                @error('first_name')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            <!-- LAST NAME -->
            <div class="form-group">

                <label>
                    Last Name
                </label>

                <input type="text"
                       name="last_name"
                       value="{{ old('last_name', $employee->last_name) }}">

            </div>

            <!-- DATE OF BIRTH -->
            <div class="form-group">

                <label>
                    Date of Birth
                </label>

                <input type="date"
                       name="date_of_birth"
                       value="{{ old('date_of_birth', $employee->date_of_birth) }}">

            </div>

            <!-- GENDER -->
            <div class="form-group">

                <label>
                    Gender
                </label>

                <select name="gender">

                    <option value="Male"
                        {{ $employee->gender == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ $employee->gender == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                    <option value="Other"
                        {{ $employee->gender == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>

                </select>

            </div>

            <!-- POSITION -->
            <div class="form-group">

                <label>
                    Position
                </label>

                <input type="text"
                       name="position"
                       value="{{ old('position', $employee->position) }}">

            </div>

            <!-- Division -->
            <div class="form-group">

                <label>
                    Division
                </label>

                <select name="division_id"
                        required>

                    @foreach($divisions as $division)

                        <option value="{{ $division->id }}"

                            {{ $employee->division_id == $division->id ? 'selected' : '' }}>

                            {{ $division->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- PHONE -->
            <div class="form-group">

                <label>
                    Phone Number
                </label>

                <input type="text"
                       name="phone_number"
                       value="{{ old('phone_number', $employee->phone_number) }}">

            </div>

            <!-- EMAIL -->
            <div class="form-group">

                <label>
                    Email Address
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $employee->email) }}">

            </div>

            <!-- OFFICIAL EMAIL -->
            <div class="form-group">

                <label>
                    Official Email
                </label>

                <input type="email"
                       name="official_email"
                       value="{{ old('official_email', $employee->official_email) }}">

            </div>

            <!-- ADDRESS -->
            <div class="form-group full-width">

                <label>
                    Address
                </label>

                <textarea name="address">{{ old('address', $employee->address) }}</textarea>

            </div>

            <!-- BIO DATA -->
            <div class="form-group full-width">

                <label>
                    Employee Bio Data / Photo
                </label>

                <input type="file"
                       name="bio_data"
                       accept="image/*"
                       onchange="previewImage(event)">

                <div class="image-section">

                    <img
                        id="preview"

                        src="{{ $employee->bio_data
                        ? asset('storage/' . $employee->bio_data)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($employee->first_name) }}"

                        class="employee-image">

                </div>

            </div>

        </div>

        <!-- BUTTONS -->
        <div class="form-buttons">

            <button type="submit"
                    class="update-btn">

                Update Employee

            </button>

            <a href="{{ route('employees.index') }}"
               class="cancel-btn">

                Cancel

            </a>

        </div>

    </form>

</div>

<!-- IMAGE PREVIEW -->
<script>

    function previewImage(event)
    {
        const reader = new FileReader();

        reader.onload = function(){

            document.getElementById('preview')
            .src = reader.result;
        }

        reader.readAsDataURL(
            event.target.files[0]
        );
    }

</script>

@endsection