@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{$producto->nombre}}</h1>
    <form action="{{url('/pedido/'.$pedido->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('pedido.form')
    </form>
    <div>
        <input class="btn btn-success" type="submit" value="Guardar"> 
        <br><br>
        <a class="btn btn-danger" href="{{url('/pedido/')}}">Regresar</a>
    </div>
</div>

@endsection
