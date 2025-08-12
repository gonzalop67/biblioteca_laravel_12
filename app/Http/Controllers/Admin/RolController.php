<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::orderBy('id')->get();
        return view('admin.rol.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        return view('admin.rol.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(ValidacionRol $request)
    {
        Rol::create($request->validated());
        return redirect()->route('rol')->with('mensaje', 'Rol creado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar(string $id)
    {
        $rol = Rol::findOrFail($id);
        return view('admin.rol.editar', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(ValidacionRol $request, string $id)
    {
        Rol::findOrFail($id)->update($request->all());
        return redirect()->route('rol')->with('mensaje', 'Rol actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminar(Request $request, string $id)
    {
        if ($request->ajax()) {
            if (Rol::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
