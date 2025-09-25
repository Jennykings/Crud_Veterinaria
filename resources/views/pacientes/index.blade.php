@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pacientes</h2>
        <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-3">+ Nuevo Paciente</a>

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
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Dueño</th>
                    <th>Teléfono</th>
                    <th>Fecha Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $p)
                    <tr>
                        <td>{{ $p->id_paciente }}</td>
                        <td>{{ $p->nombre }}</td>
                        <td>{{ $p->especie }}</td>
                        <td>{{ $p->raza }}</td>
                        <td>{{ $p->edad }}</td>
                        <td>{{ $p->nombre_duenio }}</td>
                        <td>{{ $p->telefono_duenio }}</td>
                        <td>{{ $p->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('pacientes.edit', $p->id_paciente) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('pacientes.tratamientos.index', $p->id_paciente) }}"
                                    class="btn btn-info btn-sm">Tratamientos</a>
                                <form action="{{ route('pacientes.destroy', $p->id_paciente) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
