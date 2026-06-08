@extends('layouts.app')

@section('title', 'Búsqueda')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-1" style="color:#1a3c5e;">
        <i class="bi bi-search"></i> Resultados de búsqueda
    </h2>
    @if($query)
        <p class="text-muted mb-4">Buscando: <strong>"{{ $query }}"</strong></p>
        <div class="alert alert-secondary">
            No se encontraron resultados para tu búsqueda. Intenta con otros términos.
        </div>
    @else
        <p class="text-muted">Escribe un término en la barra de búsqueda.</p>
    @endif
</div>
@endsection
