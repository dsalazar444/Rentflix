<!-- Made by: Samuel Martínez Arteaga -->

@php
    $role = session('role');
    $isAuthenticated = session()->has('user_id');
@endphp

@if (!$isAuthenticated || !$role)
    @include('header.guest')
@elseif ($role === 'admin')
    @include('header.admin')
@else
    @include('header.client')
@endif
