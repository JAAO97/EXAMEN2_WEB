@extends('layouts.app')

@section('title', 'Dashboard | DISFARMA')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="mb-1">
            Dashboard
        </h2>

        <p class="text-muted mb-0">
            Bienvenido al Sistema Integral de Gestión de DISFARMA Honduras.
        </p>

    </div>

</div>


<div class="row g-4">

    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Medicamentos
                        </p>

                        <h3 class="mb-0">
                            {{ $totalMedicamentos }}
                        </h3>

                    </div>

                    <i class="bi bi-capsule fs-1 text-primary"></i>

                </div>

            </div>

        </div>

    </div>


    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Proveedores activos
                        </p>

                        <h3 class="mb-0">
                            {{ $proveedoresActivos }}
                        </h3>

                    </div>

                    <i class="bi bi-truck fs-1 text-success"></i>

                </div>

            </div>

        </div>

    </div>


    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Empleados
                        </p>

                        <h3 class="mb-0">
                            {{ $totalEmpleados }}
                        </h3>

                    </div>

                    <i class="bi bi-people fs-1 text-warning"></i>

                </div>

            </div>

        </div>

    </div>


    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Valor inventario
                        </p>

                        <h3 class="mb-0">
                            L. {{ number_format($valorInventario, 2) }}
                        </h3>

                    </div>

                    <i class="bi bi-cash-stack fs-1 text-danger"></i>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection