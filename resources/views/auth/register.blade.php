@extends('layouts.auth.auth')
        
     
@section('title', 'registrar')


@section('content')
        <div class="w-9/10 flex flex-col  m-4 p-4 bg-white rounded shadow gap-10 ">
            <div class="">

                <button class=" bg-blue-500 px-4 py-2 rounded text-white" onclick="history.back()">Volver</button>
            </div>

           <form id="register-form" >
   
    <div>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" required>
    </div>
    
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>

     <div>
        <label for="password_confirmation">confirmar Contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>

    <div class="flex justify-center m-4">
        <button class=" bg-blue-500 px-4 py-2 rounded text-white" type="submit">Registrarse</button>
    </div>
</form>

            
            
        

      
   </div>

    
@endsection

@push('styles')
    <link href="https://example.com/some-styles.css" rel="stylesheet">
@endpush


@push('scripts')
    <!-- Solo carga el script de crear productos -->
    <script type="module" src="{{ mix('resources/js/services/user/register.js') }}"></script>
@endpush

   
