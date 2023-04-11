<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['productos']=Producto::paginate(50);
        return view('producto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosProducto=request()->except('_token');
        if($request->hasFile('imagen')) {
            $datosProducto['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Producto::insert($datosProducto);
        $datos['productos']=Producto::paginate(50);
        return view('producto.index',$datos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // $producto=Producto::findOrFail($id);
        return view('producto/edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $datosProducto=request()->except('_token','_method');
        if($request->hasFile('imagen'))
        {
            $producto=Producto::findOrFail($producto->id);
            Storage::delete('public/'.$producto->imagen);
            $datosProducto['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Producto::where('id','=',$producto->id)->update($datosProducto);

        $datos['productos']=Producto::paginate(50);
        return view('producto.index',$datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
     
        $datos['productos']=Producto::paginate(50);
        return view('producto.index',$datos);
    }
}
