<!-- Made by: Daniela Salzazar -->

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/movie.index.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
<script src="{{ asset('js/admin/bill/bill.js') }}"></script>
<input type="hidden" id="hasErrors" value="{{ $errors->any() ? '1' : '0' }}">
<input type="hidden" id="lastFormSubmitted" value="{{ session('lastForm', '') }}">
<div class="admin-panel">

    <!-- Header Panel -->
    <div class="panel-header">
        <div class="panel-title">
            <h1>{{ __('billListBills.titlePage') }}</h1>
            <p>{{ __('billListBills.subtitle') }}</p>
        </div>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert-success" id="successAlert">
            <div class="alert-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" 
                    fill="none" stroke="currentColor" stroke-width="2" class="alert-icon">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <div class="alert-message">
                    <strong>{{ __('billListBills.successTitle') }}</strong>
                </div>
            </div>
            <button type="button" class="alert-close" onclick="closeAlert()">&times;</button>
        </div>
    @endif

    <!-- Search Bar -->
    <div class="search-box">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.35-4.35" />
        </svg>
        <input type="text" placeholder="{{ __('billListBills.searchPlaceholder') }}" id="searchInput">
    </div>

    <!-- Table  -->
    <div class="table-container">
        <table class="table-movies">
            <thead>
                <tr>
                    <th>{{ __('billListBills.tableHeaders.billId') }}</th>
                    <th>{{ __('billListBills.tableHeaders.creationDate') }}</th>
                    <th>{{ __('billListBills.tableHeaders.download') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["bills"] as $bill)
                <tr class="movie-row">
                    <td class="movie-info">
                        <div>
                            <span class="movie-title">{{ $bill->getIdWithNumeral() }}</span>
                        </div>
                    </td>
                    <td>{{ $bill->getCreatedAtWithFormat() }}</td>
                    <td>
                        <a href="{{ route('bill.download', ['id' => $bill->getId()]) }}" 
                            class="btn-action" 
                            title="{{ __('billListBills.downloadButtonTitle') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" 
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                        </a>
                        <a href="{{ route('bill.send', ['id' => $bill->getId()]) }}" 
                            class="btn-action" 
                            title="{{ __('billListBills.sendButtonTitle') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" 
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22 6 12 13 2 6"></polyline>
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection