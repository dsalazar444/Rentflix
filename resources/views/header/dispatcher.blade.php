<!-- Made by: Samuel Martínez Arteaga -->
@if (!$isAuthenticated || !$role)
    @include('header.guest')
@elseif ($role === 'admin')
    @include('header.admin')
@else
    @include('header.client')
@endif
