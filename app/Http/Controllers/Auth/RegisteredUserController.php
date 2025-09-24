<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /** 
     * controlador de registro aqui se maneja la logica del registro no confundir con el otro controlador de autenticacion
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
 

    public function store(Request $request): JsonResponse
    {
        try {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);
        
        event(new Registered($user));
        
        Auth::login($user);
        
            return response()->json(['user'=>$user,'message'=>'se registro exitosamente']);

        } catch (\Exception $e) {
        
            return response()->json(['error' => 'Error al registrar el usuario: ' . $e->getMessage()], 500);

         }
        }
}
