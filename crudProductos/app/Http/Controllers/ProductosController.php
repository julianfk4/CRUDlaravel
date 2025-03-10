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
        
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'imagen'       => 'required|string|max:255',
            'precio'       => 'required|numeric',
            'descripción'  => 'required|string',
            'id_user'      => 'required|exists:users,id',
        ]);
    
        
        Producto::create($data);
        
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
        Post::where('id_prod', $id)->delete();
        Producto::destroy($id);
        
        return redirect(url('dashboard/' . Auth::user()->id));
    }
}
