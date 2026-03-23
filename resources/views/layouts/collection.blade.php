@extends('layouts.app')
@section('content')
<h1 class="collection-title">Mi Colección</h1>
    <div class="collection-tabs">
        <a href="{{ route('collections.library') }}" 
           class="collection-tab {{ request()->routeIs('collections.library') ? 'active' : '' }}">
            Mi Biblioteca
        </a>
        <a href="{{ route('collections.wishlist') }}" 
           class="collection-tab {{ request()->routeIs('collections.wishlist') ? 'active' : '' }}">
            Mi Wishlist
        </a>
    </div>
@yield('collectionContent')
@endsection