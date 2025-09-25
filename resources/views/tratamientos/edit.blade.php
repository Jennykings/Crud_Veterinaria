@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Tratamiento de {{ $paciente->nombre }}</h2>

        <form action="{{ route('pacientes.tratamientos.update', [$paciente->id_paciente, $tratamiento->id_tratamiento]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $tratamiento->descripcion }}</textarea>

                {{-- <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                    value="{{ old('descripcion', $tratamiento->descripcion) }}" required>
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha</label>
                {{-- <input type="date" name="fecha" class="form-control" value="{{ $tratamiento->fecha }}" required> --}}

                <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror"
                    value="{{ old('fecha', $tratamiento->fecha) }}" required>
                @error('fecha')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Veterinario</label>
                {{-- <input type="text" name="veterinario" class="form-control" value="{{ $tratamiento->veterinario }}"> --}}

                <input type="text" name="veterinario" class="form-control @error('veterinario') is-invalid @enderror"
                    value="{{ old('veterinario', $tratamiento->veterinario) }}">
                @error('veterinario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Costo (S/.)</label>
                {{-- <input type="number" name="costo" step="0.01" class="form-control" value="{{ $tratamiento->costo }}"> --}}

                <input type="number" step="0.01" name="costo"
                    class="form-control @error('costo') is-invalid @enderror"
                    value="{{ old('costo', $tratamiento->costo) }}">
                @error('costo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pacientes.tratamientos.index', $paciente->id_paciente) }}"
                class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
