<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuRolController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index']);
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('permiso', [PermisoController::class, 'index'])->name('permiso');
    Route::get('permiso/crear', [PermisoController::class, 'crear'])->name('permiso.crear');
    // RUTAS DE MENU
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::get('menu/crear', [MenuController::class, 'crear'])->name('menu.crear');
    Route::post('menu', [MenuController::class, 'guardar'])->name('menu.guardar');
    Route::get('menu/{id}/editar', [MenuController::class, 'editar'])->name('menu.editar');
    Route::delete('menu/{id}/eliminar', [MenuController::class, 'eliminar'])->name('menu.eliminar');
    Route::post('menu/guardar-orden', [MenuController::class, 'guardarOrden'])->name('menu.orden');

    /* Rutas de Roles */
    Route::get('rol', [RolController::class, 'index'])->name('rol');
    Route::get('rol/crear', [RolController::class, 'crear'])->name('rol.crear');
    Route::get('rol/{id}/editar', [RolController::class, 'editar'])->name('rol.editar');
    Route::post('rol', [RolController::class, 'guardar'])->name('rol.guardar');
    Route::put('rol/{id}', [RolController::class, 'actualizar'])->name('rol.actualizar');
    Route::delete('rol/{id}/eliminar', [RolController::class, 'eliminar'])->name('rol.eliminar');

    /* RUTAS MENU_ROL */
    Route::get('menu-rol', [MenuRolController::class, 'index'])->name('menu_rol');
    Route::post('menu-rol', [MenuRolController::class, 'guardar'])->name('menu_rol.guardar');
});
