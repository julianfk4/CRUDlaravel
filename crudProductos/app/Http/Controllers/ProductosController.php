<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductosController extends Controller
{
    public function index(int $id)
    {
        $producto = Producto::find($id);
        $comentarios = Post::all();

        return view('productos.detail', compact('producto','comentarios'));
    }


    public function crear(int $id)
    {
        return view("productos.crear",  compact('id'));
    }
    
    public function guardar(Request $request){
        // Validar los datos del formulario
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'imagen'       => 'required|string|max:255',
            'precio'       => 'required|numeric',
            'descripción'  => 'required|string',
            'id_user'      => 'required|exists:users,id', // Verifica que el id_user exista en la tabla users
        ]);
    
         // Crear el producto en la base de datos
        Producto::create($data);
        // Redirigir a una ruta (por ejemplo, al listado de productos) con un mensaje de éxito
        return redirect()->to(url('dashboard/' . Auth::user()->id))
            ->with('success', 'Producto registrado correctamente');
    }
        
    public function editar()
    {
        return "editando";
    }
    public function actualizar()
    {
        return "actualizando";
    }
    public function borrar(int $id)
    {
        Producto::destroy($id);
        Post::where('id_user', $id)->delete();
        return redirect(url('dashboard/' . Auth::user()->id));
    }
}
