@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Superheroes</h1>
    <br>
    <a href="{{url('/superheroe/create')}}" class="btn btn-success"> Agregar nuevo superheroe</a>
    <br>
    <br>
    <table class="table table-primary">
        <thead>
            <tr>
                <th><h4>Id</th>
                <th><h4>Imagen</h4></th>
                <th><h4>Nombre</h4></th>
                <th><h4>Nombre real</h4></th>
                <th><h4>Informacion</h4></th>
                <th><h4>Acciones</h4></th>
            </tr>
        </thead>
        <tbody>
            @foreach($superheroes as $superheroe) 
            <tr>
                <td>{{$superheroe->id}}</td>
                <td><img height="100x" src="{{asset('storage'.'/'.$superheroe->imagen)}}"/></td>
                <td>{{$superheroe->nombreSuper}}</td>
                <td>{{$superheroe->nombreReal}}</td>
                <td>{{$superheroe->informacion}}</td>
                <td>
                    <a href="{{url('/superheroe/'.$superheroe->id.'/edit')}}" class="btn btn-warning">Editar</a>
                    <form action="{{url('/superheroe/'.$superheroe->id)}}" method="post" class="d-inline">
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