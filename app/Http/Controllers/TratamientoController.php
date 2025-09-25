<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Paciente;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Paciente $paciente)
    {
        $tratamientos = $paciente->tratamientos()->orderBy('id_tratamiento', 'asc')->get();
        return view('tratamientos.index', compact('paciente', 'tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Paciente $paciente)
    {
        return view('tratamientos.create', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Paciente $paciente)
    {
        $request->validate([
        'descripcion' => 'required|string|max:255',
        'fecha' => 'required|date',
        'veterinario' => [
            'nullable',
            'string',
            'max:100',
            'regex:/^[\pL\s\.\-]+$/u' // solo letras y espacios
        ],
        'costo' => 'nullable|numeric|min:0',
    ], [
        'descripcion.required' => 'La descripción es obligatoria.',
        'fecha.required' => 'La fecha es obligatoria.',
        'fecha.date' => 'La fecha no tiene un formato válido.',
        'veterinario.regex' => 'El nombre del veterinario solo puede contener letras, espacios, puntos y guiones.',
        'costo.numeric' => 'El costo debe ser un número válido.',
        'costo.min' => 'El costo no puede ser negativo.',
    ]);

        $paciente->tratamientos()->create($request->all());

        return redirect()
            ->route('pacientes.tratamientos.index', $paciente->id_paciente)
            ->with('success', 'Tratamiento agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente, Tratamiento $tratamiento)
    {
        return view('tratamientos.edit', compact('paciente', 'tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente, Tratamiento $tratamiento)
    {
        $request->validate([
        'descripcion' => 'required|string|max:255',
        'fecha' => 'required|date',
        'veterinario' => [
            'nullable',
            'string',
            'max:100',
            'regex:/^[\pL\s\.\-]+$/u' // solo letras y espacios
        ],
        'costo' => 'nullable|numeric|min:0',
    ], [
        'descripcion.required' => 'La descripción es obligatoria.',
        'fecha.required' => 'La fecha es obligatoria.',
        'fecha.date' => 'La fecha no tiene un formato válido.',
        'veterinario.regex' => 'El nombre del veterinario solo puede contener letras, espacios, puntos y guiones.',
        'costo.numeric' => 'El costo debe ser un número válido.',
        'costo.min' => 'El costo no puede ser negativo.',
    ]);

        $tratamiento->update($request->all());

        return redirect()
            ->route('pacientes.tratamientos.index', $paciente->id_paciente)
            ->with('warning', 'Tratamiento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente, Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return redirect()
            ->route('pacientes.tratamientos.index', $paciente->id_paciente)
            ->with('danger', 'Tratamiento eliminado correctamente.');
    }
}
