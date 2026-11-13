<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::orderBy('id', 'desc')
            ->paginate(10);

        return view(
            'proveedores.index',
            compact('proveedores')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'rtn' => [
                'required',
                'digits:14',
                'unique:proveedores,rtn',
            ],

            'empresa' => [
                'required',
                'string',
                'max:255',
            ],

            'contacto' => [
                'required',
                'string',
                'max:255',
            ],

            'telefono' => [
                'required',
                'regex:/^[2389][0-9]{7}$/',
            ],

            'categoria' => [
                'required',
                Rule::in([
                    'Fármacos',
                    'Material Quirúrgico',
                    'Equipos',
                ]),
            ],

            'limite_credito' => [
                'required',
                'numeric',
                'gte:0',
            ],

            'dias_credito' => [
                'required',
                Rule::in([15, 30, 45, 60]),
            ],

            'estado' => [
                'required',
                Rule::in([
                    'Activo',
                    'Inactivo',
                ]),
            ],

            'fecha_registro' => [
                'required',
                'date',
            ],
        ], [
            'rtn.required' => 'El RTN es obligatorio.',
            'rtn.digits' => 'El RTN debe contener exactamente 14 dígitos.',
            'rtn.unique' => 'El RTN ingresado ya está registrado.',

            'empresa.required' => 'El nombre de la empresa es obligatorio.',

            'contacto.required' => 'El nombre del contacto es obligatorio.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe tener 8 dígitos e iniciar con 2, 3, 8 o 9.',

            'categoria.required' => 'Seleccione una categoría.',
            'categoria.in' => 'La categoría seleccionada no es válida.',

            'limite_credito.required' => 'El límite de crédito es obligatorio.',
            'limite_credito.numeric' => 'El límite de crédito debe ser numérico.',
            'limite_credito.gte' => 'El límite de crédito no puede ser negativo.',

            'dias_credito.required' => 'Seleccione los días de crédito.',
            'dias_credito.in' => 'Los días de crédito permitidos son 15, 30, 45 o 60.',

            'estado.required' => 'Seleccione el estado.',
            'estado.in' => 'El estado seleccionado no es válido.',

            'fecha_registro.required' => 'La fecha de registro es obligatoria.',
            'fecha_registro.date' => 'Ingrese una fecha válida.',
        ]);

        Proveedor::create($datos);

        return redirect()
            ->route('proveedores.index')
            ->with(
                'success',
                'Proveedor registrado correctamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return redirect()
            ->route('proveedores.edit', $proveedor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $datos = $request->validate([
            'rtn' => [
                'required',
                'digits:14',
                Rule::unique('proveedores', 'rtn')
                    ->ignore($proveedor->id),
            ],

            'empresa' => [
                'required',
                'string',
                'max:255',
            ],

            'contacto' => [
                'required',
                'string',
                'max:255',
            ],

            'telefono' => [
                'required',
                'regex:/^[2389][0-9]{7}$/',
            ],

            'categoria' => [
                'required',
                Rule::in([
                    'Fármacos',
                    'Material Quirúrgico',
                    'Equipos',
                ]),
            ],

            'limite_credito' => [
                'required',
                'numeric',
                'gte:0',
            ],

            'dias_credito' => [
                'required',
                Rule::in([15, 30, 45, 60]),
            ],

            'estado' => [
                'required',
                Rule::in([
                    'Activo',
                    'Inactivo',
                ]),
            ],

            'fecha_registro' => [
                'required',
                'date',
            ],
        ]);

        $proveedor->update($datos);

        return redirect()
            ->route('proveedores.index')
            ->with(
                'success',
                'Proveedor actualizado correctamente.'
            );
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()
            ->route('proveedores.index')
            ->with(
                'success',
                'Proveedor eliminado correctamente.'
            );
    }
}
