<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','pvp','stock','imagen','slug','user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Un arículo tiene un proveedor.
    public function user(){
        return $this->belongsTo(User::class);
    }
}