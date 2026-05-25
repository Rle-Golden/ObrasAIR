<?php

namespace App\Http\Controllers;

use App\Models\Aspirantes;
use App\Models\Empresa;
use App\Models\OfertaLaboral;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected array $roles = ['administrador', 'aspirante', 'empresa'];

    public function show(string $role)
    {
        if (!in_array($role, $this->roles)) {
            abort(404);
        }

        $data = [
            'usuarios' => Usuario::count(),
            'aspirantes' => Aspirantes::count(),
            'empresas' => Empresa::count(),
            'ofertas' => OfertaLaboral::count(),
            'role' => $role,
        ];

        return view("dashboards.{$role}", $data);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('role');
        return redirect()->route('home');
    }
}
