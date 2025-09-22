@extends('layouts.productos')

@section('title', 'Página de Inicio')

@section('content')
<h2 class="text-3xl font-bold mb-4">Bienvenido a nuestra aplicación</h2>
<p class="text-gray-700">Este es el contenido de la página de inicio.</p>
@endsection

@push('styles')
    <link href="https://example.com/some-styles.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="resources/js/services/productosServices.js"></script>
@endpush
