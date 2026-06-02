<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;
use App\Mail\ResetPasswordMail;

class PasswordResetController extends Controller
{
    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        try {
            // la tabla `usuario` usa el campo `mail_usuario` para el email
            $user = DB::table('usuario')->where('email', $email)->first();

            // For privacy, respond the same whether or not user exists
            if (! $user) {
                return response()->json(['message' => 'Si el correo existe en nuestro sistema, recibirás un email para restablecer tu contraseña.'], 200);
            }

            // ensure the password_resets table exists before inserting tokens
            if (! Schema::hasTable('password_resets')) {
                Schema::create('password_resets', function (Blueprint $table) {
                    $table->string('email')->index();
                    $table->string('token');
                    $table->timestamp('created_at')->nullable();
                });
            }

            // generate token and store hashed
            $plainToken = bin2hex(random_bytes(32));
            $hashed = Hash::make($plainToken);

            DB::table('password_resets')->updateOrInsert(
                ['email' => $email],
                ['token' => $hashed, 'created_at' => now()]
            );

            // send email with plain token
            Mail::to($email)->send(new ResetPasswordMail($plainToken, $email));

            return response()->json(['message' => 'Si el correo existe en nuestro sistema, recibirás un email para restablecer tu contraseña.'], 200);
        } catch (\Exception $e) {
            // Log and return safe JSON error (avoid HTML error pages)
            Log::error('Password reset (forgot) error: '.$e->getMessage(), ['exception' => $e]);

            return response()->json([
                'message' => 'Error enviando el correo de restablecimiento.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $email = $request->input('email');
        $token = $request->input('token');
        $password = $request->input('password');
        try {
            $row = DB::table('password_resets')->where('email', $email)->first();

            if (! $row) {
                return response()->json(['message' => 'Token inválido o expirado.'], 400);
            }

            // check expiration (60 minutes)
            $created = Carbon::parse($row->created_at);
            if ($created->addMinutes(60)->lt(now())) {
                DB::table('password_resets')->where('email', $email)->delete();
                return response()->json(['message' => 'Token expirado. Solicita uno nuevo.'], 400);
            }

            // verify token
            if (! Hash::check($token, $row->token)) {
                return response()->json(['message' => 'Token inválido.'], 400);
            }

            // update password in the legacy `usuario` table
            DB::table('usuario')->where('email', $email)->update([
                'password' => Hash::make($password),
                'confirmar_password' => Hash::make($password),
            ]);

            // delete token
            DB::table('password_resets')->where('email', $email)->delete();

            return response()->json(['message' => 'Contraseña restablecida correctamente.'], 200);
        } catch (\Exception $e) {
            Log::error('Password reset (reset) error: '.$e->getMessage(), ['exception' => $e]);

            return response()->json([
                'message' => 'Error al restablecer la contraseña.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
