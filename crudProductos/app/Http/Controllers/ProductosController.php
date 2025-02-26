<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        return "mostrando";
    }
    public function crear(int $id)
    {
        return "creando";
    }
    public function guardar()
    {
        return "guardando";
    }
    public function editar()
    {
        return "editando";
    }
    public function actualizar()
    {
        return "actualizando";
    }
    public function borrar()
    {
        return "borrando";
    }
}
