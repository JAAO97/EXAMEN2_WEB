@extends('layouts.app')

@section('title', 'Editar Proveedor | DISFARMA')

@section('content')

<div class="mb-4">

    <h2 class="mb-1">
        Editar proveedor
    </h2>

    <p class="text-muted">
        Actualice la información comercial del proveedor.
    </p>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form
            method="POST"
            action="{{ route('proveedores.update', $proveedor->id) }}">

            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-4">

                    <label for="rtn" class="form-label">
                        RTN *
                    </label>

                    <input
                        type="text"
                        id="rtn"
                        name="rtn"
                        maxlength="14"
                        value="{{ old(
                            'rtn',
                            $proveedor->rtn
                        ) }}"
                        class="form-control
                        @error('rtn') is-invalid @enderror">

                    <div class="form-text">
                        Exactamente 14 dígitos.
                    </div>

                    @error('rtn')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-8">

                    <label for="empresa" class="form-label">
                        Empresa *
                    </label>

                    <input
                        type="text"
                        id="empresa"
                        name="empresa"
                        value="{{ old(
                            'empresa',
                            $proveedor->empresa
                        ) }}"
                        class="form-control
                        @error('empresa') is-invalid @enderror">

                    @error('empresa')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-6">

                    <label for="contacto" class="form-label">
                        Persona de contacto *
                    </label>

                    <input
                        type="text"
                        id="contacto"
                        name="contacto"
                        value="{{ old(
                            'contacto',
                            $proveedor->contacto
                        ) }}"
                        class="form-control
                        @error('contacto') is-invalid @enderror">

                    @error('contacto')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-6">

                    <label for="telefono" class="form-label">
                        Teléfono *
                    </label>

                    <input
                        type="text"
                        id="telefono"
                        name="telefono"
                        maxlength="8"
                        value="{{ old(
                            'telefono',
                            $proveedor->telefono
                        ) }}"
                        class="form-control
                        @error('telefono') is-invalid @enderror"
                        placeholder="99999999">

                    <div class="form-text">
                        8 dígitos. Debe iniciar con 2, 3, 8 o 9.
                    </div>

                    @error('telefono')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-4">

                    <label for="categoria" class="form-label">
                        Categoría *
                    </label>

                    <select
                        id="categoria"
                        name="categoria"
                        class="form-select
                        @error('categoria') is-invalid @enderror">

                        <option value="">
                            Seleccione...
                        </option>

                        @foreach([
                            'Fármacos',
                            'Material Quirúrgico',
                            'Equipos'
                        ] as $categoria)

                            <option
                                value="{{ $categoria }}"
                                {{ old(
                                    'categoria',
                                    $proveedor->categoria
                                ) === $categoria
                                    ? 'selected'
                                    : '' }}>

                                {{ $categoria }}

                            </option>

                        @endforeach

                    </select>

                    @error('categoria')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-4">

                    <label for="limite_credito" class="form-label">
                        Límite de crédito *
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            L.
                        </span>

                        <input
                            type="number"
                            id="limite_credito"
                            name="limite_credito"
                            step="0.01"
                            min="0"
                            value="{{ old(
                                'limite_credito',
                                $proveedor->limite_credito
                            ) }}"
                            class="form-control
                            @error('limite_credito') is-invalid @enderror">

                        @error('limite_credito')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <div class="col-md-4">

                    <label for="dias_credito" class="form-label">
                        Días de crédito *
                    </label>

                    <select
                        id="dias_credito"
                        name="dias_credito"
                        class="form-select
                        @error('dias_credito') is-invalid @enderror">

                        <option value="">
                            Seleccione...
                        </option>

                        @foreach([15, 30, 45, 60] as $dias)

                            <option
                                value="{{ $dias }}"
                                {{ old(
                                    'dias_credito',
                                    $proveedor->dias_credito
                                ) == $dias
                                    ? 'selected'
                                    : '' }}>

                                {{ $dias }} días

                            </option>

                        @endforeach

                    </select>

                    @error('dias_credito')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-6">

                    <label for="estado" class="form-label">
                        Estado *
                    </label>

                    <select
                        id="estado"
                        name="estado"
                        class="form-select
                        @error('estado') is-invalid @enderror">

                        <option value="">
                            Seleccione...
                        </option>

                        <option
                            value="Activo"
                            {{ old(
                                'estado',
                                $proveedor->estado
                            ) === 'Activo'
                                ? 'selected'
                                : '' }}>

                            Activo

                        </option>

                        <option
                            value="Inactivo"
                            {{ old(
                                'estado',
                                $proveedor->estado
                            ) === 'Inactivo'
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


                <div class="col-md-6">

                    <label for="fecha_registro" class="form-label">
                        Fecha de registro *
                    </label>

                    <input
                        type="date"
                        id="fecha_registro"
                        name="fecha_registro"
                        value="{{ old(
                            'fecha_registro',
                            $proveedor->fecha_registro
                        ) }}"
                        class="form-control
                        @error('fecha_registro') is-invalid @enderror">

                    @error('fecha_registro')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            <hr class="my-4">


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('proveedores.index') }}"
                    class="btn btn-outline-secondary">

                    Cancelar

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>

                    Actualizar proveedor

                </button>

            </div>

        </form>

    </div>

</div>

@endsection