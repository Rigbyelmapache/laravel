<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Request;
use App\servicio\ProductoService;

class ProductoController extends Controller
{
   

    protected $productoService;
    // instanciar e inicializar el servicio

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }
    public function index()
    {
        // obtener todos los productos
        try{

            $productos = $this->productoService->obtenerProductos()->toArray();
            return response()->json(['productos'=>$productos,'message'=>'Productos cargados exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retorna la vista ??????????????????
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        //guardar producto
      

        $producto = $this->productoService->crearProducto($request->validated());
        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //producto por id
         try {
            $producto = $this->productoService->obtenerProductoPorId($id);
            return response()->json($producto);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        //retorna la vista ??????????????????
        return view('productos.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_producto' => 'required|string',
            'descripcion' => 'required|numeric',
            'precio' => 'required|numeric',
            'marca' => 'required|numeric',
            'categoria_id' => 'required|numeric',
        ]);

        try {
            $producto = $this->productoService->actualizarProducto($id, $validatedData);
            return response()->json($producto);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         try {
            $this->productoService->eliminarProducto($id);
            return response()->json(['message' => 'Producto eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
