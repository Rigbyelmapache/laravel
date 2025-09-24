@extends('layouts.productos')

@section('title', 'Página de Inicio')

@section('content')
<h2 class="text-3xl font-bold mb-4">Bienvenido a nuestra aplicación</h2>
<p class="text-gray-700">Este es el contenido de la página de inicio.</p>
  <form id="producto-form">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="codigo_producto" placeholder="Código" required>
                <input type="text" name="descripcion" placeholder="Descripción" required>
                <input type="number" step="0.01" name="precio" placeholder="Precio" required>
                <input type="text" name="marca" placeholder="Marca" required>
                <input type="number" name="categoria_id" placeholder="ID Categoría" required>
                
             <x-boton class="mt-4">
                Crear Producto
             </x-boton>
            
            </form>
            
            
            
@endsection

@push('styles')
    <link href="https://example.com/some-styles.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="resources/js/services/productosServices.js"></script>
@endpush
