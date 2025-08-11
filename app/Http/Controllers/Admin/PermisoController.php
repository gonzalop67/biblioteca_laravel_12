<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permiso::orderBy('id')->get();
        return view('admin.permiso.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        return view('admin.permiso.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function mostrar(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminar(string $id)
    {
        //
    }
}
