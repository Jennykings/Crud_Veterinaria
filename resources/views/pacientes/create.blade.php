@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar nuevo paciente</h2>

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            {{-- <input type="text" name="nombre" class="form-control" required> --}}

            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Especie</label>
            {{--<input type="text" name="especie" class="form-control" placeholder="Perro, gato, ave..." required>--}}

            <input type="text" name="especie" class="form-control @error('especie') is-invalid @enderror" placeholder="Perro, gato, ave..." value="{{ old('especie') }}" required>
            @error('especie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Raza</label>
            {{--<input type="text" name="raza" class="form-control">--}}

            <input type="text" name="raza" class="form-control @error('raza') is-invalid @enderror" value="{{ old('raza') }}">
            @error('raza')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Edad</label>
            {{--<input type="number" name="edad" class="form-control">--}}

            <input type="number" name="edad" class="form-control @error('edad') is-invalid @enderror" value="{{ old('edad') }}" min="0" max="100">
            @error('edad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del dueño</label>
            {{--<input type="text" name="nombre_duenio" class="form-control" required>--}}

            <input type="text" name="nombre_duenio" class="form-control @error('nombre_duenio') is-invalid @enderror" value="{{ old('nombre_duenio') }}" required>
            @error('nombre_duenio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono del dueño</label>
            {{--<input type="text" name="telefono_duenio" class="form-control">--}}

            <input type="text" name="telefono_duenio" class="form-control @error('telefono_duenio') is-invalid @enderror" value="{{ old('telefono_duenio') }}">
            @error('telefono_duenio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
