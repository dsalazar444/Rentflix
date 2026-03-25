<!-- Laura Andrea Castrillón Fajardo -->

@extends('layouts.app')
@section('content')
<h1 class="collection-title">{{ __('layoutCollections.title') }}</h1>
    <div class="collection-tabs">
        <a href="{{ route('collections.library') }}" 
           class="collection-tab {{ request()->routeIs('collections.library') ? 'active' : '' }}">
            {{ __('layoutCollections.library') }}
        </a>
        <a href="{{ route('collections.wishlist') }}" 
           class="collection-tab {{ request()->routeIs('collections.wishlist') ? 'active' : '' }}">
            {{ __('layoutCollections.wishlist') }}
        </a>
    </div>
@yield('collectionContent')
@endsection