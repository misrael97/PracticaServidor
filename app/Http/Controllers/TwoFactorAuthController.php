<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use App\Models\User;


class TwoFactorAuthController extends Controller
{
    // Mostrar el formulario de verificación
    public function show2faForm()
    {
        return view('auth.2fa');
    }

    // Verificar el código SMS
    public function verify2fa(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        // Obtener el ID del usuario desde la sesión
        $userId = session('2fa_user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Usuario no encontrado.']);
        }

        // Verificar el código
        $storedCode = session('2fa_code');
        $codeExpiration = session('2fa_code_expires_at');

        if ($request->code === $storedCode && now()->lt($codeExpiration)) {
            // Autenticar al usuario
            Auth::login($user);

            // Limpiar la sesión de 2FA
            session()->forget(['2fa_user_id', '2fa_code', '2fa_code_expires_at']);

            return redirect('/dashboard');
        }

        return back()->withErrors(['code' => 'Código incorrecto o expirado.']);
    }

    // Enviar el código SMS
    public function send2faCode()
    {
        // Obtener el ID del usuario desde la sesión
        $userId = session('2fa_user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Usuario no encontrado.']);
        }



        $phoneNumber = $user->phone_number;

        if (!str_starts_with($phoneNumber, '+')) {
            $phoneNumber = '+52' . $phoneNumber; // Agregar el prefijo de país (ej. México)
        }

        // Generar un código de 6 dígitos
        $code = rand(100000, 999999);
        session(['2fa_code' => $code]);
        session(['2fa_code_expires_at' => now()->addMinutes(5)]); // Expira en 5 minutos

        // Enviar el código por SMS usando Twilio
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $twilio->messages->create(
            // $user->phone_number,
            $phoneNumber,
            [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => "Tu código de verificación es: $code",
            ]
        );

        // Redirigir a la vista de verificación de código SMS
        return redirect()->route('2fa');
    }
}
