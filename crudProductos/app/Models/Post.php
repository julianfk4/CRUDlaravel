<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $filleable = [
        'id_user',
        'id_prod',
        'comentario',
        'valoracion',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function prod(){
        return $this->belongsTo(Producto::class);
    }
}
