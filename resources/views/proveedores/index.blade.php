@extends('layouts.app')

@section('title', 'Proveedores | DISFARMA')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between align-items-md-center
            mb-4 gap-3">

    <div>

        <h1 class="page-title">
            Proveedores
        </h1>

        <p class="page-subtitle">
            Administración de proveedores de DISFARMA Honduras.
        </p>

    </div>

    <a
        href="{{ route('proveedores.create') }}"
        class="btn btn-primary px-3">

        <i class="bi bi-plus-lg me-1"></i>

        Nuevo proveedor

    </a>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Categoría</th>
                        <th>Límite de crédito</th>
                        <th>Días</th>
                        <th>Estado</th>
                        <th>Registro</th>
                        <th class="text-center">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($proveedores as $proveedor)

                        <tr>

                            <td>
                                <span class="fw-semibold text-secondary">
                                {{ $proveedor->rtn }}
                                </span>
                            </td>

                            <td class="fw-semibold">
                                {{ $proveedor->empresa }}
                            </td>

                            <td>
                                {{ $proveedor->contacto }}
                            </td>

                            <td>
                                {{ $proveedor->telefono }}
                            </td>

                            <td>
                                {{ $proveedor->categoria }}
                            </td>

                            <td>

                                L.
                                {{ number_format(
                                    $proveedor->limite_credito,
                                    2
                                ) }}

                            </td>

                            <td>

                                <span class="badge bg-info text-dark">

                                    <i class="bi bi-calendar-check me-1"></i>

                                    {{ $proveedor->dias_credito }}
                                    días

                                </span>

                            </td>

                            <td>

                                @if($proveedor->estado === 'Activo')

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

                            <td>

                                {{ \Carbon\Carbon::parse(
                                    $proveedor->fecha_registro
                                )->format('d/m/Y') }}

                            </td>

                            <td class="text-center">

                                <div class="d-flex gap-2 justify-content-center">

                                    <a
                                        href="{{ route('proveedores.edit', $proveedor->id) }}"
                                        class="btn btn-outline-warning btn-sm"
                                        title="Editar proveedor">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route(
                                            'proveedores.destroy',
                                            $proveedor
                                        ) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                            title="Eliminar proveedor"
                                            onclick="
                                            return confirm(
                                            '¿Está seguro de eliminar este proveedor?'
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
                                colspan="10"
                                class="text-center py-5 text-muted">

                                <i class="bi bi-truck display-5 d-block mb-2"></i>

                                No hay proveedores registrados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($proveedores->hasPages())

        <div class="card-footer bg-white">

            {{ $proveedores->links() }}

        </div>

    @endif

</div>

@endsection