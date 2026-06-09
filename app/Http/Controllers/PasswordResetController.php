<?php

namespace App\Http\Controllers;

use App\Mail\CodigoRecuperacion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class PasswordResetController extends Controller
{
    // ── Paso 1: formulario de correo ───────────────────────────────────────────

    public function showForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.forgot-password');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email'    => 'Ingresa un correo electrónico válido.',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generar código de 6 dígitos
            $codigo = (string) random_int(100000, 999999);

            // Eliminar código anterior si existe
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->delete();

            // Guardar código hasheado
            DB::table('password_reset_tokens')->insert([
                'email'      => $request->email,
                'token'      => Hash::make($codigo),
                'created_at' => Carbon::now(),
            ]);

            // Enviar correo
            Mail::to($request->email)->send(new CodigoRecuperacion($codigo));

        }

        // Mismo mensaje sin importar si el usuario existe (seguridad)
        return redirect()->route('password.verify', ['email' => $request->email])
            ->with('email_sent', $request->email);
    }

    // ── Paso 2: verificar código ───────────────────────────────────────────────

    public function showVerify(Request $request)
    {
        if (! $request->query('email') && ! session('email_sent')) {
            return redirect()->route('password.request');
        }
        return view('auth.verify-code', [
            'email' => $request->query('email', session('email_sent', '')),
        ]);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email'  => ['required', 'email'],
            'codigo' => ['required', 'digits:6'],
        ], [
            'email.required'  => 'El correo es obligatorio.',
            'email.email'     => 'Correo no válido.',
            'codigo.required' => 'Ingresa el código de verificación.',
            'codigo.digits'   => 'El código debe tener exactamente 6 dígitos.',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (! $record || ! Hash::check($request->codigo, $record->token)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['codigo' => 'El código es incorrecto.']);
        }

        if (Carbon::parse($record->created_at)->addMinutes(10)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return redirect()->route('password.request')
                ->withErrors(['email' => 'El código expiró. Solicita uno nuevo.']);
        }

        // Código válido → marcar email como verificado en sesión
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        session(['password_reset_verified' => $request->email]);

        return redirect()->route('password.reset');
    }

    // ── Paso 3: nueva contraseña ───────────────────────────────────────────────

    public function showReset()
    {
        if (! session('password_reset_verified')) {
            return redirect()->route('password.request');
        }
        return view('auth.reset-password');
    }

    public function reset(Request $request)
    {
        $email = session('password_reset_verified');

        if (! $email) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ], [
            'password.required'  => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min'       => 'La contraseña debe tener al menos 8 caracteres, letras y números.',
        ]);

        $user = User::where('email', $email)->first();

        if (! $user) {
            return redirect()->route('password.request');
        }

        $user->update(['password' => $request->password]);

        session()->forget('password_reset_verified');

        return redirect()->route('login')
            ->with('success', 'Contraseña restablecida correctamente. Ya puedes iniciar sesión.');
    }
}
