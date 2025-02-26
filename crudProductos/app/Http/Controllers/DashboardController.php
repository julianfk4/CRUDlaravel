<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Producto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(int $id){
        
        $user = User::findOrFail($id);
        $id_user = $id;
        
        $post = Post::find($id_user);
        //$producto = Producto::find($id_user);
        $producto = Producto::where('id_user', $id_user)->get();
        $productos = Producto::all();
        return view("home", compact('user','post','producto','productos'));
    }
}
