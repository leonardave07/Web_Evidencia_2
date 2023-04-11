<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['pedidos']=Pedido::paginate(50);
        return view('pedido.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos['productos']=Producto::paginate(50);
        return view('pedido.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosPedido=request()->except('_token');

        $producto = Producto::find($datosPedido['producto_id']);

        $datosPedido['total'] = $producto->precio * $datosPedido['cantidad'];
        $datosPedido['precio'] = $producto->precio;
        $datosPedido['estatus'] = "En proceso";

        $cantidadSolicitada = $request->cantidad;
        $cantidadActual = $producto->cantidad;
        

        if ($cantidadSolicitada > $cantidadActual) {
            return back()->with('error', 'No hay suficientes productos en stock');
        }

        // Restar la cantidad de productos solicitados de la cantidad actual de productos
        $nuevaCantidad = $cantidadActual - $cantidadSolicitada;
        $producto['cantidad'] = $nuevaCantidad;
        // Actualizar la cantidad de productos
        Producto::where('id', $producto->id)->update(['cantidad' => $nuevaCantidad]);


        Pedido::insert($datosPedido);

        $datos['pedidos']=Pedido::paginate(50);
        return view('pedido.index',$datos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        // $pedido=Pedido::findOrFail($id);
        return view('pedido/edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $datosPedido=request()->except('_token','_method');
        if($request->hasFile('imagen'))
        {
            $pedido=Pedido::findOrFail($id);
            Storage::delete('public/'.$pedido->imagen);
            $datosPedido['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Pedido::where('id','=',$id)->update($datosPedido);

        $pedido=Pedido::findOrFail($id);
        return view('pedido/edit', compact('pedido'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
     
        $datos['pedidos']=Pedido::paginate(50);
        return view('pedido.index',$datos);
    }
}
