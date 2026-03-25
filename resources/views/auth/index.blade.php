<!-- Made by: Samuel Martínez Arteaga -->

@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/auth.index.css') }}">
@endsection
@section('content-container-class', 'container-fluid px-0 my-0')
@section('content')
<div class="login-container">
    <!-- Left Section -->
    <div class="login-left">
        <div class="login-left-content">
            <div class="logo-section">
                <img src="{{ asset('images/logoRentflix.png') }}" alt="{{ __('authIndex.logoAlt') }}" class="logo">
            </div>
            
            <div class="welcome-section">
                <h1>{{ __('authIndex.welcomeTitle') }}</h1>
                <p>{{ __('authIndex.welcomeDescription') }}</p>
            </div>
            
            <div class="stats-section">
                <div class="stat">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">{{ __('authIndex.statsLabels.movies') }}</div>
                </div>
                <div class="stat">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">{{ __('authIndex.statsLabels.users') }}</div>
                </div>
                <div class="stat">
                    <div class="stat-number">4.9</div>
                    <div class="stat-label">{{ __('authIndex.statsLabels.rating') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Section -->
    <div class="login-right">
        <div class="login-form-container">
            <div class="auth-switch" role="tablist" aria-label="{{ __('authIndex.authSwitchLabel') }}">
                <button type="button" class="auth-switch-btn is-active" data-panel="login-panel">{{ __('authIndex.loginTabButton') }}</button>
                <button type="button" class="auth-switch-btn" data-panel="register-panel">{{ __('authIndex.registerTabButton') }}</button>
            </div>

            <div id="login-panel" class="auth-panel is-active" aria-hidden="false">
                <h2>{{ __('authIndex.loginTitle') }}</h2>
                <p class="form-subtitle">{{ __('authIndex.loginSubtitle') }}</p>

                <form class="login-form" method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="login_email">{{ __('authIndex.emailLabel') }}</label>
                        <input
                            type="email"
                            id="login_email"
                            name="email"
                            placeholder="{{ __('authIndex.emailPlaceholder') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="login_password">{{ __('authIndex.passwordLabel') }}</label>
                        <div class="password-input-wrapper">
                            <input
                                type="password"
                                id="login_password"
                                name="password"
                                placeholder="{{ __('authIndex.passwordPlaceholder') }}"
                                required
                            >
                            <button type="button" class="toggle-password" aria-label="{{ __('authIndex.togglePasswordLabel') }}">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">{{ __('authIndex.loginButton') }}</button>
                </form>
            </div>

            <div id="register-panel" class="auth-panel" aria-hidden="true">
                <h2>{{ __('authIndex.registerTitle') }}</h2>
                <p class="form-subtitle">{{ __('authIndex.registerSubtitle') }}</p>

                @if (session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="login-form" method="POST" action="{{ route('auth.create') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('authIndex.nameLabel') }}</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="{{ __('authIndex.namePlaceholder') }}"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('authIndex.emailLabel') }}</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="{{ __('authIndex.emailPlaceholder') }}"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="role">{{ __('authIndex.roleLabel') }}</label>
                        <select id="role" name="role" required>
                            <option value="client" {{ old('role') === 'client' ? 'selected' : '' }}>{{ __('authIndex.roleOptions.client') }}</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>{{ __('authIndex.roleOptions.admin') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('authIndex.passwordLabel') }}</label>
                        <div class="password-input-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="{{ __('authIndex.passwordPlaceholder') }}"
                                required
                            >
                            <button type="button" class="toggle-password" aria-label="{{ __('authIndex.togglePasswordLabel') }}">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">{{ __('authIndex.registerButton') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/auth/authSwitchLoginPage.js') }}"></script>
@endsection