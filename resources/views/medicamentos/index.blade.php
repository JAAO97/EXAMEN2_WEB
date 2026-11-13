@extends('layouts.app')

@section('title', 'Medicamentos | DISFARMA')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between align-items-md-center
            mb-4 gap-3">

    <div>

        <h1 class="page-title">
            Medicamentos
        </h1>

        <p class="page-subtitle">
            Inventario farmacéutico de DISFARMA Honduras.
        </p>

    </div>

    <a
        href="{{ route('medicamentos.create') }}"
        class="btn btn-primary px-3">

        <i class="bi bi-plus-lg me-1"></i>

        Nuevo medicamento

    </a>

</div>


<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('medicamentos.index') }}">

            <div class="row g-2">

                <div class="col-md-9">

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-search"></i>

                        </span>

                        <input
                            type="text"
                            name="buscar"
                            class="form-control"
                            value="{{ $buscar }}"
                            placeholder="Buscar por nombre o código...">

                    </div>

                </div>

                <div class="col-md-3 d-grid d-md-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary flex-fill">

                        Buscar

                    </button>

                    @if($buscar)

                        <a
                            href="{{ route('medicamentos.index') }}"
                            class="btn btn-outline-secondary">

                            Limpiar

                        </a>

                    @endif

                </div>

            </div>

        </form>

    </div>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>Imagen</th>

                        <th>Código</th>

                        <th>Medicamento</th>

                        <th>Categoría</th>

                        <th>Precio</th>

                        <th>Inventario</th>

                        <th>Estado</th>

                        <th>Laboratorio</th>

                        <th>Vencimiento</th>

                        <th class="text-center">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($medicamentos as $medicamento)

                        <tr>

                            <td>

                                @if($medicamento->imagen)

                                    <img
                                        src="{{ asset(
                                            'uploads/medicamentos/' .
                                            $medicamento->imagen
                                        ) }}"
                                        alt="{{ $medicamento->nombre }}"
                                        class="rounded border"
                                        width="55"
                                        height="55"
                                        style="object-fit: cover;">

                                @else

                                    <div
                                        class="bg-light border rounded
                                               d-flex align-items-center
                                               justify-content-center"
                                        style="width:55px;height:55px;">

                                        <i
                                            class="bi bi-image
                                                   text-secondary">
                                        </i>

                                    </div>

                                @endif

                            </td>

                            <td>

                                <span class="fw-semibold">

                                    {{ $medicamento->codigo }}

                                </span>

                            </td>

                            <td>

                                {{ $medicamento->nombre }}

                            </td>

                            <td>

                                {{ $medicamento->categoria }}

                            </td>

                            <td>

                                L.
                                {{ number_format(
                                    $medicamento->precio,
                                    2
                                ) }}

                            </td>

                            <td>

                                {{ $medicamento->inventario }}

                            </td>

                            <td>

                                @if($medicamento->inventario > 20)

                                    <span class="badge bg-success">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Óptimo

                                    </span>

                                @elseif($medicamento->inventario >= 10)

                                    <span
                                        class="badge
                                               bg-warning
                                               text-dark">

                                        <i class="bi bi-exclamation-circle me-1"></i>       

                                        Moderado

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        <i class="bi bi-exclamation-triangle me-1"></i>

                                        ¡Desabastecimiento!

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $medicamento->laboratorio }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse(
                                    $medicamento->fecha_vencimiento
                                )->format('d/m/Y') }}

                            </td>

                            <td class="text-center">

                                <div
                                    class="d-flex gap-1
                                           justify-content-center">

                                    <a
                                        href="{{ route(
                                            'medicamentos.edit',
                                            $medicamento
                                        ) }}"
                                        class="btn
                                               btn-outline-warning
                                               btn-sm"
                                        title="Editar medicamento">

                                        <i
                                            class="bi bi-pencil">
                                        </i>

                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route(
                                            'medicamentos.destroy',
                                            $medicamento
                                        ) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn
                                                   btn-outline-danger
                                                   btn-sm"
                                            title="Eliminar medicamento"
                                            onclick="
                                                return confirm(
                                                '¿Está seguro de eliminar este medicamento?'
                                                )
                                            ">

                                            <i
                                                class="bi bi-trash">
                                            </i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="10"
                                class="text-center
                                       py-5
                                       text-muted">

                                <i
                                    class="bi bi-inbox
                                           display-5
                                           d-block
                                           mb-2">
                                </i>

                                No se encontraron medicamentos.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($medicamentos->hasPages())

        <div class="card-footer bg-white">

            {{ $medicamentos->links() }}

        </div>

    @endif

</div>

@endsection