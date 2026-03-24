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
                <img src="{{ asset('images/logoRentflix.png') }}" alt="RentFlix Logo" class="logo">
            </div>
            
            <div class="welcome-section">
                <h1>Bienvenido a RentFlix</h1>
                <p>Tu plataforma favorita para alquilar las mejores películas. Miles de títulos disponibles para ti.</p>
            </div>
            
            <div class="stats-section">
                <div class="stat">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Películas</div>
                </div>
                <div class="stat">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Usuarios</div>
                </div>
                <div class="stat">
                    <div class="stat-number">4.9</div>
                    <div class="stat-label">Rating</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Section -->
    <div class="login-right">
        <div class="login-form-container">
            <div class="auth-switch" role="tablist" aria-label="Cambiar formulario">
                <button type="button" class="auth-switch-btn is-active" data-panel="login-panel">Iniciar Sesión</button>
                <button type="button" class="auth-switch-btn" data-panel="register-panel">Registrarse</button>
            </div>

            <div id="login-panel" class="auth-panel is-active" aria-hidden="false">
                <h2>Iniciar Sesión</h2>
                <p class="form-subtitle">Ingresa con tu email y contraseña</p>

                <form class="login-form" method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="login_email">Email</label>
                        <input
                            type="email"
                            id="login_email"
                            name="email"
                            placeholder="tu@email.com"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="login_password">Contraseña</label>
                        <div class="password-input-wrapper">
                            <input
                                type="password"
                                id="login_password"
                                name="password"
                                placeholder="••••••••"
                                required
                            >
                            <button type="button" class="toggle-password" aria-label="Mostrar/Ocultar contraseña">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Iniciar Sesión</button>
                </form>
            </div>

            <div id="register-panel" class="auth-panel" aria-hidden="true">
                <h2>Crear Usuario</h2>
                <p class="form-subtitle">Completa los datos para registrar un usuario</p>

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
                        <label for="name">Nombre</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Tu nombre"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="tu@email.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="role">Rol</label>
                        <select id="role" name="role" required>
                            <option value="client" {{ old('role') === 'client' ? 'selected' : '' }}>client</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="password-input-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                required
                            >
                            <button type="button" class="toggle-password" aria-label="Mostrar/Ocultar contraseña">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Crear Usuario</button>
                </form>

                <div class="demo-info">
                    <div class="demo-icon">📋</div>
                    <p><strong>Demo</strong></p>
                    <p>Al crear el usuario, se guardan en sesión: user_id y role.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/auth/authSwitchLoginPage.js') }}"></script>
@endsection