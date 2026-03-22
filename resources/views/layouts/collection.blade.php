@extends('layouts.app')

@section('content')
    <h1 class="collection-title">Mi Colección</h1>

    <div class="collection-tabs">
        <a href="{{ route('collection.library') }}" 
           class="collection-tab {{ request()->routeIs('collection.library') ? 'active' : '' }}">
            Mi Biblioteca
        </a>
        <a href="{{ route('collection.wishlist') }}" 
           class="collection-tab {{ request()->routeIs('collection.wishlist') ? 'active' : '' }}">
            Mi Wishlist
        </a>
    </div>

    @yield('collectionContent')
@endsection