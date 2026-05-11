@extends('layouts.app')

@section('title', 'Create Employee')

@section('page-title', 'Create Employee')

@section('content')

<style>

    .create-wrapper{
        max-width:1200px;
        margin:auto;
    }

    .create-header{
        margin-bottom:30px;
    }

    .create-header h1{
        font-size:36px;
        color:#0f172a;
        margin-bottom:10px;
    }

    .create-header p{
        color:#64748b;
        font-size:16px;
    }

    .employee-form{
        background:white;
        border-radius:28px;
        padding:40px;
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

    .image-preview-wrapper{
        display:flex;
        align-items:center;
        gap:25px;
        margin-top:15px;
        flex-wrap:wrap;
    }

    .image-preview{
        width:120px;
        height:120px;
        border-radius:20px;
        object-fit:cover;
        border:4px solid #e0f2fe;
        background:#f1f5f9;
    }

    .form-buttons{
        margin-top:35px;
        display:flex;
        gap:18px;
        flex-wrap:wrap;
    }

    .submit-btn{
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

    .submit-btn:hover{
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

    .error-message{
        color:#dc2626;
        font-size:14px;
        margin-top:8px;
    }

    @media(max-width:768px){

        .employee-form{
            padding:25px;
        }

        .create-header h1{
            font-size:28px;
        }

    }

</style>

<div class="create-wrapper">

    <!-- HEADER -->
    <div class="create-header">

        <h1>
            Create Employee
        </h1>

        <p>
            Add a new employee record into the system.
        </p>

    </div>

    <!-- FORM -->
    <form action="{{ route('employees.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="employee-form">

        @csrf

        <div class="form-grid">

            <!-- FIRST NAME -->
            <div class="form-group">

                <label>
                    First Name
                </label>

                <input type="text"
                       name="first_name"
                       value="{{ old('first_name') }}"
                       placeholder="Enter first name">

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
                       value="{{ old('last_name') }}"
                       placeholder="Enter last name">

                @error('last_name')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            <!-- DATE OF BIRTH -->
            <div class="form-group">

                <label>
                    Date of Birth
                </label>

                <input type="date"
                       name="date_of_birth"
                       value="{{ old('date_of_birth') }}">

            </div>

            <!-- GENDER -->
            <div class="form-group">

                <label>
                    Gender
                </label>

                <select name="gender">

                    <option value="">
                        Select Gender
                    </option>

                    <option value="Male">
                        Male
                    </option>

                    <option value="Female">
                        Female
                    </option>

                    <option value="Other">
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
                       value="{{ old('position') }}"
                       placeholder="Enter position">

            </div>

            <!-- PHONE -->
            <div class="form-group">

                <label>
                    Phone Number
                </label>

                <input type="text"
                       name="phone_number"
                       value="{{ old('phone_number') }}"
                       placeholder="Enter phone number">

            </div>

            <!-- EMAIL -->
            <div class="form-group">

                <label>
                    Email Address
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Enter email address">

            </div>

            <!-- OFFICIAL EMAIL -->
            <div class="form-group">

                <label>
                    Official Email
                </label>

                <input type="email"
                       name="official_email"
                       value="{{ old('official_email') }}"
                       placeholder="Enter official email">

            </div>

            <!-- DIVISION -->
            <div class="form-group">

                <label>
                    Division
                </label>

                <select name="division_id">

                    <option value="">
                        Select Division
                    </option>

                    @foreach($divisions as $division)

                        <option value="{{ $division->id }}">

                            {{ $division->name }}

                        </option>

                    @endforeach

                </select>

                @error('division_id')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            <!-- ADDRESS -->
            <div class="form-group full-width">

                <label>
                    Address
                </label>

                <textarea name="address"
                          placeholder="Enter address">{{ old('address') }}</textarea>

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

                <div class="image-preview-wrapper">

                    <img src="https://via.placeholder.com/120"
                         id="preview"
                         class="image-preview">

                </div>

            </div>

        </div>

        <!-- BUTTONS -->
        <div class="form-buttons">

            <button type="submit"
                    class="submit-btn">

                Save Employee

            </button>

            <a href="{{ route('employees.index') }}"
               class="cancel-btn">

                Cancel

            </a>

        </div>

    </form>

</div>

<!-- IMAGE PREVIEW SCRIPT -->
<script>

function previewImage(event)
{
    const reader = new FileReader();

    reader.onload = function(){

        const output =
        document.getElementById('preview');

        output.src = reader.result;
    }

    reader.readAsDataURL(
        event.target.files[0]
    );
}

</script>

@endsection