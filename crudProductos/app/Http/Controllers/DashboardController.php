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
        $post = Post::findOrFail($id_user);
        $producto = Producto::findOrFail($id_user);

        
        return view("home", compact('user'));
    }
}
