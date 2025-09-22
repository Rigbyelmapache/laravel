<?php

namespace App\servicio;

use App\Models\Producto;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductoService
// servicio para manejar la logica de negocio
{
    // funcion para crear un producto
    public function crearProducto($data)
    {
        // create es crear xd , parametro un array 
        $producto = Producto::create([
            'nombre' => $data['nombre'],
            'codigo_producto' => $data['codigo_producto'],
            'descripcion' => $data['descripcion'],
            'precio' => $data['precio'],
            'marca' => $data['marca'],
            'categoria_id' => $data['categoria_id'],
        ]);

        return $producto;
    }
     public function obtenerProductos()
    {
        // all = todos 
        
        return Producto::all();
    }
    public function obtenerProductoPorId($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            throw new ModelNotFoundException("Producto no encontrado.");
        }

        return $producto;
    }
     public function obtenerProductoParaEditar($id)
    {
        return $this->obtenerProductoPorId($id);
    }


    public function actualizarProducto($id, $data)
    {
        // validacion ,buscar producto
        $producto = Producto::find($id);
        // find busca 
        if (!$producto) {
            throw new ModelNotFoundException("Producto no encontrado.");
        }
        // si lo encuentra actuliza si no , no ps
        // update = actualizar 
        $producto->update([
            'nombre' => $data['nombre'],
            'codigo_producto' => $data['codigo_producto'],
            'descripcion' => $data['descripcion'],
            'precio' => $data['precio'],
            'marca' => $data['marca'],
            'categoria_id' => $data['categoria_id'],
        ]);
       

        return $producto;
    }
     public function eliminarProducto($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            throw new ModelNotFoundException("Producto no encontrado.");
        }

        $producto->delete();
        return true;
    }
}
