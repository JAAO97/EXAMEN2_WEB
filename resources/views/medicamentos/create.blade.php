@extends('layouts.app')

@section('title', 'Nuevo Medicamento | DISFARMA')

@section('content')

<div class="mb-4">

    <h1 class="page-title">
        Registrar medicamento
    </h1>

    <p class="page-subtitle">
        Complete la información del producto farmacéutico.
    </p>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form
            method="POST"
            action="{{ route('medicamentos.store') }}"
            enctype="multipart/form-data">

            @csrf


            <div class="row g-3">

                <div class="col-md-4">

                    <label
                        for="codigo"
                        class="form-label">

                        Código / SKU *

                    </label>

                    <input
                        type="text"
                        id="codigo"
                        name="codigo"
                        value="{{ old('codigo') }}"
                        class="form-control
                        @error('codigo') is-invalid @enderror">

                    @error('codigo')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <div class="col-md-8">

                    <label
                        for="nombre"
                        class="form-label">

                        Nombre del medicamento *

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

                    <label
                        for="categoria"
                        class="form-label">

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
                            'Antibióticos',
                            'Analgésicos',
                            'Sueros',
                            'Material Quirúrgico',
                            'Vitaminas'
                        ] as $categoria)

                            <option
                                value="{{ $categoria }}"
                                {{ old('categoria') == $categoria
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

                    <label
                        for="precio"
                        class="form-label">

                        Precio de venta *

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            L.
                        </span>

                        <input
                            type="number"
                            id="precio"
                            name="precio"
                            step="0.01"
                            min="0.01"
                            value="{{ old('precio') }}"
                            class="form-control
                            @error('precio') is-invalid @enderror">

                        @error('precio')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                </div>


                <div class="col-md-4">

                    <label
                        for="costo"
                        class="form-label">

                        Costo *

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            L.
                        </span>

                        <input
                            type="number"
                            id="costo"
                            name="costo"
                            step="0.01"
                            min="0"
                            value="{{ old('costo') }}"
                            class="form-control
                            @error('costo') is-invalid @enderror">

                        @error('costo')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                </div>


                <div class="col-md-4">

                    <label
                        for="inventario"
                        class="form-label">

                        Inventario *

                    </label>

                    <input
                        type="number"
                        id="inventario"
                        name="inventario"
                        min="0"
                        value="{{ old('inventario') }}"
                        class="form-control
                        @error('inventario') is-invalid @enderror">

                    @error('inventario')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <div class="col-md-8">

                    <label
                        for="laboratorio"
                        class="form-label">

                        Laboratorio *

                    </label>

                    <input
                        type="text"
                        id="laboratorio"
                        name="laboratorio"
                        value="{{ old('laboratorio') }}"
                        class="form-control
                        @error('laboratorio') is-invalid @enderror">

                    @error('laboratorio')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <div class="col-md-4">

                    <label
                        for="numero_lote"
                        class="form-label">

                        Número de lote *

                    </label>

                    <input
                        type="text"
                        id="numero_lote"
                        name="numero_lote"
                        value="{{ old('numero_lote') }}"
                        class="form-control
                        @error('numero_lote') is-invalid @enderror">

                    @error('numero_lote')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <div class="col-md-4">

                    <label
                        for="fecha_registro"
                        class="form-label">

                        Fecha de registro *

                    </label>

                    <input
                        type="date"
                        id="fecha_registro"
                        name="fecha_registro"
                        value="{{ old(
                            'fecha_registro',
                            date('Y-m-d')
                        ) }}"
                        class="form-control
                        @error('fecha_registro') is-invalid @enderror">

                    @error('fecha_registro')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <div class="col-md-4">

                    <label
                        for="fecha_vencimiento"
                        class="form-label">

                        Fecha de vencimiento *

                    </label>

                    <input
                        type="date"
                        id="fecha_vencimiento"
                        name="fecha_vencimiento"
                        value="{{ old('fecha_vencimiento') }}"
                        class="form-control
                        @error('fecha_vencimiento') is-invalid @enderror">

                    @error('fecha_vencimiento')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <div class="col-md-12">

                    <label
                        for="imagen"
                        class="form-label">

                        Imagen del medicamento

                    </label>

                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="form-control
                        @error('imagen') is-invalid @enderror">

                    <div class="form-text">

                        Formatos permitidos:
                        JPG, JPEG, PNG y WEBP.
                        Máximo 5 MB.

                    </div>

                    @error('imagen')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>


            <hr class="my-4">


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('medicamentos.index') }}"
                    class="btn btn-outline-secondary">

                    Cancelar

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>

                    Guardar medicamento

                </button>

            </div>

        </form>

    </div>

</div>

@endsection