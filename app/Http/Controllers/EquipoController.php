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
            'tipo_equipo'        => 'required|string|max:255',
            'marca_modelo'       => 'required|string|max:255',
            'problema_reportado' => 'required|string',
            'nombre_cliente'     => 'required|string|max:255',
            'telefono'           => 'required|regex:/^[0-9]{10}$/',
            'estado'             => 'required|in:recibido,diagnosticando,reparando,listo,entregado',
        ], [
            'tipo_equipo.required' => 'El tipo de equipo es obligatorio.',
            'marca_modelo.required' => 'La marca/modelo es obligatoria.',
            'problema_reportado.required' => 'El problema reportado es obligatorio.',
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe tener solo números (10 dígitos).',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
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
            'tipo_equipo'        => 'required|string|max:255',
            'marca_modelo'       => 'required|string|max:255',
            'problema_reportado' => 'required|string',
            'nombre_cliente'     => 'required|string|max:255',
            'telefono'           => 'required|regex:/^[0-9]{10}$/',
            'estado'             => 'required|in:recibido,diagnosticando,reparando,listo,entregado',
        ], [
            'tipo_equipo.required' => 'El tipo de equipo es obligatorio.',
            'marca_modelo.required' => 'La marca/modelo es obligatoria.',
            'problema_reportado.required' => 'El problema reportado es obligatorio.',
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe tener solo números (10 dígitos).',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
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
