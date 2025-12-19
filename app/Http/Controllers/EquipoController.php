<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    private array $estados = ['recibido', 'diagnosticando', 'reparando', 'listo', 'entregado'];

    public function index()
    {
        $equipos = Equipo::orderBy('created_at', 'desc')->get();
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        $estados = $this->estados;
        return view('equipos.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tipo_equipo' => 'required|string|max:255',
            'marca_modelo' => 'required|string|max:255',
            'problema_reportado' => 'required|string',
            'nombre_cliente' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'estado' => 'required|in:recibido,diagnosticando,reparando,listo,entregado',
        ]);

        Equipo::create($data);

        return redirect()->route('equipos.index')->with('success', 'Equipo registrado.');
    }

    public function edit(Equipo $equipo)
    {
        $estados = $this->estados;
        return view('equipos.edit', compact('equipo', 'estados'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $data = $request->validate([
            'tipo_equipo' => 'required|string|max:255',
            'marca_modelo' => 'required|string|max:255',
            'problema_reportado' => 'required|string',
            'nombre_cliente' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'estado' => 'required|in:recibido,diagnosticando,reparando,listo,entregado',
        ]);

        $equipo->update($data);

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado.');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado.');
    }
}
