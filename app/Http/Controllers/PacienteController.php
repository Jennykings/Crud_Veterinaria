<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::orderBy('id_paciente', 'asc')->get();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\pL\s]+$/u' // solo letras y espacios
            ],
            'especie' => [
                'required',
                'string',
                'max:50',
                'regex:/^[\pL\s]+$/u'
            ],
            'raza' => [
                'nullable',
                'string',
                'max:50',
                'regex:/^[\pL\s]+$/u'
            ],
            'edad' => 'nullable|integer|min:0|max:100',
            'nombre_duenio' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\pL\s]+$/u'
            ],
            'telefono_duenio' => 'nullable|string|max:20',
        ], [
            //mensajes personalizados
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'especie.regex' => 'La especie solo puede contener letras y espacios.',
            'raza.regex' => 'La raza solo puede contener letras y espacios.',
            'nombre_duenio.regex' => 'El nombre del dueño solo puede contener letras y espacios.',
            'edad.max' => 'La edad no puede ser mayor a 100 años.',
        ]);

        Paciente::create($request->all());

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\pL\s]+$/u' // solo letras y espacios
            ],
            'especie' => [
                'required',
                'string',
                'max:50',
                'regex:/^[\pL\s]+$/u'
            ],
            'raza' => [
                'nullable',
                'string',
                'max:50',
                'regex:/^[\pL\s]+$/u'
            ],
            'edad' => 'nullable|integer|min:0|max:100',
            'nombre_duenio' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\pL\s]+$/u'
            ],
            'telefono_duenio' => 'nullable|string|max:20',
        ], [
            //mensajes personalizados
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'especie.regex' => 'La especie solo puede contener letras y espacios.',
            'raza.regex' => 'La raza solo puede contener letras y espacios.',
            'nombre_duenio.regex' => 'El nombre del dueño solo puede contener letras y espacios.',
            'edad.max' => 'La edad no puede ser mayor a 100 años.',
        ]);

        $paciente->update($request->all());

        return redirect()
            ->route('pacientes.index')
            ->with('warning', 'Paciente actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()
            ->route('pacientes.index')
            ->with('danger', 'Paciente eliminado.');
    }
}
