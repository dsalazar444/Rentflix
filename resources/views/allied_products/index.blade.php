<!-- Made by: Daniela Salazar Amaya -->

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/allied_products/allied_products.css') }}">
<div class="allied-products-wrapper">

    @if($error ?? false)
    <div class="empty-state">
        <div class="empty-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="9" cy="21" r="1"/>
                <circle cx="20" cy="21" r="1"/>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
            </svg>
        </div>
        <h3 class="empty-title">{{ __('alliedProducts.error.title') }}</h3>
        <p class="empty-subtitle">{{ $error }}</p>
    </div>
    @else

    <!-- Products Grid -->
    <div class="products-header">
        <h1 class="products-title">{{ __('alliedProducts.titlePage') }}</h1>
        <p class="products-subtitle">{{ __('alliedProducts.subtitle') }}</p>
    </div>

    <div class="products-grid">
        @foreach ($viewData['products'] as $product)
        <div class="product-card">
            <div class="product-header">
                <span class="product-type {{ $product['type'] === 'service' ? 'type-service' : 'type-article' }}">
                    {{ __('alliedProducts.productType.' . $product['type']) }}
                </span>
                <span class="product-rating">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#fbbf24" stroke="none">
                        <polygon points="12 2 15.09 10.26 23.77 10.36 17.13 16.17 19.09 24.85 12 19.79 4.91 24.85 6.87 16.17 0.23 10.36 8.91 10.26"/>
                    </svg>
                    {{ $product['rating'] }}
                </span>
            </div>

            <div class="product-image">
                <div class="product-placeholder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M6 9l6-6 6 6m-12 6l6-6 6 6"/>
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                    </svg>
                </div>
            </div>

            <div class="product-info">
                <h3 class="product-name">{{ $product['name'] }}</h3>
                <p class="product-brand">{{ $product['brand'] }}</p>
                <p class="product-category">{{ $product['category'] }}</p>
                
                <p class="product-description">
                    {{ Str::limit($product['description'], 80) }}
                </p>

                <div class="product-keywords">
                    @foreach($product['keywords'] as $keyword)
                    <span class="keyword-tag">{{ $keyword }}</span>
                    @endforeach
                </div>

                <div class="product-footer">
                    <span class="product-price">${{ number_format($product['price'], 0, ',', '.') }}</span>
                    <button class="btn-view" data-product="{{ json_encode($product) }}">
                        {{ __('alliedProducts.buttons.viewDetails') }}
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
