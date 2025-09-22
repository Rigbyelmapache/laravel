<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    
   
    // indicarle el nombre de la tabla
    protected $table = 'productos';

    // Definir los campos modificables
    protected $fillable = [
        'nombre', 'precio', 'descripcion', 'marca', 'categoria_id' , 'codigo_producto'
    ];
    // Definir los tipos de datos de los campos en laravel
    protected $casts = [

        'precio' => 'decimal:2',
        'categoria_id' => 'integer',
        'producto_id' => 'integer',
    ];

    // relacion
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
        // belongsto de muchos a 1 
    }
}
