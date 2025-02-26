<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'name',
        'imagen',
        'precio',
        'descripción',
        'id_user',
    ];


    function productoPost(): HasMany{
        return $this->hasMany(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
