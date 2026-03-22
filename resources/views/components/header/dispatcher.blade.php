<!-- Made by: Samuel Martínez Arteaga -->

@php
    $role = session('role');
    $isAuthenticated = session()->has('user_id');
@endphp

@if (!$isAuthenticated || !$role)
    @include('components.header.guest')
@elseif ($role === 'admin')
    @include('components.header.admin')
@else
    @include('components.header.client')
@endif
