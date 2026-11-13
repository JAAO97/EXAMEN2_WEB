<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id', 'desc')
            ->paginate(10);

        return view(
            'empleados.index',
            compact('empleados')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'identidad' => [
                'required',
                'digits:13',
                'unique:empleados,identidad',
            ],

            'nombre' => [
                'required',
                'string',
                'max:255',
            ],

            'apellido' => [
                'required',
                'string',
                'max:255',
            ],

            'correo' => [
                'required',
                'email',
                'max:255',
            ],

            'cargo' => [
                'required',
                Rule::in([
                    'Regente Farmacéutico',
                    'Asistente de Farmacia',
                    'Jefe de Bodega',
                    'Despachador',
                    'Cajero',
                ]),
            ],

            'salario' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'fecha_ingreso' => [
                'required',
                'date',
            ],

            'estado' => [
                'required',
                Rule::in([
                    'Activo',
                    'Inactivo',
                ]),
            ],
        ], [
            'identidad.required' => 'La identidad es obligatoria.',
            'identidad.digits' => 'La identidad debe contener exactamente 13 dígitos.',
            'identidad.unique' => 'La identidad ingresada ya está registrada.',

            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',

            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Ingrese un correo electrónico válido.',

            'cargo.required' => 'Seleccione un cargo.',
            'cargo.in' => 'El cargo seleccionado no es válido.',

            'salario.required' => 'El salario es obligatorio.',
            'salario.numeric' => 'El salario debe ser numérico.',
            'salario.gt' => 'El salario debe ser mayor que cero.',

            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date' => 'Ingrese una fecha válida.',

            'estado.required' => 'Seleccione un estado.',
            'estado.in' => 'El estado seleccionado no es válido.',
        ]);

        Empleado::create($datos);

        return redirect()
            ->route('empleados.index')
            ->with(
                'success',
                'Empleado registrado correctamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()
            ->route('empleados.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::findOrFail($id);

        return view(
            'empleados.edit',
            compact('empleado')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empleado = Empleado::findOrFail($id);

        $datos = $request->validate([
            'identidad' => [
                'required',
                'digits:13',
                Rule::unique('empleados', 'identidad')
                    ->ignore($empleado->id),
            ],

            'nombre' => [
                'required',
                'string',
                'max:255',
            ],

            'apellido' => [
                'required',
                'string',
                'max:255',
            ],

            'correo' => [
                'required',
                'email',
                'max:255',
            ],

            'cargo' => [
                'required',
                Rule::in([
                    'Regente Farmacéutico',
                    'Asistente de Farmacia',
                    'Jefe de Bodega',
                    'Despachador',
                    'Cajero',
                ]),
            ],

            'salario' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'fecha_ingreso' => [
                'required',
                'date',
            ],

            'estado' => [
                'required',
                Rule::in([
                    'Activo',
                    'Inactivo',
                ]),
            ],
        ], [
            'identidad.required' => 'La identidad es obligatoria.',
            'identidad.digits' => 'La identidad debe contener exactamente 13 dígitos.',
            'identidad.unique' => 'La identidad ingresada ya está registrada.',

            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',

            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Ingrese un correo electrónico válido.',

            'cargo.required' => 'Seleccione un cargo.',
            'cargo.in' => 'El cargo seleccionado no es válido.',

            'salario.required' => 'El salario es obligatorio.',
            'salario.numeric' => 'El salario debe ser numérico.',
            'salario.gt' => 'El salario debe ser mayor que cero.',

            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date' => 'Ingrese una fecha válida.',

            'estado.required' => 'Seleccione un estado.',
            'estado.in' => 'El estado seleccionado no es válido.',
        ]);

        $empleado->update($datos);

        return redirect()
            ->route('empleados.index')
            ->with(
                'success',
                'Empleado actualizado correctamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->delete();

        return redirect()
            ->route('empleados.index')
            ->with(
                'success',
                'Empleado eliminado correctamente.'
            );
    }
}
