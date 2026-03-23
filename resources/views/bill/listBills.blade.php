<!-- Made by: Daniela Salzazar -->
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/movie.index.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
<input type="hidden" id="hasErrors" value="{{ $errors->any() ? '1' : '0' }}">
<input type="hidden" id="lastFormSubmitted" value="{{ session('lastForm', '') }}">
<div class="admin-panel">

    <!-- Header Panel -->
    <div class="panel-header">
        <div class="panel-title">
            <h1>Tus facturas</h1>
            <p>Descarga tus facturas en formato PDF</p>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-box">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.35-4.35" />
        </svg>
        <input type="text" placeholder="Buscar factura con id..." id="searchInput">
    </div>

    <!-- Table  -->
    <div class="table-container">
        <table class="table-movies">
            <thead>
                <tr>
                    <th>Id Factura</th>
                    <th>Fecha de Creación</th>
                    <th>Descargar</th>
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
                            title="Descargar factura">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" 
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
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