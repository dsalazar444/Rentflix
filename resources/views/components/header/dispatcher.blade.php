<!-- Made by: Samuel Martínez Arteaga -->
@if (!$isAuthenticated || !$role)
    @include('components.header.guest')
@elseif ($role === 'admin')
    @include('components.header.admin')
@else
    @include('components.header.client')
@endif
