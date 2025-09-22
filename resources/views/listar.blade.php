@extends('layouts.productos')
        
     
@section('title', 'listar productos')


@section('content')

        
        

       <table id="w-3/4 mx-auto productos-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-orange-700 text-white">
        <tr>
            <th class="text-left px-6 py-3 text-sm font-semibold uppercase">Nombre</th>
            <th class="text-left px-6 py-3 text-sm font-semibold uppercase">Descripción</th>
            <th class="text-left px-6 py-3 text-sm font-semibold uppercase">Precio</th>
            <th class="text-left px-6 py-3 text-sm font-semibold uppercase">Marca</th>
        </tr>
        </thead>
        <tbody id="table-list" class="divide-y divide-gray-200">
        <!-- Los productos se agregarán aquí -->
        
        <!-- Más productos -->
         </tbody>
        </table>
        <div id="span-mensaje"></div>
  

    
@endsection

@push('styles')
    <link href="https://example.com/some-styles.css" rel="stylesheet">
@endpush


   
@push('scripts')
    <!-- Solo carga el script de crear productos -->
    <script type="module" src="{{ mix('resources/js/services/productos/mostrarproductos.js') }}"></script>

@endpush

   
