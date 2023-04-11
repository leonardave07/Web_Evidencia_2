@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <br>
    <a href="{{url('/producto/create')}}" class="btn btn-success"> Agregar nuevo producto</a>
    <a href="{{url('/pedido/')}}" class="btn btn-success"> Ver pedidos</a>
    <br>
    <br>
    <table class="table table-primary">
        <thead>
            <tr>
                <th><h4>Id</th>
                <th><h4>Imagen</h4></th>
                <th><h4>Nombre</h4></th>
                <th><h4>Descripcion</h4></th>
                <th><h4>Cantidad</h4></th>
                <th><h4>Precio</h4></th>
                <th><h4>Acciones</h4></th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto) 
            <tr>
                <td>{{$producto->id}}</td>
                <td><img height="100x" src="{{asset('storage'.'/'.$producto->imagen)}}"/></td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->cantidad}}</td>
                <td>{{$producto->precio}}</td>
                <td>
                    <a href="{{url('/producto/'.$producto->id.'/edit')}}" class="btn btn-warning">Editar</a>
                    <form action="{{url('/producto/'.$producto->id)}}" method="post" class="d-inline">
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