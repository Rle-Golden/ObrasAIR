<?php

namespace App\Http\Controllers;

use App\Models\Aspirantes;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AspirantesController extends Controller
{
    public function index()
    {
        $this->authorizeRoles(['administrador', 'empresa']);

        $aspirantes = Aspirantes::orderBy('usuario_numero_documento')->paginate(10);

        return view('aspirante.index', compact('aspirantes'));
    }

    public function create()
    {
        $this->authorizeRoles(['administrador']);

        $usuarios = Usuario::orderBy('primer_nombre')->get();

        return view('aspirante.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $this->authorizeRoles(['administrador']);
        $data = $request->validate([
            'usuario_numero_documento' => 'required|numeric|exists:usuario,numero_documento|unique:aspirante,usuario_numero_documento',
            'profesion_aspirante' => 'required|string|max:50',
            'meses_experiencia' => 'required|numeric|min:0',
            'descripcion_aspirante' => 'required|string',
            'hoja_vida' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'estado_aspirante' => 'required|in:0,1',
        ]);

        if ($request->hasFile('hoja_vida')) {
            $data['hoja_vida'] = file_get_contents($request->file('hoja_vida')->path());
        }

        Aspirantes::create($data);

        return redirect()->route('aspirantes.index')->with('success', 'Aspirante creado correctamente.');
    }

    public function show(Aspirantes $aspirante)
    {
        return redirect()->route('aspirantes.edit', ['aspirante' => $aspirante->usuario_numero_documento]);
    }

    public function edit(Aspirantes $aspirante)
    {
        return view('aspirante.edit', compact('aspirante'));
    }

    public function update(Request $request, Aspirantes $aspirante)
    {
        $this->authorizeRoles(['administrador']);
        $data = $request->validate([
            'usuario_numero_documento' => 'required|numeric|exists:usuario,numero_documento|unique:aspirante,usuario_numero_documento,' . $aspirante->usuario_numero_documento . ',usuario_numero_documento',
            'profesion_aspirante' => 'required|string|max:50',
            'meses_experiencia' => 'required|numeric|min:0',
            'descripcion_aspirante' => 'required|string',
            'hoja_vida' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'estado_aspirante' => 'required|in:0,1',
        ]);

        if ($request->hasFile('hoja_vida')) {
            $data['hoja_vida'] = file_get_contents($request->file('hoja_vida')->path());
        } else {
            unset($data['hoja_vida']);
        }

        $aspirante->update($data);

        return redirect()->route('aspirantes.index')->with('success', 'Aspirante actualizado correctamente.');
    }

    public function destroy(Aspirantes $aspirante)
    {
        $aspirante->delete();

        return redirect()->route('aspirantes.index')->with('success', 'Aspirante eliminado correctamente.');
    }
}
