<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Procesar registro
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|max:15',
        ]);

    // Obtener y corregir el número de teléfono
        $phoneNumber = $request->phone_number;

    // Verificar si el número tiene el código de país
            if (!str_starts_with($phoneNumber, '+')) {
                $phoneNumber = '+52' . $phoneNumber; // Agregar el código de país (ej. México)
            }





        // Crear el usuario pero no autenticarlo
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'phone_number' => $request->phone_number,
            'phone_number' => $phoneNumber,
          
        ]);


        // Guardar el ID del usuario en la sesión
        session(['2fa_user_id' => $user->id]);

        // Redirigir al envío del código SMS usando POST
        // return redirect()->route('2fa.send');
        return app(TwoFactorAuthController::class)->send2faCode();
    }

    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verificar las credenciales sin autenticar al usuario
        if (Auth::validate($credentials)) {
            $user = User::where('email', $request->email)->first();

            // Guardar el ID del usuario en la sesión
            session(['2fa_user_id' => $user->id]);

            // Redirigir al envío del código SMS usando POST
            // return redirect()->route('2fa.send');
            return app(TwoFactorAuthController::class)->send2faCode();
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }
}
