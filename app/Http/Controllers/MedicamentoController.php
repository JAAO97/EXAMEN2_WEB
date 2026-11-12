<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $medicamentos = Medicamento::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('nombre', 'like', '%' . $buscar . '%')
                      ->orWhere('codigo', 'like', '%' . $buscar . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view(
            'medicamentos.index',
            compact('medicamentos', 'buscar')
        );        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => [
                'required',
                'string',
                'max:255',
                'unique:medicamentos,codigo',
            ],

            'nombre' => [
                'required',
                'string',
                'max:255',
            ],

            'categoria' => [
                'required',
                Rule::in([
                    'Antibióticos',
                    'Analgésicos',
                    'Sueros',
                    'Material Quirúrgico',
                    'Vitaminas',
                ]),
            ],

            'precio' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'costo' => [
                'required',
                'numeric',
                'gte:0',
            ],

            'inventario' => [
                'required',
                'integer',
                'gte:0',
            ],

            'imagen' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'laboratorio' => [
                'required',
                'string',
                'max:255',
            ],

            'fecha_vencimiento' => [
                'required',
                'date',
            ],

            'fecha_registro' => [
                'required',
                'date',
            ],

            'numero_lote' => [
                'required',
                'string',
                'max:255',
            ],
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'El código ingresado ya está registrado.',

            'nombre.required' => 'El nombre es obligatorio.',

            'categoria.required' => 'Seleccione una categoría.',
            'categoria.in' => 'La categoría seleccionada no es válida.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser numérico.',
            'precio.gt' => 'El precio debe ser mayor que cero.',

            'costo.required' => 'El costo es obligatorio.',
            'costo.numeric' => 'El costo debe ser numérico.',
            'costo.gte' => 'El costo no puede ser negativo.',

            'inventario.required' => 'El inventario es obligatorio.',
            'inventario.integer' => 'El inventario debe ser un número entero.',
            'inventario.gte' => 'El inventario no puede ser negativo.',

            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
            'imagen.max' => 'La imagen no puede superar los 5 MB.',

            'laboratorio.required' => 'El laboratorio es obligatorio.',

            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'Ingrese una fecha de vencimiento válida.',

            'fecha_registro.required' => 'La fecha de registro es obligatoria.',
            'fecha_registro.date' => 'Ingrese una fecha de registro válida.',

            'numero_lote.required' => 'El número de lote es obligatorio.',
        ]);

        if ($request->hasFile('imagen')) {

            $archivo = $request->file('imagen');

            $nombreArchivo =
                time() . '_' . uniqid() . '.' . $archivo->getClientOriginalExtension();

            $archivo->move(
                public_path('uploads/medicamentos'),
                $nombreArchivo
            );

            $datos['imagen'] = $nombreArchivo;
        }

        Medicamento::create($datos);

        return redirect()
            ->route('medicamentos.index')
            ->with(
                'success',
                'Medicamento registrado correctamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        return redirect()
            ->route('medicamentos.edit', $medicamento);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        return view(
            'medicamentos.edit',
            compact('medicamento')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $datos = $request->validate([
            'codigo' => [
                'required',
                'string',
                'max:255',

                Rule::unique(
                    'medicamentos',
                    'codigo'
                )->ignore($medicamento->id),
            ],

            'nombre' => [
                'required',
                'string',
                'max:255',
            ],

            'categoria' => [
                'required',
                Rule::in([
                    'Antibióticos',
                    'Analgésicos',
                    'Sueros',
                    'Material Quirúrgico',
                    'Vitaminas',
                ]),
            ],

            'precio' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'costo' => [
                'required',
                'numeric',
                'gte:0',
            ],

            'inventario' => [
                'required',
                'integer',
                'gte:0',
            ],

            'imagen' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'laboratorio' => [
                'required',
                'string',
                'max:255',
            ],

            'fecha_vencimiento' => [
                'required',
                'date',
            ],

            'fecha_registro' => [
                'required',
                'date',
            ],

            'numero_lote' => [
                'required',
                'string',
                'max:255',
            ],
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'El código ingresado ya está registrado.',

            'nombre.required' => 'El nombre es obligatorio.',

            'categoria.required' => 'Seleccione una categoría.',
            'categoria.in' => 'La categoría seleccionada no es válida.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser numérico.',
            'precio.gt' => 'El precio debe ser mayor que cero.',

            'costo.required' => 'El costo es obligatorio.',
            'costo.numeric' => 'El costo debe ser numérico.',
            'costo.gte' => 'El costo no puede ser negativo.',

            'inventario.required' => 'El inventario es obligatorio.',
            'inventario.integer' => 'El inventario debe ser un número entero.',
            'inventario.gte' => 'El inventario no puede ser negativo.',

            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
            'imagen.max' => 'La imagen no puede superar los 5 MB.',

            'laboratorio.required' => 'El laboratorio es obligatorio.',

            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'Ingrese una fecha válida.',

            'fecha_registro.required' => 'La fecha de registro es obligatoria.',
            'fecha_registro.date' => 'Ingrese una fecha válida.',

            'numero_lote.required' => 'El número de lote es obligatorio.',
        ]);

        if ($request->hasFile('imagen')) {

            if (
                $medicamento->imagen &&
                File::exists(
                    public_path(
                        'uploads/medicamentos/' .
                        $medicamento->imagen
                    )
                )
            ) {
                File::delete(
                    public_path(
                        'uploads/medicamentos/' .
                        $medicamento->imagen
                    )
                );
            }

            $archivo = $request->file('imagen');

            $nombreArchivo =
                time() . '_' . uniqid() . '.' . $archivo->getClientOriginalExtension();

            $archivo->move(
                public_path('uploads/medicamentos'),
                $nombreArchivo
            );

            $datos['imagen'] = $nombreArchivo;
        }

        $medicamento->update($datos);

        return redirect()
            ->route('medicamentos.index')
            ->with(
                'success',
                'Medicamento actualizado correctamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        if (
            $medicamento->imagen &&
            File::exists(
                public_path(
                    'uploads/medicamentos/' .
                    $medicamento->imagen
                )
            )
        ) {
            File::delete(
                public_path(
                    'uploads/medicamentos/' .
                    $medicamento->imagen
                )
            );
        }

        $medicamento->delete();

        return redirect()
            ->route('medicamentos.index')
            ->with(
                'success',
                'Medicamento eliminado correctamente.'
            );
    }
}
