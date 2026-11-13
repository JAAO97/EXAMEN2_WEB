@extends('layouts.app')

@section('title', 'Nuevo Empleado | DISFARMA')

@section('content')

<div class="mb-4">

    <h1 class="page-title">
        Registrar empleado
    </h1>

    <p class="page-subtitle">
        Complete la información del colaborador.
    </p>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form
            method="POST"
            action="{{ route('empleados.store') }}">

            @csrf


            <div class="row g-3">


                <div class="col-md-4">

                    <label for="identidad" class="form-label">

                        Identidad / DNI *

                    </label>

                    <input
                        type="text"
                        id="identidad"
                        name="identidad"
                        maxlength="13"
                        value="{{ old('identidad') }}"
                        class="form-control
                        @error('identidad') is-invalid @enderror">

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

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        class="form-control
                        @error('nombre') is-invalid @enderror">

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

                    <input
                        type="text"
                        id="apellido"
                        name="apellido"
                        value="{{ old('apellido') }}"
                        class="form-control
                        @error('apellido') is-invalid @enderror">

                    @error('apellido')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-6">

                    <label for="correo" class="form-label">
                        Correo electrónico *
                    </label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        value="{{ old('correo') }}"
                        class="form-control
                        @error('correo') is-invalid @enderror">

                    @error('correo')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-6">

                    <label for="cargo" class="form-label">
                        Cargo *
                    </label>

                    <select
                        id="cargo"
                        name="cargo"
                        class="form-select
                        @error('cargo') is-invalid @enderror">

                        <option value="">
                            Seleccione...
                        </option>

                        @foreach([
                            'Regente Farmacéutico',
                            'Asistente de Farmacia',
                            'Jefe de Bodega',
                            'Despachador',
                            'Cajero'
                        ] as $cargo)

                            <option
                                value="{{ $cargo }}"
                                {{ old('cargo') === $cargo
                                    ? 'selected'
                                    : '' }}>

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


                <div class="col-md-4">

                    <label for="salario" class="form-label">

                        Salario mensual *

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            L.
                        </span>

                        <input
                            type="number"
                            id="salario"
                            name="salario"
                            step="0.01"
                            min="0.01"
                            value="{{ old('salario') }}"
                            class="form-control
                            @error('salario') is-invalid @enderror">

                        @error('salario')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <div class="col-md-4">

                    <label for="fecha_ingreso" class="form-label">

                        Fecha de ingreso *

                    </label>

                    <input
                        type="date"
                        id="fecha_ingreso"
                        name="fecha_ingreso"
                        value="{{ old('fecha_ingreso') }}"
                        class="form-control
                        @error('fecha_ingreso') is-invalid @enderror">

                    @error('fecha_ingreso')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-4">

                    <label for="estado" class="form-label">

                        Estado *

                    </label>

                    <select
                        id="estado"
                        name="estado"
                        class="form-select
                        @error('estado') is-invalid @enderror">

                        <option
                            value="Activo"
                            {{ old('estado', 'Activo') === 'Activo'
                                ? 'selected'
                                : '' }}>

                            Activo

                        </option>

                        <option
                            value="Inactivo"
                            {{ old('estado') === 'Inactivo'
                                ? 'selected'
                                : '' }}>

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


            <hr class="my-4">


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('empleados.index') }}"
                    class="btn btn-outline-secondary">

                    Cancelar

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>

                    Guardar empleado

                </button>

            </div>

        </form>

    </div>

</div>

@endsection