@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nuevo Tratamiento para {{ $paciente->nombre }}</h2>

        <form action="{{ route('pacientes.tratamientos.store', $paciente->id_paciente) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required></textarea>

                {{-- <textarea type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                    value="{{ old('descripcion') }}" required></textarea>
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha</label>
                {{-- <input type="date" name="fecha" class="form-control" required> --}}

                <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror"
                    value="{{ old('fecha') }}" required>
                @error('fecha')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Veterinario</label>
                {{-- <input type="text" name="veterinario" class="form-control"> --}}

                <input type="text" name="veterinario" class="form-control @error('veterinario') is-invalid @enderror"
                    value="{{ old('veterinario') }}">
                @error('veterinario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Costo (S/.)</label>
                {{-- <input type="number" name="costo" step="0.01" class="form-control"> --}}

                <input type="number" step="0.01" name="costo"
                    class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo') }}">
                @error('costo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('pacientes.tratamientos.index', $paciente->id_paciente) }}"
                class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
