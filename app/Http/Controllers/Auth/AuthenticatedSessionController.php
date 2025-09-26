<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\User;




use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    // controlador para login 
    // la funcion create retorna una vista , segun laravel 
 


    public function store(LoginRequest $request): JsonResponse
    {  
        try{

      $credentials = $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Credenciales inválidas'], 422);
    }

    $user = User::find(Auth::id());
    $token = $user->createToken($user->email . '_Token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
               'user' => $user,
               'access_token' => $token,
               'redirect' => url('/index')
            ]);

        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['message' => 'Credenciales inválidas'], 422);}
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
