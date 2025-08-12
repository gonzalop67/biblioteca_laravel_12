<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionMenu;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::getMenu();
        // dd($menus);
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        return view('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(ValidacionMenu $request)
    {
        Menu::create($request->validated());
        return redirect()->route('menu.crear')->with('mensaje', 'Menú creado con éxito.');
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

    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            Menu::guardarOrden($request->menu);
            // cache()->tags('Menu')->flush(); // Clear cache after creating a new menu
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
