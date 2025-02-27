<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index(int $id)
    {
        $producto = Post::find($id);

        return view('productos.detail', compact('producto'));
    }


    
    public function guardarc(Request $request){
        
        $data = $request->validate([
            'comentario'  => 'required|string|max:255',
            'valoracion'  => 'required|string|max:255', 
            'id_user'     => 'required|exists:users,id', 
            'id_prod'     => 'required|exists:productos,id',
        ]);
        
        Post::create($data);
        
        return redirect()->to(url('detail/' . $request->id_prod ))
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
    public function borrarc(int $id)
    {
        $coment = Post::find($id);
        $idvuelta = $coment->id_prod;
        Post::destroy($id);
        return redirect(url('detail/' . $idvuelta));
    }
}
