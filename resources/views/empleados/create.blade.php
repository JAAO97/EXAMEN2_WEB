
@extends('layouts.app')

@section('title', 'Nuevo Empleado | DISFARMA')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between align-items-md-center
            mb-4 gap-3">

    <div>
        <h1 class="page-title">Registrar empleado</h1>

        <p class="page-subtitle">
            Complete la información personal, laboral
            y las condiciones de contratación del colaborador.
        </p>
    </div>

    <a href="{{ route('empleados.index') }}"
       class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Volver
    </a>

</div>

<form method="POST" action="{{ route('empleados.store') }}">
    @csrf

    {{-- SECCIÓN 1: INFORMACIÓN PERSONAL --}}
    <div class="card mb-4">

        <div class="card-header">
            <i class="bi bi-person-vcard me-2 text-primary"></i>
            Información personal
        </div>

        <div class="card-body p-4">
            <div class="row g-3">

                <div class="col-md-4">
                    <label for="identidad" class="form-label">
                        Identidad / DNI *
                    </label>

                    <input type="text"
                           id="identidad"
                           name="identidad"
                           maxlength="13"
                           inputmode="numeric"
                           value="{{ old('identidad') }}"
                           class="form-control @error('identidad') is-invalid @enderror"
                           placeholder="0801199912345">

                    <div class="form-text">
                        Exactamente 13 dígitos, sin guiones.
                    </div>

                    @error('identidad')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="nombre" class="form-label">
                        Nombre *
                    </label>

                    <input type="text"
                           id="nombre"
                           name="nombre"
                           value="{{ old('nombre') }}"
                           class="form-control @error('nombre') is-invalid @enderror"
                           placeholder="Nombre del empleado">

                    @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="apellido" class="form-label">
                        Apellido *
                    </label>

                    <input type="text"
                           id="apellido"
                           name="apellido"
                           value="{{ old('apellido') }}"
                           class="form-control @error('apellido') is-invalid @enderror"
                           placeholder="Apellido del empleado">

                    @error('apellido')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="correo" class="form-label">
                        Correo electrónico *
                    </label>

                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input type="email"
                               id="correo"
                               name="correo"
                               value="{{ old('correo') }}"
                               class="form-control @error('correo') is-invalid @enderror"
                               placeholder="empleado@disfarma.hn">

                        @error('correo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- SECCIÓN 2: INFORMACIÓN LABORAL --}}
    <div class="card mb-4">

        <div class="card-header">
            <i class="bi bi-briefcase me-2 text-success"></i>
            Información laboral
        </div>

        <div class="card-body p-4">
            <div class="row g-3">

                <div class="col-md-6">
                    <label for="cargo" class="form-label">
                        Cargo *
                    </label>

                    <select id="cargo"
                            name="cargo"
                            class="form-select @error('cargo') is-invalid @enderror">

                        <option value="">Seleccione un cargo...</option>

                        @foreach([
                            'Regente Farmacéutico',
                            'Asistente de Farmacia',
                            'Jefe de Bodega',
                            'Despachador',
                            'Cajero'
                        ] as $cargo)

                            <option value="{{ $cargo }}"
                                {{ old('cargo') === $cargo ? 'selected' : '' }}>
                                {{ $cargo }}
                            </option>

                        @endforeach
                    </select>

                    @error('cargo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="fecha_ingreso" class="form-label">
                        Fecha de ingreso *
                    </label>

                    <input type="date"
                           id="fecha_ingreso"
                           name="fecha_ingreso"
                           value="{{ old('fecha_ingreso') }}"
                           class="form-control @error('fecha_ingreso') is-invalid @enderror">

                    @error('fecha_ingreso')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
        </div>
    </div>

    {{-- SECCIÓN 3: CONDICIONES DE CONTRATACIÓN --}}
    <div class="card mb-4">

        <div class="card-header">
            <i class="bi bi-cash-stack me-2 text-warning"></i>
            Condiciones de contratación
        </div>

        <div class="card-body p-4">
            <div class="row g-3">

                <div class="col-md-6">
                    <label for="salario" class="form-label">
                        Salario mensual *
                    </label>

                    <div class="input-group">
                        <span class="input-group-text">L.</span>

                        <input type="number"
                               id="salario"
                               name="salario"
                               step="0.01"
                               min="0.01"
                               value="{{ old('salario') }}"
                               class="form-control @error('salario') is-invalid @enderror"
                               placeholder="0.00">

                        @error('salario')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-text">
                        Ingrese el salario mensual en lempiras.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="estado" class="form-label">
                        Estado *
                    </label>

                    <select id="estado"
                            name="estado"
                            class="form-select @error('estado') is-invalid @enderror">

                        <option value="Activo"
                            {{ old('estado', 'Activo') === 'Activo' ? 'selected' : '' }}>
                            Activo
                        </option>

                        <option value="Inactivo"
                            {{ old('estado') === 'Inactivo' ? 'selected' : '' }}>
                            Inactivo
                        </option>
                    </select>

                    @error('estado')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
        </div>
    </div>

    {{-- ACCIONES --}}
    <div class="d-flex justify-content-end gap-2 mb-4">

        <a href="{{ route('empleados.index') }}"
           class="btn btn-outline-secondary px-4">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-save me-1"></i>
            Guardar empleado
        </button>

    </div>

</form>

@endsection
