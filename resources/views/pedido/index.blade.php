@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos</h1>
    <br>
    <a href="{{url('/pedido/create')}}" class="btn btn-success"> Agregar nuevo pedido</a>
    <a href="{{url('/producto/')}}" class="btn btn-success"> Ver productos</a>
    <br>
    <br>
    <table class="table table-primary">
        <thead>
            <tr>
                <th><h4>Id</th>
                <th><h4>Producto_id</h4></th>
                <th><h4>Cantidad</h4></th>
                <th><h4>Precio</h4></th>
                <th><h4>Total</h4></th>
                <th><h4>Acciones</h4></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido) 
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->producto_id}}</td>
                <td>{{$pedido->cantidad}}</td>
                <td>{{$pedido->precio}}</td>
                <td>{{$pedido->total}}</td>
                <td>
                    <a href="{{url('/pedido/'.$pedido->id.'/edit')}}" class="btn btn-warning">Editar</a>
                    <form action="{{url('/pedido/'.$pedido->id)}}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit"  onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection