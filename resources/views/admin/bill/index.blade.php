<!-- Made by: Daniela Salazar -->

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/movie.index.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/bill.index.css') }}">
<input type="hidden" id="hasErrors" value="{{ $errors->any() ? '1' : '0' }}">
<input type="hidden" id="lastFormSubmitted" value="{{ session('lastForm', '') }}">
<div class="admin-panel">

    <!-- Panel header -->
    <div class="panel-header">
        <div class="panel-title">
            <h1>{{ __('adminBillIndex.titlePage') }}</h1>
            <p>{{ __('adminBillIndex.subtitle') }}</p>
        </div>
        <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalBillCreate"> 
            <span>+</span> {{ __('adminBillIndex.addButton') }}
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-notify-m">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <ul id="errors" class="alert alert-danger alert-notify-m list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Search Bar -->
    <div class="search-box">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.35-4.35" />
        </svg>
        <input type="text" placeholder="{{ __('adminBillIndex.searchPlaceholder') }}" id="searchInput">
    </div>

    <!-- Table  -->
    <div class="table-container">
        <table class="table-movies">
            <thead>
                <tr>
                    <th>{{ __('adminBillIndex.tableHeaders.billId') }}</th>
                    <th>{{ __('adminBillIndex.tableHeaders.date') }}</th>
                    <th>{{ __('adminBillIndex.tableHeaders.price') }}</th>
                    <th>{{ __('adminBillIndex.tableHeaders.customer') }}</th>
                    <th>{{ __('adminBillIndex.tableHeaders.items') }}</th>
                    <th>{{ __('adminBillIndex.tableHeaders.actions') }}</th>
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
                    <td class="price">${{ $bill->getPriceFormatted() }}</td>
                    <td>Id: {{ $bill->getUserId() }}, {{ $bill->getUserFirstName()}}</td>
                    <td>
                        <button class="btn-items" data-items='@json($bill->getItems())' onclick="showItemsModal(this)">
                            <span>+</span> {{ __('adminBillIndex.viewItemsButton') }}
                        </button>
                    </td>
            
                    <td class="actions">

                        <button class="btn-action btn-edit" title="{{ __('adminBillIndex.editButtonTitle') }}" 
                            data-bs-toggle="modal"
                            data-bs-target="#modalBillEdit"
                            data-bill="{{ $bill->toJson() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </button>

                        <form action="{{ route('admin.bill.delete', ['id' => $bill->getId()]) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn-action btn-delete" type="submit" title="{{ __('adminBillIndex.deleteButtonTitle') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="#e63946" stroke-width="2">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path
                                        d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@include('admin.bill.components.modalListItems')
@include('admin.bill.components.modalBillEdit', ['viewData' => $viewData])
@include('admin.bill.components.modalBillCreate', ['users' => $viewData['users'], 'movies' => $viewData['movies']])

<script src="{{ asset('js/admin/bill/modalListItems.js') }}"></script>
<script src="{{ asset('js/admin/bill/modalBillCreate.js') }}"></script>
<script src="{{ asset('js/admin/bill/modalBillEdit.js') }}"></script>
@endsection