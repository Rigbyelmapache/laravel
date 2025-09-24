@extends('layouts.auth.auth')
        
     
@section('title', 'crear productos')


@section('content')
        <div class="w-9/10 flex flex-col   m-4 p-4 bg-white rounded  gap-10 ">
            
         
            <div class="flex flex-row justify-evenly gap-4">
                   <button class="bg-blue-500 text-white px-4 py-2 rounded">
                       <a href="/login">login</a>
                    </button> 
                <button class="bg-blue-500 text-white px-4 py-2 rounded">

                    <a href="/register">register</a>
                </button>
            </div>
        

      
   </div>

    
@endsection

@push('styles')
    <link href="https://example.com/some-styles.css" rel="stylesheet">
@endpush


@push('scripts')
    <!-- Solo carga el script de crear productos -->
   
@endpush

   
