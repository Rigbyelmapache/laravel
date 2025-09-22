@extends('layouts.productos')
        
     
@section('title', 'crear productos')


@section('content')
        <div class="w-9/10 flex flex-col  m-4 p-4 bg-white rounded shadow gap-10 ">
            
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
            
            
            
        

      
   </div>

    
@endsection

@push('styles')
    <link href="https://example.com/some-styles.css" rel="stylesheet">
@endpush


@push('scripts')
    <!-- Solo carga el script de crear productos -->
    <script type="module" src="{{ mix('resources/js/services/productos/crearproductos.js') }}"></script>
@endpush

   
