<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request as HttpRequest;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar datos del formulario
            $validated = $request->validate([
                'tipo_documento' => 'required|in:CC,CE,PA,PPT,PEP',
                'numero_documento' => 'required|numeric|unique:usuario,numero_documento',
                'primer_nombre' => 'required|string|max:20',
                'segundo_nombre' => 'nullable|string|max:20',
                'primer_apellido' => 'required|string|max:20',
                'segundo_apellido' => 'nullable|string|max:20',
                'celular' => 'required|numeric',
                'email' => 'required|email|unique:usuario,email',
                'password' => 'required|string|min:6|max:10',
                'confirmar_password' => 'required|same:password',
            ]);

            // Mapear el tipo de documento al formato esperado en BD
            $tipo_doc_map = [
                'CC' => '(CC) Cedula de Ciudadania',
                'CE' => '(CE) Cedula de Extranjeria',
                'PA' => '(PA) Pasaporte',
                'PPT' => '(PPT) Permiso por Proteccion Temporal',
                'PEP' => '(PEP) Permiso Especial de Permanencia'
            ];

            $hashedPassword = Hash::make($validated['password']);

            // Insertar usuario en la tabla usuario con contraseña cifrada
            DB::table('usuario')->insert([
                'tipo_documento' => $tipo_doc_map[$validated['tipo_documento']],
                'numero_documento' => $validated['numero_documento'],
                'primer_nombre' => $validated['primer_nombre'],
                'segundo_nombre' => $validated['segundo_nombre'] ?? null,
                'primer_apellido' => $validated['primer_apellido'],
                'segundo_apellido' => $validated['segundo_apellido'] ?? null,
                'celular' => $validated['celular'],
                'email' => $validated['email'],
                'password' => $hashedPassword,
                'confirmar_password' => $hashedPassword,
                'estado_usuario' => 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente. Por favor selecciona tu rol.',
                'numero_documento' => $validated['numero_documento'],
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar el usuario: ' . $e->getMessage()
            ], 500);
        }
    }

    public function assignRole(Request $request)
    {
        try {
            $validated = $request->validate([
                'numero_documento' => 'required|numeric|exists:usuario,numero_documento',
                'role' => 'required|string|in:Aspirante,Representante de empresa',
            ]);

            $roleName = $validated['role'];
            $role = DB::table('rol')->where('nombre_rol', $roleName)->first();

            if (! $role) {
                $roleMap = [
                    'Aspirante' => 3,
                    'Representante de empresa' => 2,
                ];
                $roleId = $roleMap[$roleName] ?? DB::table('rol')->max('id_rol') + 1;
                DB::table('rol')->insert([
                    'id_rol' => $roleId,
                    'nombre_rol' => $roleName,
                ]);
            } else {
                $roleId = $role->id_rol;
            }

            $exists = DB::table('rol_has_usuario')
                ->where('rol_id_rol', $roleId)
                ->where('usuario_numero_documento', $validated['numero_documento'])
                ->exists();

            if (! $exists) {
                DB::table('rol_has_usuario')->insert([
                    'rol_id_rol' => $roleId,
                    'usuario_numero_documento' => $validated['numero_documento'],
                    'estado_rhu' => 1,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Rol asignado correctamente.'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al asignar el rol: ' . $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $user = DB::table('usuario')->where('email', $validated['email'])->first();

            if (! $user || ! Hash::check($validated['password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Correo o contraseña incorrectos.'
                ], 401);
            }

            $role = DB::table('rol_has_usuario')
                ->join('rol', 'rol.id_rol', '=', 'rol_has_usuario.rol_id_rol')
                ->where('rol_has_usuario.usuario_numero_documento', $user->numero_documento)
                ->where('rol_has_usuario.estado_rhu', 1)
                ->select('rol.nombre_rol')
                ->first();

            if (! $role) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontró un rol asignado. Por favor selecciona tu rol.'
                ], 403);
            }

            $redirect = '/inicio_sesion.php';

            if ($role->nombre_rol === 'Administrador') {
                $redirect = '/Administrador/index.php';
            } elseif ($role->nombre_rol === 'Representante de empresa') {
                $redirect = '/Empresa/index.php';
            } elseif ($role->nombre_rol === 'Aspirante') {
                $redirect = '/Aspirante/index.php';
            }

            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso.',
                'role' => $role->nombre_rol,
                'redirect' => $redirect,
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al iniciar sesión: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            // Destroy session data
            if ($request->session()) {
                $request->session()->flush();
                $request->session()->regenerateToken();
            }

            return response()->json([
                'success' => true,
                'message' => 'Sesión cerrada correctamente.',
                'redirect' => '/'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cerrar sesión: ' . $e->getMessage()
            ], 500);
        }
    }
}

