<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Proveedor;
use App\Models\Empleado;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMedicamentos = Medicamento::count();

        $proveedoresActivos = Proveedor::where(
            'estado',
            'Activo'
        )->count();

        $totalEmpleados = Empleado::count();

        $valorInventario = Medicamento::selectRaw(
            'SUM(inventario * precio) as total'
        )->value('total') ?? 0;

        return view(
            'dashboard',
            compact(
                'totalMedicamentos',
                'proveedoresActivos',
                'totalEmpleados',
                'valorInventario'
            )
        );
    }
}