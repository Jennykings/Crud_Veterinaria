@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tratamientos de {{ $paciente->nombre }}</h2>
    <a href="{{ route('pacientes.tratamientos.create', $paciente->id_paciente) }}" class="btn btn-success mb-3">
        + Nuevo Tratamiento
    </a>

    @foreach (['success', 'warning', 'danger'] as $msg)
        @if (session($msg))
            <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                {{ session($msg) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endforeach

    <table class="table table-hover table-striped table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Veterinario</th>
                <th>Costo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tratamientos as $t)
                <tr>
                    <td>{{ $t->id_tratamiento }}</td>
                    <td>{{ $t->descripcion }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $t->veterinario }}</td>
                    <td>S/. {{ number_format($t->costo, 2) }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('pacientes.tratamientos.edit', [$paciente->id_paciente, $t->id_tratamiento]) }}"
                               class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('pacientes.tratamientos.destroy', [$paciente->id_paciente, $t->id_tratamiento]) }}"
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay tratamientos registrados para este paciente.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
