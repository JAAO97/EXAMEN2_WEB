@extends('layouts.app')

@section('title', 'Empleados | DISFARMA')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between align-items-md-center
            mb-4 gap-3">

    <div>

        <h1 class="page-title">
            Personal y Nómina
        </h1>

        <p class="page-subtitle">
            Administración del personal de DISFARMA Honduras.
        </p>

    </div>

    <a
        href="{{ route('empleados.create') }}"
        class="btn btn-primary px-3">

        <i class="bi bi-person-plus-lg me-1"></i>

        Nuevo empleado

    </a>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>Identidad</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Ingreso</th>
                        <th>Estado</th>
                        <th class="text-center">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($empleados as $empleado)

                        <tr>

                            <td>
                                <span class="fw-semibold text-secondary">
                                {{ $empleado->identidad }}
                                </span>
                            </td>

                            <td>
                                <span class="fw-semibold">
                                {{ $empleado->nombre }}
                                {{ $empleado->apellido }}
                                </span>
                            </td>

                            <td class="text-muted">
                                {{ $empleado->correo }}
                            </td>

                            <td>

                                @switch($empleado->cargo)

                                    @case('Regente Farmacéutico')

                                        <span class="badge bg-primary">
                                            <i class="bi bi-capsule me-1"></i>
                                            {{ $empleado->cargo }}

                                        </span>

                                        @break


                                    @case('Asistente de Farmacia')

                                        <span class="badge bg-info text-dark">
                                            <i class="bi bi-person-heart me-1"></i>
                                            {{ $empleado->cargo }}

                                        </span>

                                        @break


                                    @case('Jefe de Bodega')

                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-box-seam me-1"></i>
                                            {{ $empleado->cargo }}

                                        </span>

                                        @break


                                    @case('Despachador')

                                        <span class="badge bg-secondary">
                                            <i class="bi bi-truck me-1"></i>
                                            {{ $empleado->cargo }}

                                        </span>

                                        @break


                                    @default

                                        <span class="badge bg-dark">
                                            <i class="bi bi-cash-register me-1"></i>
                                            {{ $empleado->cargo }}

                                        </span>

                                @endswitch

                            </td>

                            <td class="fw-semibold">

                                L.
                                {{ number_format(
                                    $empleado->salario,
                                    2
                                ) }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse(
                                    $empleado->fecha_ingreso
                                )->format('d/m/Y') }}

                            </td>

                            <td>

                                @if($empleado->estado === 'Activo')

                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Activo
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        <i class="bi bi-dash-circle me-1"></i>
                                        Inactivo
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <div class="d-flex gap-2 justify-content-center">

                                    <a
                                        href="{{ route(
                                            'empleados.edit',
                                            $empleado->id
                                        ) }}"
                                        class="btn btn-outline-warning btn-sm"
                                        title="Editar empleado">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route(
                                            'empleados.destroy',
                                            $empleado->id
                                        ) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                            title="Eliminar empleado"
                                            onclick="
                                            return confirm(
                                            '¿Está seguro de eliminar este empleado?'
                                            )">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-5 text-muted">

                                <i
                                    class="bi bi-people
                                           display-5
                                           d-block mb-2">
                                </i>

                                No hay empleados registrados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($empleados->hasPages())

        <div class="card-footer bg-white">

            {{ $empleados->links() }}

        </div>

    @endif

</div>

@endsection