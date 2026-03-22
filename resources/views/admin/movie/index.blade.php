@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/movie.index.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/modalMovieCreate.css') }}">
<input type="hidden" id="tiene-errores" value="{{ $errors->any() ? '1' : '0' }}">
<div class="admin-panel">

    <!-- Panel header -->
    <div class="panel-header">
        <div class="panel-title">
            <h1>Panel de Administración</h1>
            <p>Gestiona el catálogo de películas</p>
        </div>
        <button class="btn-add" data-bs-toggle="modal" data-bs-target="#movieModal">
            <span>+</span> Agregar Película
        </button>
    </div>

    <!-- Search Bar -->
    <div class="search-box">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.35-4.35" />
        </svg>
        <input type="text" placeholder="Buscar películas..." id="search-input">
    </div>

    <!-- Table  -->
    <div class="table-container">
        <table class="table-movies">
            <thead>
                <tr>
                    <th>Película</th>
                    <th>Género</th>
                    <th>Año</th>
                    <th>Formato</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["movies"] as $movie)
                <tr class="movie-row">
                    <td class="movie-info">
                        <img src="{{ asset('storage/' . $movie->getFileName()) }}" alt="{{ $movie->getTitle() }}" class="movie-thumb">
                        <div>
                            <span class="movie-title">{{ $movie->getTitle() }}</span>
                            <span class="movie-classification">{{ $movie->getClassificationCapitalized() }}+</span>
                        </div>
                    </td>
                    <td>{{ $movie->getGenreCapitalized() }}</td>
                    <td>{{ $movie->getYear() }}</td>
                    <td>
                        <span class="badge-format">
                            {{ $movie->getFormatCapitalized() }}
                        </span>
                    </td>
                    <td class="price">${{ number_format($movie->getPrice(), 2) }}</td>
                    <td>
                        <span class="badge-status available">
                            @if ($movie->getQuantity() > 0)
                            Disponible
                            @else
                            Agotada
                            @endif
                        </span>
                    </td>

                    <td class="actions">
                        <button class="btn-action btn-edit" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </button>
                        <form action="{{ route('movie.delete', ['id' => $movie->getId()]) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Seguro que quieres eliminar esta película?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-action btn-delete" type="submit" title="Eliminar">
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

@include('admin.movie.components.modalMovieCreate')
@endsection