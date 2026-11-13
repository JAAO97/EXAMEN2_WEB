@extends('layouts.app')

@section('title', 'Dashboard | DISFARMA')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">

    <div>

        <h1 class="page-title">
            Dashboard Gerencial
        </h1>

        <p class="page-subtitle">
            Resumen general de operaciones de DISFARMA Honduras.
        </p>

    </div>

    <div>

        <span
            class="badge
                   bg-white
                   text-secondary
                   border
                   px-3
                   py-2">

            <i class="bi bi-calendar3 me-1"></i>

            {{ now()->format('d/m/Y') }}

        </span>

    </div>

</div>

    <div class="row g-4">

        <div class="col-12 col-md-6 col-xl-3">

            <div class="card h-100">

                <div class="card-body p-4">

                <div
                    class="d-flex
                        justify-content-between
                        align-items-start">

                    <div>

                        <p
                            class="text-muted
                                small
                                mb-2">

                            Medicamentos

                        </p>

                        <h2 class="fw-bold mb-1">

                            {{ $totalMedicamentos }}

                        </h2>

                        <small class="text-muted">

                            Productos en catálogo

                        </small>

                    </div>

                    <div class="kpi-icon kpi-blue">

                        <i class="bi bi-capsule fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-xl-3">

        <div class="card h-100">

            <div class="card-body p-4">

                <div
                    class="d-flex
                        justify-content-between
                        align-items-start">

                    <div>

                        <p class="text-muted small mb-2">

                            Proveedores activos

                        </p>

                        <h2 class="fw-bold mb-1">

                            {{ $proveedoresActivos }}

                        </h2>

                        <small class="text-muted">

                            Relaciones comerciales

                        </small>

                    </div>

                    <div class="kpi-icon kpi-green">

                        <i class="bi bi-truck fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-xl-3">

        <div class="card h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted small mb-2">

                            Empleados
                        </p>

                        <h2 class="fw-bold mb-1">

                            {{ $totalEmpleados }}
                        </h2>

                        <small class="text-muted">

                            Personal en nómina

                        </small>

                    </div>

                    <div class="kpi-icon kpi-yellow">

                        <i class="bi bi-people fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-xl-3">

        <div class="card h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted small mb-2">
                            Valor inventario
                        </p>

                        <h2 class="fw-bold mb-1">
                            L. {{ number_format($valorInventario, 2) }}
                        </h2>

                        <small class="text-muted">

                            Valor comercial estimado

                        </small>

                    </div>

                    <div class="kpi-icon kpi-red">
                        <i class="bi bi-cash-stack fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection