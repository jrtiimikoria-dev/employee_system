@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="auth-card">

    <!-- Logo -->
    <div class="logo">

        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGmgD6mPls2qyIaErd1aJ6RPpHNQp4UM0ZcyOmOFttEQ&s"
             alt="Company Logo">

    </div>

    <!-- Header -->
    <div class="auth-header">

        <h1>
            Employee Management System
        </h1>

        <p>
            Sign in to continue to dashboard
        </p>

    </div>

    <!-- Errors -->
    @if($errors->any())

        <div class="error-box">
            {{ $errors->first() }}
        </div>

    @endif

    <!-- Form -->
    <form action="{{ route('login.post') }}"
          method="POST">

        @csrf

        <!-- Email -->
        <div class="form-group">

            <label>Email Address</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Enter your email">

        </div>

        <!-- Password -->
        <div class="form-group">

            <label>Password</label>

            <div class="password-wrapper">

                <input type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       placeholder="Enter your password">

                <span class="toggle-password"
                      onclick="togglePassword()">

                    Show

                </span>

            </div>

        </div>

        <!-- Remember / Forgot -->
        <div class="remember-row">

            <label>
                <input type="checkbox"
                       name="remember">

                Remember Me
            </label>

            <a href="#">
                Forgot Password?
            </a>

        </div>

        <!-- Button -->
        <button type="submit"
                class="btn-login">

            Login

        </button>

    </form>

    <!-- Back -->
    <div class="back-home">

        <a href="/">
            ← Back to Home
        </a>

    </div>

</div>

@endsection