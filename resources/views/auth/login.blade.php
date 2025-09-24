@extends('layouts.auth.auth')
        
     
@section('title', 'crear productos')


@section('content')
        <div class="w-9/10 flex flex-col  m-4 p-4 bg-white rounded shadow gap-10 ">
            
          <form id="login-form" >
    
    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" required>
    </div>
    
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>
    
    <div>
        <button type="submit">Iniciar sesión</button>
    </div>
</form>

        

      
   </div>

    
@endsection

@push('styles')
    <link href="https://example.com/some-styles.css" rel="stylesheet">
@endpush


@push('scripts')
    <!-- Solo carga el script de crear productos -->
    <script type="module" src="{{ mix('resources/js/services/user/login.js') }}"></script>
@endpush

   
